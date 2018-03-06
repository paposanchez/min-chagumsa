<?php

namespace App\Http\Controllers\Admin;

use App\Mixapply\Uploader\Receiver;
use App\Models\Car;
use App\Models\CarNumber;
use App\Models\Code;
use App\Models\Diagnosis;
use App\Models\DiagnosisFile;
use App\Models\Models;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use App\Models\UserExtra;
use App\Repositories\DiagnosisRepository;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use DB;

class DiagnosisController extends Controller
{
    /**
     * @param Request $request
     * 진단중 상태 이상의 주문 리스트
     * 검색조건에 해당되는 주문을 출력한다.
     * 예약변경, 예약확정, 진단시작 기능 사용 가능
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $sort = $request->get('sort');
        if (!$sort) {
            $where = Diagnosis::orderBy('created_at', 'DESC');
        } else {
            $where = Diagnosis::select();
        }

        // 정렬옵션
        $sort_orderby = $request->get('sort_orderby');
        if ($sort) {
            if ($sort == 'status') {
                $where->orderBy('status_cd', $sort_orderby);
            } else {
                $where->orderBy($sort, $sort_orderby);
            }
        }

        //주문상태
        $status_cd = $request->get('status_cd');
        if ($status_cd) {
            $where->where('status_cd', $status_cd);
        }

        //기간 검색
        $df = $request->get('df');
        $trs = $request->get('trs');
        $tre = $request->get('tre');

        if ($trs && $tre) {
            //시작일, 종료일이 모두 있을때
            $where->where(function ($qry) use ($trs, $tre, $df) {
                $qry->where($df, ">=", $trs)
                    ->where($df, "<=", $tre);
            });
        } elseif ($trs && !$tre) {
            //시작일만 있을때
            $where->where(function ($qry) use ($trs, $df) {
                $qry->where($df, ">=", $trs)
                    ->orWhere(function ($qry) use ($trs, $df) {
                        $qry->where($df, ">=", $trs);
                    });
            });
        }


        $search_fields = [
            "id" => "seq 번호",
            "chakey" => "주문번호",
            "car_number" => "차량번호",
            'orderer_name' => '주문자 이름',
            "orderer_mobile" => "주문자 휴대전화번호",
            "engineer_name" => "엔지니어명",
            "bcs_name" => "BCS명",
            "email" => '이메일'
        ];

        $search_fields2 = [
            "created_at" => "신청일자",
            "start_at" => "진단시작일자",
            "completed_at" => "진단완료일자"
        ];


        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어
        if ($s) {
            switch ($sf) {
                case 'id':
                    $where->where($sf, $s);
                    break;
                case 'car_number':
                    $where->leftJoin('car_numbers', 'diagnosis.car_numbers_id', '=', 'car_numbers.id')
                        ->where('car_numbers.car_number', 'like', '%' . $s . '%')
                        ->select('diagnosis.*');
                    break;
                case 'chakey':
                    $where->where($sf, 'like', '%' . $s . '%');
                    break;
                case 'orderer_name':
                    $where->leftJoin('order_items', 'diagnosis.order_items_id', '=', 'order_items.id')
                        ->leftJoin('orders', 'order_items.orders_id', '=', 'orders.id')
                        ->where('orders.orderer_name', 'like', '%' . $s . '%')
                        ->select('diagnosis.*');
                    break;
                case 'orderer_mobile':
                    $where->leftJoin('order_items', 'diagnosis.order_items_id', '=', 'order_items.id')
                        ->leftJoin('orders', 'order_items.orders_id', '=', 'orders.id')
                        ->where('orders.orderer_mobile', 'like', '%' . $s . '%')
                        ->select('diagnosis.*');
                    break;
                case 'engineer_name':
                    $where->whereHas('engineer', function ($query) use ($s) {
                        $query
                            ->where('name', 'like', '%' . $s . '%');
                    });


                    break;
                case 'bcs_name':
                    $where->whereHas('garage', function ($query) use ($s) {
                        $query
                            ->where('name', 'like', '%' . $s . '%');
                    });
                    break;
                case 'email':
                    $where->whereHas('garage', function ($query) use ($s) {
                        $query
                            ->where('name', 'like', '%' . $s . '%');
                    });
                    break;
            }
        }

        $entrys = $where->paginate(25);

        return view('admin.diagnosis.index', compact('search_fields', 'search_fields2', 'sf', 's', 'trs', 'tre', 'entrys', 'status_cd', 'df', 'sort', 'sort_orderby', 'user'));
    }

    /**
     * @param Request $request
     * @param Int $id
     * 진단에 대한 정보 출력
     * 진단 데이터를 수정 가능하며 사진첨부가 가능
     * 진단완료 처리가 가능
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $diagnosis = Diagnosis::find($id);

        $my_brand = $diagnosis->order->brand;

        $models = Models::where('brands_id', $my_brand->id)->orderBy("name", 'ASC')->pluck('name', 'id');

        $sel_hours = config('chagumsa.sel_hour');
        //전체 정비소 리스트
        $garages = UserExtra::orderBy(DB::raw('field(area, "서울시")'), 'desc')
            ->join('users', function ($join) {
                $join->on('user_extras.users_id', 'users.id')
                    ->where('users.status_cd', 1);
            })
            ->orderBy('area', 'asc')->groupBy('area')->whereNotNull('aliance_id')->whereNotNull('area')->pluck('area', 'area');
        return view('admin.diagnosis.show', compact('diagnosis', 'my_brand', 'models', 'sel_hours', 'garages'));
    }

    public function edit(Request $request, $id)
    {
        $user = Auth::user();
        $diagnosis = Diagnosis::findOrFail($id);
        $order = $diagnosis->order;

        // 차량 기본정보 관련
        $select_vin_yn = Code::getSelectList('yn');
        $kinds = Code::getSelectList('kind_cd');
        $select_color = Code::getSelectList('color_cd');
        $select_transmission = Code::getSelectList("transmission");
        $select_fueltype = Code::getSelectList('fuel_type');

        // 진단레이아웃 구성
        // 진단정보가 예약확정요청
        $repository = DiagnosisRepository::getInstance()
            ->load($id)
            ->triggerReview($user->id);
        $diagnosis_layout = $repository->layout();


        return view('admin.diagnosis.edit', compact('user', 'diagnosis', 'order', 'diagnosis_layout', 'select_vin_yn', 'kinds', 'select_color', 'select_transmission', 'select_fueltype'));
    }


    /**
     * @param Request $request
     * 진단 항목에 대한 선택값 업데이트
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function updateCode(Request $request)
    {
        $id = $request->get('id');
        $selected = $request->get('selected');
        $diagnosis = Diagnosis::where('id', $id)->first();
        $diagnosis->selected = $selected;
        $diagnosis->save();
        return $diagnosis;

    }

    /**
     * @param Request $request
     * 진단 항목에 대한 코멘트 업데이트
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateComment(Request $request)
    {
        try {
            $diagnosis_id = $request->get('diagnosis_id');
            $comment = $request->get('comment');

            $diagnosis = Diagnosis::findOrFail($diagnosis_id);
            $diagnosis->comment = $comment;
            $diagnosis->save();

            return response()->json();
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

    /**
     * @param Request $request
     * 진단 항목에 대한 이미지 업로드
     * @return \Illuminate\Http\JsonResponse
     */
    public function fileUpload(Request $request)
    {
        try {
            $diagnoses_id = $request->get('diagnosis_id');

            if (!$diagnoses_id) {
                throw new Exception('필수 파라미터가 없습니다.');
            }

            // validator
            $uploader_name = 'upfile';

            $diagnosis_upload_prifix = storage_path('app/diagnosis');

            $uploader = new Receiver($request, $diagnosis_upload_prifix);
            $response = $uploader->receive($uploader_name, function ($file, $path_prefix, $path, $file_new_name) {
                // 파일이동
                $file->move($path_prefix . $path, $file_new_name);

                try {
                    $file_size = $file->getClientSize();
                } catch (RuntimeException $ex) {
                    $file_size = 0;
                }

                return [
                    'original' => $file->getClientOriginalName(),
                    'source' => $file_new_name,
                    'path' => $path,
                    'size' => $file_size,
                    'extension' => $file->getClientOriginalExtension(),
                    'mime' => $file->getClientMimeType(),
                    //@TODO 실제파일이 아닌 파일
                    'hash' => md5($file)
                ];
            });

            // 업로드 성공시
            if ($response['result']) {

                // Save the record to the db
                $data = DiagnosisFile::create([
                    'diagnoses_id' => $diagnoses_id,
                    'original' => $response['result']['original'],
                    'source' => $response['result']['source'],
                    'path' => $response['result']['path'],
                    'size' => $response['result']['size'],
                    'mime' => $response['result']['mime'],
                ]);

                $data->save();

                // make thumbnail html
                $file = array(
                    'id' => $data->id,
                    'diagnoses_id' => $data->diagnoses_id,
                    'original' => $data->original,
                    'source' => $data->source,
                    'path' => $data->path,
                    'mime' => $data->mime,
                    'size' => $data->size,
                    'fullpath' => $data->getRealPath('app/diagnosis'),
                    'preview' => $data->getPreviewPath(),
                    'created_at' => $data->created_at->format("Y-m-d H:i:s"),
                    'updated_at' => ($data->updated_at ? $data->updated_at->format("Y-m-d H:i:s") : ''),
                );
                $html = view('partials.diagnosis-image')->with(compact('file'))->render();

                $return = [
                    'thumbnail' => $html,
                    'status' => 'success'
                ];
            } else {
                $return = [
                    'status' => 'fail'
                ];
            }

            return response()->json($return);
        } catch (Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param Int $id
     * 진단 항목에 대한 이미지 삭제
     * @return \Illuminate\Http\JsonResponse
     */
    public function fileDelete(Request $request, $id)
    {
        try {
            $file = DiagnosisFile::findOrFail($id);
            // 실제파일 삭제하지않음
            $file->delete();
            return response()->json('success');

        } catch (Exception $e) {

            return response()->json('error');
        }
    }

    public function reviewComplete(Request $request)
    {
        //        dd($request->all());
        dd('review-complete');

    }


    /**
     * @param Request $request
     * 진단완료 처리
     * @return \Illuminate\Http\JsonResponse
     */
    public function issue(Request $request)
    {

        $this->validate($request, [
            'vin_number' => 'required',
            'mileage' => 'required',
            'certificates_vin_yn_cd' => 'required',
            'cars_registration_date' => 'required',
            'cars_year' => 'required',
            'kind_cd' => 'required',
            'cars_displacement' => 'required',
            'cars_exterior_color' => 'required',
            'car_exterior_color_etc' => 'nullable',
            'cars_transmission_cd' => 'required',
            'cars_fueltype_cd' => 'required',
            'car_fueltype_etc' => 'nullable',
            'passenger' => 'required',
            'history_change' => "required",
            'car_number_change' => "required",
            'owner_change' => "required",
            'total_loss_count' => "required",
            'theft_count' => "required",
            'flood_count' => "required",
            'self_damage_count' => "required",
            'damaged_count' => "required",
            'comment' => 'required'
        ], [],
            [
                'vin_number' => '차대번호',
                'mileage' => '주행거리',
                'certificates_vin_yn_cd' => '차대번호 동일성확인',
                'cars_registration_date' => '최초등록일',
                'cars_year' => '연식',
                'kind_cd' => '차종',
                'cars_displacement' => '배기량',
                'cars_exterior_color' => '외부색상',
                //                'car_exterior_color_etc' => '외부색상 기타',
                'cars_transmission_cd' => '변속기',
                'cars_fueltype_cd' => '사용연료',
                //                'car_fueltype_etc' => '연료타입기타',
                'passenger' => '승차인원',
                "history_change" => "용도이력변경",
                "car_number_change" => "차량번호변경",
                "owner_change" => "소유자변경",
                "total_loss_count" => "전손",
                "theft_count" => "도난",
                "flood_count" => "침수",
                "self_damage_count" => "내차피해",
                "damaged_count" => "타차가해",
                'comment' => '종합의견'
            ]);

        try {

            DB::beginTransaction();
            $diagnosis = Diagnosis::findOrFail($request->get('id'));
            $order = $diagnosis->order;

            $car = Car::create([
                'id' => $request->get('vin_number'),
                'brands_id' => $order->models_id,
                'models_id' => $order->models_id,
                'details_id' => $order->details_id,
                'grades_id' => $order->grades_id,
                'certificates_vin_yn_cd' => $request->get('certificates_vin_yn_cd'),
                'registration_date' => $request->get('cars_registration_date'),
                'year' => $request->get('cars_year'),
                'kind_cd' => $request->get('kind_cd'),
                'displacement' => $request->get('cars_displacement'),
                'exterior_color_cd' => $request->get('cars_exterior_color'),
                'exterior_color_etc' => $request->get('car_exterior_color_etc') ? $request->get('car_exterior_color_etc') : '',
                'transmission_cd' => $request->get('cars_transmission_cd'),
                'fueltype_cd' => $request->get('cars_fueltype_cd'),
                'fueltype_etc' => $request->get('car_fueltype_etc') ? $request->get('car_fueltype_etc') : '',
                'passenger' => $request->get('passenger'),
                'history_change' => $request->get('history_change'),
                'car_number_change' => $request->get('car_number_change'),
                'owner_change' => $request->get('owner_change'),
                'total_loss_count' => $request->get('total_loss_count'),
                'theft_count' => $request->get('theft_count'),
                'flood_count' => $request->get('flood_count'),
                'self_damage_count' => $request->get('self_damage_count'),
                'damaged_count' => $request->get('damaged_count'),
            ]);
            $car_number = CarNumber::create([
                'cars_id' => $car->id,
                'vin_number' => $request->get('vin_number'),
                'car_number' => $order->car_number
            ]);

            $diagnosis->car_numbers_id = $car_number->id;
            $diagnosis->status_cd = Code::getIdByGroupAndName('report_state', 'complete');
            $diagnosis->mileage = $request->get('mileage');
            $diagnosis->issued_at = Carbon::now();
            $diagnosis->expired_at = Carbon::now()->addDays($diagnosis->expire_period);
            $diagnosis->opinion = $request->get('comment');
            $diagnosis->save();

            DB::commit();
            return redirect()->back()->with('success', '진단이 발급되었습니다.');
        } catch (\Exception $e) {
            DB::rollback();
//            dd($e->getMessage());
            return redirect()->back()->with('error', '오류가 발생하였습니다.');
        }
    }

    public function changeReservation(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => 'required',
                'reservation_at' => 'required',
                'sel_hour' => 'required'
            ], [],
                [
                    'id' => '아이디',
                    'reservation_at' => '예약날짜',
                    'sel_hour' => '예약시간'
                ]);

            $reservation_date = new DateTime($request->get('reservation_at') . ' ' . $request->get('sel_hour') . ':00:00');

            $diagnosis = Diagnosis::findOrFail($request->get('id'));
            $diagnosis->reservation_at = $reservation_date;
            $diagnosis->status_cd = Code::getIdByGroupAndName('report_state', 'order');
            $diagnosis->reservation_user_id = Auth::user()->id;
            $diagnosis->confirm_at = null;
            $diagnosis->save();

            $reservation = new Reservation();
            $reservation->diagnosis_id = $request->get('id');
            $reservation->reservation_at = $diagnosis->reservation_at;
            $reservation->garage_id = $diagnosis->garage_id;
            $reservation->save();

            return redirect()->back()->with('success', '예약이 성공적으로 변경되었습니다.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '오류가 발생하였습니다.');
        }
    }

    public function confirmReservation(Request $request)
    {
        try {
            $this->validate($request, [
                'diagnosis_id' => 'required',
            ], [],
                [
                    'diagnosis_id' => '아이디',
                ]);

            $diagnosis = Diagnosis::findOrFail($request->get('diagnosis_id'));
            $diagnosis->status_cd = Code::getIdByGroupAndName('report_state', 'confirm');
            $diagnosis->confirm_at = Carbon::now();
            $diagnosis->reservation_user_id = Auth::user()->id;
            $diagnosis->save();

            return redirect()->back()->with('success', '예약이 확정되었습니다.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '오류가 발생하였습니다.');
        }
    }

    public function changeGarage(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => 'required',
                'areas' => 'required',
                'sections' => 'required',
                'garages' => 'required'
            ], [],
                [
                    'id' => '아이디',
                    'areas' => '시/도',
                    'sections' => '구/군',
                    'garages' => '정비소',
                ]);

            $garage = User::where('name', $request->get('garages'))->first();
            $diagnosis = Diagnosis::findOrFail($request->get('id'));
            $diagnosis->garage_id = $garage->id;
            $diagnosis->status_cd = Code::getIdByGroupAndName('report_state', 'order');
            $diagnosis->confirm_at = null;
            //            $diagnosis->reservation_at = null;
            $diagnosis->reservation_user_id = Auth::user()->id;
            $diagnosis->save();

            $reservation = new Reservation();
            $reservation->diagnosis_id = $diagnosis->id;
            $reservation->reservation_at = $diagnosis->reservation_at;
            $reservation->garage_id = $diagnosis->garage_id;
            $reservation->save();

            return redirect()->back()->with('success', '정비소가 정상적으로 변경되었습니다. ');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '오류가 발생하였습니다.');
        }
    }
}

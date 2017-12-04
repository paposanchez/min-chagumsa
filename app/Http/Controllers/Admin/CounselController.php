<?php
/**
 * Created by PhpStorm.
 * User: minseok
 * Date: 2017. 12. 1.
 * Time: AM 11:49
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Counsel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CounselController extends Controller
{
    public function index(Request $request)
    {
        $where = Counsel::orderBy('id', 'desc');

        //카테고리 검색
        $board_id = $request->get('board_id');
        if ($board_id) {
            $where = $where->where('board_id', $board_id);
        }

        //검색조건
        $search_fields = [
            "id" => "상담번호",
            "name" => "이름",
            "email" => "이메일"
        ];

        //기간 검색
        $trs = $request->get('trs');
        $tre = $request->get('tre');
        if ($trs && $tre) {
            //시작일, 종료일이 모두 있을때
            $where->where(function ($qry) use ($trs, $tre) {
                $qry->where("created_at", ">=", $trs)
                    ->where("created_at", "<=", $tre)
                    ->orWhere(function ($qry) use ($trs, $tre) {
                        $qry->where("updated_at", ">=", $trs)
                            ->where("updated_at", "<=", $tre);
                    });
            });
        } elseif ($trs && !$tre) {
            //시작일만 있을때
            $where->where(function ($qry) use ($trs) {
                $qry->where("created_at", ">=", $trs)
                    ->orWhere(function ($qry) use ($trs) {
                        $qry->where("updated_at", ">=", $trs);
                    });
            });
        }

        //검색어 검색
        $sf = $request->get('sf'); //검색필드
        $s = $request->get('s'); //검색어

        if ($sf && $s) {
            if ($sf == 8) {
                $where = $where->where('subject', 'like', '%' . $s . '%');
            } elseif ($sf == 9) {
                $where = $where->where('content', 'like', '%' . $s . '%');
            } else {
                $where = $where->where('name', 'like', '%' . $s . '%');
            }
        }

        $entrys = $where->paginate(10);

        return view('admin.counsel.index', compact('request', 'search_fields', 'entrys', 'sf', 's', 'trs', 'tre'));
    }

    public function edit($id)
    {
        $counsel = Counsel::findOrFail($id);


        return view('admin.counsel.edit', compact('counsel'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'reply' => 'required|min:10',
        ],
            [],
            [
                'reply' => '답변내용'
            ]);
        DB::beginTransaction();
        try {

            $counsel = Counsel::find($id);
            $counsel->reply = $request->get('reply');
            $counsel->updated_at = Carbon::now();
            $counsel->save();

            $mail_message = [
                'name' => $counsel->name, 'mobile' => $counsel->mobile, 'email' => $counsel->email, 'reply' => $request->get('reply'), 'content' => $counsel->content
            ];

            Mail::send(new \App\Mail\Ordering($counsel->email, "[차검사] 고객님의 상담 내용에 대한 답변입니다.", $mail_message, 'message.email.counsel-user'));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }


        return redirect()->back()->with('success', '이메일이 성공적으로 전송되었습니다.');
    }
}
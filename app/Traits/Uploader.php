<?php

/*
 *
 * @Project        zlara
 * @Copyright      leechanrin
 * @Created        2017-03-23 오전 11:36:54
 * @Filename       Uploader.php
 * @Description
 *
 */

namespace App\Traits;

use Storage;
use App\Models\File;
use App\Mixapply\Uploader\Receiver;
use Illuminate\Http\Request;
use Validator;
use Exception;

/**
 * Description of Uploader
 *
 * @author leechanrin
 */
trait Uploader {

    protected $result = [
        'success' => '',
        'msg' => '',
        'id' => '',
        'name' => '',
        'preview' => '',
        'size' => 0,
        'mime' => '',
        'type' => ''
    ];

    public function getResult() {
        return $this->result;
    }

    public function setResult(array $values) {
        foreach ($values as $key => $val) {
            $this->result[$key] = $val;
        }
    }

    public function resetResult() {
        $this->result = [
            'success' => false,
            'msg' => trans('file.upload_fail')
        ];
    }

    // 일반파일업로드
    public function upload(Request $request) {

        try {

            $uploader_name = 'upfile';
            $uploader_group = $request->get('upfile_group');
            $uploader_group_id = $request->get('upfile_group_id');

            $uploader = new Receiver($request);
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
                $data = File::create([
                            'original' => $response['result']['original'],
                            'source' => $response['result']['source'],
                            'path' => $response['result']['path'],
                            'size' => $response['result']['size'],
                            'extension' => $response['result']['extension'],
                            'mime' => $response['result']['mime'],
                            'hash' => $response['result']['hash'],
                            'download' => 0,
                            'group' => ($uploader_group ? $uploader_group : NULL),
                            'group_id' => ($uploader_group_id ? $uploader_group_id : NULL)
                ]);
                $data->save();

                $this->result = [
                    'success' => true,
                    'msg' => trans('file.upload_success'),
                    'data' => $data->toArray()
                ];
            }

            return $this->result;
        } catch (Exception $ex) {
            $this->result['success'] = false;
            $this->result['msg'] = $ex->getMessage();
            return $this->result;
        }
    }

    // 이미지파일업로드
    public function image(Request $request) {
        try {
            $uploader_name = 'upfile';
            $uploader_group = $request->get('upfile_group');
            $uploader_group_id = $request->get('upfile_group_id');

            $validator = Validator::make($request->all(), [
                        $uploader_name => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                throw New Exception($errors[0]);
            }

            $uploader = new Receiver($request);
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
                $data = File::create([
                            'original' => $response['result']['original'],
                            'source' => $response['result']['source'],
                            'path' => $response['result']['path'],
                            'size' => $response['result']['size'],
                            'extension' => $response['result']['extension'],
                            'mime' => $response['result']['mime'],
                            'hash' => $response['result']['hash'],
                            'download' => 0,
                            'group' => ($uploader_group ? $uploader_group : NULL),
                            'group_id' => ($uploader_group_id ? $uploader_group_id : NULL)
                ]);
                $data->save();

                $this->result = [
                    'success' => true,
                    'msg' => trans('file.upload_success'),
                    'data' => $data->toArray()
                ];
            }

            return $this->result;
        } catch (Exception $ex) {
            $this->result['success'] = false;
            $this->result['msg'] = $ex->getMessage();
            return $this->result;
        }
    }

    // 파일다운로드
    public function download(Request $request, $id) {

        $file = File::findOrFail($id);

        ##@TODO 권한체크
        switch ($file->group) {
            case "post";
                $post = \App\Models\Post::findOrFail($file->group_id);

                // 게시물 공개 + 게시물 게시판의 다운로드 허가가 있는 경우 허가
                // 게시물이 비공개 또는 부분공개 + 게시물 게시판의 다운로드 허가 & 게시물 조회권
                //            // 해당 게시판의 해당 게시물의 해당 파일을 내려받을 수 있나?
                //            if (!$this->_helper->Authorize()->level($board->perm_download, $this->_auth->getIdentity()->level)) {
                //                $this->terminate('접근권한이 없습니다.', 'back', 'error', $is_json);
                //            }
                break;

            default :

                break;
        }


        // 게시판의 게시물이라면
        //        if ($file->post_type == 'board') {
        //            //게시물 정보 조회
        //            $model_post = new Application_Model_Post();
        //            $entry = $model_post->fetchRow($model_post->select()->where("idx=?", $file->post_idx));
        //
                //            // 게시판 조회
        //            $model_board = new Application_Model_Board();
        //            $board = $model_board->fetchRow($model_board->select()->where("idx=?", $entry->board_idx));
        //
                //            // 요청한 게시물의 정보와 다운로드 파일의 정보 다른경우
        //            if (!$entry->idx) {
        //                $this->terminate('잘못된 접근입니다.', 'back', 'error', $is_json);
        //            }
        //
                //            // 해당 게시판의 해당 게시물의 해당 파일을 내려받을 수 있나?
        //            if (!$this->_helper->Authorize()->level($board->perm_download, $this->_auth->getIdentity()->level)) {
        //                $this->terminate('접근권한이 없습니다.', 'back', 'error', $is_json);
        //            }
        //        }
        // 다운로드 카운트 업데이트
        $file->download += 1;
        $file->save();

        // 실제파일 위치
        $real_file_path = storage_path('app/upload' . $file->path . '/') . $file->source;
        return response()->download($real_file_path, $file->original);
    }

    // 파일삭제
    public function delete(Request $request, $id) {
        try{
            $file = File::findOrFail($id);

            if ($file) {

                // 실제파일 위치
                $real_file_path = storage_path('app/upload') . $file->path . '/' . $file->source;

                Storage::delete($real_file_path);

                $file->delete();
            }
            return response()->json(['success' => true, 'msg' => trans("file.delete_success")]);
        }catch(Exception $e){
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }


//        $file = File::findOrFail($id);
//
//        if ($file) {
//
//            // 실제파일 위치
//            $real_file_path = storage_path('app/upload') . $file->path . '/' . $file->source;
//
//            Storage::delete($real_file_path);
//
//            $file->delete();
//        }
//
//
//        // 리퀘스트를 체크해서 반환 method를 맞춰준다
//        if ($request->ajax()) {
//            return response()->json(['success' => true, 'msg' => trans("file.delete_success")]);
//        } else {
//            return redirect()->back();
//        }
    }

}

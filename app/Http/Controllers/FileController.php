<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DiagnosisFile;
use App\Models\File;
use App\Models\Post;
use App\Traits\Uploader;
use Illuminate\Http\Request;

class FileController extends Controller {

    use Uploader;


    // 파일다운로드
    public function download(Request $request, $id) {
        $file = File::findOrFail($id);

        ##@TODO 권한체크
        switch ($file->group) {
            case "post";
                $post = Post::findOrFail($file->group_id);

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

}

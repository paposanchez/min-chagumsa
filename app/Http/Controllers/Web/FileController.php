<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Traits\Uploader;

class FileController extends Controller {

    use Uploader;

    // diagnosis 파일다운로드
    public function diagnosisDownload(Request $request, $id) {
        $file = DiagnosisFile::where('diagnoses_id', $id)->first();

//        $file->download += 1;
//        $file->save();

        // 실제파일 위치
        $real_file_path = storage_path('app/upload' . $file->path . '/') . $file->source;
        return response()->download($real_file_path, $file->original);
    }
}

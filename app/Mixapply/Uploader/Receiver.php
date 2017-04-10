<?php

namespace App\Mixapply\Uploader;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class Receiver {

    private $maxFileAge = 600; //600 secondes
    protected $request;
    protected $uptime;
    protected $path_prefix;
    protected $path;

    public function __construct(Request $request) {
        $this->request = $request;

        $this->path_prefix = storage_path('app/upload');

        $this->uptime = Carbon::now();
        $this->path = '/' . $this->uptime->format('Y') . '/' . $this->uptime->format('m') . '/' . $this->uptime->format('d') . '/' . $this->uptime->format('H');
    }

    public function insert() {
        
    }

    public function receiveSingle($name, Closure $handler) {
        if ($this->request->file($name)) {
            return $handler($this->request->file($name), $this->path_prefix, $this->path, $this->getNewFilename($name));
        }
        return false;
    }

    private function appendData($filePathPartial, UploadedFile $file) {
        if (!$out = @fopen($filePathPartial, 'ab')) {
            throw new PluploadException('Failed to open output stream.', 102);
        }
        if (!$in = @fopen($file->getPathname(), 'rb')) {
            throw new PluploadException('Failed to open input stream', 101);
        }
        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }
        @fclose($out);
        @fclose($in);
    }

    public function receiveChunks($name, Closure $handler) {
        $result = false;
        if ($this->request->file($name)) {
            $file = $this->request->file($name);
            $chunk = (int) $this->request->get('chunk', false);
            $chunks = (int) $this->request->get('chunks', false);
            $renameName = $this->getNewFilename($this->request->get('name'));
            $filePath = $this->path_prefix . $this->path . '/' . $renameName . '.part';
            $this->removeOldData($filePath);
            $this->appendData($filePath, $file);
            if ($chunk == $chunks - 1) {
                $file = new UploadedFile($filePath, $renameName, 'blob', sizeof($filePath), UPLOAD_ERR_OK, true);
                $result = $handler($file, $this->path_prefix, $this->path, $renameName);
                @unlink($filePath);
            }
        }
        return $result;
    }

    public function removeOldData($filePath) {
        if (file_exists($filePath) && filemtime($filePath) < time() - $this->maxFileAge) {
            @unlink($filePath);
        }
    }

    public function hasChunks() {
        return (bool) $this->request->get('chunks', false);
    }

    public function receive($name, Closure $handler) {
        $response = [];
        $response['jsonrpc'] = '2.0';
        if ($this->hasChunks()) {
            $result = $this->receiveChunks($name, $handler);
        } else {
            $result = $this->receiveSingle($name, $handler);
        }
        $response['result'] = $result;
        return $response;
    }

    /**
     * 
     * @param type $name
     * @return string 50byte(real 45byte)
     */
    public function getNewFilename($name) {
        $newname = md5($name);
        return $this->uptime->format('is') . '-' . $newname . '-' . str_random(7);
    }

}

<?php

namespace App\Models;
// use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use URL;

class File extends Model {

        protected $primaryKey = 'id';
        protected $fillable = [
                'original',
                'source',
                'path',
                'size',
                'extension',
                'mime',
                'hash',
                'download',
                'group',
                'group_id',
        ];
        protected $dates = ['created_at', 'updated_at'];


        public function getRealPath($prepath = ''){

                return storage_path($prepath . $this->path . '/' . $this->source) ;
        }


        public function getPreviewPath(){
                return 'http://cdn.chagumsa.com/thumbnail/'. $this->id;
                // return "/assets".$prepath . $this->path . '/' . $this->source;
        }
        public function getImagePath(){
                return 'http://cdn.chagumsa.com/image/'. $this->id;
                // return "/assets".$prepath . $this->path . '/' . $this->source;
        }

}

<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserExtra extends Model {

        protected $primaryKey = 'users_id';

        protected $fillable = [
                'registration_number',
                'engineer_number',
                'phone',
                'fax',
                'zipcode',
                'address',
                'address_extra',
                'users_id',
                'created_at',
                'updated_at',
                'user_extrascol',
                'aliance_id',
                'garage_id',
                'bcs_bank',
                'bcs_account',
                'bcs_account_name',
                'area',
                'section',
                'ceo_name',
                'ceo_mobile',
        ];

        public function user() {
                return $this->belongsTo(User::class, 'users_id', 'id');
        }

        /**
        * 정비소의 경우 user_extra.aliance_id로 조회
        * @return type
        */
        public function aliance() {
                return $this->hasOne(User::class, 'id', 'aliance_id');
        }

        /**
        * 엔지니어의 경우 user_extra.garage_id로 조회
        * @return type
        */
        public function garage() {
                return $this->hasOne(User::class, 'id', 'garage_id');
        }


        public function bcsimg_files()
        {
                return $this->hasMany(File::class, 'group_id', 'users_id')->where("group", 'bcsimg');
        }

        public function bcs_files()
        {
                return $this->hasMany(File::class, 'group_id', 'users_id')->where("group", 'bcs');
        }

}

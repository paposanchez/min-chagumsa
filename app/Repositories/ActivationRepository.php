<?php

namespace App\Repositories;

/*
*
* @Project        cargumsa
* @Copyright      leechanrin
* @Created        2017-08-11 오전 11:17:35
* @Filename
* @Description
*
*/

use Carbon\Carbon;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class ActivationRepository
{
        protected $db;
        protected $table_user = 'users';
        protected $table_confirmation = 'email_confirmations';

        public function __construct()
        {
                // $this->db = new DB;
        }
        
        public function getActivation($user)
        {
                return DB::table($this->table_user)->where('email', $user->email)->where("status_cd", 1)->first();
        }

        public function getActivationByToken($token)
        {

                $confirmation = DB::table($this->table_confirmation)->where('token', $token)->first();
                if($confirmation) {
                        DB::table($this->table_user)->where('email', $confirmation->email)->where("status_cd", 2)->update(['status_cd' => 1]);
                        return true;
                }
                return false;
        }

        public function deleteActivation($token)
        {
                DB::table($this->table_confirmation)->where('token', $token)->delete();
        }

        public function createActivation($user)
        {
                $activation = $this->getActivation($user);

                if (!$activation) {
                        return $this->createToken($user);
                }
                return $this->regenerateToken($user);
        }

        protected function getToken()
        {
                return hash_hmac('sha256', str_random(40), config('app.key'));
        }

        private function regenerateToken($email)
        {
                $token = $this->getToken();
                DB::table($this->table_confirmation)->where('email', $email)->update([
                        'token' => $token
                ]);
                return $token;
        }

        private function createToken($user)
        {
                $token = $this->getToken();
                DB::table($this->table_confirmation)->insert([
                        'email' => $user->email,
                        'token' => $token
                ]);
                return $token;
        }
}

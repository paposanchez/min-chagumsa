<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\QueryException;

class UserSequence extends Model {

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = ['seq', 'garage_seq'];
    protected $fillable = [
        'seq',
        'garage_seq',
        'users_id'
    ];

    /**
     * 시퀀스 사용자 조회
     * @return type
     */
    public function user() {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    /**
     * garage 현재 시퀀스
     * @return type
     */
    public function getGarageSeq() {
        return intval(DB::table($this->getTable())->select()->where("seq", 1)->max('garage_seq'));
    }

    /**
     * 엔지니어 현재 시퀀스
     * @param type $garage_seq
     * @return type
     */
    public function getEngineerSeq($garage_seq) {
        return intval(DB::table($this->getTable())->select()->where("garage_seq", $garage_seq)->max('seq'));
    }

    /**
     * 새로운 garage시퀀스 발행
     * @param type $user_id
     * @return type
     */
    public function setNewGarageSeq($user_id) {
        $max_garage_id = $this->getGarageSeq();
        $new_garage_id = $max_garage_id + 1;
        try {
            $user_sequence = new UserSequence([
                'seq' => 1,
                'garage_seq' => $new_garage_id,
                'users_id' => $user_id,
            ]);
            $user_sequence->save();
        } catch (QueryException $ex) {
            return $ex->getMessage();
        }
        return $new_garage_id;
    }

    /**
     * 새로운 엔지니어 시퀀스 번호 발행
     * @param type $user_id
     * @param type $garage_seq
     * @return type
     */
    public function setNewEngineerSeq($user_id, $garage_seq) {
        $max_engineer_id = $this->getEngineerSeq($garage_seq);
        $new_engineer_id = $max_engineer_id + 1;
        try {
            $user_sequence = new UserSequence([
                'seq' => $new_engineer_id,
                'garage_seq' => $garage_seq,
                'users_id' => $user_id,
            ]);
            $user_sequence->save();
        } catch (QueryException $ex) {
            return;
        }
        return $new_engineer_id;
    }

}

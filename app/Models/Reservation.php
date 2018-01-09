<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 2017. 4. 12.
 * Time: PM 3:01
 */

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;

class Reservation extends Model
{
    protected $primaryKey = 'orders_id';
    protected $fillable = [
        'diagnosis_id',
        'garage_id',
        'reservation_at'
    ];

    protected $dates = [
        'created_at'
    ];

    public $timestamps = false;
    //진단정보 조회
    public function diagnosis(){
        return $this->belongsTo(Diagnosis::class, 'diagnosis_id', 'id');
    }

    //정비소 조회
    public function garage(){
        return $this->hasOne(User::class, 'id', 'garage_id');
    }

    //예약날짜 조회
    public function reservation_date(){
        return $this->reservation->format('Y-m-d');
    }

}

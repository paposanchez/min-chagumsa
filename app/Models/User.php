<?php

namespace App\Models;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Code;
use App\Models\Post;
use App\Models\Comment;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use App\Notifications\ConfirmEmail as ConfirmEmailNotification;


use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Storage;
use App\Models\UserExtra;

class User extends Authenticatable
{

        use Notifiable, EntrustUserTrait, SoftDeletes;

        protected $primaryKey = 'id';
        protected $fillable = [
                'email',
                'password',
                'name',
                'mobile',
                'status_cd',
                'profile',
        ];

        protected $hidden = [
                'password',
                'remember_token',
        ];
        protected $dates = ['created_at', 'updated_at', 'deleted_at'];

        public function status()
        {
                return $this->hasOne(Code::class, 'id', 'status_cd')->where('group', 'user_status');
        }

        public function user_extra()
        {
                return $this->hasOne(UserExtra::class, 'users_id', 'id');
        }

        public function posts()
        {
                return $this->hasMany(Post::class);
        }

        public function role_user()
        {
                return $this->hasOne(RoleUser::class, 'user_id', 'id');
        }

        /**
        * One to Many relation
        *
        * @return \Illuminate\Database\Eloquent\Relations\hasMany
        */
        public function comments()
        {
                return $this->hasMany(Comment::class);
        }

        public function order()
        {
                return $this->belongsTo(Order::class, "id");
        }


        public function files()
        {
                return $this->hasMany(File::class, 'group_id', 'id')->where("group", 'bcs');
        }


        // public function roles()
        // {
        //         return $this->belongsToMany(Config::get('entrust.role'), Config::get('entrust.role_user_table'), Config::get('entrust.user_foreign_key'), Config::get('entrust.role_foreign_key'));
        // }


        public function restore()
        {
                return false;
        }

        /**
        * Send the password reset notification.
        *
        * @param  string $token
        * @return void
        */
        public function sendPasswordResetNotification($token)
        {
                $this->notify(new ResetPasswordNotification($token));
        }

        /**
        * Send the email verification notification.
        *
        * @param  string $confirmation_code
        * @return void
        */
        public function sendConfirmEmailNotification($confirmation_code)
        {
                $this->notify(new ConfirmEmailNotification($confirmation_code));
        }

        /**
        * Get user files directory
        *
        * @return string|null
        */
        public function getFilesDirectory()
        {

                $folderPath = 'users/' . $this->id;

                if (!in_array($folderPath, Storage::directories())) {
                        Storage::makeDirectory($folderPath);
                }

                return storage_path('app/' . $folderPath);
        }

        public static function getArrayByName()
        {
                $return = User::orderBy('name')->pluck('name', 'id');

                return $return->toArray();
        }

        //    public function getFilesDirectory() {
        //        $folderPath = 'user/' . $this->id;
        //        if (!in_array($folderPath, Storage::disk('files')->directories())) {
        //            Storage::disk('files')->makeDirectory($folderPath);
        //        }
        //        return $folderPath;
        //    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    const ADMIN_PROFILE = 1;
    const ADVERTISER_PROFILE = 2;
    const PUBLISHER_PROFILE = 3;
    private $accountTypes = [
        self::ADMIN_PROFILE => 'admin',
        self::ADVERTISER_PROFILE => 'advertiser',
        self::PUBLISHER_PROFILE => 'publisher',
    ];
    protected $guarded = [
        'id'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAccountName(){
        return $this->accountTypes[$this->profile];
    }
    public function getPhotoAttribute($photo){
        return Storage::disk('public')->exists($photo)?Storage::url($photo):asset('assets/media/svg/avatars/007-boy-2.svg');
    }
    public function account(){
        switch ($this->profile){
            case 1:
                return $this->belongsTo(User::class,'account_id');
                break;
            case 2:
                return $this->belongsTo(Advertisers::class,'account_id');
                break;
            case 3:
                return $this->belongsTo(Publishers::class,'account_id');
                break;
        }
    }
    protected static function booted()
    {
        self::updated(function($model){
            $model->account()->update(['name'=>$model->username]);
        });
    }
}

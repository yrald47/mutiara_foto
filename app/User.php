<?php

namespace App;

use App\Model\Magang;
use App\Model\Member;
use App\Model\Operator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','username', 'email', 'password','mobile','avatar','ward_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function member()
    {
        return $this->hasOne(Member::class, 'id');
    }

    public function operator()
    {
        return $this->hasOne(Operator::class, 'id');
    }

    public function magang()
    {
        return $this->hasOne(Magang::class, 'id');
    }

    public function gcCaptures(){
        return $this->hasMany('App\Capturegc');
    }

    public static function userCount(){
        return User::count();
    }

    public static function getNama(){
        if(auth()->user()->hasRole('operator')){
            $pengguna = Operator::find(auth()->user()->id);
            return $pengguna->name;
        }else if(auth()->user()->hasRole('magang')||auth()->user()->hasRole('pramagang')){
            $pengguna = Magang::find(auth()->user()->id);
            return $pengguna->nama;
        }
        return auth()->user()->username;
    }

    public static function magangCount(){
        return Magang::count();
    }

    public static function operatorCount(){
        return Operator::count();
    }
}

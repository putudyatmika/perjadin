<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','user_level','pengelola'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isSuperAdmin()
    {
        return ($this->user_level == 5);
    }
    public function isAdmin()
    {
        return ($this->user_level == 4);

    }
    public function isPengelola()
    {
        return ($this->user_level == 3);
    }
    public function isOperator()
    {
        return ($this->user_level == 2);
    }
    public function isDemo()
    {
        return ($this->user_level == 1);
    }

    public function isKabid()
    {
        return ($this->pengelola == 1);
    }
    public function isBigram()
    {
        return ($this->pengelola == 2);
    }
    public function isPPK()
    {
        return ($this->pengelola == 3);
    }
    public function isKepala()
    {
        return ($this->pengelola == 4);
    }
    public function isAdminPengelola()
    {
        return ($this->pengelola == 5);
    }
    public function getNama() {
        return $this->id;
    }
}

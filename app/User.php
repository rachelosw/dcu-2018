<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'regular';

    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' , 'birthday', 'institution', 'ktp_ktm_number', 'address', 'phone_number', 'line_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){        
        return $this->type === self::ADMIN_TYPE;    
    }

    public function isAccepted() {
        return $this->status === self::STATUS_ACCEPTED;
    }
}

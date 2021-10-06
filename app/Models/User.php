<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'login',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function create ($name, $surname, $email, $login, $password, $status) {
        $this->fillable['name'] = $name;
        $this->fillable['surname'] = $surname;
        $this->fillable['email'] = $email;
        $this->fillable['login'] = $login;
        $this->fillable['password'] = $password;
        $this->fillable['status'] = $status;
    }
}

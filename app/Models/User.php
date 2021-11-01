<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'login',
        'role',
        'password'
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}

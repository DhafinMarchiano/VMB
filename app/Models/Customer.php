<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'company',
        'phone',
        'address',
        'image',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class OrderProduct extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'programmer_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'programmer_id');
    }
}

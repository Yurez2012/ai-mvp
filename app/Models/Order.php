<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Order extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id'
    ];

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}

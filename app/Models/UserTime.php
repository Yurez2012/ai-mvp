<?php

namespace App\Models;

use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserTime extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $appends = [
        'period'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'start',
        'end',
    ];

    /**
     * @return array
     */
    public function getPeriodAttribute()
    {
        $period =  CarbonPeriod::create($this->start, '1 hour', $this->end);

        $intervals = [];

        foreach ($period as $date) {
            $nextHour = $date->copy()->addHour(); // Отримуємо наступну годину
            $intervals[] = $date->format('H:i') . ' - ' . $nextHour->format('H:i');
        }

        return $intervals;
    }
}

<?php

namespace App\Helpers;

use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class CalendarHelper
{
    /**
     * @param $year
     * @param $month
     * @param $data
     *
     * @return array|void
     */
    public static function getCalendarByYearAndMonth($year, $month, $data = [])
    {
        $startOfMonth = Carbon::create($year, $month, 1);
        $endOfMonth   = $startOfMonth->copy()->endOfMonth();

        $startOfCalendar = $startOfMonth->copy()->startOfWeek(Carbon::MONDAY);
        $endOfCalendar   = $endOfMonth->copy()->endOfWeek(Carbon::SUNDAY);

        $calendar = [];

        for ($date = $startOfCalendar; $date->lte($endOfCalendar); $date->addDay()) {
            $calendar[$date->format('Y-m-d')] = [
                'date'      => $date->format('Y-m-d'),
                'dayOfWeek' => $date->dayOfWeek,
                'day'       => $date->day,
            ];

            if (count($data) > 0) {
                $workSchedule = self::getUserWorkSchedule($data);

                if (isset($workSchedule[$date->format('Y-m-d')])) {
                    $calendar[$date->format('Y-m-d')] = [
                        'periods'   => $workSchedule[$date->format('Y-m-d')],
                        'date'      => $date->format('Y-m-d'),
                        'dayOfWeek' => $date->dayOfWeek,
                        'day'       => $date->day,
                    ];
                }
            }
        }

        return $calendar;
    }

    public static function getUserWorkSchedule($data)
    {
        $result = [];

        foreach ($data as $datum) {
            foreach (Arr::get($datum, 'products', []) as $product) {
                foreach (Arr::get($product, 'times') as $time) {
                    $result[Carbon::parse($time['start'])->format('Y-m-d')][] = [
                        'start'     => Carbon::parse($time['start'])->format('H:m'),
                        'end'       => Carbon::parse($time['end'])->format('H:m'),
                        'full_name' => $product['user']['name'] ?? '',
                    ];
                }
            }
        }

        return $result;
    }
}

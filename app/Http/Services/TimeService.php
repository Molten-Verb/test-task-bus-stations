<?php

namespace App\Http\Services;

use DateTime;
use DateTimeZone;

class TimeService
{
    protected $arrivals;

    public function getNextTimeArrivals(): array
    {
        $timezone = new DateTimeZone('Europe/Moscow');
        $currentDateTime = new DateTime('now', $timezone);
        $currentDateTime->setTime($currentDateTime->format('H'), 0);

        $arrivals = [];

        for ($i = 1; count($arrivals) < 3; $i++) {
            $interval = clone $currentDateTime;
            $interval->modify('+15 minutes');

            if ($currentDateTime < $interval) {
                $arrivals[] = $interval->format('H:i');
            }

            $currentDateTime = $interval;
        }

        return $this->arrivals = $arrivals;
    }
}


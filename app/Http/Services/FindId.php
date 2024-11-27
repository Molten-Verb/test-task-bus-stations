<?php

namespace App\Http\Services;

use App\Models\Station;
use App\Models\RouteAndStation;

class FindId
{
    public function getRouteId(string $name): ?int
    {
        return RouteAndStation::firstWhere('station_id', $this->getStationId($name))?->bus_route_id;
    }

    public function getStationId(string $name): ?int
    {
        return Station::firstWhere('name', $name)?->id;
    }
}

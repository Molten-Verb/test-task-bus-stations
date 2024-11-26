<?php

namespace App\Http\Services;

use App\Models\Station;
use App\Models\RouteAndStation;

class FindId
{
    protected int $routeId;
    protected int $stationId;

    public function getRouteId(string $name): int
    {
        $routeId = RouteAndStation::where('station_id', $this->getStationId($name))->value('bus_route_id');

        return $this->routeId = $routeId;
    }

    public function getStationId(string $name): int
    {
        $stationId = Station::where('name', $name)->value('id');

        return $this->stationId = $stationId;
    }
}

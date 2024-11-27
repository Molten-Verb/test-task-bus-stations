<?php

namespace Tests;

use App\Models\Bus;
use App\Models\Station;
use App\Models\BusRoute;
use App\Models\RouteAndStation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Faker\Factory as Faker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    public function createBusRoute()
    {
        $busRoute = BusRoute::factory()
            ->has(Bus::factory()->count(2))->has(Station::factory()->count(10))
            ->create();

        $routeStations = RouteAndStation::where('bus_route_id', $busRoute->id)->get();

        foreach ($routeStations as $index => $station) {
            $station->update([
                'position' => $index + 1,
            ]);
        }

        return $busRoute;
    }
}

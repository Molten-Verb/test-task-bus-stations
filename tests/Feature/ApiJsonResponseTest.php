<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Station;
use App\Http\Controllers\API\RouteController;

class ApiJsonResponseTest extends TestCase
{
    public function test_json_respone_has_from_and_to()
    {
        $this->createBusRoute();

        $from = Station::inRandomOrder()->first();
        $to = Station::inRandomOrder()->first();

        $this->getJson($this->routeFindBus(['from' => $from->name, 'to' => $to->name]))
            ->assertOk()
            ->assertJsonFragment([
                'from' => $from->name,
                'to' => $to->name,
            ]);
    }

    public function routeIndex(array $params = []): string
    {
        return action([RouteController::class, 'index'], $params);
    }

    public function routeFindBus(array $params = []): string
    {
        return action([RouteController::class, 'findBus'], $params);
    }
}

<?php

namespace Tests\Feature;

use App\Http\Controllers\API\RouteController;
use App\Models\Station;
use Tests\TestCase;

class ApiJsonErrorsTest extends TestCase
{
    public function test_json_respone_has_errors_forms_required()
    {
        $this->createBusRoute();

        $this->getJson($this->routeFindBus([]))
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'from' => 'Поле from должно быть заполнено',
                'to' => 'Поле to должно быть заполнено',
            ]);
    }

    public function test_json_respone_has_errors_that_station_not_find()
    {
        $this->createBusRoute();

        $this->getJson($this->routeFindBus(['from' => fake()->word(), 'to' => fake()->word()]))
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'from' => 'Данная остановка не найдена',
                'to' => 'Данная остановка не найдена',
            ]);
    }

    public function test_json_response_error_that_stations_have_different_routes()
    {
        $route1 = $this->createBusRoute();
        $route2 = $this->createBusRoute();

        $stationFrom = $route1->stations()->first();
        $stationTo = $route2->stations()->first();

        $this->getJson($this->routeFindBus(['from' => $stationFrom->name, 'to' => $stationTo->name]))
            ->assertJsonValidationErrors(['to' => 'Остановки относятся к разным маршрутам']);
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

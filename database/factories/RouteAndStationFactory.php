<?php

namespace Database\Factories;

use App\Models\BusRoute;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RouteAndStation>
 */
class RouteAndStationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bus_route_id' => BusRoute::factory(),
            'station_id' => Station::factory(),
            'position' => $this->faker->randomDigitNotNull,
        ];
    }
}

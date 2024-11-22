<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Station;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $routes = [
            ['name' => 'пл.Ленина-Технологический Институт'],
            ['name' => 'Приморская-Елизаровская'],
            ['name' => 'Парнас-Черная речка'],
        ];

        $stations = [
            ['name' => 'пл.Ленина', 'route_id' => 1, 'position' => 1],
            ['name' => 'Чернышевская', 'route_id' => 1, 'position' => 2],
            ['name' => 'Достоевская', 'route_id' => 1, 'position' => 3],
            ['name' => 'Владимирская', 'route_id' => 1, 'position' => 4],
            ['name' => 'Пушкинская', 'route_id' => 1, 'position' => 5],
            ['name' => 'Технологический Институт', 'route_id' => '1', 'position' => 6],

            ['name' => 'Приморская', 'route_id' => 2, 'position' => 1],
            ['name' => 'Василеостровская', 'route_id' => 2, 'position' => 2],
            ['name' => 'Невский проспект', 'route_id' => 2, 'position' => 3],
            ['name' => 'пл.Восстания', 'route_id' => 2, 'position' => 4],
            ['name' => 'пл.Александра Невского', 'route_id' => '2', 'position' => 5],
            ['name' => 'Елизаровская', 'route_id' => 2, 'position' => 6],

            ['name' => 'Парнас', 'route_id' => 3, 'position' => 1],
            ['name' => 'пр. Просвещения', 'route_id' => 3, 'position' => 2],
            ['name' => 'Озерки', 'route_id' => 3, 'position' => 3],
            ['name' => 'Удельная', 'route_id' => 3, 'position' => 4],
            ['name' => 'Пионерская', 'route_id' => 3, 'position' => 5],
            ['name' => 'Черная речка', 'route_id' => 3, 'position' => 6],
        ];

        $buses = [
            ['bus_number' => 11, 'route_id' => 1],
            ['bus_number' => 21, 'route_id' => 1],
            ['bus_number' => 13, 'route_id' => 2],
            ['bus_number' => 20, 'route_id' => 2],
            ['bus_number' => 45, 'route_id' => 3],
            ['bus_number' => 50, 'route_id' => 3],
        ];

        Route::insert($routes);
        Station::insert($stations);
        Bus::insert($buses);
    }
}

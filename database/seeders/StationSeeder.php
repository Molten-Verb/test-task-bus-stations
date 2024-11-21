<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $station = [
            ['name' => 'пл.Ленина', 'route_id' => '1'],
            ['name' => 'Чернышевская', 'route_id' => '1'],
            ['name' => 'Достоевская', 'route_id' => '1'],
            ['name' => 'Владимирская', 'route_id' => '1'],
            ['name' => 'Пушкинская', 'route_id' => '1'],
            ['name' => 'Технологический Институт', 'route_id' => '1'],

            ['name' => 'Приморская', 'route_id' => '2'],
            ['name' => 'Василеостровская', 'route_id' => '2'],
            ['name' => 'Невский проспект', 'route_id' => '2'],
            ['name' => 'пл.Восстания', 'route_id' => '2'],
            ['name' => 'пл.Александра Невского', 'route_id' => '2'],
            ['name' => 'Елизаровская', 'route_id' => '2'],

            ['name' => 'Парнас', 'route_id' => '3'],
            ['name' => 'пр. Просвещения', 'route_id' => '3'],
            ['name' => 'Озерки', 'route_id' => '3'],
            ['name' => 'Удельная', 'route_id' => '3'],
            ['name' => 'Пионерская', 'route_id' => '3'],
            ['name' => 'Черная речка', 'route_id' => '3'],
        ];

        Station::insert($station);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\Station;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $busRoute1 = BusRoute::create(['name' => 'пл.Ленина-Технологический Институт']);
        $busRoute2 = BusRoute::create(['name' => 'Приморская-Елизаровская']);

        $station1 = Station::create(['name' => 'пл.Ленина']);
        $station2 = Station::create(['name' => 'Чернышевская']);
        $station3 = Station::create(['name' => 'Достоевская']);
        $station4 = Station::create(['name' => 'Владимирская']);
        $station5 = Station::create(['name' => 'Пушкинская']);
        $station6 = Station::create(['name' => 'Технологический Институт']);

        $busRoute1->stations()->attach($station1->id, ['position' => 1]);
        $busRoute1->stations()->attach($station2->id, ['position' => 2]);
        $busRoute1->stations()->attach($station3->id, ['position' => 3]);
        $busRoute1->stations()->attach($station4->id, ['position' => 4]);
        $busRoute1->stations()->attach($station5->id, ['position' => 5]);
        $busRoute1->stations()->attach($station6->id, ['position' => 6]);

        $station7 = Station::create(['name' => 'Приморская']);
        $station8 = Station::create(['name' => 'Василеостровская']);
        $station9 = Station::create(['name' => 'Невский проспект']);
        $station10 = Station::create(['name' => 'Гостинный двор']);
        $station11 = Station::create(['name' => 'пл.Александра Невского']);
        $station12 = Station::create(['name' => 'Елизаровская']);

        $busRoute2->stations()->attach($station7->id, ['position' => 1]);
        $busRoute2->stations()->attach($station8->id, ['position' => 2]);
        $busRoute2->stations()->attach($station9->id, ['position' => 3]);
        $busRoute2->stations()->attach($station10->id, ['position' => 4]);
        $busRoute2->stations()->attach($station11->id, ['position' => 5]);
        $busRoute2->stations()->attach($station12->id, ['position' => 6]);

        $busRoute1->buses()->create(['number' => 11]);
        $busRoute1->buses()->create(['number' => 21]);
        $busRoute2->buses()->create(['number' => 13]);
        $busRoute2->buses()->create(['number' => 20]);
    }
}

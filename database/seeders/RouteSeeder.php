<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = [
            ['name' => 'пл.Ленина-Технологический Институт'],
            ['name' => 'Приморская-Елизаровская'],
            ['name' => 'Парнас-Черная речка'],
        ];

        Route::insert($routes);
    }
}

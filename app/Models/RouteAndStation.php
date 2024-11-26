<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteAndStation extends Model
{
    use HasFactory;

    /**
     * Модель для сводной таблицы.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bus_route_id',
        'station_id',
        'position',
    ];
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FindBusResource;
use App\Http\Resources\RouteResource;
use App\Models\Route;
use App\Models\Station;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class RouteController extends Controller
{
    public function index(Request $request)
    {
        $routes = QueryBuilder::for(Route::class)
            ->allowedFilters(['name'])
            ->with('stations', 'buses');

        return RouteResource::collection($routes->jsonPaginate());
    }

    public function findBus(Request $request)
    {
        $from = $request->query('from');
        $to = $request->query('to');

        $result = (object) [
            'from' => $from,
            'to' => $to,
        ];

        $routeId = Station::where('name', $from)->value('route_id');
        $route = Route::find($routeId);

        $stations = $route->stations();
        $firstStation = $route->stations()->orderBy('position', 'asc')->first();
        $lastStation = $route->stations()->orderBy('position', 'desc')->first();

        $result->firstStation = $firstStation->name;
        $result->lastStation = $lastStation->name;

        $buses = $route->buses();

        $firstBus = $route->buses()->orderBy('id', 'asc')->first();
        $lastBus = $route->buses()->orderBy('id', 'desc')->first();

        $result->firstBus = $firstBus->bus_number;
        $result->lastBus = $lastBus->bus_number;

        return new FindBusResource($result);
    }
}

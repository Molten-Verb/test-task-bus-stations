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
        $route = Route::with(['stations', 'buses'])->find($routeId);

        $firstStation = $route->stations->sortBy('position')->first();
        $lastStation = $route->stations->sortByDesc('position')->first();

        $result->firstStation = $firstStation->name;
        $result->lastStation = $lastStation->name;

        $firstBus = $route->buses->sortBy('id')->first();
        $lastBus = $route->buses->sortByDesc('id')->first();

        $result->firstBus = $firstBus->bus_number;
        $result->lastBus = $lastBus->bus_number;

        return new FindBusResource($result);
    }
}

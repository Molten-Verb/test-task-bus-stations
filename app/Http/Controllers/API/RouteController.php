<?php

namespace App\Http\Controllers\API;

use App\Models\Station;
use App\Models\BusRoute;
use Illuminate\Http\Request;
use App\Http\Services\Shedule;
use App\Http\Controllers\Controller;
use App\Http\Requests\StationRequest;
use App\Http\Resources\RouteResource;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\FindBusResource;

class RouteController extends Controller
{
    public function index(Request $request)
    {
        $routes = QueryBuilder::for(BusRoute::class)
            ->allowedFilters(['name'])
            ->with('stations', 'buses');

        return RouteResource::collection($routes->jsonPaginate());
    }

    public function findBus(StationRequest $request)
    {
        $from = $request->query('from');
        $to = $request->query('to');

        $shedule = new Shedule($from, $to);

        return new FindBusResource($shedule);
    }
}

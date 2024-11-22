<?php

namespace App\Http\Controllers\API;

use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RouteResource;
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
}


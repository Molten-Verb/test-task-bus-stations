<?php

namespace App\Models;

use App\Models\BusRoute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Station extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bus_route_id',
        'position',
    ];

    public function route(): BelongsToMany
    {
        return $this->belongsToMany(BusRoute::class);
    }
}

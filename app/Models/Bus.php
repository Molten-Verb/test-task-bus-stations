<?php

namespace App\Models;

use App\Models\BusRoute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'bus_route_id',
    ];

    public function route(): BelongsTo
    {
        return $this->belongsTo(BusRoute::class);
    }
}

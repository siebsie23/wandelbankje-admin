<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\SpatialBuilder;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

class Bench extends Model
{
    use HasSpatial;

    protected $fillable = [
        'name',
        'coordinates',
    ];

    protected $casts = [
        'coordinates' => Point::class,
    ];
}

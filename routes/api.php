<?php

use App\Models\Bench;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use MatanYadaev\EloquentSpatial\Objects\Point;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# Get benches in radius from longitude and latitude
Route::get('/bench/{longitude}/{latitude}/{radius}', function ($longitude, $latitude, $radius) {
    $benches = Bench::
        whereDistanceSphere('coordinates', new Point($latitude, $longitude), '<', $radius)
        ->get();
    return $benches;
});

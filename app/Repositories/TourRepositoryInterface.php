<?php
namespace App\Repositories;

use App\Models\Trip;
use App\Models\SubTrip;
use Illuminate\Http\Request;

interface TourRepositoryInterface
{
    public function delete($tourId);

    public function store(Request $request);

    public function all();

    public function update(Request $request, Trip $tour);
}
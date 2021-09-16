<?php
namespace App\Repositories;

use App\Models\Trip;
use Illuminate\Http\Request;

interface TourRepositoryInterface
{
    public function delete($id);

    public function store(Request $request);

    public function all();

    public function update(Request $request, Trip $tour);
}
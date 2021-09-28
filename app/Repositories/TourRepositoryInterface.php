<?php
namespace App\Repositories;

use App\Http\Requests\TourRequest;
use App\Models\Tour;

use Illuminate\Http\Request;

interface TourRepositoryInterface
{
    public function delete($id);

    public function store(TourRequest $request);

    public function all();

    public function search($keyword);

    public function update(TourRequest $request, Tour $tour);
}
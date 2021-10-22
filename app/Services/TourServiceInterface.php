<?php
namespace App\Services;

use App\Http\Requests\TourRequest;
use App\Models\Tour;

use Illuminate\Http\Request;

interface TourServiceInterface
{
    public function delete($id);

    public function store(TourRequest $request);

    public function all();

    public function search($keyword);
    public function getTourByCode($product_code);

    public function update(TourRequest $request, Tour $tour);
    public function getAllCityProvince();
    public function getTopPurchases($number);
}
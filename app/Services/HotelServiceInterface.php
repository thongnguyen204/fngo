<?php
namespace App\Services;

use App\Models\Hotel;
use Illuminate\Http\Request;

interface HotelServiceInterface
{
    public function all();
    public function store(Request $request);
    public function delete($id);
    public function show($id);
    public function search($keyword);
    public function getAllCityProvince();
    public function update(Request $request, Hotel $hotel);
}
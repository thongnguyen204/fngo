<?php
namespace App\Repositories;

use App\Models\Hotel;
use Illuminate\Http\Request;

interface HotelRepositoryInterface
{
    public function all();
    public function store(Hotel $hotel);
    public function delete($id);
    public function show($id);
    public function search($keyword);
    public function getAllCityProvince();
    
}
<?php
namespace App\Repositories;

use App\Models\Hotel;
use Illuminate\Http\Request;

interface HotelRepositoryInterface
{
    public function all();
    public function store(Request $request);
    public function delete($id);
    public function show($id);
    public function update(Request $request, Hotel $hotel);
}
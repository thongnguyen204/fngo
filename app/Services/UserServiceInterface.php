<?php
namespace App\Services;

use App\User;
use Illuminate\Http\Request;

interface UserServiceInterface{
    public function all();

    public function delete($id);
    public function update(Request $request, User $user);
}
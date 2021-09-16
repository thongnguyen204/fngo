<?php
namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface{
    public function all();

    public function delete($id);
    public function update(Request $request, User $user);
}
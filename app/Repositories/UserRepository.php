<?php
namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface{
    public function all(){
        return User::paginate(10);
    }

    public function delete($id){
        User::destroy($id);
    }
    public function update(Request $request, User $user){
        $user->name =  $request->name;
        $user->email =  $request->email;
        $user->save();
    }
}
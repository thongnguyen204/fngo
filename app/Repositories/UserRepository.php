<?php
namespace App\Repositories;

use App\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
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
        $user->phone =  $request->phone;
        $user->gender =  $request->gender;
        if(!empty($request->file('avatar')))
        {
            $uploadedFileUrl = Cloudinary::upload($request->file('avatar')->getRealPath(),[
                'folder' => 'FnGO/UserAvatar',
            ])->getSecurePath();
            $user->avatar =  $uploadedFileUrl;
        }
        $user->save();
    }
}
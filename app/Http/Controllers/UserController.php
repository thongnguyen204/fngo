<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $user;
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = $this->user->all();
        return view('admin.user.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('admin.user.edit')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        $role = $user->role->name;
        $view = $role . '.user.edit';
        return (view($view)->with('user',$user));
        // return (view('admin.user.edit')->with('user',Auth::user()));
        // return(view('home')->with('user',$user));
        // dd($lang,$user->name);
    }
    public function profile($lang){
        // $user = User::find($id);
        // $role = $user->role->name;
        // $view = $role . '.user.edit';
        // dd($lang);
        
        return(view('home')->with('user',Auth::user()));
        // return view('test')->with('user',Auth::user());

        // return (view('admin.user.edit')->with('user',Auth::user()));
        
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        //
        $this->user->update($request,$user);
        return redirect()->route('users.show',[$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        
        $this->user->delete($user->id);
        return redirect()->route('users.index');
    }
}

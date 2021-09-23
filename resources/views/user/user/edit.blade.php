@extends('layouts.admin')

@section('content')
<form action="{{route('users.update',$user)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div  class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" id="avatar" width="150px" src="{{$user->avatar}}"><span class="font-weight-bold">{{$user->name}}</span><span class="text-black-50">{{$user->email}}</span><span> </span></div>
            
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="avatar" >
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="col-md-12 ">Profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="" value="{{$user->name}}"></div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Email</label><input type="text" name="email" class="form-control" value="{{$user->email}}">
                        @if ($errors->has('email'))
                                <strong>Email error</strong>
                        @endif
                    </div>
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="phone" class="form-control" value="{{$user->phone}}"></div>
                    <div class="col-md-12">
                        <label class="labels" for="gender"></label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="none" selected>Gender</option>
                            <option @if ($user->gender == 'male')
                                selected
                            @endif value="male" >Male</option>
                            <option @if ($user->gender == 'female')
                                selected
                            @endif value="female" >Female</option>
                            <option @if ($user->gender == 'other')
                                selected
                            @endif value="other" >Other</option>
                        </select>
                        
                    </div>
                    
                    
                </div>
                <div class="row mt-3">
                    
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>
        </div>
        
    </div>
</div>
</div>
</div>
</form>

@endsection
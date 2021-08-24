@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                
            </div>
            @if ($user->role->name == 'admin')
                <div>
                    <a href='{{route('user.index')}}'>Users manage</a>
                </div>
                <div><a href='{{route('hotel.index')}}'>Hotels manage</a></div>
            @endif
        </div>
    </div>
</div>
@endsection

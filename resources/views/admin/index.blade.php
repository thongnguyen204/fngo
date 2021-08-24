@extends('layouts.app')
@section('content')
<h1>Admin panel</h1>
<div>
    <a href='{{route('user.index')}}'>Users manage</a>
</div>
<div><a href='{{route('hotel.index')}}'>Hotels manage</a></div>
@endsection
@extends('layouts.app')
@section('content')
<h1>Admin panel</h1>

<div>
    <a href='{{route('users.index')}}'>Users manage</a>
</div>

<div>
    <a href='{{route('hotel.index')}}'>Hotels manage</a>
</div>

<div>
    <a href='{{route('receipt.index')}}'>Receipts queue</a>
</div>

<div>
    <a href='{{route('receipt.indexAccepted')}}'>Receipts manage</a>
</div>

@endsection
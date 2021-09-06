@extends('layouts.app')
@section('content')
<h1>User panel</h1>

<div>
    <a href='{{route('hotel.index')}}'>Hotels</a>
</div>
<div>
    <a href='{{route('receipt.index')}}'>Receipts</a>
</div>

@endsection
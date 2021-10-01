@extends('layouts.admin')
@section('content')

<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

<!-- The sidebar -->
<div class="sidebar">
    <a class="active" href="#home">Home</a>
    <a class="nav-link" href='{{route('users.index')}}'>{{__('common.Users manage')}}</a>
    <a class="nav-link" href='{{route('receipt.index')}}'>{{__('common.Receipts queue')}}</a>
    <a class="nav-link" href='{{route('receipt.indexAccepted')}}'>{{__('common.Receipts manage')}}</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>
  
  <!-- Page content -->
  <div class="content">
    <main>
      @yield('dashboard')
  </main>
  </div>


{{-- <script src="{{ asset('js/dashboard.js') }}" defer></script> --}}
@endsection
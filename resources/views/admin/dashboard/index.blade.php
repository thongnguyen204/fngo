@extends('layouts.admin')
@section('content')

<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">


<!-- The sidebar -->
<div class="sidebar">
  <a class="active" href="#home">Home</a>
  <a class="nav-link" href='{{route('users.index')}}'>{{__('common.Users manage')}}</a>
  <a class="nav-link" href='{{route('receipt.waiting')}}'>{{__('common.Receipts queue')}}</a>
  <a class="nav-link" href='{{route('receipt.indexAccepted')}}'>{{__('common.Receipts manage')}}</a>
  <a class="nav-link" href='{{route('income.index')}}'>{{__('common.Income')}}</a>
  
  <button class="dropdown-btn">{{__('common.Income')}}
    <i class="bi bi-caret-down-fill"></i>
  </button>
  <div class="dropdown-container">
    <a href="{{route('income.currentDay')}}">{{__('common.Day')}}</a>
    <a href="{{route('income.currentMonth')}}">{{__('common.Month')}}</a>
    <a href="{{route('income.currentYear')}}">{{__('common.Year')}}</a>
  </div>
  

  
  
</div>
  
  <!-- Page content -->
  <div class="content">
    <main>
      @yield('dashboard')
  </main>
  </div>


<script src="{{ asset('js/dashboard.js') }}" defer></script>

@endsection

@extends('layouts.admin')

@section('content')


<link href="{{ asset('css/payment.css') }}" rel="stylesheet">


<div class="container container-payment bg-white rounded">
    <h1> {{__('payment.Payment')}} </h1>

    <div class="wrapper">
        <h3>{{__('payment.Offline')}}</h3>
        <div class="content">
            {{__('payment.Offline-content')}}
        </div>
        <div>
            {{__('payment.Address')}}
        </div>
        <div>
            97 Võ Văn Tần, Phường 6, Quận 3, Thành phố Hồ Chí Minh
        </div>
    </div>

    <div class="wrapper">
        <h3>{{__('payment.Banking')}}</h3>
        <div class="content">
            {{__('payment.Bank')}} 
            <span>907 0502986 00001</span><br>
            {{__('payment.Account Holder')}}
            <span>NGUYEN HOANG THONG</span>  <br>
            {{__('payment.Money')}} 
            *{{__('payment.Price')}}* <br>
            {{__('payment.Banking-content')}} 
            <span> THANHTOAN FNGO *{{__('payment.Receipt ID')}} *</span>
            <br>

        </div>
    </div>
</div>

@endsection
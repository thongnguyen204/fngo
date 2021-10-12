@extends('layouts.user')
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href="{{ asset('css/hotel.css') }}" rel="stylesheet">
<style>
    
    .ajs-message.ajs-custom {
    color: #ffffff;
    /* background-color: #d9edf7;   */
    background: rgba(91, 189, 114, 0.95);
    border-color: #31708f; 
}
</style>
    <div style="max-width: 1300px" class="container">
        <form action="{{route('hotel.index')}}" method="GET">
            <div class="input-group mb-3 searchBar">
                <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control"
                    placeholder="">
                <div class="input-group-append">
                    <button style="width: 100px" class="btn btn-search btn-outline-secondary" type="submit"><i
                            class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div style="max-width: 1300px;padding: 20px;" class="container rounded bg-white">
        
        <h2 class="hotel-name-detail">{{$hotel->name}}</h2>
        <div>
            <i class="bi bi-pin-map-fill"></i> {{$hotel->address}}
        </div>
        <hr style="height:2px;border-width:0;color:gray;background-color:#e6eaed">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <img style="width: 100%;" loading="lazy" alt="tour Image" class="img_fluid rounded" src="{{$hotel->avatar}}">
                </div>
            </div>
        </div>
    </div>
    
        @foreach ($hotel->roomtype as $roomtype)
        <div style="max-width: 1300px;margin-top: 20px;padding: 20px;" class="container rounded bg-white">
            <div class="room-type-warpper">
                <h3>{{$roomtype->name}}</h3> 
                <div class="row">
                    <div class="col-md-4">
                        <img style="max-width: 100%;" loading="lazy" alt="room image" class="img_fluid rounded" src="{{$roomtype->avatar}}">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-6 col-md-4">
                                <i class="fas fa-bed"></i>
                                @if ($roomtype->bed == '1-2')
                                    1 giường đôi
                                @else
                                    @if ($roomtype->bed == '1-1')
                                        1 giường đơn
                                    @else
                                        @if ($roomtype->bed == '2-1')
                                            2 giường đơn
                                        @else
                                            2 giường đôi
                                        @endif
                                    @endif
                                @endif
                            </div>
                            <div class="col-6 col-md-4">
                                <i class="bi bi-people-fill"></i>&nbsp
                                {{$roomtype->max_person}} guest
                            </div>
                        </div>
                        <hr style="height:2px;border-width:0;color:gray;background-color:#e6eaed">
                        <div class="row">
                            <div class="col-4 col-md-4">
                                @if ($roomtype->breakfast == false)
                                <i class="bi bi-backspace-reverse"></i>
                                Without breakfast
                                @else
                                    <i class="fas fa-utensils"></i>
                                    Free breakfast
                                @endif<br>
                                <i class="bi bi-wifi"></i>
                                Wifi free
                            </div>
                            <div class="col-4 col-md-4">
                                @if ($roomtype->refund == false)
                                    <i class="bi bi-backspace-reverse"></i>
                                    Non-refundable
                                @else
                                    <i class="bi bi-cash-stack"></i>
                                    Refundable
                                @endif<br>
                            </div>
                            <div class=" col-4 col-md-4">
                                <div class="float-right">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col">
                                
                            </div>
                            <div class="col-12">
                                <div class="">
                                    <div class="float-right">
                                        <span id="money" style="">
                                            {{$roomtype->money($roomtype->price)}}
                                        </span><br>
                                        <span class="float-right">/ room / night
                                        </span>
                                    </div>
                                    <form action="{{route('hotelbooking.create',$roomtype)}}" method="GET">
                                        <button id="bookbtn" type="submit" class="btn btnAddCart">Booking now!</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    
    
    

<script>
    

    function addCart(id){
        
        $.ajax({
            url: "/addCart/"+id ,
            type:'GET',
            
        }).done(function(respone){
            var icon = '<span class="bi bi-bag-check test"></span>';
            alertify.notify(icon +" " +respone, 'custom');
        });

        $.ajax({
            url: "/cartQuantity" ,
            type:'GET',   
        }).done(function(respone){
            $('#CartCount').text(respone);
        });
        
    }

</script>
@endsection
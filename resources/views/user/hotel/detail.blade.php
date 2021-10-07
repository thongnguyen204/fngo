@extends('layouts.user')
@section('content')
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

<body>
    <div class="container">
        <h2>{{$hotel->name}}</h2>
        <div>
            {{$hotel->address}}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <img style="width: 100%;" loading="lazy" alt="tour Image" class="img_fluid" src="{{$hotel->avatar}}">
                </div>
                <h1>{{__('hotel.Room type')}}</h1>
                
                

                @foreach ($hotel->roomtype as $roomtype)
                <div>
                    <h3>{{$roomtype->name}}</h3> 
                    <div class="row">
                        <div class="col-md-4">
                            <img style="max-width: 100%;" loading="lazy" alt="room image" class="img_fluid" src="{{$roomtype->avatar}}">
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
                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
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
                                        <span id="money" style="color: rgb(249, 109, 1);">
                                            {{$roomtype->price}} VND
                                        </span><br>
                                        <span class="float-right">/ room / night
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col">
                                    <form action="{{route('room.destroy',$roomtype)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                                <div class="col">
                                    <div class="float-right">
                                        <form action="{{route('booking.create',$roomtype)}}" method="GET">
                                            <button id="bookbtn" type="submit" class="btn btn-primary">Add to cart now!</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
</body>
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
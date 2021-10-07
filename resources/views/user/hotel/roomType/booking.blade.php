@extends('layouts.admin')

@section('content')


<body>
    <input type="hidden" id="lang" name="lang" value="{{app()->getLocale()}}">
    {{-- <h1 class="d-flex justify-content-center">{{__('hotel.create room type')}}</h1> --}}

    <div class="container">
        <div>
            <h3>{{$roomtype->name}}</h3>
            <div class="row">
                <div class="col-md-4">
                    <img style="max-width: 100%;" loading="lazy" alt="room image" class="img_fluid"
                        src="{{$roomtype->avatar}}">
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
                        <div class=" col-4 col-md-4"></div>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col">
                            <div class="float-right">
                                <span id="money" style="color: rgb(249, 109, 1);">
                                    {{$roomtype->price}} VND
                                </span><br>
                                <span class="float-right">/ room / night
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="product_code" value="{{$roomtype->product_code}}">
        <input type="number" id="day" min="1" value="1">
        <button onclick="addCart()" type="button" style="width: 65px" class="btn btn-success"><i style="font-size: 25px" class="fa fa-cart-plus"></i></button>
    </div>


</body>
<script>

    function addCart(){
        var product_code = document.getElementById("product_code").value;
        var day = document.getElementById("day").value;
        
        $.ajax({
            url: "/addCart/"+product_code+"?day="+day ,
            type:'GET',
            
        }).done(function(respone){
            var icon = '<span class="bi bi-bag-check test"></span>';
            alertify.notify(icon +" " +respone, 'custom');
            // console.log(respone);
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
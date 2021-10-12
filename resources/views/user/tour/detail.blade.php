@extends('layouts.admin')
@section('content')


{{-- gg font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">


<style>
    .ajs-message.ajs-custom {
    color: #ffffff;
    /* background-color: #d9edf7;   */
    background: rgba(91, 189, 114, 0.95);
    border-color: #31708f; 
}
.make-me-sticky {
  position: -webkit-sticky;
	position: sticky;
	top: 10px;
}
.money{
    font-family: 'Secular One', sans-serif;
    font-size: 30px;
    color: red;
}
.price-button{
    background-color: #ecd45a;
    margin-top: 10px;
    margin-left: 10px;
    margin-right: 10px;
    border-radius: 8px;
}
.btnAddCart{
    width: 100%;
    background-color: #d6b244;
    color: white;
    border-radius: 20px;
    font-weight: bolder;
}
.btnAddCart:hover{
    
    color: white;
    background-color: #1FAA59
}
.sub-title-warpper{
    background-color: #ecd45a;
    -webkit-border-radius: 25px;
    padding: 5px;
}
.day-number{
    float: left;
    background-color: #d6b244;
    font-size: 17px;
    height: 100%;
    width: 80px;
    align-items: center;
    text-align: center;
    font-weight: 500;
    display: flex;
    -webkit-border-radius: 25px;
    margin-right: 20px;
    
}
.sub-title{
    height: 100%;
    
}
.subtrip-content{
    margin-bottom: 20px;
    margin-top: 15px;
}
.phone-number{
    font-size: 30px;
    color: red;
    margin-left: 10px;
}
    
</style>

    <div style="max-width: 1500px" class="container">
        <h2>{{$tour->name}}</h2>
        <div class="row">
            <div class="col-md-9">
                {{-- <div>{{$tour->content}}</div> --}}
                <div style="margin-bottom: 50px" class="">
                    <img style="max-width: 100%;" loading="lazy" alt="tour Image" class="img_fluid rounded" src="{{$tour->avatar}}">
                </div>
                <h3><i class="bi bi-geo-alt-fill"></i> {{__('tour.Schedule')}}</h3>
                
                <hr style="height:2px;border-width:0;color:gray;background-color:rgba(206, 144, 176, 0.5)">
                
                @foreach ($trip as $subtrip)
                <div class="subtrip">
                    <div  class="row">
                        {{-- <div style="background-color: cyan" class="col-1">{{__('common.Day')}} {{$subtrip->day}}</div> --}}
                        <div class="col-12 sub-title-warpper">
                            <div class="d-flex justify-content-center day-number">{{__('common.Day')}} {{$subtrip->day}}</div>
                            <h4 class="sub-title d-flex align-items-center">{{$subtrip->title}}</h4>
                        </div>
                    </div>
                </div>

                <div class="subtrip-content"> 
                    {{$subtrip->content}}
                </div>
                @endforeach
                
            </div>
            <div  class="col ">
                <div class="make-me-sticky">
                    <div class="card">
                        <div class="card-body price-button">
                            <p class="d-flex justify-content-center money"> {{$tour->money($tour->price)}}</p>
                            <div class="d-flex justify-content-center" >
                                <button onclick="addCart('{{$tour->product_code}}')" type="button" class="btn btnAddCart btn-lg">
                                    {{__('tour.Add cart')}}
                                </button>
                            </div>
                        </div>
                        <div style="padding: 0px" class="card-body">
                            <div>
                                <ul class="list-group ">
                                    <li class="list-group-item border-0">
                                        <i class="bi bi-calendar3"></i>&nbsp&nbsp
                                        <strong>{{__('tour.Departure date')}}:</strong>
                                        {{-- ham duoc viet trong model Tour --}}
                                        {{$tour->day()}}
                                    </li>
                                    <li class="list-group-item border-0">
                                        <i class="bi bi-alarm"></i>&nbsp&nbsp
                                        <strong>{{__('tour.Departure time')}}:</strong>
                                        {{$tour->departure_time}}
                                    </li>
                                    <li class="list-group-item border-0">
                                        <i class="bi bi-people-fill"></i>&nbsp&nbsp
                                        <strong>{{__('tour.Number of passengers')}}:</strong>
                                        {{$tour->passenger_num}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 20px" class="card">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-12">
                                        {{__('tour.Contact')}}
                                    </div>
                                    <div class="col-12">
                                    <hr style="height:1px;border-width:0;color:gray;background-color:rgba(206, 144, 176, 0.5)">
                                    </div>
                                    <div class="col-12">
                                        <i style="font-size: 25px" class="bi bi-whatsapp"></i>
                                        <span class="phone-number">097 5066164</span>
                                        (Mr. Trung)
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    

    function addCart(id){
        var currentLocation = window.location;
        console.log(currentLocation);
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
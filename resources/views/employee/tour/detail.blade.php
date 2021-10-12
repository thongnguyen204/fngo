@extends('layouts.admin')
@section('content')
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
        <h2>{{$tour->name}}</h2>
        <div class="row">
            <div class="col-md-8">
                {{-- <div>{{$tour->content}}</div> --}}
                <div class="">
                    <img style="max-width: 100%;" loading="lazy" alt="tour Image" class="img_fluid" src="{{$tour->avatar}}">
                </div>
                <h1>{{__('tour.Schedule')}}</h1>

                @foreach ($trip as $subtrip)
                <div>
                    <h3>{{$subtrip->title}}</h3>
                </div>
                <div>
                    {{$subtrip->content}}
                </div>
                @endforeach
            </div>
            <div class="col ">
                <div class="card">
                    <div class="card-body ">
                        <p class="d-flex justify-content-center"> {{$tour->money($tour->price)}}</p>
                        <div class="d-flex justify-content-center" >
                            <button onclick="addCart('{{$tour->product_code}}')"  type="button" class="btn btn-primary btn-lg">
                                Add to cart now
                            </button>
                        </div>
                    </div>
                    <div class="card-body test">
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
            </div>
        </div>
    </div>
</body>
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
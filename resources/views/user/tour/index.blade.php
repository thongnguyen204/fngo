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
    <form action="{{route('tour.index')}}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="" aria-label="search" aria-describedby="basic-addon2">
            <div  class="input-group-append">
                <button style="width: 100px" class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </form>
    <div class="row">
        @foreach ($trips as $trip)
            <div class="card col-md-4">
                
                <div class="card-body">
                    <a href="{{route('tour.show',$trip)}}">
                        <img height="200px" style="max-width: 100%;" loading="lazy" alt="tour Image" class="img_fluid" src="{{$trip->avatar}}">
                    </a>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <a href="{{route('tour.show',$trip)}}">
                            <div class="col-md-12">{{$trip->name}}</div>
                        </a>
                    </div>
                    
                    <div class="row">
                        <div class="col">{{$trip->price}}</div>
                        <div class="col">

                        </div>
                        <div class="col">
                            <span class="glyphicon glyphicon-ok"></span>
                                <button onclick="addCart('{{$trip->product_code}}')" type="button" style="width: 65px" class="btn btn-success"><i style="font-size: 25px" class="fa fa-cart-plus"></i></button>
                            
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    {{ $trips->links() }}
</div>
</body>
<script>
    function addCart(id){
        var currentLocation = window.location;
        console.log(currentLocation);
        $.ajax({
            url: "addCart/"+id ,
            type:'GET',   
        }).done(function(respone){
            var icon = '<span class="bi bi-bag-check test"></span>';
            alertify.notify(icon +" " +respone, 'custom');
        });

        $.ajax({
            url: "cartQuantity" ,
            type:'GET',   
        }).done(function(respone){
            $('#CartCount').text(respone);
        });
    }
</script>
@endsection
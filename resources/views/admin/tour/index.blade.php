@extends('layouts.admin')
@section('content')
<link href="{{ asset('css/tour.css') }}" rel="stylesheet">


<div style="max-width: 1300px;" class="container">
    <form action="{{route('tour.index')}}" method="GET">
        <div class="input-group mb-3 searchBar">
            <input placeholder="{{__('tour.Search')}}" type="text" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="">
            <div class="input-group-append">
                <button style="width: 100px" class="btn btn-search btn-outline-secondary" type="submit"><i
                        class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </form>
    <div class="card-group">
        <div class="row">
            @foreach ($trips as $trip)
            <div class="card col-6 col-sm-4 col-md-3">
                <div style="padding: 10px" class="card-img-top">
                    <a href="{{route('tour.show',$trip)}}">
                        <img loading="lazy" alt="tour Image" class="img-fluid rounded pictrure" src="{{$trip->avatar}}">
                    </a>

                </div>
                <div class="card-body tour-info">
                    <div class="row">
                        <a href="{{route('tour.show',$trip)}}">
                            <div class="col-md-12 tour-name"">{{$trip->name}}</div>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-12 col-lg-6">
                            <i class="bi bi-geo-alt-fill"></i>{{$trip->CityProvince->name}}
                        </div>
                        <div id="money" class="float-right col-6 col-sm-6 col-md-12 col-lg-6">
                            
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div id="money" class="float-right" style="width: 130px">{{$trip->money($trip->price)}}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{ $trips->links() }}
</div>

<script>
    function addCart(id) {
        var currentLocation = window.location;
        console.log(currentLocation);
        $.ajax({
            url: "addCart/" + id,
            type: 'GET',
        }).done(function (respone) {
            var icon = '<span class="bi bi-bag-check test"></span>';
            alertify.notify(icon + " " + respone, 'custom');
        });

        $.ajax({
            url: "cartQuantity",
            type: 'GET',
        }).done(function (respone) {
            $('#CartCount').text(respone);
        });
    }
</script>
@endsection
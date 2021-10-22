@extends('layouts.admin')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link href="{{ asset('css/tour.css') }}" rel="stylesheet">
    
</head>
<body>
    <div class="slide">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img style="max-height: 500px" class="d-block w-100" src="https://res.cloudinary.com/dloeyqk30/image/upload/v1634910928/FnGO/home-banner/tokyo-banner_s4ydsk.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img style="max-height: 500px" class="d-block w-100" src="https://res.cloudinary.com/dloeyqk30/image/upload/v1634911384/FnGO/home-banner/tokyo-banner1_ofhswb.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img style="max-height: 500px" class="d-block w-100" src="https://res.cloudinary.com/dloeyqk30/image/upload/v1634910928/FnGO/home-banner/tokyo-banner_s4ydsk.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>
    <div class="container">
        <div class="title-top">TOP TOUR</div>
        <div class="row">
            @foreach ($topTour as $trip)
            <div class="card col-md-3">
                <div class="card-body">
                    <a href="{{route('tour.show',$trip)}}">
                        <img loading="lazy" alt="tour Image" class="img-fluid rounded pictrure" src="{{$trip->avatar}}">
                    </a>
                </div>
                <div class="card-body tour-info">
                    <div class="row">
                        <a class="link" href="{{route('tour.show',$trip)}}">
                            <div  class="col-md-12 tour-name">{{$trip->name}}</div>
                        </a>
                    </div>
    
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-12 col-lg-6">
                            
                        </div>
                        <div id="money" class="float-right col-6 col-sm-6 col-md-12 col-lg-6">
                            <div class="float-right" style="width: 130px">{{$trip->money($trip->price)}}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
@endsection

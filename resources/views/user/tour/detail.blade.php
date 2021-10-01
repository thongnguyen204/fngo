@extends('layouts.user')
@section('content')

<body>
    <div class="container">
        <h1>{{$tour->title}}</h1>
        <div>{{$tour->content}}</div>
        <div class="">
            <img style="max-width: 100%;" loading="lazy" alt="tour Image" class="img_fluid" src="{{$tour->main_image}}">
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
</body>
@endsection
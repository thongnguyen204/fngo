@extends('layouts.admin')

@section('content')


<body>
    <div class="container">
        <a href="{{route('hotel.create')}}">{{__('hotel.Create')}}</a>
        <form action="{{route('hotel.index')}}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control"
                    placeholder="">
                <div class="input-group-append">
                    <button style="width: 100px" class="btn btn-outline-secondary" type="submit"><i
                            class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($hotels  as $hotel)
            <div class="card col-md-4">
                <div class="card-body">
                    <a href="{{route('hotel.show',$hotel)}}">
                        <img height="200px" style="max-width: 100%;" loading="lazy" alt="hotek Image" class="img_fluid"
                            src="{{$hotel->avatar}}">
                    </a>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <a href="{{route('hotel.show',$hotel)}}">
                            <div class="col-md-12">{{$hotel->name}}</div>
                        </a>
                    </div>

                    <div class="row" >
                        <div class="col-md-8">{{$hotel->price}}</div>
                        <div style="padding: 0px" class="col-md-2">
                            <a class="btn btn-primary" href="{{route('hotel.edit',[$hotel])}}"><i class="bi bi-pencil"></i></a>
                        </div>
                        
                        <div style="padding: 0px" class="col-md-2">
                            
                            <form action=" {{route('hotel.destroy',[$hotel])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
        {{ $hotels->links() }}
    </div>
</body>

@endsection
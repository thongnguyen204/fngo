@extends('layouts.admin')
@section('content')

<body>
    <div class="container">
    

    <a href="{{route('tour.create')}}">{{__('tour.Create')}}</a>
    <form action="{{route('tour.index')}}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="" aria-label="search" aria-describedby="basic-addon2">
            <div  class="input-group-append">
                <button style="width: 100px" class="btn btn-outline-secondary" type="submit">{{__('tour.Search')}}</button>
            </div>
        </div>
    </form>
    <div class="row">
        @foreach ($trips as $trip)
            <div class="card col-md-4">
                
                <div class="card-body">
                    <img height="200px" style="max-width: 100%;" loading="lazy" alt="tour Image" class="img_fluid" src="{{$trip->main_image}}">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">{{$trip->title}}</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">{{$trip->price}}</div>
                        <div class="col-md-3">
                            <a class="btn btn-primary" href="{{route('tour.edit',[$trip])}}">{{__('common.Edit')}}</a>
                        </div>
                        <div class="col-md-3>
                            
                            <form action="{{route('tour.destroy',[$trip])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">{{__('common.Delete')}}</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>
    {{ $trips->links() }}
</div>
</body>
@endsection
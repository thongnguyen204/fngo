@extends('layouts.admin')

@section('content')


<body>
    <input type="hidden" id="lang" name="lang" value="{{app()->getLocale()}}">
    <h1 class="d-flex justify-content-center">{{__('tour.Create')}}</h1>
    
    <div class="container">
        <form action="{{route('tour.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="formType" name="formType" value="create">
                <div class="form-group row">
                    <label for="title">{{__('tour.Title')}}</label>
                    <input class="form-control" type="text" name="title" value="{{ old('title') }}"/>
                    @if ($errors->has('title'))
                        @foreach ($errors->get('title') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="price">{{__('tour.Price')}}</label>
                    <input class="form-control" type="number" name="price" value="{{ old('price') }}"/>
                    @if ($errors->has('price'))
                        @foreach ($errors->get('price') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="passenger_num">{{__('tour.Number of passengers')}}</label>
                    <input class="form-control" type="number" min="0" name="passenger_num" value="{{ old('passenger_num') }}"/>
                    @if ($errors->has('passenger_num'))
                        @foreach ($errors->get('passenger_num') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="day_number"> {{__('tour.Days')}}</label></td>
                    <input class="form-control" type="number" min="0" name="day_number" value="{{ old('day_number') }}"/>
                    @if ($errors->has('day_number'))
                        @foreach ($errors->get('day_number') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="departure_date">{{__('tour.Departure date')}}</label></td>
                    <input class="form-control" type="date" name="departure_date" value="{{ old('departure_date') }}"/>
                    @if ($errors->has('departure_date'))
                        @foreach ($errors->get('departure_date') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group  row">
                    <div class="col"></div>
                    <input class="form-control col-md-5" type="number" min="0" max="23" placeholder="Hour" name="departure_hour" value="{{ old('departure_hour') }}"/>
                    <div class="col"></div>
                    <input class="form-control col-md-5" type="number" min="0" max="59" placeholder="Minute" name="departure_minute" value="{{ old('departure_minute') }}"/>
                    <div class="col"></div>
                    @if ($errors->has('departure_hour'))
                        @foreach ($errors->get('departure_hour') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                    @if ($errors->has('departure_minute'))
                    @foreach ($errors->get('departure_minute') as $error)
                        <strong>{{ $error }}</strong>
                    @endforeach
                @endif
                </div>
                <div class="form-group row">
                    <label for="departure_place">{{__('tour.Departure place')}}</label>
                    <input class="form-control" type="text" name="departure_place" value="{{ old('departure_place') }}"/>
                    @if ($errors->has('departure_place'))
                        @foreach ($errors->get('departure_place') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="content">{{__('tour.Content')}} </label>
                    <textarea class="form-control" name="content" rows="10" cols="50">{{ old('content') }}</textarea>
                    @if ($errors->has('content'))
                        @foreach ($errors->get('content') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="mainImg" >
                    <label class="custom-file-label" for="customFile">{{__('common.Choose avatar')}}</label>
                    @if ($errors->has('mainImg'))
                        @foreach ($errors->get('mainImg') as $error)
                            <div class="col-md-12">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            <h2 class="d-flex justify-content-center">{{__('tour.Schedule')}}</h2>
            
            <div class="form-group" id="day"></div>
            @if ($errors->has('subTripTitle.*'))
                {{-- @foreach ($errors->get('subTripTitle.*') as $error)
                    <strong>{{ $error }}</strong>
                @endforeach --}}
                error
            @endif
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="button" id="addDay">{{__('tour.Add')}}</button>
                <button class="btn btn-secondary" type="button" id="removeDay">{{__('tour.Remove')}}</button>
                <button class="btn btn-success" type="submit">{{__('tour.Init')}}</button>
            </div>
        </form>
    </div>
</body>

@endsection
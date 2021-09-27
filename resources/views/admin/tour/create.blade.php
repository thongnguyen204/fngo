@extends('layouts.admin')

@section('content')


<body>
    <h1 class="d-flex justify-content-center">Create new tour</h1>
    
    <div class="container">
        <form action="{{route('tour.store')}}" method="POST">
            @csrf
                <div class="form-group row">
                    <label for="title">Title </label>
                    <input class="form-control" type="text" name="title" value="{{ old('title') }}"/>
                    @if ($errors->has('title'))
                        @foreach ($errors->get('title') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="price">Price </label>
                    <input class="form-control" type="number" name="price" value="{{ old('price') }}"/>
                    @if ($errors->has('price'))
                        @foreach ($errors->get('price') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="passenger_num">Number of passengers </label>
                    <input class="form-control" type="number" min="0" name="passenger_num" value="{{ old('passenger_num') }}"/>
                    @if ($errors->has('passenger_num'))
                        @foreach ($errors->get('passenger_num') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="day_number"> Days</label></td>
                    <input class="form-control" type="number" min="0" name="day_number" value="{{ old('day_number') }}"/>
                    @if ($errors->has('day_number'))
                        @foreach ($errors->get('day_number') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="departure_date">Departure date</label></td>
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
                    <label for="departure_place">Departure place </label>
                    <input class="form-control" type="text" name="departure_place" value="{{ old('departure_place') }}"/>
                    @if ($errors->has('departure_place'))
                        @foreach ($errors->get('departure_place') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="content">Content </label>
                    <textarea class="form-control" name="content" rows="10" cols="50">{{ old('content') }}</textarea>
                    @if ($errors->has('content'))
                        @foreach ($errors->get('content') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
            <h2 class="d-flex justify-content-center">Sub Trip</h2>
            
            <div class="form-group" id="day"></div>
            @if ($errors->has('subTripTitle.*'))
                {{-- @foreach ($errors->get('subTripTitle.*') as $error)
                    <strong>{{ $error }}</strong>
                @endforeach --}}
                error
            @endif
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="button" id="addDay">Add</button>
                <button class="btn btn-secondary" type="button" id="removeDay">Remove</button>
                <button class="btn btn-success" type="submit">Create</button>
            </div>
        </form>
    </div>
</body>

@endsection
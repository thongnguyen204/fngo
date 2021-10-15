@extends('layouts.admin')

@section('content')
<link href="{{ asset('css/tour.css') }}" rel="stylesheet">

    <div style="margin-top:20px" class="container rounded bg-white contain-wrapper">
        <h1 class="d-flex justify-content-center">{{__('tour.Edit')}}</h1>
        <input type="hidden" id="lang" name="lang" value="{{app()->getLocale()}}">
        <form action="{{route('tour.update',$tour)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" id="formType" name="formType" value="edit">
                <div class="form-group row">
                    <label for="name">{{__('tour.Title')}}</label>
                    <input class="form-control" type="text" name="name" value="{{ $tour->name }}"/>
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>

                <input type="hidden" value="{{$tour->subTour->count()}}" name="day_number" id="day_number"/>
                    
                <div class="form-group row">
                    <label for="price">{{__('tour.Price')}}</label>
                    <input class="form-control" type="number" name="price" value="{{ $tour->price }}"/>
                    @if ($errors->has('price'))
                        @foreach ($errors->get('price') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="passenger_num">{{__('tour.Number of passengers')}}</label>
                    <input class="form-control" type="number" min="0" name="passenger_num" value="{{ $tour->passenger_num }}"/>
                    @if ($errors->has('passenger_num'))
                        @foreach ($errors->get('passenger_num') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="day_number">{{__('tour.Days')}}</label></td>
                    <input class="form-control" type="number" min="0" name="day_number" value="{{ $tour->day_number }}"/>
                    @if ($errors->has('day_number'))
                        @foreach ($errors->get('day_number') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="departure_date">{{__('tour.Departure date')}}</label></td>
                    <input class="form-control" type="date" name="departure_date" value="{{ $tour->departure_date }}"/>
                    @if ($errors->has('departure_date'))
                        @foreach ($errors->get('departure_date') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group  row">
                    <div class="col"></div>
                    <input class="form-control col-md-5" type="number" min="0" max="23" placeholder="Hour" name="departure_hour" value="{{ $tour->departure_hour }}"/>
                    <div class="col"></div>
                    <input class="form-control col-md-5" type="number" min="0" max="59" placeholder="Minute" name="departure_minute" value="{{ $tour->departure_minute }}"/>
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
                    <input class="form-control" type="text" name="departure_place" value="{{ $tour->departure_place }}"/>
                    @if ($errors->has('departure_place'))
                        @foreach ($errors->get('departure_place') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
                <div class="form-group row">
                    <label for="content">{{__('tour.Content')}}</label>
                    <textarea class="form-control" name="content" rows="10" cols="50">{{ $tour->content }}</textarea>
                    @if ($errors->has('content'))
                        @foreach ($errors->get('content') as $error)
                            <strong>{{ $error }}</strong>
                        @endforeach
                    @endif
                </div>
            
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="mainImg" value="" >
                <label class="custom-file-label" for="customFile">{{__('common.Choose avatar')}}</label>
                @if ($errors->has('mainImg'))
                    @foreach ($errors->get('mainImg') as $error)
                        <div class="col-md-12">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
                
            <h2 class="d-flex justify-content-center">{{__('tour.Schedule')}}</h2>
            <div id="day">
                @foreach ($tour->subTour as $subTrip)
                <div id="{{$subTrip->day}}">
                    <div class="form-group row">
                        <label for="title">{{__('tour.Title')}}</label></td>
                        <input class="form-control"  type="text" value="{{$subTrip->title}}" name="subTripTitle[{{$subTrip->day}}]" size="40"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="content">{{__('tour.Content')}}</label></td>
                        <textarea id="subTripContent" class="ckeditor col-12"  name="subTripContent[{{$subTrip->day}}]" rows="10" cols="50">{{$subTrip->content}}</textarea></td>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="button" id="addDayEdit">{{__('tour.Add')}}</button>
                <button class="btn btn-secondary" type="button" id="removeDayEdit">{{__('tour.Remove')}}</button>
                <button class="btn btn-success" type="submit">{{__('tour.Update')}}</button>
            </div>
        </form>
    </div>

<script src="{{ asset('js/tourEdit/script.js') }}" defer></script>
@endsection
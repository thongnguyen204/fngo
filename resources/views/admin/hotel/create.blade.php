@extends('layouts.admin')

@section('content')


<body>
    <input type="hidden" id="lang" name="lang" value="{{app()->getLocale()}}">
    <h1 class="d-flex justify-content-center">{{__('hotel.Create')}}</h1>

    <div class="container">
        <form action="{{route('hotel.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="formType" name="formType" value="create">
            <div class="form-group row">
                <label for="name">{{__('hotel.Name')}}</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                @if ($errors->has('name'))
                    @foreach ($errors->get('name') as $error)
                        <strong>{{ $error }}</strong>
                    @endforeach
                @endif
            </div>
            <div class="form-group row">
                <label for="address">{{__('hotel.Address')}}</label>
                <input class="form-control" type="text" name="address" value="{{ old('address') }}" />
                @if ($errors->has('address'))
                    @foreach ($errors->get('address') as $error)
                        <strong>{{ $error }}</strong>
                    @endforeach
                @endif
            </div>
            <div class="form-group row">
                <label for="price">{{__('hotel.Price')}}</label>
                <input class="form-control" type="number" min="0" name="price" value="{{ old('price') }}" />
                @if ($errors->has('price'))
                @foreach ($errors->get('price') as $error)
                <strong>{{ $error }}</strong>
                @endforeach
                @endif
            </div>
            <div class="form-group row">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="avatar" >
                    <label class="custom-file-label" for="customFile">{{__('hotel.Choose avatar')}}</label>
                    @if ($errors->has('avatar'))
                        @foreach ($errors->get('avatar') as $error)
                            <div class="col-md-12">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                
                <button class="btn btn-success" type="submit">{{__('hotel.Init')}}</button>
                </div>
            </div>

    </div>
    
    </form>
    </div>
</body>

@endsection
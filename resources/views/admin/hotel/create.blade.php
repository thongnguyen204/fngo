@extends('layouts.admin')

@section('content')


<body>
    <div class="container">
        <form action="{{route('hotel.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name: </label>
                <input class="form-control"  type="text" name="name"/>
            </div>
            <div class="form-group">
                <label for="avg_price">Average price: </label>
                <input class="form-control"  type="text" name="avg_price" />
            </div>
                <button class="btn btn-primary" type="submit">Add</button>
        </form>
    </div>
</body>

@endsection
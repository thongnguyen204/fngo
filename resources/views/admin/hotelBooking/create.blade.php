@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add hotel</title>
    
</head>
<body>
    <h1>Add new hotel</h1>

    <form action="{{route('hotel.store')}}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="name">Name: </label></td>
                <td><input type="text" name="name"/></td>
            </tr>
            <tr>
                <td><label for="avg_price">Average price: </label></td>
                <td><input type="text" name="avg_price" /></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Add</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
@endsection
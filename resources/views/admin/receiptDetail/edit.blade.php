@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt detail edit</title>
</head>
<body>
    <h1>Edit receipt detail</h1>
    <form action="{{route('receipt-detail.update'
    ,$receiptDetail)}}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Service ID</td>
                <td>{{$receiptDetail->service_id}}</td>
            </tr>
            <tr>
                <td>Category</td>
                <td>{{$receiptDetail->category}}</td> 
            </tr>
            <tr>
                <td>Price</td>
                <td>{{$receiptDetail->unit_price}}</td> 
            </tr>
            <tr>
                <td><label for="quantity">Quantity </label></td>
                <td><input type="text" name="quantity" 
                    value="{{$receiptDetail->quantity}}"/></td>
            </tr>
            
            <tr>
                <td></td>
                <td><button type="submit">Update</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
@endsection
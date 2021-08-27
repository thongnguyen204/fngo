@extends('layouts.admin')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt Detail</title>
</head>
<body>
    <h1>Receipt Detail</h1>
    {{-- <a href="{{route('receipt-detail.create')}}">Add room</a> --}}
    <table>
        <tr>
            <th >Service ID</th>
            <th>category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th></th>
        </tr>
    @foreach ($receiptDetails as $receiptDetail)
    <tr>
        <td>{{$receiptDetail->service_id}}</td>
        <td>{{$receiptDetail->category}}</td>
        <td>{{$receiptDetail->unit_price}}</td>
        <td>{{$receiptDetail->quantity}}</td>
        <td><a href="{{route('receipt-detail.edit'
        ,$receiptDetail)}}">edit</a></td>
        <td>
            <form action="{{route('receipt-detail.destroy',$receiptDetail)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>

    @endforeach
    </table>
    {{ $receiptDetails->links() }}
    <a href="{{route('receipt.index')}}">Back to receipts</a>
</body>
</html>
@endsection
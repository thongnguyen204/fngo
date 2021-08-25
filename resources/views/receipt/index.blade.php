@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel</title>
</head>
<body>
    <h1>receipts</h1>
    <a href="{{route('receipt.create')}}">Add receipt</a>
    <table>
        <tr>
            <th>User</th>
            <th>Cost</th>
            <th></th>
            <th></th>
        </tr>
    @foreach ($receipts as $receipt)
    <tr>
        <td>{{$receipt->user->name}}</td>
        <td>{{$receipt->price_sum}}</td>
        <td><a href="{{route('receipt.show',$receipt->id)}}">details</a></td>
        <td><a href="{{route('receipt.edit',$receipt->id)}}">edit</a></td>
        <td>
            <form action="{{route('receipt.destroy',$receipt)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {{ $receipts->links() }}
</body>
</html>
@endsection
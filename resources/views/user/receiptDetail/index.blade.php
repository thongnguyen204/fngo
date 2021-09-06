@extends('layouts.admin')

@section('content')


<body>
    <h1>Receipt Detail</h1>
    {{-- <a href="{{route('receipt-detail.create')}}">Add room</a> --}}
    <table>
        <tr>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            

            <th>Description</th>
        </tr>
    @foreach ($receiptDetails as $receiptDetail)
    <tr>
        
        <td>{{$receiptDetail->category}}</td>
        <td>{{$receiptDetail->unit_price}}</td>
        <td>{{$receiptDetail->quantity}}</td>

        <td>{{$receiptDetail->ht_booking->description}}</td>
    </tr>

    @endforeach
    </table>
    {{ $receiptDetails->links() }}
    <a href="{{route('receipt.index')}}">Back to receipts</a>
</body>

@endsection
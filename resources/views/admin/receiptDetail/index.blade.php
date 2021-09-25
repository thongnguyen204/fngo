@extends('layouts.admin')

@section('content')


<body>
    <h1>Receipt Detail</h1>
    {{-- <a href="{{route('receipt-detail.create')}}">Add room</a> --}}
    <table class="table">
        <tr>
            
            <th>category</th>
            <th>Price</th>
            <th>Quantity</th>
            
            <th></th>
            <th></th>
            <th>Description</th>
        </tr>
    @foreach ($receiptDetails as $receiptDetail)
    <tr>
        
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
        <td>{{$receiptDetail->ht_booking->description}}</td>
    </tr>

    @endforeach
    </table>
    {{ $receiptDetails->links() }}
    <a href="{{route('receipt.index')}}">Back to receipts</a>
</body>

@endsection
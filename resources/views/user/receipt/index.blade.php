@extends('layouts.user')

@section('content')

<body>
    <h1>receipts</h1>
    <table>
        <tr>
            <th>ID</th>
            {{-- <th>Name</th> --}}
            <th>Cost</th>
            <th>Status</th>
            <th></th>
            
        </tr>
    @foreach ($receipts as $receipt)
    <tr>
        <td>{{$receipt->id}}</td>
        {{-- <td>{{$receipt->user->name}}</td> --}}
        <td>{{$receipt->price_sum}}</td>
        <td>{{$receipt->status->name}}</td>
        <td><a href="{{route('receipt.show',$receipt)}}">details</a></td>
        
    </tr>
    @endforeach
    </table>
    {{ $receipts->links() }}
</body>
@endsection
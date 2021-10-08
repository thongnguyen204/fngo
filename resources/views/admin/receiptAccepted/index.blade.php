@extends('admin.dashboard.index')

@section('dashboard')

<body>
    <div class="container">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Cost</th>
            <th></th>
            <th></th>
        </tr>
    @foreach ($receipts as $receipt)
    <tr>
        <td>{{$receipt->id}}</td>
        <td>{{$receipt->user->name}}</td>
        <td>{{$receipt->price_sum}}</td>
        <td><a href="{{route('receipt.show',$receipt)}}">details</a></td>
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
</div>
</body>

@endsection
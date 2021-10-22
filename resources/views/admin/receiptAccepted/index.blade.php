@extends('admin.dashboard.index')

@section('dashboard')

<link href="{{ asset('css/receipt.css') }}" rel="stylesheet">

<div class="container bg-white rounded wrapper">
    <form style="margin-bottom: 20px" action="{{route('receipt.search')}}" method="GET">
        <div style="margin-bottom: 0px" class="input-group searchBar">
            <input placeholder="{{__('receipt.Search')}}" type="text" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="">
            <div class="input-group-append">
                <button style="width: 100px" class="btn btn-search btn-outline-secondary" type="submit"><i
                        class="bi bi-search"></i>
                </button>
            </div>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchOptions" id="inlineRadio1" value="id">
            <label class="form-check-label" for="inlineRadio1">Receipt's ID</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchOptions" id="inlineRadio2" value="userid">
            <label class="form-check-label" for="inlineRadio2">User's ID</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchOptions" id="inlineRadio3" value="username">
            <label class="form-check-label" for="inlineRadio3">User's name</label>
        </div>
    </form>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User</th>
                <th scope="col">Cost</th>
                <th scope="col">Status</th>
                <th scope="col">Payment</th>
                <th scope="col">Order date</th>
                <th scope="col">Actions</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receipts as $receipt)
            <tr>
                <th scope="row"><a href="{{route('receipt.show',$receipt)}}">{{$receipt->id}}</a></th>
                <td>{{$receipt->user->name}}</td>
                <td>{{$receipt->money($receipt->price_sum)}}</td>
                <td>{{$receipt->status->name}}</td>
                <td>{{$receipt->payment->type}}</td>
                <td>{{$receipt->created_at}}</td>
                <td class="row">
                    @if ($receipt->status_id == 4)
                    <a style="margin: 10px" class="btn btn-success col" href="{{route('receipt.unpay',$receipt->id)}}">Unpay</a>
                    @else
                    <a style="margin: 10px" class="btn btn-success col" href="{{route('receipt.pay',$receipt->id)}}">Paid</a>
                    @endif
                    <a style="margin: 10px" class="btn btn-secondary col" href="{{route('receipt.cancel',$receipt->id)}}">Cancel</a>
                </td>
                <td>
                    <form action="{{route('receipt.destroy',$receipt)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    {{ $receipts->links() }}
</div>

@endsection
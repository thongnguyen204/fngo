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
            <label class="form-check-label" for="inlineRadio1">ID</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchOptions" id="inlineRadio2" value="userid">
            <label class="form-check-label" for="inlineRadio2">{{__("receipt.User's ID")}}</label>
        </div>
        {{-- <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchOptions" id="inlineRadio3" value="username">
            <label class="form-check-label" for="inlineRadio3">User's name</label>
        </div> --}}
    </form>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">{{__('receipt.User')}}</th>
                <th scope="col">{{__('receipt.Cost')}}</th>
                <th scope="col">{{__('receipt.Status')}}</th>
                <th scope="col">{{__('receipt.Finish')}}</th>
                <th scope="col">{{__('receipt.Payment')}}</th>
                <th scope="col">{{__('receipt.Order date')}}</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receipts as $receipt)
            <tr>
                <th scope="row"><a href="{{route('receipt.show',$receipt)}}">{{$receipt->id}}</a></th>
                <td>{{$receipt->user->name}}</td>
                <td>{{$receipt->money($receipt->price_sum)}}</td>
                
                {{-- 1-accept  2-cancel  3-wait  4-receive --}}
                <td>
                    @if ($receipt->status_id == 1)
                        {{__('receipt.Accepted')}}
                    @else
                        @if ($receipt->status_id == 2)
                            {{__('receipt.Canceled')}}
                        @else
                            @if ($receipt->status_id == 3)
                                {{__('receipt.Waiting')}}
                            @else
                                {{__('receipt.Received')}}
                            @endif
                        @endif
                    @endif
                </td>
                <td>
                    @if ($receipt->is_finish)
                    <i style="font-size: 30px;color:#1FAA59" class="bi bi-check-circle-fill"></i>
                    @else
                    <i style="font-size: 30px;color:#DE4839" class="bi bi-x-circle-fill"></i>
                    @endif
                </td>
                {{-- 1-offline   2-banking --}}
                <td>
                    @if ($receipt->payment_id == 1)
                        {{__('receipt.Offline')}}
                    @else
                        @if ($receipt->payment_id == 2)
                            {{__('receipt.Banking')}}
                        @else
                            {{__('receipt.Paypal')}}
                        @endif
                    @endif
                </td>
                <td>{{$receipt->created_at}}</td>
                <td class="row">
                    @if ($receipt->status_id == 4)
                    <a style="margin: 10px" class="btn btn-success col" href="{{route('receipt.unpay',$receipt->id)}}">{{__('receipt.Unpay')}}</a>
                    @else
                    <a style="margin: 10px" class="btn btn-success col" href="{{route('receipt.pay',$receipt->id)}}">{{__('receipt.Paid')}}</a>
                    @endif
                    <a style="margin: 10px" class="btn btn-secondary col" href="{{route('receipt.cancel',$receipt->id)}}">
                        <div class="d-flex align-items-center justify-content-center" style="height: 100%">{{__('receipt.Cancel')}}</div>
                    </a>
                </td>
                <td>
                    @if ($receipt->is_finish)
                        <a style="margin: 10px" class="btn btn-success col" href="{{route('receipt.un-finish',$receipt)}}">
                            {{__('receipt.UnFinish')}}
                        </a>
                    @else
                        <a style="margin: 10px" class="btn btn-success col" href="{{route('receipt.finish',$receipt)}}">
                            {{__('receipt.Finish')}}
                        </a>
                    @endif
                    
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
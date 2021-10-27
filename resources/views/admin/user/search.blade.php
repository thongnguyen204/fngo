@extends('admin.dashboard.index')

@section('dashboard')

{{-- search file dont have pagination --}}

<link href="{{ asset('css/receipt.css') }}" rel="stylesheet">

<div class="container bg-white rounded wrapper">
    <form style="margin-bottom: 20px" action="{{route('user.search')}}" method="GET">
        <div style="margin-bottom: 0px" class="input-group searchBar">
            <input placeholder="{{__('user.Search')}}" type="text" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="">
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
            <input class="form-check-input" type="radio" name="searchOptions" id="inlineRadio2" value="name">
            <label class="form-check-label" for="inlineRadio2">{{__('user.Name')}}</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchOptions" id="inlineRadio3" value="email">
            <label class="form-check-label" for="inlineRadio3">Email</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="searchOptions" id="inlineRadio4" value="phone">
            <label class="form-check-label" for="inlineRadio4">{{__('user.Phone')}}</label>
        </div>
    </form>
    <div class="btn-toolbar my-2" role="toolbar" aria-label="Toolbar with button groups">
        @if (!Auth::guest() && Auth::user()->role->name == 'admin')
            
        @endif
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <a href="{{route('user.roleSort','all')}}" class="btn btn-outline-primary">Show all</a>
        </div>
        
        <div class="btn-group mr-2" role="group" aria-label="Second group">
            <a href="{{route('user.roleSort','user')}}" class="btn btn-outline-secondary">Only user</a>
        </div>
        
        <div class="btn-group mr-2" role="group" aria-label="Third group">
            <a href="{{route('user.roleSort','employee')}}" class="btn btn-outline-success">Only Employee</a>
        </div>
        
        <div class="btn-group" role="group" aria-label="Fourth group">
            <a href="{{route('user.roleSort','admin')}}" class="btn btn-outline-danger">Only Admin</a>
        </div>
    </div>
    @if (!$users)
        {{__('user.Empty')}}
    @else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">User's ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col"></th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row"><a href="{{route('users.edit',[$user])}}">{{$user->id}}</a></th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            <form onsubmit="return confirm('Delete this account?');" action="{{route('users.destroy',[$user->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="">
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash-fill"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    

</div>


<script>
    
</script>
@endsection
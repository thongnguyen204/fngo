@extends('layouts.admin')

@section('content')



<div class="container">
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th></th>
            {{-- <th></th> --}}
            <th></th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->role->name}}</td>
                {{-- <td><a href="{{route('users.show',$user)}}">details</a> --}}
                <td><a href="{{route('users.edit',[$user])}}">details</a>
                </td>
                <td>
                    <form onsubmit="return confirm('Delete this account?');" action="{{route('users.destroy',[$user->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $users->links() }}
</div>


@endsection
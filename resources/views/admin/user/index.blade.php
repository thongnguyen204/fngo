@extends('admin.dashboard.index')

@section('dashboard')



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
                <td><a href="{{route('users.edit',[$user])}}">{{__('common.Edit')}}</a>
                </td>
                <td>
                    <form onsubmit="return confirm('Delete this account?');" action="{{route('users.destroy',[$user->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="">
                            <button class="btn btn-danger" type="submit">{{__('common.Delete')}}</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $users->links() }}
</div>


@endsection
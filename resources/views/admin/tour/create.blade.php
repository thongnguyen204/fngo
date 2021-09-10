@extends('layouts.admin')

@section('content')


<body>
    <h1>Create new tour</h1>
    
    
    <form action="{{route('tour.store')}}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="title">Title </label></td>
                <td>
                    <input type="text" name="title" size="40"/>
                    
                </td>
            </tr>
            
            <tr>
                <td><label for="content">Content </label></td>
                <td><textarea name="content" rows="10" cols="50"></textarea></td>
            </tr>
        </table>
        <h2>Sub Trip</h2>
        
        <div id="day"></div>
        
        <button type="button" id="addDay">Add</button>
        <button type="button" id="removeDay">Remove</button>
        <button type="submit">Create</button>
    </form>
</body>

@endsection
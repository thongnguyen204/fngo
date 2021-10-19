@extends('layouts.admin')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">

<link href="{{ asset('css/article.css') }}" rel="stylesheet">
<link href="{{ asset('css/comment.css') }}" rel="stylesheet">

<div class="container bg-white rounded wrapper">
    <div class="header">
    @auth
        @if (Auth::user()->role->name != 'user')
            <div class="admin-button">
                <div class="row">
                    <a class="btn btn-success col admin-button" href="{{route('article.create')}}"><i class="bi bi-plus-lg"></i></a>
                    <a class="btn btn-primary col admin-button" href="{{route('article.edit',$article)}}"><i class="bi bi-pencil-square"></i></a>
                    <div style="padding: 0px"  class="col admin-button" >
                        <form action=" {{route('article.destroy',$article)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button style="width: 100%" class="btn btn-danger" type="submit"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endauth
        
        <h1 class="detail-title">{{$article->title}}</h1>
        
        <div class="row">
            <div class="col d-flex align-items-center">
            <img class="img-responsive rounded-circle" src="{{$article->user->avatar}}" width="38">
            <span class=" info">{{$article->user->name}}</span>
            <span class="dot"></span>
            <span class="info">{{$article->created_at}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div style="margin-bottom: 50px" class="main-image">
                    <img style="width: 100%;" loading="lazy" alt="article image" class="img_fluid rounded"
                        src="{{$article->thumbnail}}">
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div>
            {!! $article->content !!}
        </div>
    </div>
</div>
<div id="change">
    <div style="margin-top: 20px;" class="container rounded bg-white wrapper">
        <div class="d-flex justify-content-center row">
            <div style="width: 100%" class="coment-bottom bg-white">
                @auth
                <div class="input-comment d-flex flex-row add-comment-section mt-4 mb-4">
                    <img class="img-fluid img-responsive rounded-circle mr-2" src="{{Auth::user()->avatar}}" width="38">
                    <input id="comment" data-article="{{$article->id}}" type="text" class="form-control mr-3" placeholder="Add comment">
                    <button onclick="addComment()" class="btn btn-primary" type="button">Comment</button>
                </div>
                @endauth

                @guest
                <div class="input-comment">{{__('article.Login to comment')}}</div>
                @endguest
                
                @if (!$have_comment)
                    <div class="input-comment">{{__('article.Empty comment')}}</div>
                @else
                    @foreach ($comments as $comment)
                    <div class="comment-wrapper rounded commented-section mt-2">
                        <div class="row avatar-name">
                            <div class="col">
                                <img class="img-responsive rounded-circle" src="{{$comment->user->avatar}}" width="38">
                                <span  class="user-name">{{$comment->user->name}}</span>
                            </div>
                            <div class="col d-flex align-items-center justify-content-end">
                                <div class=" ">{{$comment->day()}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div>
                                    {{$comment->content}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                {{-- <div class="commented-section mt-2">
                    <div class="d-flex flex-row align-items-center commented-user">
                        <h5 class="mr-2">Makhaya andrew</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">10 hours ago</span>
                    </div>
                    <div class="comment-text-sm"><span>Nunc sed id semper risus in hendrerit gravida rutrum. Non odio euismod lacinia at quis risus sed. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod. Enim facilisis gravida neque convallis a. In mollis nunc sed id. Adipiscing elit pellentesque habitant morbi tristique senectus et netus. Ultrices mi tempus imperdiet nulla malesuada pellentesque.</span></div>
                    <div class="reply-section">
                        <div class="d-flex flex-row align-items-center voting-icons"><i class="fa fa-sort-up fa-2x mt-3 hit-voting"></i><i class="fa fa-sort-down fa-2x mb-3 hit-voting"></i><span class="ml-2">25</span><span class="dot ml-2"></span>
                            <h6 class="ml-2 mt-1">Reply</h6>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<script>
    function addComment(){
        var comment = {article: $('#comment').data('article'), comment: $('#comment').val()};
        // console.log(comment);
        $.ajax({
            // will 405 error if url:comment instead /comment !!!!
            url: "/articleComment",
            type:'POST',
            data:{
                "_token": "{{ csrf_token() }}",
                "data": comment,
            }
        }).done(function(respone){
            $("#change").empty();
            $("#change").html(respone);
            // console.log(respone);
        });
    }
</script>
@endsection
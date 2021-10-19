@extends('layouts.admin')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
<link href="{{ asset('css/article.css') }}" rel="stylesheet">

<div class="container rounded bg-white wrapper">
    @auth
        @if (Auth::user()->role->name != 'user')
            <a class="btn btn-success col admin-button" href="{{route('article.create')}}"><i class="bi bi-plus-lg"></i></a>
        @endif
    @endauth
    
    @foreach ($articles as $article)
    <div class="article-wrapper">
        <div class="row">
            <div class="col-12 col-md-3 d-flex align-items-center">
                <a href="{{route('article.show',$article)}}">
                <img class="img_fliud thumbnail rounded" src="https://res.cloudinary.com/dloeyqk30/image/upload/v1633314428/FnGO/hotelImage/roomType/2_double_bed_zv5hjp.jpg">
                </a>
            </div>
            <div class="col-12 col-md-9">
                <div class="row">
                    <div class="title col">
                        <a href="{{route('article.show',$article)}}">
                        {{$article->title}}
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col info">
                        <i class="bi bi-person-fill"></i>
                        <span style="margin-right: 10px;" class="author">{{$article->user->name}}</span>
                        <i class="bi bi-clock"></i> 
                        {{-- author --}}
                        <span class="publish-date">{{$article->created_at}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col abstract">
                        {{$article->abstract}}
                    </div>
                </div>
                <div class="row d-none d-md-block">
                    <div class="col">
                        <div class="">
                            <a href="{{route('article.show',$article)}}" type="button" class="btn btn-readmore">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="post-wrapper">
        <div class="row">
            <div  class="col-12 col-md-3 d-flex align-items-center">
                <img class="img_fliud thumbnail" src="https://res.cloudinary.com/dloeyqk30/image/upload/v1633314428/FnGO/hotelImage/roomType/2_double_bed_zv5hjp.jpg">
            </div>
            <div class="col-12 col-md-9">
                <div class="row">
                    <div class="title col">
                        HANGING OUT WITH OLD FRIENDS.
                    </div>
                </div>
                <div class="row">
                    <div class="col info">
                        <i class="bi bi-person-fill"></i>
                        <span style="margin-right: 10px;" class="author">dialga</span>
                        <i class="bi bi-clock"></i>
                        <span class="publish-date">20/04/2000</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col abstract">
                        Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi...
                    </div>
                </div>
                <div class="row d-none d-md-block">
                    <div class="col">
                        <div class="">
                            <button type="button" class="btn btn-readmore">READ MORE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
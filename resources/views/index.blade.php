@extends('layouts.app')

@section('title')
    @include('shared.header')
@endsection

@section('navbar')
    @include('shared.navbar')
@endsection

@section('footer')
    @include('shared.footer')
@endsection

@section('content')
    <div class="row head-news">
        @include('frontblocks.' . $frontblock->name)
    </div>

    <hr>

    <div class="row middle-news">
        @foreach ($latestArticles as $article)
            <div class="col-md-4 col-sm-6 middle-news-box">
                <a href="{{ route('article', ['id' => $article->id, 'title' => $article->seoUrl()])}}" class="title">
                    @if ($article->image)
                        <img src="{{ asset('storage/'.$article->image) }}" class="img-responsive image-shadow" alt="">
                    @endif
                    
                    <h4 class="title">{{ $article->title }}</h4>
                </a>
                <h4><small>{{ $article->slug }}</small></h4>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('top-navbar')
@include('shared.top-navbar')
@endsection

@section('header')
@include('shared.header')
@endsection

@section('categories-navbar')
@include('shared.categories-navbar')
@endsection

@section('footer')
@include('shared.footer')
@endsection

@section('content')
@include('frontblocks.' . $frontblock->name)

<hr>

<div class="row">
  @foreach($latestArticles as $article)
  <div class="col-md-4 col-sm-6">
    <div class="middle-news-container">
      <a href="{{ route('article', ['id' => $article->id, 'title' => $article->seoUrl()]) }}">
        @if($article->image)
        <img src="{{ asset('storage/'.$article->image) }}" alt="Test" class="img-fluid img-shadow">
        @endif
        <h5 class="regular-font">{{ $article->title }}</h5>
      </a>
      <p class="middle-news-slug">{{ $article->slug }}</p>
    </div>
  </div>
  @endforeach
</div>
@endsection
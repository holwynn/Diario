@extends('layouts.app')

@section('title', config('newspaper.name') . ' - ' . ucfirst($category))

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
<div class="row middle-news">
  @foreach ($articles as $article)
  <div class="col-md-4 col-sm-6 middle-news-box">
    <a href="{{ route('article', ['id' => $article->id, 'title' => $article->seoUrl()])}}" class="title">
      @if ($article->image)
      <img src="{{ asset('storage/'.$article->image) }}" class="img-fluid image-shadow frontpage-article-image" alt="">
      @endif
      
      <h4 class="title">{{ $article->title }}</h4>
    </a>
    <h4><small>{{ $article->slug }}</small></h4>
  </div>
  @endforeach
</div>
@endsection

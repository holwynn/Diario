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
<div class="row article-page">
  <div class="col-sm-8 col-xs-12">
    <div class="article-author-date">
      <p>{{ $article->created_at->formatLocalized(__('newspaper.date')) }}</p>
      <p>{{ ucfirst($article->category->name) }}</p>
    </div>

    @can('edit', $article)
    <a href="{{ route('dashboard.articles.edit', ['id' => $article->id]) }}">Edit this article</a>
    @endcan
    
    <h1 class="article-title">{{ $article->title }}</h1>
    <h3 class="article-slug">{{ $article->slug }}</h3>

    <img src="{{ asset('/storage/' . $article->image) }}" class="img-responsive article-image image-shadow" alt="">
    
    <hr>
    <div class="row article-content">
      <div class="col-md-12">
        {!! $article->content !!}
      </div>
    </div>

    <hr>
    
    <div class="row article-writer-profile">
      <div class="col-md-2 text-center">
        <i class="fa fa-user fa-5x"></i> <br> <br>
        <ul class="list-inline">
          @if ($article->user->profile->twitter_username)
          <li><a href="https://twitter.com/{{ $article->user->profile->twitter_username }}" target="_blank"><i class="fa fa-twitter article-profile-social"></i></a></li>
          @endif
          
          @if ($article->user->profile->facebook_username)
          <li><a href="https://facebook.com/{{ $article->user->profile->facebook_username }}" target="_blank"><i class="fa fa-facebook article-profile-social"></i></a></li>
          @endif
        </ul>
      </div>
      <div class="col-md-10">
        <p><a href="#">{{ $article->user->profile->name }}</a></p>
        <div>
          {{ $article->user->profile->description }}
        </div>
      </div>
    </div>


  </div>

  @if (count($relatedArticles) > 0)
  <h3 class="text-center">{{ __('newspaper.related') }}</h3>
  <hr>
  @foreach ($relatedArticles as $article)
  <div class="col-sm-4 col-xs-6">
    <a href="{{ route('article', ['id' => $article->id, 'title' => $article->seoUrl()])}}" class="title">
      <img src="{{ asset('storage/thumb_'.$article->image) }}" class="img-responsive image-shadow" alt="">
      <h4 class="title">{{ $article->title }}</h4>
    </a>
    <h4><small>{{ $article->slug }}</small></h4>
  </div>
  @endforeach
  @endif
</div>
@endsection

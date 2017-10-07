@extends('layouts.app')

@section('title', $article->title)

@section('header')
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
  <div class="col-sm-10 col-xs-12">
    @can('update', $article)
    <a href="{{ route('dashboard.articles.edit', ['id' => $article->id]) }}" target="_blank">Edit this article</a>
    @endcan

    <p>{{ $article->created_at->formatLocalized(__('newspaper.date')) }}</p>
    <p>{{ asset('/storage/' . $article->image) }}</p>
    
    <h1 class="article-title">{{ $article->title }}</h1>
    <h3 class="article-slug">{{ $article->slug }}</h3>

    <img src="{{ asset('/storage/' . $article->image) }}" class="img-responsive article-image image-shadow" alt="">
  
    <hr class="soft-hr">

    <div class="row article-content">
      <div class="col-sm-4">
        <h4>{{ __('newspaper.share') }}</h4>
      </div>
      <div class="col-sm-8">
        {!! $article->content !!}
      </div>
    </div>

    <hr>
    
    <div class="row article-writer-profile">
      <div class="col-md-2 col-sm-4 text-center">
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

      <div class="col-md-10 col-sm-8">
        <p><a href="#">{{ $article->user->profile->name }}</a></p>
        <div>
          {{ $article->user->profile->description }}
        </div>
      </div>

    </div>
  </div>

  {{-- TODO: redo this spaghetti because it's not even wrapped in a .col --}}
  @if (count($relatedArticles) > 0)
  <h3 class="text-center hidden-sm hidden-xs">{{ __('newspaper.related') }}</h3>
  <hr>
  @foreach ($relatedArticles as $article)
  <a href="{{ route('article', ['id' => $article->id, 'title' => $article->seoUrl()])}}" class="title">
    <div class="col-sm-2 hidden-sm hidden-xs article-related-box">
      <h4 class="title article-related-box-title">{{ $article->title }}</h4>
      <hr class="soft-hr">
      {{-- <img src="{{ asset('/storage/' . $article->image) }}" class="img-responsive article-image image-shadow" alt=""> --}}
    </div>
  </a>
  @endforeach
  @endif
</div>
@endsection

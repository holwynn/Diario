@extends('layouts.app')

@section('title', $article->title)

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
<div class="row">
  <div class="col-lg-9 col-md-12">
    <div class="article-container">
      <div class="row">
        <div class="col-md-12">
          @can('update', $article)
          <a href="{{ route('dashboard.articles.edit', ['id' => $article->id]) }}" target="_blank">Edit this article</a>
          @endcan

          <p class="article-date">{{ $article->created_at->formatLocalized(__('newspaper.date')) }}</p>

          <h1 class="article-title">{{ $article->title }}</h1>
          <p class="article-slug regular-font">{{ $article->slug }}</p>

          <img src="{{ asset('/storage/' . $article->image) }}" alt="" class="img-fluid img-shadow">
        </div>
      </div>

      <hr>

      <!-- Article content -->
      <div class="row">
        <div class="col-md-3">
          <div class="article-tools-container">
            <p>{{ __('newspaper.share') }}</p>
            <ul class="nav">
              <li><img src="/img/logos/facebook.png" alt=""></li>
              <li><img src="/img/logos/twitter.png" alt=""></li>
            </ul>

            <hr>

            <i class="fa fa-tags" style="margin-right: 7px;"></i> 
            <span class="article-tags regular-font">
              @foreach(explode(',', $article->tags) as $tag)
              <a href="#">{{ $tag }}</a>
              @endforeach
            </span>
          </div>
        </div>

        <div class="col-md-9">
          <div class="article-content-container">
            {!! $article->content !!}
          </div>
        </div>
        <!-- / Article content -->
      </div>

      <hr style="margin: 45px 0">

      <!-- Article author -->
      <div class="row">
        <div class="col-md-2 text-center">
          <i class="fa fa-user fa-5x"></i> 
        </div>

        <div class="col-md-10">
          <h4 class="article-author-name regular-font">
            {{ $article->user->profile->name }}
            @if ($article->user->profile->twitter_username)
            <a href="https://twitter.com/{{ $article->user->profile->twitter_username }}" class="article-author-social" target="_blank"><i class="fa fa-twitter"></i></a> 
            @endif
            @if ($article->user->profile->facebook_username)
            <a href="https://facebook.com/{{ $article->user->profile->facebook_username }}" class="article-author-social" target="_blank"><i class="fa fa-facebook"></i></a>
            @endif
          </h4>
          <p class="article-author-bio">{{ $article->user->profile->description }}</p>
        </div>
      </div>
      <!-- / Article author -->
    </div>
  </div>

  <div class="col-lg-3 col-md-12">
    <div class="related-articles-container">
      <h4 class="text-center">You might also like</h4>
      <hr>
      <ul class="list-unstyled">
        <!-- TODO: figure out how to put related articles here -->
      </ul>
    </div>
  </div>
</div>
@endsection



{{-- Related articles logic --}}
{{-- @if (count($relatedArticles) > 0)
<h3 class="text-center hidden-sm hidden-xs">{{ __('newspaper.related') }}</h3>
<hr>
@foreach ($relatedArticles as $article)
<a href="{{ route('article', ['id' => $article->id, 'title' => $article->seoUrl()])}}" class="title">
  <div class="col-sm-2 hidden-sm hidden-xs article-related-box">
    <h4 class="title article-related-box-title">{{ $article->title }}</h4>
    <hr class="soft-hr">
    <img src="{{ asset('/storage/' . $article->image) }}" class="img-responsive article-image image-shadow" alt="">
  </div>
</a>
@endforeach
@endif --}}
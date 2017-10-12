<div class="row">
  <div class="col-md-12">
    <div class="frontblock-article-container">
      @if($article->show_image)
      <img class="img-fluid image-shadow" src="{{ asset('storage/'.$article->image) }}" alt="">
      @endif
      <a href="{{ route('article', [
        'id' => $article->id,
        'title' => $article->seoUrl()
        ]) }}">
        <h4 class="frontblock-title regular-font">{{ $article->title }}</h4>
      </a>
      <p class="frontblock-slug">{{ $article->slug }}</p>
    </div>
  </div>
</div>

<hr>
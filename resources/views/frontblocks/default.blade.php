<div class="row">
  <div class="col-md-3">
    <div class="row">
      <div class="col-md-12">
        <div class="frontblock-article-container">
          @if($frontblock->articlesArray[0]->show_image)
          <img class="img-fluid image-shadow" src="{{ asset('storage/'.$frontblock->articlesArray[0]->image) }}" alt="">
          @endif
          <a href="{{ route('article', [
            'id' => $frontblock->articlesArray[0]->id,
            'title' => $frontblock->articlesArray[0]->seoUrl()
            ]) }}">
            <h4 class="frontblock-title regular-font">{{ $frontblock->articlesArray[0]->title }}</h4>
          </a>
          <p class="frontblock-slug">{{ $frontblock->articlesArray[0]->slug }}</p>
        </div>
      </div>
    </div>

    <hr>

    <div class="row">
      <div class="col-md-12">
        <div class="frontblock-article-container">
          @if($frontblock->articlesArray[1]->show_image)
          <img class="img-fluid image-shadow" src="{{ asset('storage/'.$frontblock->articlesArray[1]->image) }}" alt="">
          @endif
          <a href="{{ route('article', [
            'id' => $frontblock->articlesArray[1]->id,
            'title' => $frontblock->articlesArray[1]->seoUrl()
            ]) }}">
            <h4 class="frontblock-title regular-font">{{ $frontblock->articlesArray[1]->title }}</h4>
          </a>
          <p class="frontblock-slug">{{ $frontblock->articlesArray[1]->slug }}</p>
        </div>
      </div>
    </div>

    <hr>

    <div class="row">
      <div class="col-md-12">
        <div class="frontblock-article-container">
          @if($frontblock->articlesArray[2]->show_image)
          <img class="img-fluid image-shadow" src="{{ asset('storage/'.$frontblock->articlesArray[2]->image) }}" alt="">
          @endif
          <a href="{{ route('article', [
            'id' => $frontblock->articlesArray[2]->id,
            'title' => $frontblock->articlesArray[2]->seoUrl()
            ]) }}">
            <h4 class="frontblock-title regular-font">{{ $frontblock->articlesArray[2]->title }}</h4>
          </a>
          <p class="frontblock-slug">{{ $frontblock->articlesArray[2]->slug }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="row">
      <div class="col-md-12">
        <div class="frontblock-article-container">
          @if($frontblock->articlesArray[3]->show_image)
          <img class="img-fluid image-shadow" src="{{ asset('storage/'.$frontblock->articlesArray[3]->image) }}" alt="">
          @endif
          <a href="{{ route('article', [
            'id' => $frontblock->articlesArray[3]->id,
            'title' => $frontblock->articlesArray[3]->seoUrl()
            ]) }}">
            <h4 class="frontblock-title regular-font">{{ $frontblock->articlesArray[3]->title }}</h4>
          </a>
          <p class="frontblock-slug">{{ $frontblock->articlesArray[3]->slug }}</p>
        </div>
      </div>
    </div>

    <hr>

    <div class="row">
      <div class="col-md-12">
        <div class="frontblock-article-container">
          @if($frontblock->articlesArray[4]->show_image)
          <img class="img-fluid image-shadow" src="{{ asset('storage/'.$frontblock->articlesArray[4]->image) }}" alt="">
          @endif
          <a href="{{ route('article', [
            'id' => $frontblock->articlesArray[4]->id,
            'title' => $frontblock->articlesArray[4]->seoUrl()
            ]) }}">
            <h4 class="frontblock-title regular-font">{{ $frontblock->articlesArray[4]->title }}</h4>
          </a>
          <p class="frontblock-slug">{{ $frontblock->articlesArray[4]->slug }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="row">
      <div class="col-md-12">
        <div class="frontblock-article-container">
          <!-- <img src="artdefault.jpg" alt="Test" class="img-fluid"> -->
          <p class="frontblock-title">Quo architecto quia aspernatur quis ipsam provident soluta.</p>
        </div>
      </div>
    </div>
  </div>
</div>
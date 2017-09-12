{{-- TOOD: Manually fix indenation here because the sublime plugin can't handle this mess --}}
<div class="col-sm-3 col-xs-12">
    <div class="left-1">
        @if ($frontblock->articlesArray[0]->show_image)
            <img class="img-responsive image-shadow" src="{{ asset('storage/'.$frontblock->articlesArray[0]->image) }}" alt="">
        @endif

        <h3><a href="{{ route('article', [
                'id' => $frontblock->articlesArray[0]->id,
                'title' => $frontblock->articlesArray[0]->seoUrl()
            ]) }}" class="title">{{ $frontblock->articlesArray[0]->title }}</a></h3>
        <p class="block-slug">{{ $frontblock->articlesArray[0]->slug }}</p>
    </div>

    <hr>

    <div class="left-2">
        @if ($frontblock->articlesArray[1]->show_image)
            <img class="img-responsive image-shadow" src="{{ asset('storage/'.$frontblock->articlesArray[1]->image) }}" alt="">
        @endif

        <h3><a href="{{ route('article', [
                'id' => $frontblock->articlesArray[1]->id,
                'title' => $frontblock->articlesArray[1]->seoUrl()
            ]) }}" class="title">{{ $frontblock->articlesArray[1]->title }}</a></h3>
        <p class="block-slug">{{ $frontblock->articlesArray[1]->slug }}</p>
    </div>

    <hr>

    <div class="left-3">
        @if ($frontblock->articlesArray[2]->show_image)
            <img class="img-responsive image-shadow" src="{{ asset('storage/'.$frontblock->articlesArray[2]->image) }}" alt="">
        @endif

        <h3><a href="{{ route('article', [
                'id' => $frontblock->articlesArray[2]->id,
                'title' => $frontblock->articlesArray[2]->seoUrl()
            ]) }}" class="title">{{ $frontblock->articlesArray[2]->title }}</a></h3>
        <p class="block-slug">{{ $frontblock->articlesArray[2]->slug }}</p>
    </div>

</div>

<div class="col-sm-9 col-xs-12">

    <div class="middle-1">
        @if ($frontblock->articlesArray[3]->show_image)
            <img class="img-responsive image-shadow" src="{{ asset('storage/'.$frontblock->articlesArray[3]->image) }}" alt="">
        @endif

        <h3><a href="{{ route('article', [
                'id' => $frontblock->articlesArray[3]->id,
                'title' => $frontblock->articlesArray[3]->seoUrl()
            ]) }}" class="title">{{ $frontblock->articlesArray[3]->title }}</a></h3>
        <p class="block-slug">{{ $frontblock->articlesArray[3]->slug }}</p>
    </div>

    <hr>

    <div class="middl-2">
        @if ($frontblock->articlesArray[4]->show_image)
            <img class="img-responsive image-shadow" src="{{ asset('storage/'.$frontblock->articlesArray[4]->image) }}" alt="">
        @endif

        <h3><a href="{{ route('article', [
                'id' => $frontblock->articlesArray[4]->id,
                'title' => $frontblock->articlesArray[4]->seoUrl()
            ]) }}" class="title">{{ $frontblock->articlesArray[4]->title }}</a></h3>
        <p class="block-slug">{{ $frontblock->articlesArray[4]->slug }}</p>
    </div>

</div>

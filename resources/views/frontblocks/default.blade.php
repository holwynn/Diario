<div class="row">
  @for ($i = 0; $i < count($frontblock->columns); $i++)
  <div class="col-md-{{ $frontblock->columns[$i] }}">
    @for($j = 0; $j < $frontblock->rows; $j++)
      @if(isset($frontblock->articlesArray[$counter]))
        @component('frontblocks.article', ['article' => $frontblock->articlesArray[$counter]])
        
        @endcomponent
      @endif
      @php
        $counter++
      @endphp
    @endfor
  </div>
  @endfor
</div>
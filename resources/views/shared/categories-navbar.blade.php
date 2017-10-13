<div class="row hidden-xs-down">
  <div class="col-md-12">
    <div>
      <hr>
      <ul class="nav justify-content-center categories-navbar">
        @foreach($categories as $category)
        <li>
          <a href="{{ route('category', ['category' => lcfirst($category->name)]) }}">
            {{ $category->name }}
          </a>
        </li>
        @endforeach
      </ul>
      <hr>
    </div>
  </div>
</div>
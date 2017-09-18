<div class="row hidden-sm hidden-xs">
    <div class="col-sm-12">
        <hr class="black-hr">

        <ul class="list-inline text-center top-navbar">
            @foreach ($categories as $category)
                <li>
                    <p>
                        <a class="title top-navbar-item"
                          href="{{ route('category', ['category' => lcfirst($category->name)]) }}">
                            {{ $category->name }}
                        </a>
                    </p>
                </li>
            @endforeach
        </ul>
        
        <hr class="black-hr">
    </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="header clearfix">
      <a href="{{ route('index') }}">
        <h1 class="text-center regular-font">{{ config('newspaper.name') }}</h1>
      </a>
      <p class="text-center header-date">{{ Carbon\Carbon::now()->formatLocalized(__('newspaper.date')) }}</p>
    </div>
  </div>
</div>
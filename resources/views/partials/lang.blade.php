<!-- Language Selection -->
{{--@if( !Session::has('locale') )--}}
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach($app->config['app']['locales'] as $locale)
            @if( $locale == $app->getLocale())
                <li class="active">{{ ucfirst($locale) }}</li>
            @else
                <li><a href="{{ route('switch.locale', $locale) }}">{{ ucfirst($locale) }}</a></li>
            @endif
        @endforeach
</div>
{{--@endif--}}
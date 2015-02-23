<!-- Language Selection -->
@if( !Session::has('locale') )
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

    <p> {{ trans('login.settings.localeCurrent') }}</p>

    @foreach($app->config['app']['locales'] as $locale)
        @if($locale !== $app->getLocale())
            <a href="{{ route('settings.lang.change', $locale) }}">{{ trans('login.settings.'.$locale) }}</a>
        @endif
    @endforeach
</div>
@endif
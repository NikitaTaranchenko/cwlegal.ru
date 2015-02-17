@extends('layouts.app')

@section('title')
    <title>{{ trans('login.requestToken') }}</title>
@endsection

@section('content')

    @include('partials.errors')
    @include('partials.lang')

    <!-- Form to request token for login into the secure area -->
    <div class="panel panel-default">
        <div class="panel panel-heading">
            <h1>{{ trans('login.requestToken') }}</h1>
        </div>
        <div class="panel panel-body">
            {!! Form::open() !!}
            <div class="form-group">
                {!! Form::label('email', trans('login.email').':') !!}
                {!! Form::email('email', null, array(
                    'class'=>'form-control'
                )) !!}
            </div>
            <div class="form-group">
                {!! Form::submit(trans('login.submit'), array(
                    'class'=>' btn btn-primary'
                )) !!}
            </div>
            <p>{{ trans('login.requestTokenHelper').'.' }}</p>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
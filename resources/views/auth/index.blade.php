@extends('layouts.app')

@section('body')
    <body class=" " style="background-color: #808080;">
    @endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3" style="margin-top: 2em;">

        @if($errors->all())
            <div class="alert alert-danger">
                <p>
                    <i class="fa fa-exclamation-circle"></i>
                    &nbsp;<strong>Something went wrong:</strong>
                </p>
                @foreach ($errors->all() as $message)
                    <li style="padding-left: 3em;">{{ $message }}</li>
                @endforeach
            </div>
        @endif

        <div class="well">
            <div class="lead">
                <i class="fa fa-certificate" style="color: orangered"></i>
                &nbsp;Authentication Required
            </div>
            <hr class="hr-purple"/>
            {!! Form::open() !!}
                <div class="form-group" style="margin-top: 1em;">
                    {!! Form::label('email', 'We will send the link to this email:') !!}
                    {!! Form::email('email', null, ["class"=>"form-control","autofocus"]) !!}
                </div>
                <div class="form-group" style="margin-top: 1em; margin-bottom: 3em;">
                    {!! Form::submit('Submit', ["class"=>"btn btn-primary"]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
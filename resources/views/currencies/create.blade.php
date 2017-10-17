@extends('master')

@section('page_title')
    New Currency
@stop

@section('page_content')
    <div class="row justify-content-sm-center">
        <div class="col-sm-12">
            <h2>New Currency</h2>

            {{ Form::open(['route' => 'currencies.store']) }}

                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}

                {{ Form::label('prefix', 'prefix') }}
                {{ Form::text('prefix', null, ['class' => 'form-control']) }}

                <hr>

                {{ Form::submit('Create Currency', ['class' => 'btn btn-primary float-right']) }}

            {!! Form::close() !!}

        </div>
    </div>
@stop
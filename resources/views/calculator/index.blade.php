@extends('master')

@section('page_title', 'Calculator')

@section('page_content')
    <div class="row justify-content-sm-center" style="margin-top: 50px;">
        <div class="col-sm-6">
            <form method="post" action="">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open(['route' => 'calculator.calculate', 'data-parsley-validate' => '']) !!}

                            {{ Form::label('from_currency_id', 'From Currency') }}
                            {{ Form::select('from_currency_id', $options, null, ['class' => 'form-control']) }}

                            {{ Form::label('to_currency_id', 'To Currency') }}
                            {{ Form::select('to_currency_id', $options, null, ['class' => 'form-control']) }}

                            {{ Form::label('amount', 'Amount') }}
                            {{ Form::text('amount', null, ['class' => 'form-control']) }}

                            {{ Form::label('result', 'Result') }}
                            <div class="form-control result"></div>

                            <hr>

                            {{ Form::submit('Calculate', ['class' => 'btn btn-primary float-right']) }}

                        {!! Form::close() !!}

                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@stop

@section('page_scripts')

@stop
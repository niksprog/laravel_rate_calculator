@extends('master')

@section('page_title', 'Edit Currency')

@section('page_styles')
    {!! Html::style('js/parsley/css/parsley.css') !!}
@endsection

@section('page_content')
    <div class="row justify-content-sm-center">
        <div class="col-sm-12">
            {!! Form::model($currency, ['method' => 'PATCH', 'route' => ['currencies.update', $currency->id], 'data-parsley-validate' => '']) !!}

                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => '']) }}

                {{ Form::label('prefix', 'prefix') }}
                {{ Form::text('prefix', null, ['class' => 'form-control', 'required' => '']) }}

                <hr>

                {{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) }}

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('page_scripts')
    {!! Html::script('js/parsley/parsley.min.js') !!}
    <script>
        $('#form').parsley();
    </script>
@endsection
@extends('master')

@section('page_title', 'Edit Rate')

@section('page_styles')
    {!! Html::style('js/parsley/css/parsley.css') !!}
@endsection

@section('page_content')
    <div class="row justify-content-sm-center">
        <div class="col-sm-12">
            {!! Form::model($rate, ['method' => 'PATCH', 'route' => ['rates.update', $rate->id], 'data-parsley-validate' => '']) !!}

                {{ Form::label('from_currency_id', 'From Currency') }}
                {{ Form::select('from_currency_id', $options, null, [
                        'id'=>'from',
                        'class' => 'form-control',
                        'required' => '',
                        'data-parsley-notequalto' => '#to',
                        'data-parsley-notequalto-message' => 'Rates must be different'
                    ]) }}

                {{ Form::label('to_currency_id', 'To Currency') }}
                {{ Form::select('to_currency_id', $options, null, [
                        'id'=>'to',
                        'class' => 'form-control',
                        'required' => '',
                        'data-parsley-notequalto' => '#from',
                        'data-parsley-notequalto-message' => 'Rates must be different'
                    ]) }}

                {{ Form::label('rate', 'Rate') }}
                {{ Form::text('rate', null, [
                        'class' => 'form-control',
                        'required' => '',
                        'min' => '0',
                        'pattern' => '^\d*(\.\d{1,5})?$'
                    ]) }}

                <hr>

                {{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) }}

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('page_scripts')
    <script>

    </script>
    {!! Html::script('js/parsley/parsley.min.js') !!}
    <script>

        window.Parsley.addValidator("notequalto", {
            requirementType: "string",
            validateString: function(value, element) {
                return value !== $(element).val();
            }
        });

        $('#form').parsley();
    </script>
@endsection
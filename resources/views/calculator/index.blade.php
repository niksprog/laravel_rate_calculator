@extends('master')

@section('page_title', 'Calculator')

@section('page_content')
    <div class="row justify-content-sm-center" style="margin-top: 50px;">
        <div class="col-sm-6">
            <form method="post" action="">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open(['data-parsley-validate' => '']) !!}

                            {{ Form::label('from_currency_id', 'From Currency') }}
                            {{ Form::select('from_currency_id', $options, null, [
                                    'id' => 'from',
                                    'class' => 'form-control',
                                    'required' => '',
                                    'data-parsley-notequalto' => '#to',
                                    'data-parsley-notequalto-message' => 'Rates must be different'
                                ]) }}

                            {{ Form::label('to_currency_id', 'To Currency') }}
                            {{ Form::select('to_currency_id', $options, null, [
                                    'id' => 'to',
                                    'class' => 'form-control',
                                    'required' => '',
                                    'data-parsley-notequalto' => '#from',
                                    'data-parsley-notequalto-message' => 'Rates must be different'
                                ]) }}

                            {{ Form::label('amount', 'Amount') }}
                            {{ Form::text('amount', null, [
                                    'class' => 'form-control',
                                    'required' => ''
                                ]) }}

                            {{ Form::label('result', 'Result') }}
                            <div class="form-control result" style="height: 38px;background: whitesmoke;"></div>

                            <hr>

                            {{ Form::submit('Calculate', ['class' => 'btn btn-primary btn-block calculate']) }}

                        {!! Form::close() !!}

                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@stop

@section('page_scripts')
    {!! Html::script('js/parsley/parsley.min.js') !!}
    <script>

        window.Parsley.addValidator("notequalto", {
            requirementType: "string",
            validateString: function(value, element) {
                return value !== $(element).val();
            }
        });

        var form = $('form').parsley();

        $(function() {

            $('.calculate').on('click', function(e) {
                e.preventDefault();
                if (form.validate()) {
                    var data = new FormData(form.element);
                    $.ajax({
                        url: '{{ route('calculator.calculate') }}',
                        data: data,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function(response){
                            if (response.rate && response.result){
                                $(form.element).find('.result').html(response.result + ' [Rate used: ' + response.rate + ']');
                            } else {
                                console.log({response:response});
                            }
                        }
                    });
                }
            });

        });

    </script>
@stop
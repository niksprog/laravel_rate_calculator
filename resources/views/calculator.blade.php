@extends('master')

@section('page_title')
    Calculator
@stop

@section('page_content')
    <div class="row justify-content-sm-center" style="margin-top: 50px;">
        <div class="col-sm-4">
            <form method="post" action="">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Currency</label>
                            <select name="currency" class="form-control">
                                <option value="">Select</option>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->prefix }} | {{ $currency->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="amount" placeholder="0.00">
                        </div>

                        <button type="button" class="btn btn-primary float-right">Calculate</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@stop
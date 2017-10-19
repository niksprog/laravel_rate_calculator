@extends('master')

@section('page_title', 'Calculations')

@section('page_styles')
    <style>
        .pagination {
            justify-content: center;
        }
    </style>
@endsection


@section('page_content')
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                <tr>
                    <td>id</td>
                    <td>From Currency</td>
                    <td>To Currency</td>
                    <td>Amount</td>
                    <td>Rate</td>
                    <td>Result</td>
                </tr>
                </thead>
                <tbody>
                @if(sizeof($calculations))
                    @foreach($calculations as $calculation)
                        <tr>
                            <td>{{$calculation->id}}</td>
                            <td>{{$calculation->from_currency->prefix}}</td>
                            <td>{{$calculation->to_currency->prefix}}</td>
                            <td>{{$calculation->amount}}</td>
                            <td>{{$calculation->rate}}</td>
                            <td>{{$calculation->result}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No Calculations in Database</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <?php
            // Used command line to add bootstrap 4 pagination support
            // php artisan vendor:publish --tag=laravel-pagination
            ?>
            {!! $calculations->links('vendor.pagination.bootstrap-4'); !!}
        </div>
    </div>

@stop
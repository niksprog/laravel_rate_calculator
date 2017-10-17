@extends('master')

@section('page_title')
    Currencies
@stop

@section('page_content')
    <div class="my-3">
        <div class="row">
            <div class="col-sm-12">
                <a href="/currency" class="btn btn-success float-right">Add New</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Prefix</td>
                    <td style="width:160px"></td>
                </tr>
                </thead>
                <tbody>
                @if(sizeof($currencies))
                    @foreach($currencies as $currency)
                        <tr data-id="{{$currency->id}}">
                            <td>{{$currency->name}}</td>
                            <td>{{$currency->prefix}}</td>
                            <td>
                                <a href="currency/{{$currency->id}}" class="btn btn-warning">edit</a>
                                <button type="button" class="btn btn-danger" v-on:click="deleteRecord">delete</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">
                            No Currencies in Database
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('page_scripts')
    <script>var token =  '{{ csrf_token() }}';</script>
    <script src="js/currencies.js" type="text/javascript"></script>
@stop
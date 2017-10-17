@extends('master')

@section('page_title')
    {{ $title }}
@stop

@section('page_content')
    <div class="row justify-content-sm-center">
        <div class="col-md-8 col-sm-12">
            <form method="post" action="/api/currency">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" required value="{{ $currency->name }}">
                </div>
                <div class="form-group">
                    <label>Prefix</label>
                    <input type="text" class="form-control" name="prefix" required value="{{ $currency->prefix }}">
                </div>
                <button class="btn btn-primary">Save</button>
                <input type="hidden" name="id" value="{{ $currency->id }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@stop

@section('page_scripts')

@stop


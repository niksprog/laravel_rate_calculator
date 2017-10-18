@extends('master')

@section('page_title', 'Rates')

@section('page_styles')
    <style>
        .pagination {
            justify-content: center;
        }
    </style>
@endsection

@section('page_content')
    <div class="my-3">
        <div class="row">
            <div class="col-sm-12">
                {{ Html::linkRoute('rates.create', 'New Rate', [], ['class'=> 'btn btn-primary btn-sm float-right']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>From Currency</td>
                    <td>To Currency</td>
                    <td>rate</td>
                    <td style="width:160px"></td>
                </tr>
                </thead>
                <tbody>
                @if(sizeof($rates))
                    @foreach($rates as $rate)
                        <tr data-id="{{$rate->id}}" data-action="{{route('rates.destroy',[$rate->id])}}">
                            <td>{{$rate->id}}</td>
                            <td>{{$rate->from_currency->prefix}}</td>
                            <td>{{$rate->to_currency->prefix}}</td>
                            <td>{{$rate->rate}}</td>
                            <td class="text-right">
                                {{ Html::linkRoute('rates.edit', 'Edit', [$rate->id], ['class'=> 'btn btn-warning btn-sm']) }}
                                {{ Form::button('Delete', ['class'=> 'btn btn-danger btn-sm delete']) }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No Rates in Database</td>
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
            {!! $rates->links('vendor.pagination.bootstrap-4'); !!}
        </div>
    </div>

@endsection

@section('page_scripts')
    <script>
        $(function () {
            $('.delete').on('click', function () {
                var row = $(this).closest('tr');
                if (row.length && row.data('id')) {
                    bootbox.confirm({
                        title: 'Delete Record',
                        message: 'Are you sure wou want to delete this record',
                        callback: function (confirm) {
                            if (confirm) {
                                $.ajax({
                                    url: row.data('action'),
                                    method: 'DELETE',
                                    data: {
                                        id: row.data('id'),
                                        _token: '{{ csrf_token() }}'
                                    },
                                    error: function (msg) {
                                        bootbox.alert(msg.responseJSON[0]);
                                    },
                                    success: function () {
                                        row.remove();
                                    }
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
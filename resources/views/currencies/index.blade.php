@extends('master')

@section('page_title', 'Currencies')

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
                {{ Html::linkRoute('currencies.create', 'New Currency', [], ['class'=> 'btn btn-primary btn-sm float-right']) }}
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
                        <tr data-id="{{$currency->id}}" data-action="{{route('currencies.destroy',[$currency->id])}}">
                            <td>{{$currency->name}}</td>
                            <td>{{$currency->prefix}}</td>
                            <td class="text-right">
                                {{ Html::linkRoute('currencies.edit', 'Edit', [$currency->id], ['class'=> 'btn btn-warning btn-sm']) }}
                                {{--{{ Html::linkRoute('currencies.destroy', 'Delete', [$currency->id], ) }}--}}
                                {{ Form::button('Delete', ['class'=> 'btn btn-danger btn-sm delete']) }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No Currencies in Database</td>
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
            {!! $currencies->links('vendor.pagination.bootstrap-4'); !!}
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
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.system') }}
@endsection


@section('main-content')

    <section class="content-header">
        <h1 class="text-center">
            <b>{{ $title }}</b>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding ">
                        <table class="table table-bordered " id="dateCompany">
                            <tbody class="row">
                            <tr>
                                <th>Area</th>
                                <th>Horas</th>
                            </tr>
                            @foreach($statusStandardHoursCost as $statusStandardHoursCost)
                                <tr data-id="{{ $statusStandardHoursCost->id }}">
                                    <td>{{  $statusStandardHoursCost->area }}</td>
                                    <td><input name="" type="text" value="{{ $statusStandardHoursCost->hour }}" disabled class="form-control text-right CurrencyFormat" > </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="box-footer">
                            <button type="submit" id="formsSubmit" class="btn btn-info pull-right">Editar</button>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection

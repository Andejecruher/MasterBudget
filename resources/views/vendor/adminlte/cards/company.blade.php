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
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Empresa</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding ">
                                <table class="table table-bordered " id="dateCompany">
                                    <tbody>
                                    <tr>
                                        <th class="col-xs-4">Nombre De La Empresa</th>
                                        <th class="col-xs-4">Balance General Inicial</th>
                                        <th class="col-xs-4">Opciones</th>
                                    </tr>
                                    @foreach($budget as $budget)
                                    <tr>
                                        <td class="col-xs-4">{{  $budget->company->name }}</td>
                                        <td class="col-xs-3"><b>{{  $budget->day }}</b>&nbsp;<b>{{  $budget->month }}</b>&nbsp;<b>{{  $budget->year }}</b></td>
                                        <td class="col-xs-5">
                                            <a class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-editCompany"><i class="fa fa-edit"></i> Editar</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                        <!-- right column -->
                    <div class="col-md-6">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Producto</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered" id="dataProduct">
                                        <tbody>
                                        <tr>
                                            <th>Nombre Del Producto</th>
                                            <th>Opciones</th>
                                        </tr>
                                        <tr>
                                            <td>{{  $budget->product->name }}</td>
                                            <td>
                                                <a class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-product"><i class="fa fa-edit"></i> Editar</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
            <!-- /.row -->
            <!-- /.box-body -->
            <!-- /.row -->
            </div>
        </section>
        @include('adminlte::cards.partials.modal')
@endsection

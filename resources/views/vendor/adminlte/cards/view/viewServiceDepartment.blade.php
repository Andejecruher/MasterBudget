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
            <div class="col-md-10 col-md-offset-1">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding ">
                        <div class="box-header">
                            <div class="box-tools">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-btn">
                                        <a class="btn btn-app" id="addProduction" data-toggle="modal" data-target="#modal-add-raw">
                                            <i class="fas fa-plus-square"></i> Materia Prima
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered " id="dateCompany">
                            <tbody class="row">
                            <tr>
                                <th>Nombre Del Departamento</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                            @foreach($serviceDepartment as $serviceDepartment)
                                <tr data-id="{{ $serviceDepartment->id }}">
                                    <td>{{  $serviceDepartment->name }}</td>
                                    <td class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-block btn-default edit-modal" data-id="{{$serviceDepartment->id}}" data-name="{{ $serviceDepartment->name }}" data-target="#modal-update-production{{$serviceDepartment->id}}" data-toggle="modal"><i class="fa fa-edit"></i> Editar</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="#!" class="btn btn-block btn-default"  data-target=""><i class="fa fa-remove"></i> Eliminar</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection

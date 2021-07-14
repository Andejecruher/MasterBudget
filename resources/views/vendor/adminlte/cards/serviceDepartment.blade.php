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
                    <!-- form start -->
                    {!! Form::open(['route' => 'service.store', 'method' => 'post', 'id' => 'serviceDepartmentForm']) !!}
                    @csrf
                    <div class="box-body serviceDepartmentForm">
                        <div class="form-group">
                            <label for="" class="col-sm-5 control-label">Departamento De Servicios :</label>
                            <div class="col-sm-6">
                                <input name="name[]" type="text" class="form-control text-right"  placeholder="Nombre Del Servicio">
                            </div>
                            <a href="javascript:void(0);" class="add_button col-sm-1 add_buttonService" title="Add field"><i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <input name="budget_id" class="hidden" value="{{ $budget->id }}">
                    <input name="company_id" class="hidden" value="{{ $budget->company->id }}">
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" id="formsSubmit" class="btn btn-info pull-right">Guardar</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    @include('adminlte::cards.partials.modal')
@endsection

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
            <div class="col-md-offset-2 col-md-8">
                <div class="box">
                    <!-- form start -->
                    {!! Form::open(['action' => 'Cards\StandardCostController@store', 'method' => 'post', 'id' => 'standardCostForm']) !!}
                    @csrf
                    <div class="box-body">
                        <label for="" class="col-sm-6 control-label area"><b>Concepto</b></label>
                        <label for="" class="col-sm-6 control-label hour"><b>Costo</b></label>
                        <div class="form-group">
                            <label for="" class="col-sm-6 control-label">Materias Primas</label>
                            <div class="col-sm-6">
                                <input  name="cost[]"onkeypress="return filterFloat(event,this);" type="text" class="form-control text-right" id="MateriasPrimas" placeholder="0.00">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-6 control-label ">Mano De Obra Directa</label>

                            <div class="col-sm-6">
                                <input name="cost[]" type="text" onkeypress="return filterFloat(event,this);" class="form-control text-right" id="ManoDeObraDirecta" placeholder="0.00">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-6 control-label">Gastos De Fabricacion</label>

                            <div class="col-sm-6">
                                <input  name="cost[]" type="text" onkeypreonkeypress="return filterFloat(event,this);" class="form-control text-right" id="GastosDeFabricacion" placeholder="0.00">
                            </div>
                        </div>
                        <input name="budget_id" class="hidden" value="{{ $budget->id }}">
                        <input name="company_id" class="hidden" value="{{ $budget->company->id }}">
                    </div>
                    <div class="box-footer">
                        <button type="submit" id="formsSubmit" class="btn btn-info pull-right">Guardar</button>
                    </div>
                    <!-- /.box-body -->
                    {!! Form::close() !!}
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.row -->
    </section>
@endsection

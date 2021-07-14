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
                    <!-- /.box-header -->
                    {!! Form::open(['route' => 'standardHours.store', 'method' => 'post', 'id' => 'standardCostForm']) !!}
                    <div class="box-body">

                        @csrf
                        <label for="" class="col-sm-6 control-label area"><b>Area</b></label>
                        <label for="" class="col-sm-6 control-label hour"><b>Horas</b></label>
                    @foreach($productionDepartment as $productionDepartment)
                        <div class="form-group">
                            <label for="" class="col-sm-6 control-label "><input class="inputNotEdit " id="productionDepartmentName" type="text" readonly="readonly" name="name[]" value="{{  $productionDepartment->name }}"></label>
                            <div class="col-sm-6">
                                <input  name="hour[]" onkeypress="return filterFloat4(event,this);" type="text" class="form-control text-right" id="MateriasPrimas" placeholder="0.00">
                            </div>
                        </div>
                        @endforeach
                        <input name="budget_id" class="hidden" value="{{ $budget->id }}">
                        <input name="company_id" class="hidden" value="{{ $budget->company->id }}">
                    </div>
                    <div class="box-footer createCostHourOfLabor">
                        <button type="submit" class="btn btn-info pull-right">Guardar</button>
                    </div>
                </div>
                {!! Form::close() !!}
                </div>
                <!-- /.box -->
            </div>
        <!-- /.row -->
    </section>
@endsection

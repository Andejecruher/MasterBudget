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
                {!! Form::open(['route' => 'rawMaterials.store', 'method' => 'post', 'id' => 'rawMaterialsForm']) !!}
                @csrf
                <div class="box">
                    <div class="box-body table-responsive no-padding">

                        <input name="budget_id" class="hidden" value="{{ $budget->id }}">
                        <input name="company_id" class="hidden" value="{{ $budget->company->id }}">
                        <table class="table table-hover" id="rawMaterials">
                            <tbody>
                            <tr class="trtableRaw">
                                <th>Departamento</th>
                                <th>Nombre De La Materia Prima</th>
                                <th>Descripcion</th>
                                <th>Unidades Por Materia Prima</th>
                                <th></th>
                            </tr>
                            <tr class="trtableRaw trtabletRawClone">
                                <td>
                                    <select name="productionDepartment[]" class="form-control select2 select2-hidden-accessible" selected="selected">
                                        @foreach($productionDepartment as $productionDepartment)
                                            <option  value="{{ $productionDepartment->id }}">{{$productionDepartment->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="name[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="description[]" class="form-control">
                                </td>
                                <td class="row">
                                    <input type="text" name="units[]" class="form-control CurrencyFormat">
                                </td>
                                <td>
                                    <a type="button" class="opc add_button add_buttonRaw"><i id="ico-raw" class="fa fa-plus-circle"></i></a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box-footer border-balanceSheet">
                    <button type="submit" class="btn btn-info pull-right">Guardar</button>
                </div>

            {!! Form::close() !!}
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection

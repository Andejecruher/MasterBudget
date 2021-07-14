@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.system') }}
@endsection


@section('main-content')

    <section class="content-header">
        <p class="box-title text-center">
            <b>{{ $budget->company->name }}</b>
            <b>&nbsp;</b>
            <b>{{ $title }}</b>
            <b>&nbsp;</b>
            <b>{{ $budget->day }}&nbsp; De&nbsp; {{$budget->month}}&nbsp; Del&nbsp;&nbsp;{{ $year }}</b>
        </p>


    </section>

    <!-- Main content -->
    <section class="content" id="productionBudgetTable">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                {!! Form::open(['route' => 'productionBudget.store', 'method' => 'post', 'id' => 'productionBudgetForm']) !!}
                @csrf
                <input name="budget_id" class="hidden" value="{{ $budget->id }}">
                <input name="company_id" class="hidden" value="{{ $budget->company->id }}">

                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>Mes</th>
                        <th>Inventario Inicial De Productos Terminados</th>
                        <th>Produccion En Unidades</th>
                        <th>Pronostico De Ventas En Unidades</th>
                        <th>Inventario Final De Productos Terminados</th>
                        <th>Niveles De Inventario</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="content">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label for="" class="text-center">Minimo</label>
                                </div>
                                <div class="col-xs-6">
                                    <label for="" class="text-center">Maximo</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @foreach($productionBudget as $productionBudget)
                        <tr>
                            <td>
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast " style="background-color:#96ffbc;" value="{{ $productionBudget->month }}">
                            </td>
                            <td>
                                <input type="text" required name="inventoryOfFinishedProducts[]" readonly="readonly"  class="form-control" value="{{ $productionBudget->inventoryOfFinishedProducts }}" placeholder="0.00">
                            </td>
                            <td>
                                <input type="text" readonly="readonly" name="productionInUnits[]"  required class="form-control AddTotal CurrencyFormat " value="{{ $productionBudget->productionInUnits }}" placeholder="0.00">
                            </td>
                            <td>
                                <input type="text" required class="form-control CurrencyFormat" readonly="readonly" name="salesForecastInUnits[]" value="{{ $productionBudget->salesForecastInUnits }}" placeholder="0.00">
                            </td>
                            <td>
                                <input type="text" required name="finalInventoryOfFinishedProducts[]" readonly="readonly"  class="form-control CurrencyFormat" value="{{ $productionBudget->finalInventoryOfFinishedProducts }}" placeholder="0.00">
                            </td>
                            <td class="content">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input type="text" required name="minimumLevel[]" readonly="readonly" class="form-control CurrencyFormat" value="{{ $productionBudget->minimumLevel }}" placeholder="0.00">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" required name="maximumLevel[]"  readonly="readonly" class="form-control CurrencyFormat maximumLevel" value="{{ $productionBudget->maximumLevel }}" placeholder="0.00">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            {!! Form::close() !!}
            <div class="box-footer border-balanceSheet">
                <button type="submit" class="btn btn-info pull-right">Editar</button>
            </div>
        </div>




        <!-- /.row -->
    </section>
@endsection

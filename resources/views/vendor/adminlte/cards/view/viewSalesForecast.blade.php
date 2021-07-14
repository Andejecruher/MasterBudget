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
                {!! Form::open([ 'id' => 'productionBudgetForm']) !!}
                @csrf
                <input name="budget_id" class="hidden" value="{{ $budget->id }}">
                <input name="company_id" class="hidden" value="{{ $budget->company->id }}">

                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>Mes</th>
                        <th>Pronostico De Ventas (Unidades)</th>
                        <th>Precio De Venta (Unidad)</th>
                        <th>Presupuesto De Ventas</th>
                    </tr>
                    @foreach($salesForecast as $salesForecast)
                        <tr>
                            <td>
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast " style="background-color:#96ffbc;" value="{{ $salesForecast->month }}">
                            </td>
                            <td>
                                <input type="text" readonly="readonly" name="inventoryOfFinishedProducts[]" value="{{ $salesForecast->forecast }}" required class="form-control  CurrencyFormat "  placeholder="0.00">
                            </td>
                            <td>
                                <input type="text" readonly="readonly" name="productionInUnits[]"  required class="form-control AddTotal CurrencyFormat" value="{{ $salesForecast->price }}" placeholder="0.00">
                            </td>
                            <td>
                                <input type="text" readonly="readonly" required class="form-control CurrencyFormat" readonly="readonly" name="salesForecastInUnits[]" value="{{ $salesForecast->salesBudget }}" placeholder="0.00">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            {!! Form::close() !!}
            <div class="box-footer border-balanceSheet">
                <button type="submit"  class="btn btn-info pull-right">Editar</button>
            </div>
        </div>




        <!-- /.row -->
    </section>
@endsection

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
            <div class="box-header">
                {!! Form::open(['action' => 'Cards\StorageBudgetController@store', 'method' => 'post', 'id' => 'storageBudgetForm']) !!}
                @csrf
                <input name="budget_id" class="hidden" value="{{ $budget->id }}">
                <input name="company_id" class="hidden" value="{{ $budget->company->id }}">
                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <label class="text-center" for="">Capacidad De Almacenamiento</label>
                        <div class="input-icon">
                            <i>Unidades</i>
                            <input name="storage" id="storage" type="text" class="form-control text-right CurrencyFormat" onchange="maximumLevelAssign();">
                        </div>

                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <label class="text-center" for="">Porcentaje Minimo De Almacenmiento</label>
                        <div class="input-icon">
                            <i>%</i>
                            <input name="percentageStore" onchange="assignMinimumStorage();" id="percentageStore" min="1" max="100" type="text" class="form-control text-right" onkeypress="return filterFloat(event,this);">
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
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
                                            @foreach($salesForecast as $salesForecast)
                                            <tr>
                                                <td>
                                                    <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast " style="background-color:#96ffbc;" value="{{ $salesForecast->month }}">
                                                </td>
                                                <td>
                                                    <input type="text" required name="inventoryOfFinishedProducts[]" onchange="" required class="form-control  CurrencyFormat {{$salesForecast->month}} {{ $salesForecast->month."inventoryOfFinishedProducts" }}"  placeholder="0.00">
                                                </td>
                                                <td>
                                                    <input type="text" required name="productionInUnits[]" onchange="total(this.value);{{$salesForecast->month."FinishedProducts(this.value);"}}" required class="form-control AddTotal CurrencyFormat {{$salesForecast->month}} {{ $salesForecast->month."productionInUnits" }}"  placeholder="0.00">
                                                </td>
                                                <td>
                                                    <input type="text" required class="form-control CurrencyFormat {{ $salesForecast->month."salesForecastInUnits" }}" readonly="readonly" name="salesForecastInUnits[]" value="{{ $salesForecast->forecast }}" placeholder="0.00">
                                                </td>
                                                <td>
                                                    <input type="text" required name="finalInventoryOfFinishedProducts[]" readonly="readonly"  onchange="" required class="form-control CurrencyFormat {{ $salesForecast->month."finalInventoryOfFinishedProducts" }}"  placeholder="0.00">
                                                </td>
                                                <td class="content">
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <input type="text" required name="minimumLevel[]" onchange="" required class="form-control CurrencyFormat {{$salesForecast->month."minimumLevel"}}"  placeholder="0.00">
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input type="text" required name="maximumLevel[]" onchange="" required class="form-control CurrencyFormat maximumLevel {{$salesForecast->month."maximumLevel"}}"  placeholder="0.00">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast " style="background-color:#96ffbc;" value="Enero {{ $year+1 }}">
                                                </td>
                                                <td>
                                                    <input type="text" required name="inventoryOfFinishedProducts[]" onchange="" required class="form-control CurrencyFormat Enero19 Enero19inventoryOfFinishedProducts"  placeholder="0.00">
                                                </td>
                                                <td>
                                                    <input type="text" required name="productionInUnits[]"  required class="form-control CurrencyFormat Enero19 Enero19productionInUnits"   placeholder="0.00">
                                                </td>
                                                <td>
                                                    <input type="text" required onchange="Enero19FinishedProducts(this.value);" required class="form-control CurrencyFormat Enero19salesForecastInUnits" name="salesForecastInUnits[]" value="" placeholder="0.00">
                                                </td>
                                                <td>
                                                    <input type="text" required name="finalInventoryOfFinishedProducts[]" readonly="readonly"  onchange="" required class="form-control CurrencyFormat Enero19finalInventoryOfFinishedProducts" placeholder="0.00">
                                                </td>
                                                <td class="content">
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <input type="text" required name="minimumLevel[]" onchange="" required class="form-control CurrencyFormat Enero19minimumLevel"  placeholder="0.00">
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input type="text" required name="maximumLevel[]" onchange="" required class="form-control CurrencyFormat Enero19maximumLevel"  placeholder="0.00">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                    {!! Form::close() !!}
                            <div class="box-footer border-balanceSheet">
                                <button type="submit" id="productionBudgetSubmit" class="btn btn-info pull-right">Guardar</button>
                            </div>
                        </div>




        <!-- /.row -->
    </section>
@endsection

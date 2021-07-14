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
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['route' => 'salesForecast.store', 'method' => 'post', 'id' => 'SalesForecastForm']) !!}
                        @csrf
                        <input name="budget_id" class="hidden" value="{{ $budget->id }}">
                        <input name="company_id" class="hidden" value="{{ $budget->company->id }}">

                        <div class="row">
                            <div class="col-md-3">
                                <input type="text"  disabled class="form-control inputNotEditForecast" style="background-color:#00a7d0" value="Mes">
                            </div>
                            <div class="col-md-3 input-icon">
                                <input type="text" disabled class="form-control inputNotEditForecast" style="background-color:#00a7d0" value="Pronostico De Ventas (Unidades)">
                            </div>
                            <div class="col-md-3 input-icon">
                                <input type="text" disabled class="form-control inputNotEditForecast" style="background-color:#00a7d0" value="Precio De Venta (Unidad)">
                            </div>
                            <div class="col-md-3 input-icon">
                                <input type="text" disabled class="form-control inputNotEditForecast" style="background-color:#00a7d0" value="Presupuesto De Ventas">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast" style="background-color:#96ffbc;" value="Enero">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" required class="form-control CurrencyFormat JanuaryForecast Forecast" name="forecast[]" placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="price[]" onchange="JanuarySalesBudget();"  class="form-control CurrencyFormat JanuaryPrice"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]" id="JanuaryBudget"  class="form-control CurrencyFormat budget" readonly="readonly" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast" style="background-color:#96ffbc;" value="Febrero">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" required name="forecast[]"  class="form-control CurrencyFormat FebruaryForecast Forecast"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="price[]"  class="form-control CurrencyFormat FebruaryPrice" onchange="FebruarySalesBudget();"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]"  class="form-control CurrencyFormat" id="FebruaryBudget" readonly="readonly" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast" style="background-color:#96ffbc;" value="Marzo">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" name="forecast[]" required class="form-control CurrencyFormat MarchForecast Forecast"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="price[]"  class="form-control CurrencyFormat MarchPrice" onchange="MarchSalesBudget();" placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]"  class="form-control CurrencyFormat" id="MarchSupplyBudget" readonly="readonly" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast" style="background-color:#96ffbc;" value="Abril">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" required name="forecast[]"  class="form-control CurrencyFormat AprilForecast Forecast"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="price[]"   class="form-control CurrencyFormat AprilPrice" onchange="AprilSalesBudget();" placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]"  class="form-control CurrencyFormat" id="AprilSupplyBudget" readonly="readonly" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast" style="background-color:#96ffbc;" value="Mayo">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" required name="forecast[]"  class="form-control CurrencyFormat MayForecast Forecast"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="price[]"  class="form-control CurrencyFormat MayPrice" onchange="MaySalesBudget();"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]"  class="form-control CurrencyFormat" id="MaySupplyBudget" readonly="readonly" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast " style="background-color:#96ffbc;" value="Junio">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" required name="forecast[]"  class="form-control CurrencyFormat JuneForecast Forecast"   placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="price[]"  class="form-control CurrencyFormat JunePrice" onchange="JuneSalesBudget();"   placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]"  class="form-control CurrencyFormat" readonly="readonly" id="JuneSupplyBudget" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast" style="background-color:#96ffbc;" value="Julio">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" required name="forecast[]"  class="form-control CurrencyFormat JulyForecast Forecast"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="price[]"  class="form-control CurrencyFormat JulyPrice" onchange="JulySalesBudget()" placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]"  class="form-control CurrencyFormat" id="JulySupplyBudget" readonly="readonly" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast" style="background-color:#96ffbc;" value="Agosto">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" required name="forecast[]"  class="form-control CurrencyFormat AugustForecast Forecast"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="price[]"  class="form-control CurrencyFormat AugustPrice" onchange="AugustSalesBudget();"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]"  class="form-control CurrencyFormat" id="AugustSupplyBudget" readonly="readonly" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast" style="background-color:#96ffbc;" value="Septiembre">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" required name="forecast[]"  class="form-control CurrencyFormat SeptemberForecast Forecast"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="price[]"  class="form-control CurrencyFormat SeptemberPrice" onchange="SeptemberSalesBudget();" placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]"  class="form-control CurrencyFormat" id="SeptemberSupplyBudget" readonly="readonly" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast" style="background-color:#96ffbc;" value="Octubre">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" required name="forecast[]"  class="form-control CurrencyFormat OctoberForecast Forecast"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="price[]"  class="form-control CurrencyFormat OctoberPrice" onchange="OctoberSalesBudget()"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]"  class="form-control CurrencyFormat" id="OctoberSupplyBudget" readonly="readonly" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast" style="background-color:#96ffbc;" value="Noviembre">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" required name="forecast[]"  class="form-control CurrencyFormat NovemberForecast Forecast"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="price[]"  class="form-control CurrencyFormat NovemberPrice" onchange="NovemberSalesBudget();" placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]"  class="form-control CurrencyFormat" id="NovemberSupplyBudget" readonly="readonly" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecast" style="background-color:#96ffbc;" value="Diciembre">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" required name="forecast[]"  class="form-control CurrencyFormat DecemberForecast Forecast" onchange="Forecast();"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="price[]" required class="form-control CurrencyFormat DecemberPrice" onchange="DecemberSalesBudget();"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]"  class="form-control CurrencyFormat" id="DecemberSupplyBudget" readonly="readonly" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                                <input type="text" required readonly="readonly" name="month[]" class="form-control inputNotEditSaleForecastRight" style="background-color:#96ffbc;" value="Total">
                            </div>
                            <div class="col-md-3 ">
                                <input type="text" required name="forecast[]"  class="form-control CurrencyFormat" id="TotalForecast" placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="price[]"  class="form-control CurrencyFormat TotalPrice" onchange="ForecastTotal()"  placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" required name="salesBudget[]"  class="form-control CurrencyFormat" id="TotalSupplyBudget" readonly="readonly" placeholder="0.00">
                            </div>

                        </div>

                        <div class="box-footer border-balanceSheet">
                            <button type="submit" id="formsSubmit" class="btn btn-info pull-right">Guardar</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.row -->
    </section>
@endsection

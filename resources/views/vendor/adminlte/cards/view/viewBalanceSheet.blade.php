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
            <b>{{ $budget->day }}&nbsp; De&nbsp; {{$budget->month}}&nbsp; Del&nbsp;{{$budget->year}}</b>
        </p>


    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    @foreach($balanceSheet as $balanceSheet)
                    <div class="box-body">
                        <form action="{{ route('balanceSheet.update', [$budget->id]) }}" method="POST" id="balanceSheetUpdateForm">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <input name="budget_id" class="hidden" value="{{ $budget->id }}">
                        <input name="company_id" class="hidden" value="{{ $budget->company->id }}">
                        <div class="row">
                            <div class="col-md-12 ">
                                <label for="">Activos</label>
                                <br>
                                <label for="">Activos Circulantes</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Efectivo ">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="cash" readonly="readonly" value="{{ $balanceSheet->cash }}" required class="form-control currentAssets" onchange="AddCurrentAssets(this.value);" placeholder="0.00">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Cuentas Por Cobrar">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="accountsByCoop" readonly="readonly" value="{{ $balanceSheet->accountsByCoop }}" required class="form-control currentAssets" onchange="AddCurrentAssets(this.value);" placeholder="0.00">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Inventario De Materias Primas">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="rawMatriasInventory" readonly="readonly" value="{{ $balanceSheet->rawMatriasInventory }}" required class="form-control currentAssets" onchange="AddCurrentAssets(this.value);" placeholder="0.00">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Inventario De Productos Terminados">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="productInventoryFinished" readonly="readonly" value="{{ $balanceSheet->productInventoryFinished }}" required class="form-control currentAssets" onchange="AddCurrentAssets(this.value);" placeholder="0.00">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Inventario De Abastecimientos">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="inventoryOfSupplies" readonly="readonly" value="{{ $balanceSheet->inventoryOfSupplies }}" required class="form-control currentAssets" onchange="AddCurrentAssets(this.value);" placeholder="0.00">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditCenter" value="Total De Activos Circulantes">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2 input-icon">
                                <i>$</i>
                                <input type="text" name="totalActiveCirculating" required readonly="readonly" value="{{ $balanceSheet->totalActiveCirculating }}" id="TotalCurrentAssets" class="form-control totalAssets" onchange="TotalAssets(this.value);" placeholder="0.00">
                            </div>
                            <div class="col-md-12 ">
                                <label for="">Activos Fijos</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text"  disabled class="form-control inputNotEditSheet"  value="Terrenos">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="land" readonly="readonly" value="{{ $balanceSheet->land }}" required class="form-control CurrencyFormat sumOfAssets" id="land"  placeholder="0.00">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <input  type="text" disabled class="form-control inputNotEditSheet" value="Edificios">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="buildings" readonly="readonly" value="{{ $balanceSheet->buildings }}" required class="form-control CurrencyFormat FixedAssets" onchange="AddFixedAssets(this.value);" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control inputNone" style="background:none" disabled placeholder="" >
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Planta, Equipo y Vehiculos">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="plantEquipmentVehicles" readonly="readonly" value="{{ $balanceSheet->plantEquipmentVehicles }}" required class="form-control CurrencyFormat FixedAssets" onchange="AddFixedAssets(this.value);" placeholder="0.00">
                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control inputNone" style="background:none" disabled placeholder="" >
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Muebles y Enseres">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="furnitureEnseres" required readonly="readonly" value="{{ $balanceSheet->furnitureEnseres }}" class="form-control CurrencyFormat FixedAssets" onchange="AddFixedAssets(this.value);" placeholder="0.00">
                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control inputNone" style="background:none" disabled placeholder="" >
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditCenter" value="Total Activos Fijos">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="totalActivosFijos" required id="TotalFixedAssets"readonly="readonly" value="{{ $balanceSheet->totalActivosFijos }}" class="form-control CurrencyFormat AccumulatedDepreciation"  placeholder="0.00">
                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control inputNone" style="background:none" disabled placeholder="" >
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Menos: Depreciacion Acumulada">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="depreciation" required class="form-control CurrencyFormat AccumulatedDepreciation" id="AccumulatedDepreciation" onchange="Depreciation();SumAssets(this.value);Assets(this.value);"  readonly="readonly" value="{{ $balanceSheet->depreciation }}" placeholder="0.00">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="accumulatedDepreciation" required readonly="readonly" value="{{ $balanceSheet->accumulatedDepreciation }}" class="form-control CurrencyFormat sumOfAssets" id="LessAccumulatedDepreciation" placeholder="0.00">
                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Suma Activo Fijo">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2 input-icon">
                                <i>$</i>
                                <input type="text"  name="activeFix" required readonly="readonly" value="{{ $balanceSheet->activeFix }}" class="form-control CurrencyFormat totalAssets" id="SumOfAssets"  placeholder="0.00">
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditCenter" value="Activos Totales">
                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-2 input-icon">
                                <i>$</i>
                                <input type="text" name="totalActiveFix" required readonly="readonly" value="{{ $balanceSheet->totalActiveFix }}" class="form-control CurrencyFormat" id="TotalAssets" placeholder="0.00">
                            </div>
                            <div class="col-md-12 ">
                                <label for="">Pasivo y Capital Contable</label>
                            </div>
                            <div class="col-md-12 ">
                                <label for="">Pasivos</label>
                                <br>
                                <label for="">&nbsp;&nbsp;&nbsp;&nbsp;Pasivos Circulantes</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Cuentas Por Pagar">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="accountsByCoopPay" required class="form-control CurrencyFormat currentLiabilities" onchange="Liabilities(this.value);" readonly="readonly" value="{{ $balanceSheet->accountsByCoopPay }}" placeholder="0.00">
                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control inputNone" style="background:none" disabled placeholder="" >
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Hipotecas Por Pagar a Corto Plazo">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="mortgagesForPayingSmallSlapping" required class="form-control CurrencyFormat currentLiabilities" onchange="Liabilities(this.value);" readonly="readonly" value="{{ $balanceSheet->mortgagesForPayingSmallSlapping }}" placeholder="0.00">
                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control inputNone" style="background:none" disabled placeholder="" >
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Otros Acreedores Diversos">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="variousCreditors" required class="form-control CurrencyFormat currentLiabilities" onchange="Liabilities(this.value);" readonly="readonly" value="{{ $balanceSheet->variousCreditors }}" placeholder="0.00">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control inputNone" style="background:none" disabled placeholder="" >
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditCenter" value="Total Pasivo Circulante">
                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="totalPasivoCirculante" required readonly="readonly" value="{{ $balanceSheet->totalPasivoCirculante }}" class="form-control CurrencyFormat totalLiability" onchange="LiabilityTotal(this.value);"  id="CurrentLiabilities" placeholder="0.00">
                            </div>
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-12 ">
                                <label for="">&nbsp;&nbsp;&nbsp;&nbsp;Pasivos A Largo Plazo</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Hipotecas Por Pagar a Largo Plazo">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="payingLongSlapping" required class="form-control CurrencyFormat totalLiability" onchange="LiabilityTotal(this.value);" readonly="readonly" value="{{ $balanceSheet->payingLongSlapping }}" placeholder="0.00">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditCenter" value="Total De Pasivo">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2 input-icon">
                                <i>$</i>
                                <input type="text" name="totalPassive" required class="form-control CurrencyFormat AddaccountingCapital" readonly="readonly" value="{{ $balanceSheet->totalPassive }}" id="TotalLiability" placeholder="0.00">
                            </div>
                            <div class="col-md-12 ">
                                <label for="">&nbsp;&nbsp;&nbsp;&nbsp;Capital Contable</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Capital Social">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="socialCapital" required class="form-control CurrencyFormat accountingCapital" onchange="CapitalAccounting(this.value);" readonly="readonly" value="{{ $balanceSheet->socialCapital }}" placeholder="0.00">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Prima De Ventas De Acciones">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="actionSalesPrint" required class="form-control CurrencyFormat accountingCapital" onchange="CapitalAccounting(this.value);" readonly="readonly" value="{{ $balanceSheet->actionSalesPrint }}" placeholder="0.00">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditSheet" value="Utilidad Retenida">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3 input-icon">
                                <i>$</i>
                                <input type="text" name="retainedUtility" required class="form-control CurrencyFormat accountingCapital" onchange="CapitalAccounting(this.value);AddCapitalAccounting(this.value);" readonly="readonly" value="{{ $balanceSheet->retainedUtility }}" placeholder="0.00">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditCenter " value="Total Capital Contable">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2 input-icon">
                                <i>$</i>
                                <input type="text" name="capitalContable" required readonly="readonly" value="{{ $balanceSheet->capitalContable }}" class="form-control CurrencyFormat AddaccountingCapital" id="AccountingCapital" placeholder="0.00">
                            </div>
                            <div class="col-md-4">
                                <input type="text" disabled class="form-control inputNotEditCenter" value="Suma Del Pasivo y El Capital Contable">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2 input-icon">
                                <i>$</i>
                                <input type="text" name="passiveCapitalAccountable" required readonly="readonly" value="{{ $balanceSheet->passiveCapitalAccountable }}" class="form-control CurrencyFormat" id="AddCapital" placeholder="0.00">
                            </div>
                        </div>
                        <div class="box-footer border-balanceSheet hidden">
                            <button type="submit" id="formsSubmit" class="btn btn-info pull-right">Editat</button>
                        </div>

                        </form>
                        <div class="box-footer border-balanceSheet">
                            <button type="submit" id="formsSubmit" class="btn btn-info pull-right">Editat</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.row -->
    </section>
@endsection

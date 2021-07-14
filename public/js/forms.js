$(document).ready(function(){
    var maxField = 20; //Input fields increment limitation
    var addButton = $('.add_buttonProduction'); //Add button selector
    var wrapper = $('.productionDepartmentForm'); //Input field wrapper
    var fieldHTML = '<div class="form-group">\n' +
        '                                    <label for="" class="col-md-5 control-label">Departamento De Produccion :</label>\n' +
        '                                    <div class="col-md-6">\n' +
        '                                        <input name="name[]" class="form-control text-right"  placeholder="Nombre Del Departamento">\n' +
        '                                    </div>\n' +
        '                                    <a href="javascript:void(0);" class="remove_button col-md-1 remove_buttonProduction" title="Remove field"><i class="fas fa-minus-circle"></i></a>\n' +
        '                                </div>'; //New input field html
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

$(document).ready(function(){
    var x = 1;
    var maxField = 20; //Input fields increment limitation
    var addButton = $('.add_buttonService'); //Add button selector
    var wrapper = $('.serviceDepartmentForm');
    var fieldHTML = '<div class="form-group">\n' +
        '                                    <label for="" class="col-md-5 control-label">Departamento De Servicio :</label>\n' +
        '                                    <div class="col-md-6">\n' +
        '                                        <input name="name[]" type="text" class="form-control text-right"  placeholder="Nombre Del Servicio">\n' +
        '                                    </div>\n' +
        '                                    <a href="javascript:void(0);" class="remove_button col-md-1 remove_buttonService" title="Remove field"><i class="fas fa-minus-circle"></i></a>\n' +
        '                                </div>'; //New input field html
     //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML);
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

$('.add_buttonRaw').click(function(){
    $('.trtabletRawClone').clone().appendTo('#rawMaterials').addClass('clone');
    $('.clone').removeClass('trtabletRawClone');
    $('.clone #ico-raw').removeClass('fa-plus-circle').addClass('fa-minus-circle');
    $('.clone .opc').removeClass('add_buttonRaw').addClass('remove_buttonRaw').removeClass('add_button').addClass('remove_button').attr( "onclick", "removeRow(this);" );
});

function removeRow(t)
{
    var td = t.parentNode;
    var tr = td.parentNode;
    var table = tr.parentNode;
    table.removeChild(tr);
}

// Codigo JavaScript Indispensable para el desarrollo de las cedulas del Presupuesto Maestro Formatos y Operaciones

//Analizar que un input reciba valores numericos con 2 decimales
function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{
            return true;
        }
    }else{
        if(key == 8 || key == 13 || key == 0) {
            return true;
        }else if(key == 46){
            if(filter(tempValue)=== false){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/;
    if(preg.test(__val__) === true){
        return true;
    }else{
        return false;
    }
}
//Analizar que un input reciba valores numericos con 4 decimales
function filterFloat4(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter4(tempValue)=== false){
            return false;
        }else{
            return true;
        }
    }else{
        if(key == 8 || key == 13 || key == 0) {
            return true;
        }else if(key == 46){
            if(filter4(tempValue)=== false){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
}
function filter4(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,4})$/;
    if(preg.test(__val__) === true){
        return true;
    }else{
        return false;
    }
}
//Funcion para cconvertir una cadena en un numero que se pueda sumar
function replaceAll( text, busca, reemplaza ){
    while (text.toString().indexOf(busca) != -1)
        text = text.toString().replace(busca,reemplaza);
    return text;
}
//Funcion para dat un Formato de moneda a un input o Valor
function formatNumber(num) {
    if (!num || num == 'NaN') return '-';
    if (num == 'Infinity') return '&#x221e;';
    num = num.toString().replace(/\$|\,/g, '');
    if (isNaN(num))
        num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();
    if (cents < 10)
        cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3) ; i++)
        num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
    return (((sign) ? '' : '-') + num + '.' + cents);
}
// Realizar Sumatoria de activos circulantes
function AddCurrentAssets() {

    var total = 0;

    $(".currentAssets").each(function() {


        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {

            total += 0;

        } else {
            total += parseFloat(replaceAll($(this).val(), ",",""));
            //alert(total);
        }

    });

    $("#TotalCurrentAssets").val(formatNumber(total)).css('background-color', '#bbd5f9');
    //document.getElementById('TotalCurrentAssets').val = total;
}
//Realizar Suma De Activos Fijos
function AddFixedAssets() {

    var total = 0;

    $(".FixedAssets").each(function() {


        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {

            total += 0;

        } else {
            total += parseFloat(replaceAll($(this).val(), ",",""));
            //alert(total);
        }
    });

    $("#TotalFixedAssets").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}

// Funcion Para Restar La Depreciacion Acumulada
function Depreciation() {
    var num1 =  $("#TotalFixedAssets").val()
    var num2 =  $("#AccumulatedDepreciation").val();

    var total = replaceAll(num1,",","") - replaceAll(num2,",","");

    $("#LessAccumulatedDepreciation").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}

//Realizar Suma De Activos Fijos
function SumAssets(){
    var total = 0;
    $(".sumOfAssets").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            total += 0;
        } else {
            total += parseFloat(replaceAll($(this).val(), ",",""));
            //alert(total);
        }
    });
    $("#SumOfAssets").val(formatNumber(total)).css('background-color', '#bbd5f9');
    //document.getElementById('TotalCurrentAssets').val = total;
}

//Realizar la suma de los Activos Totales
function Assets(){
    var total = 0;
    $(".totalAssets").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            total += 0;
        } else {
            total += parseFloat(replaceAll($(this).val(), ",",""));
            //alert(total);
        }
    });
    $("#TotalAssets").val(formatNumber(total)).css('background-color', '#bbd5f9');
    //document.getElementById('TotalCurrentAssets').val = total;
}

function Liabilities(){
    var total = 0;
    $(".currentLiabilities").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            total += 0;
        } else {
            total += parseFloat(replaceAll($(this).val(), ",",""));
            //alert(total);
        }
    });
    $("#CurrentLiabilities").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}
//Realizar Suma De El Total De Pasivos

function LiabilityTotal(){
    var total = 0;
    $(".totalLiability").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            total += 0;
        } else {
            total += parseFloat(replaceAll($(this).val(), ",",""));
            //alert(total);
        }
    });
    $("#TotalLiability").val(formatNumber(total)).css('background-color', '#bbd5f9');
    //document.getElementById('TotalCurrentAssets').val = total;
}
// Realizar Suma De Capital Contable
function CapitalAccounting(){
    var total = 0;
    $(".accountingCapital").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            total += 0;
        } else {
            total += parseFloat(replaceAll($(this).val(), ",",""));
            //alert(total);
        }
    });
    $("#AccountingCapital").val(formatNumber(total)).css('background-color', '#bbd5f9');
    //document.getElementById('TotalCurrentAssets').val = total;
}

//Realizar Suma Del Pasivo y El Capital Contable
function AddCapitalAccounting(){
    var total = 0;
    $(".AddaccountingCapital").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            total += 0;
        } else {
            total += parseFloat(replaceAll($(this).val(), ",",""));
            //alert(total);
        }
});
    $("#AddCapital").val(formatNumber(total)).css('background-color', '#bbd5f9');
    //document.getElementById('TotalCurrentAssets').val = total;
}

//Funcion Para Dar Formato A Un Input En Su Captura
$(".currentAssets").on({
    "focus": function(event) {
        $(event.target).select();
    },
    "keyup": function(event) {
        $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});

//Funcion Para Dar Formato A Un Input En Su Captura
$(".CurrencyFormat").on({
    "focus": function(event) {
        $(event.target).select();
    },
    "keyup": function(event) {
        $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});

// Calcular Presupuesto de ventas de Enero
function JanuarySalesBudget() {
    var num1 =  $(".JanuaryForecast").val();
    var num2 =  $(".JanuaryPrice").val();

    var total = replaceAll(num1,",","") * replaceAll(num2,",","");

    $("#JanuaryBudget").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}
// Calcular Presupuesto de ventas de Febrero
function FebruarySalesBudget() {
    var num1 =  $(".FebruaryForecast").val();
    var num2 =  $(".FebruaryPrice").val();

    var total = replaceAll(num1,",","") * replaceAll(num2,",","");

    $("#FebruaryBudget").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}
// Calcular Presupuesto de ventas de Marzo
function MarchSalesBudget() {
    var num1 =  $(".MarchForecast").val();
    var num2 =  $(".MarchPrice").val();

    var total = replaceAll(num1,",","") * replaceAll(num2,",","");

    $("#MarchSupplyBudget").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}
//calcular Presupuesto De Ventas Abril
function AprilSalesBudget() {
    var num1 =  $(".AprilForecast").val();
    var num2 =  $(".AprilPrice").val();

    var total = replaceAll(num1,",","") * replaceAll(num2,",","");

    $("#AprilSupplyBudget").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}
//Calcular Presupuesto De Ventas Mayo
function MaySalesBudget() {
    var num1 =  $(".MayForecast").val();
    var num2 =  $(".MayPrice").val();

    var total = replaceAll(num1,",","") * replaceAll(num2,",","");

    $("#MaySupplyBudget").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}
//Calcular Presupuesto De Ventas Junio
function JuneSalesBudget() {
    var num1 =  $(".JuneForecast").val();
    var num2 =  $(".JunePrice").val();

    var total = replaceAll(num1,",","") * replaceAll(num2,",","");

    $("#JuneSupplyBudget").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}
//Calcular Presupuesto De Ventas Julio
function JulySalesBudget() {
    var num1 =  $(".JulyForecast").val();
    var num2 =  $(".JulyPrice").val();

    var total = replaceAll(num1,",","") * replaceAll(num2,",","");

    $("#JulySupplyBudget").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}
//Calcular Presupuesto De Ventas Agosto
function AugustSalesBudget() {
    var num1 =  $(".AugustForecast").val();
    var num2 =  $(".AugustPrice").val();

    var total = replaceAll(num1,",","") * replaceAll(num2,",","");

    $("#AugustSupplyBudget").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}
//Calcular Presupuesto De Ventas Septiembre
function SeptemberSalesBudget() {
    var num1 =  $(".SeptemberForecast").val();
    var num2 =  $(".SeptemberPrice").val();

    var total = replaceAll(num1,",","") * replaceAll(num2,",","");

    $("#SeptemberSupplyBudget").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}
//Calcular Presupuesto De Ventas Octubre
function OctoberSalesBudget() {
    var num1 =  $(".OctoberForecast").val();
    var num2 =  $(".OctoberPrice").val();

    var total = replaceAll(num1,",","") * replaceAll(num2,",","");

    $("#OctoberSupplyBudget").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}
//Calcular Presupuesto De Ventas Noviembre
function NovemberSalesBudget() {
    var num1 = $(".NovemberForecast").val();
    var num2 = $(".NovemberPrice").val();

    var total = replaceAll(num1, ",", "") * replaceAll(num2, ",", "");

    $("#NovemberSupplyBudget").val(formatNumber(total));
    //document.getElementById('TotalCurrentAssets').val = total;
}
//Calcular Presupuesto De Ventas Diciembre
function DecemberSalesBudget() {
    var num1 =  $(".DecemberForecast").val();
    var num2 =  $(".DecemberPrice").val();

    var total = replaceAll(num1,",","") * replaceAll(num2,",","");
    $("#DecemberSupplyBudget").val(formatNumber(total));
        //document.getElementById('TotalCurrentAssets').val = total;
}
//Realizar Suma Del Pronostico De Ventas
function Forecast(){
    var total = 0;
    $(".Forecast").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            total += 0;
        } else {
            total += parseFloat(replaceAll($(this).val(), ",",""));
            //alert(total);
        }
    });
    $("#TotalForecast").val(formatNumber(total)).css('background-color', '#bbd5f9');
    //document.getElementById('TotalCurrentAssets').val = total;
}
//Realizar Calculo Total Del Presupuesto De Ventas
function ForecastTotal(){
    var num1 =  $("#TotalForecast").val();
    var num2 =  $(".TotalPrice").val();

    var total = replaceAll(num1,",","") * replaceAll(num2,",","");
    $("#TotalSupplyBudget").val(formatNumber(total)).css('background-color', '#bbd5f9');
    //document.getElementById('TotalCurrentAssets').val = total;
}

//Realizar Submit En Formularios ProductionBudget
$( "#productionBudgetSubmit" ).click(function() {
    $( "#storageBudgetForm" ).submit();
    $( "#productionBudgetForm" ).submit();
});

//Codigo Necesario Para Realizar Logica De La Cedula De Presupuesto De Produccion
//Asignar Almacenamiento Maximo
function maximumLevelAssign() {
    $(".TotalmaximumLevel").removeClass("maximumLevel");
    var maximum = $("#storage").val();
    $(".maximumLevel").val(formatNumber(maximum)).css('background-color', '#bbd5f9');
}
function assignMinimumStorage(){
    var percentage = $("#percentageStore").val();
    var enero = $(".FebrerosalesForecastInUnits").val();
    var febrero = $(".MarzosalesForecastInUnits").val();
    var marzo = $(".AbrilsalesForecastInUnits").val();
    var abril = $(".MayosalesForecastInUnits").val();
    var mayo = $(".JuniosalesForecastInUnits").val();
    var junio = $(".JuliosalesForecastInUnits").val();
    var julio = $(".AgostosalesForecastInUnits").val();
    var agosto = $(".SeptiembresalesForecastInUnits").val();
    var septiembre = $(".OctubresalesForecastInUnits").val();
    var octubre = $(".NoviembresalesForecastInUnits").val();
    var noviembre = $(".DiciembresalesForecastInUnits").val();
    var eneroMinimun = 0;
    var febreroMinimun = 0;
    var marzoMinimun = 0;
    var abrilMinimun = 0;
    var mayoMinimun = 0;
    var junioMinimun = 0;
    var julioMinimun = 0;
    var agostoMinimun = 0;
    var septiembreMinimun = 0;
    var octubreMinimun = 0;
    var noviembreMinimun = 0;


    if (percentage > 100){
        alert("Dato Ingresado Fuera De Rango !!");
    }
    else{
        eneroMinimun = replaceAll(enero,",","") * replaceAll(percentage,",","");
        $(".EnerominimumLevel").val(formatNumber(eneroMinimun/100));
        febreroMinimun = replaceAll(febrero,",","") * replaceAll(percentage,",","");
        $(".FebrerominimumLevel").val(formatNumber(febreroMinimun/100));
        marzoMinimun = replaceAll(marzo,",","") * replaceAll(percentage,",","");
        $(".MarzominimumLevel").val(formatNumber(marzoMinimun/100));
        abrilMinimun = replaceAll(abril,",","") * replaceAll(percentage,",","");
        $(".AbrilminimumLevel").val(formatNumber(abrilMinimun/100));
        mayoMinimun = replaceAll(mayo,",","") * replaceAll(percentage,",","");
        $(".MayominimumLevel").val(formatNumber(mayoMinimun/100));
        junioMinimun = replaceAll(junio,",","") * replaceAll(percentage,",","");
        $(".JuniominimumLevel").val(formatNumber(junioMinimun/100));
        julioMinimun = replaceAll(julio,",","") * replaceAll(percentage,",","");
        $(".JuliominimumLevel").val(formatNumber(julioMinimun/100));
        agostoMinimun = replaceAll(agosto,",","") * replaceAll(percentage,",","");
        $(".AgostominimumLevel").val(formatNumber(agostoMinimun/100));
        septiembreMinimun = replaceAll(septiembre,",","") * replaceAll(percentage,",","");
        $(".SeptiembreminimumLevel").val(formatNumber(septiembreMinimun/100));
        octubreMinimun = replaceAll(octubre,",","") * replaceAll(percentage,",","");
        $(".OctubreminimumLevel").val(formatNumber(octubreMinimun/100));
        noviembreMinimun = replaceAll(noviembre,",","") * replaceAll(percentage,",","");
        $(".NoviembreminimumLevel").val(formatNumber(noviembreMinimun/100));
    }

}

function EneroFinishedProducts() {
    var total = 0;
    var suma = 0;
    $(".Enero").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".EnerosalesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".EnerofinalInventoryOfFinishedProducts").val(formatNumber(total));
    $(".FebreroinventoryOfFinishedProducts").val(formatNumber(total));
    $(".TotalinventoryOfFinishedProducts").val(formatNumber(num3));
}

function FebreroFinishedProducts() {
    var total = 0;
    var suma = 0;
    $(".Febrero").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".FebrerosalesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".FebrerofinalInventoryOfFinishedProducts").val(formatNumber(total));
    $(".MarzoinventoryOfFinishedProducts").val(formatNumber(total));
}

function MarzoFinishedProducts() {
    var total = 0;
    var suma = 0;
    $(".Marzo").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".MarzosalesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".MarzofinalInventoryOfFinishedProducts").val(formatNumber(total));
    $(".AbrilinventoryOfFinishedProducts").val(formatNumber(total));
}

function AbrilFinishedProducts() {
    var total = 0;
    var suma = 0;
    $(".Abril").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".AbrilsalesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".AbrilfinalInventoryOfFinishedProducts").val(formatNumber(total));
    $(".MayoinventoryOfFinishedProducts").val(formatNumber(total));
}

function MayoFinishedProducts() {
    var total = 0;
    var suma = 0;
    $(".Mayo").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".MayosalesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".MayofinalInventoryOfFinishedProducts").val(formatNumber(total));
    $(".JunioinventoryOfFinishedProducts").val(formatNumber(total));
}

function JunioFinishedProducts() {
    var total = 0;
    var suma = 0;
    $(".Junio").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".JuniosalesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".JuniofinalInventoryOfFinishedProducts").val(formatNumber(total));
    $(".JulioinventoryOfFinishedProducts").val(formatNumber(total));
}

function JulioFinishedProducts() {
    var total = 0;
    var suma = 0;
    $(".Julio").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".JuliosalesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".JuliofinalInventoryOfFinishedProducts").val(formatNumber(total));
    $(".AgostoinventoryOfFinishedProducts").val(formatNumber(total));
}

function AgostoFinishedProducts() {
    var total = 0;
    var suma = 0;
    $(".Agosto").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".AgostosalesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".AgostofinalInventoryOfFinishedProducts").val(formatNumber(total));
    $(".SeptiembreinventoryOfFinishedProducts").val(formatNumber(total));
}

function SeptiembreFinishedProducts() {
    var total = 0;
    var suma = 0;
    $(".Septiembre").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".SeptiembresalesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".SeptiembrefinalInventoryOfFinishedProducts").val(formatNumber(total));
    $(".OctubreinventoryOfFinishedProducts").val(formatNumber(total));
}

function OctubreFinishedProducts() {
    var total = 0;
    var suma = 0;
    $(".Octubre").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".OctubresalesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".OctubrefinalInventoryOfFinishedProducts").val(formatNumber(total));
    $(".NoviembreinventoryOfFinishedProducts").val(formatNumber(total));
}

function NoviembreFinishedProducts() {
    var total = 0;
    var suma = 0;
    $(".Noviembre").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".NoviembresalesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".NoviembrefinalInventoryOfFinishedProducts").val(formatNumber(total));
    $(".DiciembreinventoryOfFinishedProducts").val(formatNumber(total));
}

function DiciembreFinishedProducts() {
    var total = 0;
    var suma = 0;
    $(".Diciembre").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".DiciembresalesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".DiciembrefinalInventoryOfFinishedProducts").val(formatNumber(total));
    $(".Enero19inventoryOfFinishedProducts").val(formatNumber(total));
    $(".TotalfinalInventoryOfFinishedProducts").val(formatNumber(total));

}
function Enero19FinishedProducts() {
    var total = 0;
    var suma = 0;
    var diciembreMinimun = 0;
    var percentage = $("#percentageStore").val();
    $(".Enero19").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            suma += 0;
        } else {
            suma += parseFloat(replaceAll($(this).val(), ",",""));
        }
    });
    var num3 = $(".Enero19salesForecastInUnits").val();
    total = suma - replaceAll(num3,",","");
    $(".Enero19finalInventoryOfFinishedProducts").val(formatNumber(total));
    diciembreMinimun = replaceAll(num3,",","") * replaceAll(percentage,",","");
    $(".DiciembreminimumLevel").val(formatNumber(diciembreMinimun/100));
}
function total() {
    var total = 0;
    $(".TotalproductionInUnits").removeClass('AddTotal');
    $(".AddTotal").each(function() {
        if (isNaN(parseFloat(replaceAll($(this).val(), ",","")))) {
            total += 0;
        } else {
            total += parseFloat(replaceAll($(this).val(), ",",""));
        }
        $(".TotalproductionInUnits").val(formatNumber(total));
    });
}

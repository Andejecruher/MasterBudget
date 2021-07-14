<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">

            @switch($menu)
                @case(1)
                <li class="treeview">
                    <a href="#"><i class='fa fa-filter '></i> <span>Opciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ url('/home') }}"><i class='fa fa-list'></i> <span>Listar Presupuestos Maestro</span></a></li>
                        <li class=""><a href="#" data-toggle="modal" data-target="#modal-default"><i class='fa fa-file' ></i> <span>Crear Presupuestos Maestro</span></a></li>
                    </ul>
                </li>
                <li class="header">{{ trans('adminlte_lang::message.list') }}</li>
                <!-- Optionally, you can add icons to the links -->
                @foreach($budget as $budget)
                <li class=""><a href="{{ route('budget.show', $budget->id) }}"><i class='fa fa-building '></i> <span>{{ $budget->company->name }}</span></a></li>
                @endforeach

                @break

                @case(2)
                <li class="treeview">
                    <a href="#"><i class='fa fa-filter '></i> <span>Opciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ url('/home') }}"><i class='fa fa-list'></i> <span>Listar Presupuestos Maestros</span></a></li>
                    </ul>
                </li>
                <li class="header">Informacion De La Empresa</li>
                <li><a href="{{ route('budget.show', $budget->id) }}"><i class='fa fa-building'></i> <span>Datos De La Empresa</span></a></li>
                <li><a href="{{ route('production.show',$budget->id)}}"><i class='fa fa-file'></i> <span>Departamentos De Produccion</span></a></li>
                <li><a href="{{ route('rawMaterials.show', $budget->id) }}"><i class='fa fa-file'></i> <span>Materias Primas</span></a></li>
                <li><a href="{{ route('service.show',$budget->id)}}"><i class='fa fa-file'></i> <span>Departamentos De Servicios</span></a></li>
                <li><a href="{{ route('standardCost.show', $budget->id) }}"><i class='fa fa-file'></i> <span>Costo Estandar De Produccion</span></a></li>
                <li><a href="{{ route('standardHours.show', $budget->id) }}"><i class='fa fa-file'></i> <span>Costo De Horas Estandar De Mano De Obra</span></a></li>
                <li class="header">Cedulas Del Presupuesto Maestro</li>
                <!-- Optionally, you can add icons to the links -->
                <li><a href="{{ route('balanceSheet.show', $budget->id) }}"><i class='fa fa-file'></i> <span>Balance General Inicial</span></a></li>
                <li><a href="{{ route('salesForecast.show', $budget->id) }}"><i class='fa fa-file'></i> <span>Presupuesto De Ventas En Unidades</span></a></li>
                <li><a href="{{ route('productionBudget.show', $budget->id) }}"><i class='fa fa-file'></i> <span>Presupuesto De Produccion</span></a></li>
                <li><a href="#"><i class='fa fa-file'></i> <span>Operaciones Departamentales</span></a></li>
                <li><a href="#"><i class='fa fa-file'></i> <span>Gasto De Ventas</span></a></li>
                <li><a href="#"><i class='fa fa-file'></i> <span>Compras y Consumo De Materiales</span></a></li>
                <li><a href="#"><i class='fa fa-file'></i> <span>Requerimientos De Horas De Trabajo</span></a></li>
                <li><a href="#"><i class='fa fa-file'></i> <span>Costo De Mano Obra Directa</span></a></li>
                <li><a href="#"><i class='fa fa-file'></i> <span>Gastos De Fabricacion</span></a></li>
                <li><a href="#"><i class='fa fa-file'></i> <span>Gastos Generales y De Administracion</span></a></li>
                <li><a href="#"><i class='fa fa-file'></i> <span>Presupuesto De Capital</span></a></li>
                <li><a href="#"><i class='fa fa-file'></i> <span>Presupuesto De Costo De Ventas</span></a></li>
                <li><a href="#"><i class='fa fa-file'></i> <span>Estado De Resultado Proyectado</span></a></li>
                <li><a href="#"><i class='fa fa-file'></i> <span>Presupuesto De Efectivo</span></a></li>
                <li><a href="#"><i class='fa fa-file'></i> <span>Balance General Proyectado</span></a></li>
                @break


                @default
                <li class="treeview">
                    <a href="#"><i class='fa fa-filter '></i> <span>Opciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ url('/home') }}"><i class='fa fa-list'></i> <span>Listar Presupuestos Maestros</span></a></li>
                        <li class=""><a href="#" data-toggle="modal" data-target="#modal-default"><i class='fa fa-file' ></i> <span>Crear Presupuestos Maestro</span></a></li>
                    </ul>
                </li>
                <li class="header">{{ trans('adminlte_lang::message.list') }}</li>
                <!-- Optionally, you can add icons to the links -->
                @foreach($budget as $budget)
                    <li class=""><a href="{{ route('budget.show', $budget->id) }}"><i class='fa fa-building '></i> <span>{{ $budget->company->name }}</span></a></li>
                @endforeach

            @endswitch

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

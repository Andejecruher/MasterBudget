<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue  sidebar-mini">
<div id="app" v-cloak>
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Crear Empresa</h4>
                    </div>
                    <form action="{{ route('company.store') }}" method="POST">
                        <div class="modal-body">
                            <div class="form-group">

                                @csrf
                                <label for="Empresa">Nombre De La Empresa</label>
                                <input name="name" type="text" class="form-control" placeholder="Nombre De La Empresa">
                                <label for="Product">Nombre Del Producto</label>
                                <input name="product" type="text" class="form-control" placeholder="Nombre Del Producto">
                            {{ csrf_field() }} <!-- this is important for generate token -->
                                <label for="date">Fecha Del Balance General Inicial</label>
                                <input name="day" min="1" pattern="^[0-9]+" type="number" class="form-control" placeholder="Dia">
                                <input name="month" type="text" class="form-control" placeholder="Mes">
                                <input name="year" type="number" min="1" pattern="^[0-9]+" type="text" class="form-control" placeholder="Año">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <div class="content-wrapper">
            <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show

</body>
</html>

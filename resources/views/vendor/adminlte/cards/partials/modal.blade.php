    <!-- modal -->
    <div class="modal fade" id="modal-editCompany">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Empresa</h4>
                </div>
                <form action="{{ route('company.update', [$budget->id]) }}" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <label for="Empresa">Nombre De La Empresa</label>
                            <input name="name" type="text" class="form-control" value="{{ $budget->company->name }}" placeholder="Nombre De La Empresa">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-6 control-label">Dia :</label>
                                    <div class="col-sm-6">
                                        <input name="day" min="1" pattern="^[0-9]+" type="number" class="form-control" value="{{ $budget->day }}" placeholder="Dia">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-6 control-label">Mes :</label>
                                    <div class="col-sm-6">
                                        <input name="month" type="text" class="form-control" value="{{ $budget->month }}" placeholder="Mes">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-6 control-label">Año :</label>
                                    <div class="col-sm-6">
                                        <input name="year" type="number" min="1" pattern="^[0-9]+" type="text" value="{{ $budget->year }}" class="form-control" placeholder="Año">                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer updateCompany">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- modal -->
    <div class="modal fade" id="modal-product">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Nombre Del Producto</h4>
                </div>
                <form action="{{ route('product.update', [$budget->id]) }}" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <label for="Empresa">Nombre Del Producto</label>
                            <input name="name" type="text" class="form-control" value="{{ $budget->product->name }}" placeholder="Nombre Del Producto">
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
    <!-- /.modal -->
<!-- modal -->
<div class="modal fade" id="modal-add-production">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Departamento De Produccion</h4>
            </div>
            {!! Form::open(['url' => ['production/ajax'], 'method' =>'POST','id' => 'form-create-departmentProduction']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <label for="">Nombre Del Departamento</label>
                        <input name="name" type="text" class="form-control" value="" placeholder="Nombre Del Departamento">
                        <input name="budget_id" class="hidden" value="{{ $budget->id }}">
                        <input name="company_id" class="hidden" value="{{ $budget->company->id }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary" id="insert">Guardar</button>
                </div>
            {{ Form::close() }}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


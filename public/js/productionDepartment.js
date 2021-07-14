$(document).ready(function() {
   $('.btn-delete').click(function (e) {
       e.preventDefault();
       var row = $(this).parents('tr');
       var id = row.data('id');
       var form = $('#form-delete-departmentProduction');
       var url = form.attr('action').replace(':DEP_ID', id);
       var data = form.serialize();
       row.fadeOut();
       $.post(url, data, function (result) {
           alert(result.message);
       }).fail(function () {
           alert("El Departamento No Fue Eliminado");
           row.show();
       });
   });
});
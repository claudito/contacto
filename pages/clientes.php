
<div class="row">
  
<div class="col-md-12">
 
<div class="pull-right">
<div class="form-group">
<button class="btn btn-primary btn-agregar"><i class="fa fa-plus"></i> Agregar</button>
</div>
</div>

  
    <div class="table-responsive">
     	<table id="consulta"  class="table table-hover table-condensend" style="font-size: 12px">
     		<thead>
     			<tr class="table-active">
              <th>Id</th>
              <th>Código</th>
              <th>Nombres</th>
              <th>Tipo DOC</th>
              <th>DOC</th>
              <th></th>
                    

                      
     			</tr>
     		</thead>
     	</table>
     </div>

</div>

</div>

</div>




<!-- Modal Registro -->
<form id="registro" autocomplete="off">
<div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

     <input type="hidden" name="id" class="id">
     <input type="hidden" name="type" class="type">
      




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary btn-submit">submit</button>
      </div>
    </div>
  </div>
</div>
</form>






<script>
function loadData()
{

 $(document).ready(function (){

//$("#consulta").dataTable().fnDestroy();
$('#consulta').dataTable({

 //"order": [[ 4, "desc" ]],
//dom: 'Bfrtip',
"destroy":true,
 "deferRender": true,
"bAutoWidth": false,
"iDisplayLength": 25,
"language": {
"url": "assets/js/spanish.json"
},
"bProcessing": true,
"sAjaxSource": "sources/clientes?op=1",
"aoColumns": [

{ mData: 'id'},
{ mData: 'Nombre'},
{ mData: 'CodigoCliente'},
{ mData: 'TipoDocumento'},
{ mData: 'CIF'},
{ mData:  null,render:function(data){

acciones  = '<button type="button" class="btn btn-primary btn-edit btn-sm" data-id="'+data.id+'"><i class="fa fa-edit"></i></button>';
return acciones;

}}


]

});

 });

}
//Cargar Data
loadData();




//Cargar Modal Agregar
$(document).on('click','.btn-agregar',function (e){

e.stopImmediatePropagation();

 $('.btn-submit').html('Agregar');
 $('.modal-title').html('Agregar');
 $('#modal-registro').modal('show');

});


//Cargar Modal Actualizar
$(document).on('click','.btn-edit',function (e){

 e.stopImmediatePropagation();



 $('.btn-submit').html('Actualizar');
 $('.modal-title').html('Actualizar');
 $('#modal-registro').modal('show');

});








</script>


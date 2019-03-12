
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
              <th>Item</th>
              <th>Descripción</th>
              <th>Icono</th>
              <th></th>
              

                      
     			</tr>
     		</thead>
     	</table>
     </div>

</div>

</div>

<!-- Modal Registro -->
<form id="registro" autocomplete="off">
<div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title-registro" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <input type="hidden" name="id" class="id">
      <input type="hidden" name="tipo" class="tipo">

    <div class="form-group">
    <label>Descripción</label>
    <input type="text" name="descripcion" class="descripcion form-control" placeholder="Nombre del Menú" required>
    </div>


    <div class="form-group">
    <label>Icono</label>
    <input type="text" name="icono" class="icono form-control" placeholder="Icono" required>
    </div>


    <div class="form-group">
    <label>Item</label>
    <input type="number" min="1"  name="item" class="item form-control" placeholder="Item" required>
    </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="submit" value="" class="btn btn-primary btn-submit">
      </div>
    </div>
  </div>
</div>
</form>


<script>
function loadData()
{

 $(document).ready(function (){

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
"sAjaxSource": "sources/menu?op=1",
"aoColumns": [

{ mData: 'item'},
{ mData: 'descripcion'},

{ mData: null,render:function(data){

 icon = '<i class="'+data.icon+' fa-2x"></i>';
 
 return icon;

}},
{ mData: null,render:function(data){

 acciones = '<button class="btn btn-primary btn-edit btn-sm" data-id="'+data.id+'"><i class="fa fa-edit"></i></button>';

 return acciones;

}}


]

});

 });

}
//Cargar Data
loadData();

//Cargal Modal Agregar
$(document).on('click','.btn-agregar',function (e){

$('#registro')[0].reset();

$('.modal-title').html('Agregar');
$('.tipo').val('agregar');
$('.btn-submit').attr('value','Agregar');
$('#modal-registro').modal('show');

})


//Cargal Modal Actualizar
$(document).on('click','.btn-edit',function (e){

$('#registro')[0].reset();

id = $(this).data('id');
$('.id').val(id);

$('.modal-title').html('Actualizar');
$('.tipo').val('actualizar');
$('.btn-submit').attr('value','Actualizar');

url = "sources/menu.php?op=2";

$.getJSON(url,{"id":id},function(data){

$('.descripcion').val(data.descripcion);
$('.icono').val(data.icon);
$('.item').val(data.item);

$('#modal-registro').modal('show');

});

})


//Registro
$(document).on('submit','#registro',function (e){

parametros = $(this).serialize();

$.ajax({

url:"sources/menu.php?op=3",
type:"POST",
dataType :"JSON",
data:parametros,
beforeSend:function()
{

swal({
  title: "Cargando",
  imageUrl:"assets/img/loader2.gif",
  text:  "Espere un momento, no cierre la ventana.",
  timer: 3000,
  showConfirmButton: false
});

},
success:function(data)
{


if(data.type=='warning')
{

swal({
  title: data.title,
  type:  data.type,
  text:  data.text,
  timer: 3000,
  showConfirmButton: false
});


}
else
{

swal({
  title: data.title,
  type:  data.type,
  text:  data.text,
  timer: 3000,
  showConfirmButton: false
});

loadData();

$('#modal-registro').modal('hide');


}


}

});


e.preventDefault();
})


</script>

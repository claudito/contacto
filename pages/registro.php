<!-- Selectize -->
<link rel="stylesheet" href="https://selectize.github.io/selectize.js/css/selectize.default.css" >
<script src="https://selectize.github.io/selectize.js/js/selectize.js"></script>

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
              <th></th>
              <th>Id</th>
              <th>Fecha</th>
              <th>Operación</th>
              <th>Estado</th>
              <th>IMEI</th>
              <th>Telefóno</th>
              <th>PVP</th>
              <th>Cliente</th>
              <th>Nombre</th>

                    

                      
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
  <div class="modal-dialog modal-xl" role="document">
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



<div class="form-group row">
<label  class="col-sm-2 col-form-label">Fecha</label>
<div class="col-sm-3">
<input type="date"  class="form-control" name="fecha" value="<?=  date('Y-m-d') ?>" required>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Cliente</label>
<div class="col-sm-1">
<button  type="button" class="btn btn-success btn-nuevo-cliente"><i class="fa fa-plus"></i></button>
</div>
<div class="col-sm-9">
<select   class="demo-default cliente" name="cliente" required placeholder="Buscar Cliente"></select>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Id Order</label>
<div class="col-sm-3">
<input type="number"  class="form-control" name="id_order" min="1" required>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Modelo</label>
<div class="col-sm-5">
<select   class="form-control modelo" name="modelo" required></select>
</div>
<div class="col-sm-2">
<div class="checkbox"><label><input type="checkbox"   class="">Mostra Solo Stock</label></div>
</div>
<div class="col-sm-3">
<div class="checkbox"><label><input type="checkbox"   class="">Mostrar Descatalogados</label></div>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Operación</label>
<div class="col-sm-5">
<select   class="form-control operacion" name="operacion" required></select>
</div>
<div class="col-sm-2">
<div class="checkbox"><label><input type="checkbox"   class="">Mostra Todas</label></div>
</div>
<div class="col-sm-3">
<div class="checkbox"><label><input type="checkbox"   class="">Mostrar Obsoletas</label></div>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Accesorio</label>
<div class="col-sm-5">
<select   class="form-control accesorio" name="accesorio" required></select>
</div>
<div class="col-sm-2">
<div class="checkbox"><label><input type="checkbox"   class="">Mostrar Solo Stock</label></div>
</div>
<div class="col-sm-3">
<select name="icc"  class="form-control icc"  required></select>
</div>
</div>


<div class="form-group row">
<label  class="col-sm-2 col-form-label">A Pagar</label>
<div class="col-sm-3">
<input type="number"  class="form-control"  min="1" step="any" required>
</div>
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary btn-submit">submit</button>
      </div>
    </div>
  </div>
</div>
</form>




<!-- Modal Nuevo Cliente -->
<form id="nuevo-cliente" autocomplete="off">
<div class="modal fade" id="modal-nuevo-cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">




    <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-9">
    <input type="text"  class="nombre form-control" name="nombre"  required onchange="Mayusculas(this)">
    </div>
    </div>

    <div class="form-group">
    <select name="tipo_doc"  class="tipo_doc form-control">
    <option value=""></option>
    <option value="DNI">DNI</option>
    <option value="PASAPORTE">PASAPORTE</option>
    <option value="RUC">RUC</option>
    </select>
    </div>


    <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
    <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
    </div>
    </div>



     <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Número</label>
    <div class="col-sm-9">
    <input type="number"  class="cif form-control" name="cif"  required>
    </div>
    </div>







      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary">Agregar</button>
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
"sAjaxSource": "sources/registro?op=1",
"aoColumns": [

{ mData:  null,render:function(data){

acciones  = '<button type="button" class="btn btn-primary btn-edit btn-sm" data-id="'+data.id+'"><i class="fa fa-edit"></i></button>';
return acciones;

}},
{ mData: 'id'},
{ mData: 'Fecha'},
{ mData: 'Operacion'},
{ mData: 'Estado'},
{ mData: 'IMEI'},
{ mData: 'Telefono'},
{ mData: 'PVP'},
{ mData: 'Cliente'},
{ mData: 'Nombre'}

]

});

 });

}
//Cargar Data
loadData();




//Cargar Modal Agregar
$(document).on('click','.btn-agregar',function (e){

e.stopImmediatePropagation();



//Cargar Participantes
$('.cliente').selectize({
maxItems: 1,
valueField: 'id',
labelField: 'name',
searchField: 'name',
options: [],
create: false,
load: function(query, callback) {
if (!query.length) return callback();

$.ajax({
url: 'sources/registro.php?op=2',
type: 'GET',
dataType: 'json',
data: {
name: query,
},
error: function() {
callback();
},
success: function(res) {
callback(res);
}
});

}//

});




 $('.btn-submit').html('Guarda Operación');
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



//Cargar Modal Nuevo Cliente
$(document).on('click','.btn-nuevo-cliente',function (e){

 e.stopImmediatePropagation();


 $('#modal-nuevo-cliente').modal('show');

});


//Agregar Nuevo Cliente
$(document).on('submit','#nuevo-cliente',function (e){

 e.stopImmediatePropagation();

parametros =  $(this).serialize();


$.ajax({

url:"sources/registro.php?op=3",
type:"POST",
data:parametros,
dataType:"JSON",
beforeSend:function(){

swal({
  title: "Cargando",
  imageUrl:"assets/img/loader2.gif",
  text:  "Espere un momento, no cierre la ventana.",
  timer: 3000,
  showConfirmButton: false
});


},
success:function(data){


swal({
  title: data.title,
  text:  data.text,
  type:  data.type,
  timer: 3000,
  showConfirmButton: false
});



}



});



e.preventDefault();
});





</script>


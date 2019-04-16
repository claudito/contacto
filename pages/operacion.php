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
<label  class="col-sm-2 col-form-label">Fecha:</label>
<div class="col-sm-3">
<input type="date"  class="form-control" name="fecha" value="<?=  date('Y-m-d') ?>" required>
</div>
<label  class="col-sm-1 col-form-label">Estado:</label>
<div class="col-sm-3">
<select name="estado"  class="estado demo-default" required placeholder="Estado"></select>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Cliente:</label>
<div class="col-sm-1">
<button  type="button" class="btn btn-success btn-nuevo-cliente"><i class="fa fa-plus"></i></button>
</div>
<div class="col-sm-9">
<select   class="demo-default cliente" name="cliente" required placeholder="Buscar Cliente"></select>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Id Order:</label>
<div class="col-sm-3">
<input type="text"  class="form-control" name="id_order" pattern="[0-9]+"  minlength="8" maxlength="8" required>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Modelo:</label>
<div class="col-sm-5">
<select   class="demo-default modelo" name="modelo" required placeholder="Modelo"></select>
</div>
<div class="col-sm-2">
<div class="checkbox"><label><input type="checkbox"   class="">Mostra Solo Stock</label></div>
</div>
<div class="col-sm-3">
<div class="checkbox"><label><input type="checkbox"   class="">Mostrar Descatalogados</label></div>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">IMEI:</label>
<div class="col-sm-5">
<input type="text" name="imei" class="imei form-control" required readonly>
</div>
</div>


<div class="form-group row">
<label  class="col-sm-2 col-form-label">Operación:</label>
<div class="col-sm-5">
<select   class="demo-default operacion" name="operacion" required placeholder="Operación"></select>
</div>
<div class="col-sm-2">
<div class="checkbox"><label><input type="checkbox"   class="">Mostra Todas</label></div>
</div>
<div class="col-sm-3">
<div class="checkbox"><label><input type="checkbox"   class="">Mostrar Obsoletas</label></div>
</div>
</div>


<div class="form-group row">
<label  class="col-sm-2 col-form-label">Contrato:</label>
<div class="col-sm-5">
<select   class="demo-default contrato" name="contrato" required placeholder="Contrato"></select>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-3 col-form-label">Promoción / Campaña:</label>
<div class="col-sm-5">
<select   class="demo-default promocion" name="promocion" required placeholder="Promoción / Campaña"></select>
</div>
</div>


<div class="form-group row">
<label  class="col-sm-2 col-form-label">Accesorio:</label>
<div class="col-sm-5">
<select   class="demo-default accesorio" name="accesorio" required placeholder="Accesorio"></select>
</div>

</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">Telefóno:</label>
<div class="col-sm-3">
<input type="number"  class="form-control" name="telefono" min="1" required>
</div>
</div>

<div class="form-group row">
<label  class="col-sm-2 col-form-label">A Pagar:</label>
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




    <div class="form-group">
    <select name="tipo_doc"  class="tipo_doc form-control">
    <option value="">Seleccionar</option>
    <option value="DNI">DNI</option>
    <option value="PASAPORTE">PASAPORTE</option>
    <option value="RUC">RUC</option>
    </select>
    </div>


    <div class="input-group mb-3">
    <input type="number" class="numero_cliente form-control" placeholder="Ingrese el número" aria-label="Recipient's username" aria-describedby="button-addon2">
    <div class="input-group-append">
    <button class="btn btn-outline-secondary btn-buscar-cliente" type="button" >Buscar</button>
    </div>
    </div>


    <hr>

    <div class="form-group">
    <label>Nombres</label>
    <input type="text" name="nombres" class="nombres form-control" required>
    </div>


    <div class="form-group">
    <label>Documento</label>
    <input type="text" name="documento" class="documento form-control" required>
    </div>


    <div class="form-group">
    <label>Condición</label>
    <input type="text" name="condicion" class="condicion form-control" required>
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


<!-- Modal IMEI -->
<div class="modal fade" id="modal-imei" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5  id="exampleModalLabel">IMEI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
       <div class="table-responsive">
         <table id="consulta_imei"  class="table table-hover table-sm" style="font-size: 12px">
           <thead class="thead-dark">
             <tr>
               <th>Punto de Venta</th>
               <th>Modelo</th>
               <th>IMEI</th>
               <th>Tipo</th>
               <th>Días</th>
             </tr>
           </thead>
         </table>
       </div>

      </div>
    </div>
  </div>
</div>


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
"sAjaxSource": "sources/operacion.php?op=1",
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


/*Inicio Cargar Clientes*/
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
url: 'sources/operacion.php?op=2',
type: 'GET',
dataType: 'json',
data: {
name: query,'tipo':'clientes'
},
error: function() {
callback();
},
success: function(res) {
callback(res);
}
});

}

});

/*Fin Cargar Clientes */

/*Inicio Cargar Estado Operación*/
$('.estado').selectize({
maxItems: 1,
valueField: 'Nombre',
labelField: 'Nombre',
searchField: 'Nombre',
options: [],
create: false,
load: function(query, callback) {
if (!query.length) return callback();

$.ajax({
url: 'sources/operacion.php?op=2',
type: 'GET',
dataType: 'json',
data: {
name: query,'tipo':'estado'
},
error: function() {
callback();
},
success: function(res) {
callback(res);
}
});

}

});

/*Fin Cargar Estado Operación */

/*Inicio Cargar de Modelos*/
$('.modelo').selectize({
maxItems: 1,
valueField: 'Nombre',
labelField: 'Nombre',
searchField: 'Nombre',
options: [],
create: false,
load: function(query, callback) {
if (!query.length) return callback();

$.ajax({
url: 'sources/operacion.php?op=2',
type: 'GET',
dataType: 'json',
data: {
name: query,'tipo':'modelo'
},
error: function() {
callback();
},
success: function(res) {
callback(res);

console.log(res);

}
});

}

});


/*Fin Cargar de Modelos */


/*Inicio Cargar de Accesorios*/
$('.accesorio').selectize({
maxItems: 1,
valueField: 'Nombre',
labelField: 'Nombre',
searchField: 'Nombre',
options: [],
create: false,
load: function(query, callback) {
if (!query.length) return callback();

$.ajax({
url: 'sources/operacion.php?op=2',
type: 'GET',
dataType: 'json',
data: {
name: query,'tipo':'accesorio'
},
error: function() {
callback();
},
success: function(res) {
callback(res);
}
});

}

});

/*Fin Cargar de Accesorios */

/*Inicio Carga de Operaciones*/
$('.operacion').selectize({
maxItems: 1,
valueField: 'Nombre',
labelField: 'Nombre',
searchField: 'Nombre',
options: [],
create: false,
load: function(query, callback) {
if (!query.length) return callback();

$.ajax({
url: 'sources/operacion.php?op=2',
type: 'GET',
dataType: 'json',
data: {
name: query,'tipo':'operacion'
},
error: function() {
callback();
},
success: function(res) {
callback(res);
}
});

}

});

/*Fin Carga de Operaciones */


/*Inicio Carga de Contratos*/
$('.contrato').selectize({
maxItems: 1,
valueField: 'Nombre',
labelField: 'Nombre',
searchField: 'Nombre',
options: [],
create: false,
load: function(query, callback) {
if (!query.length) return callback();

$.ajax({
url: 'sources/operacion.php?op=2',
type: 'GET',
dataType: 'json',
data: {
name: query,'tipo':'contrato'
},
error: function() {
callback();
},
success: function(res) {
callback(res);
}
});

}

});

/*Fin Carga de Contratos */


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

$('#nuevo-cliente')[0].reset();
 e.stopImmediatePropagation();

 $('#modal-nuevo-cliente').modal('show');

});


//Agregar Nuevo Cliente
$(document).on('submit','#nuevo-cliente',function (e){

 e.stopImmediatePropagation();

parametros =  $(this).serialize();


$.ajax({

url:"sources/operacion.php?op=3",
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


//Buscar Cliente
$(document).on('click','.btn-buscar-cliente',function(e){

 e.stopImmediatePropagation();



 numero_cliente = $('.numero_cliente').val();
 tipo_doc       = $('.tipo_doc').val();


  if(tipo_doc=='')
  {

  swal({
  title: "Ingrese el tipo de documento",
  text:  "",
  type:  "warning",
  timer: 1000,
  showConfirmButton: false
});

return false
  }


    if(numero_cliente=='')
  {

  swal({
  title: "Ingrese el número",
  text:  "",
  type:  "warning",
  timer: 1000,
  showConfirmButton: false
});

return false
  }


//Envío por ajax
$.ajax({

url:"sources/operacion.php?op=4",
type:"POST",
dataType:"JSON",
data:{'numero':numero_cliente,'tipo':tipo_doc},
beforeSend:function(){

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


if(data['success']==true)
{

$('.nombres').val('');
$('.documento').val('');
$('.condicion').val('');

$('.nombres').val(data['result']['razon_social']);
$('.documento').val(data['result']['ruc']);
$('.condicion').val(data['result']['condicion']);


swal({
title: "",
text:  "Registro encontrado",
type:  "success",
timer: 1000,
showConfirmButton: false
});


}
else
{

$('.nombres').val('');
$('.documento').val('');
$('.condicion').val('');

swal({
title: "",
text:  "No se encontraron resultados",
type:  "info",
timer: 1000,
showConfirmButton: false
});


}


}


});



});



function loadIMEI(modelo)
{

 $(document).ready(function (){

var oTable =  $('#consulta_imei').dataTable({

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
"sAjaxSource": "sources/operacion.php?op=5",
"fnServerParams": function ( aoData ) {
aoData.push( 

  { "name":"modelo", "value": modelo }


  );
},
"aoColumns": [

{ mData: 'PuntoVenta'},
{ mData: 'Modelo'},
{ mData: null,render:function(data){

imei = '<span data-imei="'+data.IMEI+'" class="click-imei">'+data.IMEI+'</span>';

return imei;

} ,className:"text-primary text-center"},
{ mData: 'Tipo'},
{ mData: 'dias'}
]

});




 });

}



//Capturar elemento seleccionado
$('select.modelo').on('change',function(e){

e.stopImmediatePropagation();

var valor = $(this).val();

if(valor!=='')
{

$('.imei').val('');
 loadIMEI(valor);
$('#modal-imei').modal('show');


}

});


//Click IMEI
$(document).on('click','.click-imei',function(e){

 e.stopImmediatePropagation();

 imei = $(this).data('imei');

$('.imei').val(imei);
$('#modal-imei').modal('hide');


});



</script>


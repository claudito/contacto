
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
              <th>Nombres</th>
              <th>Apelllidos</th>
              <th>DNI</th>
              <th>Cargo</th>
              <th>Empresa</th>
              <th>Tienda</th>
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
      

    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    <label>Nombres</label>
    <input type="text" name="nombres"  class="nombres form-control " required onchange="Mayusculas(this)">
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label>Apellidos</label>
    <input type="text" name="apellidos"  class="apellidos form-control " required onchange="Mayusculas(this)">
    
    </div> 
    </div>
    </div>


    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    <label>Cargo</label>
    <input type="tel" name="cargo"  class="cargo form-control" required onchange="Mayusculas(this)">
    </div>
    </div>
    <div class="col-md-6">
    <label>DNI</label>
    <input type="tel" name="dni"  class="dni form-control" required maxlength="8">
    
    </div>
    </div>


    <div class="form-group">
    <label>Empresa</label>
    <select name="empresa" class="empresa form-control" required ></select>
    </div>

    <div class="form-group">
    <label>Tienda</label>
    <select name="tienda" class="tienda form-control" required ></select>
    </div>  



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary btn-submit"value="">
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
"sAjaxSource": "sources/trabajadores?op=1",
"aoColumns": [

{ mData: 'id'},
{ mData: 'nombres'},
{ mData: 'apellidos'},
{ mData: 'dni'},
{ mData: 'cargo'},
{ mData: 'empresa'},
{ mData: 'tienda'},
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

 $('#registro')[0].reset();
 $('.type').val('agregar');

 //Cargar Empresa
 url     = "sources/trabajadores.php?op=4";
 empresa = '<option value="">[Seleccionar]</option>';

 $.getJSON(url,{},function(row){
 
 row.forEach(function(data){

 empresa += '<option value="'+data.id+'">'+data.alias+'</option>';

 $('.empresa').html(empresa);

 });

 });


  //Cargar Tienda
 url     = "sources/trabajadores.php?op=5";
 tienda  = '<option value="">[Seleccionar]</option>';

 $.getJSON(url,{},function(row){
 
 row.forEach(function(data){

 tienda += '<option value="'+data.id+'">'+data.nombre+'</option>';

 $('.tienda').html(tienda);

 });

 });



 $('.btn-submit').attr('value','Agregar');
 $('.modal-title').html('Agregar');
 $('#modal-registro').modal('show');

});


//Cargar Modal Actualizar
$(document).on('click','.btn-edit',function (e){

 e.stopImmediatePropagation();

 $('#registro')[0].reset();
 $('.type').val('actualizar');

  id = $(this).data('id');
 
 $.getJSON('sources/trabajadores?op=2',{'id':id},function(data){

  $('.nombres').val(data.nombres);
  $('.apellidos').val(data.apellidos);
  $('.cargo').val(data.cargo);
  $('.dni').val(data.dni);


 //Cargar Empresa
 url     = "sources/trabajadores.php?op=4";
 empresa = "";

 $.getJSON(url,{},function(row_e){
 
 row_e.forEach(function(data_e){

  if(data.id_empresa==data_e.id)
  {
  empresa += '<option value="'+data_e.id+'" selected>'+data_e.alias+'</option>';
  }
  else
  {
  empresa += '<option value="'+data_e.id+'">'+data_e.alias+'</option>';
  }


 $('.empresa').html(empresa);

 });

 });



  //Cargar Tienda
 url     = "sources/trabajadores.php?op=5";
 tienda  = "";

 $.getJSON(url,{},function(row_t){
 
 row_t.forEach(function(data_t){

  if(data.id_tienda==data_t.id)
  {
  tienda += '<option value="'+data_t.id+'" selected>'+data_t.nombre+'</option>';
  }
  else
  {
  tienda += '<option value="'+data_t.id+'">'+data_t.nombre+'</option>';
  }


 $('.tienda').html(tienda);

 });

 });





 });  


 $('.tipo').val('actualizar');
 $('.id').val(id);

 $('.btn-submit').attr('value','Actualizar');
 $('.modal-title').html('Actualizar');
 $('#modal-registro').modal('show');

});


//Registro
$(document).on('submit','#registro',function (e){

e.stopImmediatePropagation();

parametros = $(this).serialize();

$.ajax({

url:"sources/trabajadores.php?op=3",
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


if(data.type=='warning' || data.type=='error')
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
});




</script>


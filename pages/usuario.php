
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
              <th>Usuario</th>
              <th>Email</th>
              <th>Telefóno</th>
              <th>Celular</th>
              <th></th>
              <th></th>
              <th></th>
              

                      
     			</tr>
     		</thead>
     	</table>
     </div>

</div>

</div>

</div>

<!-- Modal Pecil -->
<form id="pencil" autocomplete="off">
<div class="modal fade" id="modal-pencil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

     <input type="hidden" name="id" class="id">
      
     <div class="row">
     <div class="col-md-6">
     <div class="form-group">
     <label>Ingresar Contraseña</label>
     <input type="password" name="pass1"  class="pass1 form-control" required minlength="4" maxlength="24">
     </div>
     </div>
     <div class="col-md-6">
     <div class="form-group">
     <label>Confirmar Contraseña</label>
     <input type="password" name="pass2"  class="pass2 form-control" required minlength="4" maxlength="24">
     </div>	
     </div>
     </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>


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
      
    <div class="form-group">
     <label>Nombres</label>
     <input type="text" name="nombres" pattern="[a-zA-Z0-9-' ']+" class="nombres form-control " required 
     onchange="Mayusculas(this)">
     </div>

    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    <label>Correo</label>
    <input type="email" name="correo"  class="correo form-control " required>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label>Usuario</label>
    <input type="text" name="user"  class="user form-control " required>
    
    </div> 
    </div>
    </div>


    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    <label>Celular</label>
    <input type="tel" name="celular"  class="celular form-control " required pattern="[0-9]{9}" maxlength="9">
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label>Empresa</label>
    <select name="empresa" class="empresa form-control" required></select>
   
    </div> 
    </div>
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


<!-- Modal Lock -->
<div class="modal fade" id="modal-lock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Permisos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <input type="hidden" name="id" class="id">

      
      <div class="permisos"></div>

      


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
"sAjaxSource": "sources/usuario?op=1",
"aoColumns": [

{ mData: 'id'},
{ mData: 'Nombre'},
{ mData: 'Usuario'},
{ mData: 'Email'},
{ mData: 'Telefono'},
{ mData: 'Movil'},
{ mData:  null,render:function(data){

acciones  = '<button type="button" class="btn btn-primary btn-edit btn-sm" data-id="'+data.id+'"><i class="fa fa-edit"></i></button>';
return acciones;

}},
{ mData:  null,render:function(data){

acciones = '<button type="button" class="btn btn-info btn-pencil btn-sm" data-id="'+data.id+'" data-nombres="'+data.Nombre+'"><i class="fa fa-pencil"></i></button>';

return acciones;

}},
{ mData:  null,render:function(data){

acciones = '<button type="button" class="btn btn-warning btn-lock btn-sm" data-nombres="'+data.Nombre+'" data-id="'+data.id+'"><i class="fa fa-lock"></i></button>';

return acciones;

}}





]

});

 });

}
//Cargar Data
loadData();


//Cargar Modal Pencil
$(document).on('click','.btn-pencil',function (e){

e.stopImmediatePropagation();

id      = $(this).data('id');
nombres = $(this).data('nombres');
$('.id').val(id);
$('.pass1').val('');
$('.pass2').val('');
$('.modal-title').html('<i class="fa fa-pencil"></i> '+nombres);
$('#modal-pencil').modal('show');

})

//Actualizar Contraseña
$(document).on('submit','#pencil',function (e){

e.stopImmediatePropagation();

id    = $('.id').val();
pass1 = $('.pass1').val();
pass2 = $('.pass2').val();

url   = "sources/usuario.php?op=2";

if(pass1==pass2)
{

$.post(url,{"id":id,"pass":md5(pass1)},function (data){

$('.pass1').val('');
$('.pass2').val('');
$('.pass1').focus();

swal({
  title: "Buen Trabajo",
  type:  "success",
  text:  "Contraseña Actualizada",
  timer: 3000,
  showConfirmButton: false
  })

});

}
else
{

swal({
  title: "Las contraseñas no coinceden",
  type:  "warning",
  text:  "Intente de Nuevo",
  timer: 3000,
  showConfirmButton: false
  })

}

e.preventDefault();
})


//Cargar Modal Agregar
$(document).on('click','.btn-agregar',function (e){

e.stopImmediatePropagation();

 $('#registro')[0].reset();
 $('.type').val('agregar');

 //Cargar Empresa
 url     = "sources/usuario.php?op=7";
 empresa = '<option value="">[Seleccionar]</option>';

 $.getJSON(url,{},function(row){
 
 row.forEach(function(data){

 empresa += '<option value="'+data.id+'">'+data.alias+'</option>';

 $('.empresa').html(empresa);

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
 
 $.getJSON('sources/usuario?op=3',{'id':id},function(data){

  $('.nombres').val(data.Nombre);
  $('.apellidos').val(data.apellidos);
  $('.correo').val(data.Email);
  $('.celular').val(data.Movil);
  //$('.telefono').val(data.Telefono);
  $('.user').val(data.Usuario);
  //$('.tipo').val(data.tipo);
 //Cargar Empresa
 url     = "sources/usuario.php?op=7";
 empresa = "";

 $.getJSON(url,{},function(row_e){
 
 row_e.forEach(function(data_e){

  if(data.Empresa==data_e.id)
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

url:"sources/usuario.php?op=4",
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


//Cargar Modal Lock
$(document).on('click','.btn-lock',function (e){

e.stopImmediatePropagation();

id       = $(this).data('id');
nombres  = $(this).data('nombres');
$('.id').val(id);
url = "sources/usuario.php?op=5";

permisos = '';

$.getJSON(url,{"id":id},function (data){

menu    = data;
submenu = data;

menu.forEach(function (menu_row){

if(menu_row.tipo=='menu')
{

permisos += '<ul>';
permisos += '<li>';
permisos +=  '<strong>'+menu_row.descripcion+'</strong>';
permisos += '<ul>';
submenu.forEach(function (submenu_row){


if(submenu_row.tipo=='submenu')
{

if(submenu_row.id_menu==menu_row.id_menu)
{

permisos += '<li style="list-style:none">';
permisos +=  '<label>';
permisos +=  '<input type="checkbox"  class="check" data-user="'+id+'"  data-id="'+submenu_row.id+'"  '+submenu_row.checked+'  /> '+submenu_row.descripcion;
permisos +=  '</label>';
permisos += '</li>';

}

}


});
permisos += '</ul>';
permisos += '</li>';
permisos += '</ul>';


}


});

$('.permisos').html(permisos);


});

$('.modal-title').html(nombres);
$('#modal-lock').modal('show');


});

//Capturar Valor Check
$(document).on('click','.check', function(e) {

e.stopImmediatePropagation();

id       = $(this).data('id');
user     = $(this).data('user');


if( $(this).is(':checked') ){

estado  = '1';
} 
else {
estado  = '0';
}

parametros = {'id':id,'user':user,'estado':estado};

$.get('sources/usuario.php?op=6',parametros,function(data){




});



});


</script>


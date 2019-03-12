$(document).ready(function (){

//Cargar Empresas
url = 'sources/login.php?op=1';
empresa = "";
$.getJSON(url,{},function(data){

data.forEach(function (row){

empresa += '<option value="'+row.Id+'">'+row.alias+'</option>';

$('.empresa').html(empresa);

});


});


$('#login').on('submit',function(e){

user     = $("#user").val();
pass     = $("#pass").val();
empresa  = $("#empresa").val();
latitude = $("#latitude").val();
longitude= $("#longitude").val();
pass     = pass.trim();
pass     = md5(pass);
url      = $("#url").val();

parametros = {"user":user,"empresa":empresa,"pass":pass,"latitude":latitude,"longitude":longitude};

$.ajax({

url:"controlador/login.php",
type:"POST",
data:parametros,
beforeSend:function(){

swal({
  title: "Cargando",
  imageUrl:  "assets/img/loader2.gif",
  text:  "Espere un momento, no cierre la ventana.",
  timer: 3000,
  showConfirmButton: false
});


},
success:function(data)
{


switch(data) {
  case 'userpassvacio':
	swal({
	title: "Ingrese el Usuario y Contraseña",
	type:  "warning",
	text:  "...",
	timer: 4000,
	showConfirmButton: falsea
	})
    break;
  case 'uservacio':
	swal({
	title: "Ingrese el Usuario",
	type:  "warning",
	text:  "...",
	timer: 4000,
	showConfirmButton: false
	})
    break;
    case 'passvacio':
	swal({
	title: "Ingrese la Contraseña",
	type:  "warning",
	text:  "...",
	timer: 4000,
	showConfirmButton: false
	})
    break;
    case 'true':
   

	swal({
	title: "Bienvenido",
	type:  "success",
	text:  user,
	timer: 4000,
	showConfirmButton: false
	})

   //redirect
   

setTimeout(function(){
            window.location.href = url;
         }, 3000);


    break;
  default:
  	swal({
	title: "Usuario o Contraseña incorrectos",
	type:  "error",
	text:  "...",
	timer: 4000,
	showConfirmButton: false
	})


}

}

});




e.preventDefault();
});

});

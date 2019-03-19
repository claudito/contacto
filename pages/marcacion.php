
<div class="row">
	
<div class="col-md-12">
	

<form id="marcar" autocomplete="off">
	
<div class="input-group">
	<input type="text" name="dni" class="form-control" placeholder="Ingrese el Número de DNI" 
	 pattern="[0-9]{8}" size="8" maxlength="8"  minlength="8" required>
	<span class="input-group-btn">
		<button type="submit" class="btn btn-primary"><i class="fa fa-clock-o"></i> Marcar </button>
	</span>
</div>


</form>

</div>


</div>

<script>
$(document).on('submit','#marcar',function(e){

e.stopImmediatePropagation();

parametros = $(this).serialize();

$.ajax({

url:"sources/marcacion.php?op=1",
type:"POST",
dataType :"JSON",
data:parametros,
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

$('#marcar')[0].reset();

swal({
  title: data.title,
  type:  data.type,
  text:  data.text,
  timer: 3000,
  showConfirmButton: false
});


}

});

e.preventDefault();
});	


</script>

<div class="row">
  
<div class="col-md-12">
 <h2>Instrucciones:</h2><hr>
<ol>
<li>Descargar Archivo CAM.xlsb</li>
<li>Convertir a xlsx en la web : <a href="https://xlsb-to-xlsx.file-converter-online.com/" target="_blank">https://xlsb-to-xlsx.file-converter-online.com/</a></li>
<li>A descargar el Archivo confirmar la reparación</li>
<li>Listo!!!! Ahora Si, Cargar El archivo</li>
</ol>



<form id="agregar" autocomplete="off" class="form-inline">
	
<div class="input-group">
	<input type="file" class="form-control" name="archivo" required>
	<span class="input-group-btn">
		<button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Importar</button>
	</span>
</div>


<select name="	" id="">
<option value="	">EQUIVALENCIAS +SIMPLE</option>
<option value="	">PRECIO FULL</option>
<option value="	">Generica AD</option>
</select>

</form>
  


</div>

</div>

<script>
$('#agregar').submit(function (event){
var parametros =  $(this).serialize();
$.ajax({
url:"sources/carga-cam.php?op=1",
type:"POST",
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
beforeSend:function(){

swal({
  title: "Subiendo Archivo",
  imageUrl:"assets/img/loader2.gif",
  text:  "Espere un momento, no cierre la ventana.",
 // timer: 3000,
  showConfirmButton: false
});

},
success:function(data){

swal({
  title: "Buen Trabajo",
  text:  "Archivo Cargado",
  type:  "success",
  timer: 3000,
  showConfirmButton: false
});


}
});
event.preventDefault();
});
</script>
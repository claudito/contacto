<?php 

$assets =  new Assets();
$assets->nav('.','Home');
 ?>



<!-- Begin Page Content -->
<div class="container-fluid">

<nav aria-label="breadcrumb" style="font-size: 14px">
  <ol class="breadcrumb">
    <li class="breadcrumb-item breadcrumb-menu">INICIO</li>
    <li class="breadcrumb-item breadcrumb-submenu" style="font-weight: bold">DASHBOARD</li>
  </ol>
</nav>

<div class="loader text-center" ></div>
<div id="page"></div>



</div>
<!-- /.container-fluid -->


<script>
//Cargar DashBoard
$(document).ready(function(){

$('#page').html();

$.get('templates/dashboard.php',{},function(data){

$('#page').html(data);

});


});

//Cargar Páginas
$(document).on('click','.load-page',function (){

 $('#page').html('');
 menu    = $(this).data('menu');
 submenu = $(this).data('submenu');
 url     = $(this).data('url');
 url     = 'pages/'+url+'.php';

 $('.breadcrumb-menu').html(menu);
 $('.breadcrumb-submenu').html(submenu);


$(".loader").fadeIn('slow');

$.ajax({

url:url,
data:{},
type:"GET",
beforeSend:function(){

$(".loader").html("<img src='assets/img/loader2.gif'>");

},
success:function(data){

 $('#page').html(data).fadeIn('slow');;

 $(".loader").html("");

},
error:function(xhr,status,error)
{

$(".loader").html("");

swal({
 
  title:"warning",
  text: 'La página no existe',
  type: "warning",
  showConfirmButton:false,
  timer:3000

})




}




});




});


</script>


 <?php  $assets->footer('.'); ?>
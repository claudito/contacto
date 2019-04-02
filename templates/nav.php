<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

 <title>Contacto U_NET</title>


    <!-- Favicon -->
<link rel="shortcut icon" sizes="16x16" href="">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">


    <!-- Font Awesome -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Page level plugin CSS-->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
 <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>


<!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

  <!-- MD5 JS -->
  <script src="https://blueimp.github.io/JavaScript-MD5/js/md5.js"></script>




<!-- Convertir a Mayúsculas -->
<script>
function Mayusculas(field) 
{
field.value         = field.value.toUpperCase();
}
</script>



</head>

<body id="page-top" >

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=  URL ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-underline"></i>
        </div>
        <div class="sidebar-brand-text mx-3">U-Net</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?=  URL ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Inicio</span></a>
      </li>



      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Módulos
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
  

     <!-- Inicio NAV -->
        
      <!-- Nav Item - Pages Collapse Menu -->
       <div class="nav"></div>
    
      <!-- FIN NAV -->
    

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
        
            <!-- Nav Item - Messages -->
   

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS] ?></span>
                <img class="img-profile rounded-circle" src="assets/img/avatar.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <!--  
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">-->

                  <a class="dropdown-item logout" data-url="<?= URL ?>" style="cursor:pointer;">



                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


      <script>
        
     //Logout
     $(document).on('click','.logout',function(){

       url = $(this).data('url');

       $.get(url+'controlador/logout.php',{},function(data){

        self.location=url ;

       });

     });

//Cargar Menú
function nav()
{

nav = '';
$.getJSON('sources/nav.php?op=1',{},function(data){

menu    = data;
submenu = data;

menu.forEach(function (row_menu){

nav +='<li class="nav-item">';
if(row_menu.tipo=='menu')
{

nav += '<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse'+row_menu.id+'" aria-expanded="true" aria-controls="collapseTwo">';
nav += '<i class="'+row_menu.icon+'"></i>';
nav+='<span>'+row_menu.descripcion+'</span>';
nav+='</a>';

nav += '<div id="collapse'+row_menu.id+'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">';
nav += '<div class="bg-white py-2 collapse-inner rounded">';

submenu.forEach(function (row_submenu){

if(row_submenu.tipo=='submenu' )
{

if(row_menu.id_menu==row_submenu.id_menu)
{

if(row_submenu.estado=='1')
{

//SubMenú
nav += '<a  style="cursor:pointer;" class="collapse-item load-page" data-menu="'+row_menu.descripcion+'" data-submenu="'+row_submenu.descripcion+'" data-url="'+row_submenu.url+'">'+row_submenu.descripcion+'</a>';

}

}

}

});

nav += '</div>';
nav += '</div>';

}

nav +='</li>';

$('.nav').html(nav);


});

});

}

//Cargar Nav
nav();

</script>


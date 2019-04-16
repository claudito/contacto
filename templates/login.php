<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Acceso</title>


   <!-- Favicon -->
<link rel="shortcut icon" sizes="16x16" href="">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.css" rel="stylesheet">

  <!-- MD5 JS 
  </-->   
  <script src="https://blueimp.github.io/JavaScript-MD5/js/md5.js"></script>

  <!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <script src="assets/vendor/jquery/jquery.min.js"></script>
   
    <script src="ajax/login.js"></script>



<style>
  
.bg-login-image {
  background: url("<?= URL ?>/assets/img/login.png");
  background-position: center;
  background-size: cover;
}
</style>


</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                  </div>
                  <form class="user" id="login" autocomplete="off">


                        <!-- Hidden -->
        <input type="hidden"  id="latitude" >
        <input type="hidden"  id="longitude" >


        <input type="hidden" id="url" value="<?= URL ?>">


                 <div class="form-group">
                    <select name="empresa" id="empresa" class="empresa form-control" required>
                    </select>
                    </div>


                    <div class="form-group">
                      <input type="text"  id="user"   class="form-control form-control-user"  aria-describedby="emailHelp" placeholder="Ingrese su Usuario" required>
                    </div>
                    <div class="form-group">
                      <input type="password" id="pass"  class="form-control form-control-user"  placeholder="Ingrese su contraseña" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Recordar</label>
                      </div>
                    </div>
                    

                    <button type="submit"  class="btn btn-primary btn-user btn-block">Ingresar</button>
             
                
               
                  </form>
                
              
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>


<!-- GeoLocalización -->
<script>
function geoFindMe() {
  var output = document.getElementById("out");
  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;
    $('#latitude').val(latitude);
    $('#longitude').val(longitude);
  };
  navigator.geolocation.getCurrentPosition(success);
}
geoFindMe();
</script>



</body>

</html>

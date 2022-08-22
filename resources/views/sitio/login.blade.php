<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset("plantilla/assets/img/apple-icon.png") }}">
  <link rel="icon" type="image/png" href="{{ asset("plantilla/assets/img/apple-icon.png") }}">
  
  <title>
    Fondo de Publicaciones Unicesar
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset("plantilla/assets/css/nucleo-icons.css") }}" rel="stylesheet" />
  <link href="{{ asset("plantilla/assets/css/nucleo-svg.css") }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset("plantilla/assets/css/nucleo-svg.css") }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset("plantilla/assets/css/soft-ui-dashboard.css?v=1.0.6") }}" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Bienvenido</h3>
                  <p class="mb-0">Ingresa con tu usuario y contraseña</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="usuario/validarLogin">
                    @csrf
                    <label>Usuario</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="usuario" placeholder="Usuario" aria-label="Usuario" aria-describedby="user-addon">
                    </div>
                    <label>Contraseña</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="clave" placeholder="Contraseña" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    @if($errors->first('error') != "")
                        <div style="width: 100%; color: white;" class="alert alert-danger" id="alert">
                            {{ $errors->first('error') }}
                        </div>
                        <script>
                          
                            setTimeout(function(){ $("#alert").fadeOut(); }, 3000);
                        </script>
                    @endif
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe">Recordarme</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Ingresar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    ¿No tienes una cuenta?
                    <a href="javascript:;" class="text-info text-gradient font-weight-bold">Solicitarla</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{ "imagenes/app/portada-login.jpg" }}'); background-size: cover;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset("plantilla/>assets/js/core/popper.min.js") }}"></script>
  <script src="{{ asset("plantilla/assets/js/core/bootstrap.min.js") }}"></script>
  <script src="{{ asset("plantilla/assets/js/plugins/perfect-scrollbar.min.js") }}"></script>
  <script src="{{ asset("plantilla/assets/js/plugins/smooth-scrollbar.min.js") }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset("plantilla/assets/js/soft-ui-dashboard.min.js?v=1.0.6") }}"></script>
</body>

</html>
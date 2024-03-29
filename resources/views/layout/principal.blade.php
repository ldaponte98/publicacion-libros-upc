<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fondo de publicaciones Unicesar</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{asset('plantilla/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('plantilla/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('plantilla/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <link id="pagestyle" href="{{asset('plantilla/assets/css/soft-ui-dashboard.css?v=1.0.6')}}" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  <!-- Or for RTL support -->
  <script src="{{asset('plantilla/assets/js/core/popper.min.js')}}"></script>
  <script src="{{ asset('plantilla/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('plantilla/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('plantilla/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{ asset('plantilla/assets/js/soft-ui-dashboard.min.js?v=1.0.6') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <style>
    .btn-end{
      text-align: right ;
    }
    .btn-close {
      color: #000; 
    }
    .btn-close:hover{
      color: #000; 
    }
    .icon-action{
      font-size: 12px;
    }
    .color-black{
      color: black;
    }
    .checkbox{
      cursor: pointer;
    }
    .sidenav[data-color="dark"] .navbar-nav>.nav-item>.nav-link.active .icon {
        background-image: linear-gradient(310deg, #3dac4c 0%, #3dac4c 100%);
    }
    .bg-gradient-dark{
      background-image: linear-gradient(310deg, #3dac4c 0%, #3dac4c 100%);
    }
    .table th{
      color: #000 !important;
    }
    .swal2-styled.swal2-confirm{
      background-color: #3dac4c;
    }
  </style>
</head>
@php
    $perfil = \App\Models\Perfil::find(session('id_perfil'));
@endphp
<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main" data-color="dark">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 text-center" href="">
        <img src="https://www.unicesar.edu.co/templates/rt_fresco/images/community-a/logo/logo.png" class="navbar-brand-img h-100" alt="main_logo"><br>
        <span class="ms-1 font-weight-bold" style="font-size: 12px;">Fondo de Publicaciones Unicesar</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    {{ view('layout.menu', compact(['perfil'])) }}
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg "> 
    {{ view('layout.superior') }}
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4 p-4">
            @yield('content','')
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>


  {{ view('layout.diseño') }}
  <!--   Core JS Files   -->
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    $('.select2').select2( {
        theme: 'bootstrap-5'
    });

    function alerta(titulo = "Información", mensaje, tipo = "info") {
      Swal.fire({
        title: titulo,
        text: mensaje,
        icon: tipo,
        confirmButtonText: 'Aceptar'
      })
    }

    function setFiltro(id_input_filtro, id_tabla) {
        $(`#${id_input_filtro}`).keyup(function() {
            var rex = new RegExp($(this).val(), 'i');
            $(`#${id_tabla} tbody tr`).hide();
            $(`#${id_tabla} tbody tr`).filter(function() {
                return rex.test($(this).text());
            }).show();
        })
    }

  </script>

</body>

</html>
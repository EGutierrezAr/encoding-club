<!--

=========================================================
* Now UI Kit - v1.3.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-kit
* Copyright 2019 Creative Tim (http://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Now UI Kit by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/now-ui-kit/index.html" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">
          EncodingClub
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
         <li class="nav-item">
            <button class="nav-link btn btn-neutral" data-toggle="modal" data-target="#myModal">
              <i class="now-ui-icons arrows-1_share-66"></i>
              Reserva tu Clase de prueba <b>GRATIS</b>
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Plan de Estudios</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Quienes somos</p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink1" data-toggle="dropdown">
              <i class="now-ui-icons design_app"></i>
              <p>Components</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink1">
              <a class="dropdown-item" href="./index.html">
                <i class="now-ui-icons business_chart-pie-36"></i> All components
              </a>
              <a class="dropdown-item" target="_blank" href="https://demos.creative-tim.com/now-ui-kit/docs/1.0/getting-started/introduction.html">
                <i class="now-ui-icons design_bullet-list-67"></i> Documentation
              </a>
            </div>
          </li>

          <!--li class="nav-item">
            <a class="nav-link btn btn-neutral" href="https://www.creative-tim.com/product/now-ui-kit-pro" target="_blank">
              <i class="now-ui-icons arrows-1_share-66"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li-->
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
              <i class="fab fa-twitter"></i>
              <p class="d-lg-none d-xl-none">Twitter</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
              <i class="fab fa-facebook-square"></i>
              <p class="d-lg-none d-xl-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
              <i class="fab fa-instagram"></i>
              <p class="d-lg-none d-xl-none">Instagram</p>
            </a>
          </li>
          <li class="nav-item">
            <button class="nav-link btn btn-neutral" data-toggle="modal" data-target="#myModalLogin">
              <i class="now-ui-icons arrows-1_share-66"></i>
              <b>LOGIN</b>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

   <!-- Modal Login -->
   <div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <h4 class="title title-up"> Login</h4>
                </div>
                <div class="modal-body">
                <div class="card-body">
                    <div class="input-group input-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="now-ui-icons ui-1_email-85"></i>
                        </span>
                    </div>
                    <input type="text"  type="email" name="email"  class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo" autofocus>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    </div>
                    <div class="input-group input-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="now-ui-icons ui-1_lock-circle-open"></i>
                        </span>
                    </div>
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Password">
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    </div>
                </div>

                </div>
                <div class="modal-footer  justify-content-center">
                <button type="submit" class="btn btn-success text-center ">Entrar</button>
                </div>
            </div>
            </div>
        </form>
    </div>


  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  @if ($errors->any())
    @foreach ($errors->all() as $error)
    @if ($contains = Str::contains($error, 'credentials'))
        <script>
        $(document).ready(function(){
            $("#myModalLogin").modal('show');
        });
        </script>
    @else
        <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
        </script>
    @endif
    @endforeach
  @elseif (session('notification')) 
  <script>
  $(document).ready(function(){
		$("#myModalSuccess").modal('show');
	});
    </script>
  @endif

  <!-- Modal Appointment -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   
  <!--
   @if ($errors->any())
        <div class="alert alert-warning" role="alert">
          <div class="container">
          <div class="alert-icon">
              <i class="now-ui-icons ui-1_bell-53"></i>
          </div>
          @foreach ($errors->all() as $error)
          <strong>Warning!</strong> {{ $error }} 
          @endforeach
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">
              <i class="now-ui-icons ui-1_simple-remove"></i>
              </span>
          </button>
          </div>
      </div>
    @endif -->

    <form method="POST" action="{{ url('appointments') }}">
        @csrf
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="now-ui-icons ui-1_simple-remove"></i>
            </button>
            <h4 class="title title-up"> Reserva tu clase GRATIS</h4>
            </div>
            <div class="modal-body">
            <div class="card-body">
                <div class="input-group input-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="now-ui-icons ui-1_email-85"></i>
                    </span>
                </div>
                <input type="text" name="parentEmail" class="form-control" value="{{ old('parentEmail') }}" placeholder="Correo electrónico del padre" required>
                   @error('parentEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="input-group input-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="now-ui-icons users_single-02"></i>
                    </span>
                </div>
                <input type="text" name="parentName" class="form-control" value="{{ old('parentName') }}" placeholder="Nombre del padre" required>
                </div>
                <div class="input-group input-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="now-ui-icons tech_mobile"></i>
                    </span>
                </div>
                <input type="text" name="parentPhone" class="form-control" value="{{ old('parentPhone') }}" placeholder="Teléfono" required>
                </div>
                <div class="input-group input-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="now-ui-icons users_circle-08"></i>
                    </span>
                </div>
                <input type="text" name="childName" class="form-control" value="{{ old('childName') }}" placeholder="Nombre del Niño" required>
                </div>
                <div class="input-group input-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i class="now-ui-icons sport_user-run"></i>
                    </span>
                </div>
                <input type="text" name="childAge" class="form-control" value="{{ old('childAge') }}" placeholder="Edad del Niño" required>
                </div>
            </div>

            </div>
            <div class="modal-footer  justify-content-center">
            <button tipe="submit" class="btn btn-success text-center ">Reservar</button>
            </div>
        </div>
        </div>
    </form>
  </div>

    <!-- Modal Succes Appointment -->
    <div class="modal fade" id="myModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!--
        <div class="alert alert-success" role="alert">
                <div class="container">
                <div class="alert-icon">
                    <i class="now-ui-icons ui-2_like"></i>
                </div>
                
                <strong>Muy bien, </strong> {{ session('notification')}}
                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                    </span>
                </button>
                </div>
        </div> -->

        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
            <h4 class="title title-up"> Felicidades!</h4>
            </div>
            <div class="modal-header justify-content-center">
            <h5 class="description">
                     Uno de nuestros <b>Asesores Educativos</b> te contactará en menos de 24 hrs para acordar la fecha y hora de la <b>Clases de Prueba</b>.
            </h5>
            </div>
            <div class="modal-header justify-content-center">
            </div>
        </div>
        </div>
    </div>

  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/niña.jpg');">
      </div>
      <div class="container">
        <div class="content-center brand">
          <img class="n-logo" src="./assets/img/now-logo.png" alt="">
          <h1 class="h1-seo">Programación especializada para niños.</h1>
          <h3>“Las especies que sobreviven no son las más fuertes, sino aquellas que se adaptan mejor al cambio."</h3>
        </div>
        <h6 class="category category-absolute">Designed by
          <a href="http://invisionapp.com/" target="_blank">
            <img src="./assets/img/invision-white-slim.png" class="invision-logo" />
          </a>. Coded by
          <a href="https://www.creative-tim.com" target="_blank">
            <img src="./assets/img/creative-tim-white-slim2.png" class="creative-tim-logo" />
          </a>.</h6>
      </div>
    </div>
    <div class="main">
      <div class="section section-images">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <!--div class="hero-images-container">
                <img src="assets/img/hero-image-1.png" alt="">
              </div>
              <div class="hero-images-container-1">
                <img src="assets/img/hero-image-2.png" alt="">
              </div>
              <div class="hero-images-container-2">
                <img src="assets/img/hero-image-3.png" alt="">
              </div-->
              <div class="hero-images-container">
                <img src="assets/img/niño1.JPG" alt="">
              </div>
              <div class="hero-images-container-1">
                <img src="assets/img/niña2.JPG" alt="">
              </div>
              <div class="hero-images-container-2">
                <img src="assets/img/niño2.JPG" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Container Tabs --> 
    <div class="section section-tabs">
      <div class="container">
        <div class="row">
          <div class="col-md-10 ml-auto col-xl-12 mr-auto">
            <p class="category">Plan de Estudios</p>
            <!-- Nav tabs -->
            <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#basico" role="tab">
                      <i class="now-ui-icons objects_umbrella-13"></i> Básico
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#medio" role="tab">
                      <i class="now-ui-icons shopping_cart-simple"></i> Medio
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#avanzado" role="tab">
                      <i class="now-ui-icons shopping_shop"></i> Avanzado
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profesional" role="tab">
                      <i class="now-ui-icons ui-2_settings-90"></i> Profesional
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <!-- Tab panes -->
                <div class="tab-content text-center">
                  <div class="tab-pane active" id="basico" role="tabpanel">
                    <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                  </div>
                  <div class="tab-pane" id="medio" role="tabpanel">
                    <p> I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. </p>
                  </div>
                  <div class="tab-pane" id="avanzado" role="tabpanel">
                    <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                  </div>
                  <div class="tab-pane" id="profesional" role="tabpanel">
                    <p>
                      "I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at."
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          * Los cursos tienen validez de por vida. Cancele en cualquier momento a partir del día de inscripción para obtener un reembolso del 100% sin preguntas.
        </div>
      </div>
    </div>

    <!-- Caroussel --> 
    <div class="section" id="carousel">
      <div class="container">
        <div class="title">
          <h4>Carousel</h4>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="d-block" src="assets/img/niña.jpg" alt="First slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Nature, United States</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block" src="assets/img/niño1.jpg" alt="Second slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Somewhere Beyond, United States</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block" src="assets/img/niña2.jpg" alt="Third slide">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Yellowstone National Park, United States</h5>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <i class="now-ui-icons arrows-1_minimal-left"></i>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <i class="now-ui-icons arrows-1_minimal-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer --> 
    <footer class="footer footer-default">
      <div class=" container ">
        <nav>
          <ul>
            <li>
              <a href="http://presentation.creative-tim.com">
                Quienes somos
              </a>
            </li>
            <li>
              <a href="http://blog.creative-tim.com">
                Blog
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright" id="copyright">
          ©
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script> Derechos de autor <a href="https://www.invisionapp.com" target="_blank">EncodingClub</a>. Todos los derechos reservados
        </div>
      </div>
    </footer>
  </div>  



  
  
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="./assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="./assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>

  <script>

/*-
	$(document).ready(function(){
		$("#myModal").modal('show');
	});-*/
</script>

  <script>

function showModal() {

    $(document).ready(function(){
		$("#myModal").modal('show');
	});
}


    $(document).ready(function() {
      // the body of this function is in assets/js/now-ui-kit.js
      nowuiKit.initSliders();
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }

  </script>
</body>

</html>
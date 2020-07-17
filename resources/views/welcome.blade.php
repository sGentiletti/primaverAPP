<!doctype html>
<html lang="es">

<head>
    <title>PrimaverApp | SeJu Turdera</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="PrimaverApp - La plataforma online de la Semana de la Juventud">
    <meta name="keywords" content="SeJu, semana de la juventud, turdera, buenos aires, comunidad, comunidades, seju">
    <!-- Social Media -->
    <meta property="og:title" content="PrimaverApp | SeJu Turdera">
    <meta property="og:description" content="PrimaverApp - La plataforma online de la Semana de la Juventud">
    <meta property="og:image" content="https://app.sejuturdera.com.ar/img/thumbnail.jpg">
    <meta property="og:url" content="https://app.sejuturdera.com.ar">
    <meta name="twitter:card" content="summary_large_image">
    <!--  Non-Essential, But Recommended -->
    <meta property="og:site_name" content="PrimaverApp | SeJu Turdera">
    <meta name="twitter:image:alt" content="Website thumbnail">

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="css/welcome.css" rel="stylesheet">
    <!-- AlertCss -->
    <link rel="stylesheet" href="css/sweetalert2.min.css">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

    <!-- Nav Menu -->

    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand"><img src="img/logo.svg" width="150" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link active" href="#home">INICIO <span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#features">¿CÓMO FUNCIONA?</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#contact">CONTACTO</a> </li>
                                @auth
                                    <li class="nav-item"><a href="{{route('perfil')}}" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Mi Cuenta</a></li>
                                @else
                                    <li class="nav-item"><a href="{{route('login')}}" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Iniciar Sesión</a></li>
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <header class="bg-gradient" id="home">
        <div class="container mt-5">
            <h1>Gestioná tu tribu.</h1>
            <p class="tagline">Nunca fue tan fácil inscribirse en la SeJu. <br>Ya disponible. </p>
        </div>
        <div class="img-holder mt-3" id="vidbox">
            <video width="500" id="vid" autoplay muted>
                <source src="img/transparency.webm" type="video/webm">
              Your browser does not support the video tag.
            </video>
        </div>
        <div class="img-holder mt-3 d-none" id="mockup">
            <img src="img/iphonex.png" alt="phone" class="img-fluid">
        </div>
    </header>

    <div class="section" id="features">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="box-icon"><span class="ti-mobile gradient-fill ti-3x"></span></div>
                    <h2>Gestioná tu tribu</h2>
                    <p class="mb-4">La herramienta perfecta para los caciques. Gestioná a todos tus indios y el estado de la inscripción. Nosotros nos encargamos del resto.</p>
                </div>
            </div>
            <div class="perspective-phone">
                <img src="img/perspective.png" alt="perspective phone" class="img-fluid">
            </div>
        </div>

    </div>
    <!-- // end .section -->


    <div class="section light-bg">
        <div class="container">
            <div class="section-title">
                <small>FUNCIONALIDADES</small>
                <h3>¿Cómo funciona?</h3>
            </div>

            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#sercacique">Ser Cacique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#Preinscripciones">Preinscripciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#Inscripciones">Inscripciones</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="sercacique">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="img/graphic.png" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                        <div>

                            <h2>Registrarse para ser Cacique</h2>
                            <p class="lead">Para tener acceso a la plataforma y empezar a crear una tribu. </p>
                            <p>El cacique es la persona que valiéndose de su influencia o riqueza administra una tribu. Es quien se encarga de registar a los demas indios y notificarles de todos los comunicados importantes.
                            </p>
                            <p> Un cacique no es líder. Encargarse de la burocracia no te otorga el privilegio de decidir por tu tribu.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Preinscripciones">
                    <div class="d-flex flex-column flex-lg-row">
                        <div>
                            <h2>Crear una tribu</h2>
                            <p class="lead">Para poder inscribirte, primero necesitás de una tribu. </p>
                            <p>Una tribu es un grupo de entre 12 y 16 personas, cumpliendo un mínimo de 6 mujeres y 6 varones. Para poder ser tribu, deberán pre inscribirse y cumplir los requisitos de las inscripciones, en tiempo y forma. Luego se les asignará un número que los identifique.
                            </p>
                        </div>
                        <img src="img/graphic.png" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                    </div>
                </div>
                <div class="tab-pane fade" id="Inscripciones">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="img/graphic.png" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                        <div>
                            <h2>Inscribirse</h2>
                            <p class="lead">Cuando hayas confirmado tu preinscripción, empieza el trabajo de nosotros. </p>
                            <p>Para verificar que cumplas con todos los requisitos, en esta instancia, nosotros nos encargaremos de verificar manualmente los datos ingresados pidiendo la documentación necesaria.
                            </p>
                            <p>Una vez que hayamos determinado que está todo en orden, ya son una tribu oficialmente y se les asignará un número.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- // end .section -->

    <div class="section light-bg">

        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center">
                    <ul class="list-unstyled ui-steps">
                        <li class="media">
                            <div class="circle-icon mr-4">1</div>
                            <div class="media-body">
                                <h5>Registrarse como Cacique</h5>
                                <p>Registrate como Cacique de una tribu para empezar a agregar a tus amigos. </p>
                            </div>
                        </li>
                        <li class="media my-4">
                            <div class="circle-icon mr-4">2</div>
                            <div class="media-body">
                                <h5>Preinscripción</h5>
                                <p>Agregá a tus amigos a la tribu, cuando todos hayan verificado sus datos y esté todo listo, confirmala.</p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="circle-icon mr-4">3</div>
                            <div class="media-body">
                                <h5>Inscripción</h5>
                                <p>Nos encargaremos de verificar a todos los preinscriptos. Si todo sale bien, te otorgaremos tu número de tribu. </p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="circle-icon mr-4">4</div>
                            <div class="media-body">
                                <h5>Disfrutá de la SeJu</h5>
                                <p>Cuando seas tribu, podés empezar a disfrutar de la SeJu.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                

            </div>

        </div>

    </div>
    <!-- // end .section -->

    <!-- 
    <div class="section light-bg" id="gallery">
        <div class="container">
            <div class="section-title">
                <small>GALERÍA</small>
                <h3>La Semana de la Juventud</h3>
            </div>

            <div class="img-gallery owl-carousel owl-theme">
                <img src="img/1.png" alt="image">
                <img src="img/2.jpg" alt="image">
                <img src="img/3.jpg" alt="image">
                <img src="img/4.jpg" alt="image">
            </div>

        </div>

    </div>
    <!-- // end .section --> 

    <div class="section pt-5">
        <div class="container">
            <div class="section-title">
                <small>FAQ</small>
                <h3>Preguntas Frecuentes</h3>
            </div>

            <div class="row pt-4">
                <div class="col-md-6">
                    <h4 class="mb-3">¿A quién está dirigida esta plataforma?</h4>
                    <p class="light-font mb-5"><strong>PrimaverApp</strong> está dirigida a los caciques, para que gestionen su tribu durante las inscripciones. Los indios pueden utilizar la plataforma sólo para ver sus datos y corroborar el estado de su inscripción. </p>
                    <h4 class="mb-3">¿Esto va a ser solo para la SeJu 48?</h4>
                    <p class="light-font mb-5">Nuestro objetivo es facilitar el proceso de inscripción a distancia como respuesta a la pandemia de COVID-19. Si recibimos una respuesta positiva por parte de nuestra comunidad sobre la nueva plataforma podríamos extender su uso para los años subsiguientes, por eso es muy importante tu feedback, cualquier comentario que quieras hacernos, podes hacerlo siempre a través de nuestra plataforma o redes sociales. </p>
                </div>
                <div class="col-md-6">
                    <h4 class="mb-3">¿Necesito una computadora para participar?</h4>
                    <p class="light-font mb-5">Todas las actividades van a estar pensadas para adaptarse a cualquier dispositivo conectado a Internet. Creemos que hoy es una herramienta con la que la mayoría puede contar. </p>
                    <h4 class="mb-3">Tengo un problema, ¿Dónde me pongo en contacto con ustedes?</h4>
                    <p class="light-font mb-5">Podés contactarte con nosotros a través del formulario de contacto o nuestras redes sociales por cualquier duda o inconveniente que pudieses llegar a tener. </p>
                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->



    <div class="section bg-gradient">
        <div id="form-div" class="container">
            <div class="call-to-action">

                <h2>Ponete en contacto con nosotros</h2>
                <p class="tagline">Si tenés dudas podés escribirnos y te responderemos a la brevedad. </p>

                <div class="row d-flex justify-content-center mt-3">
                    <div class="col-sm-12 col-md-8">
                        <div class="card">
                            <div class="card-body text-left">
                                <form id="formulario">
                                    @csrf
                                    <div class="form-group">
                                        <label style="color:#633991;">Nombre</label>
                                        <input required name="nombre" type="text" class="form-control" aria-describedby="name">
                                      </div>
                                    <div class="form-group">
                                      <label style="color:#633991;">Correo Electrónico</label>
                                      <input required name="email" type="email" class="form-control" aria-describedby="email">
                                      <small id="email" class="form-text text-muted">No compartiremos tu correo con nadie.</small>
                                    </div>
                                    <div class="form-group">
                                      <label style="color:#633991;">Mensaje:</label>
                                      <textarea required name="mensaje" class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar <span id="submitLoader" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span></button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div id="gracias" class="container d-none">
            <div class="call-to-action">
                <h2>Gracias!</h2>
                <p class="tagline">Tu mensaje fue recibido.</p>
            </div>
        </div>

    </div>
    <!-- // end .section -->

    <div class="light-bg pt-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> Suipacha 110, Turdera, Buenos Aires.</p>
                    <div class=" d-block d-sm-inline-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:contacto@sejuturdera.com.ar">contacto@sejuturdera.com.ar</a>
                        </p>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="social-icons">
                        <a target="_blank" href="https://www.facebook.com/SejuTurderaOficial/"><span class="ti-facebook"></span></a>
                        <a target="_blank" href="https://twitter.com/sejuturdera"><span class="ti-twitter-alt"></span></a>
                        <a target="_blank" href="https://www.instagram.com/sejuturdera/"><span class="ti-instagram"></span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                    <img width="200" src="img/logo-gris.svg" alt="">
                </div>
            </div>
        </div>

    </div>
    <!-- // end .section -->

    <!-- jQuery and Bootstrap -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>

    <script>
    var viewportWidth = window.innerWidth;
    var video = $('#vid');

    if (viewportWidth <= 500) {
        video.attr('width', '300');
    }

    /* <- END Title Fix -> */
    </script>
    <script>
    //Detect if user is on safari.
    var ua = navigator.userAgent.toLowerCase(); 
    if (ua.indexOf('safari') != -1) { 
        if (ua.indexOf('chrome') > -1) {
            // Chrome
        } else {
            $('#vidbox').addClass("d-none");
            $('#mockup').removeClass("d-none");
        }
    }
    </script>

</body>

</html>

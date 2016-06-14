<?php
  $servername = "localhost"; $username = "root"; $password = "123456"; $database_kpop = "kpopdb";
  $kpop = mysql_connect($servername, $username, $password);
  mysql_select_db($database_kpop, $kpop);
  
  $query_ranking = "SELECT tmp.puesto,c.nom_cancion,c.autor FROM cancion c,(select id_ranking,puesto from ranking) tmp where c.id_ranking =tmp.id_ranking order by puesto";
  $ranking = mysql_query($query_ranking, $kpop) or die(mysql_error());
  $row_ranking = mysql_fetch_assoc($ranking);
  $totalRows_ranking = mysql_num_rows($ranking);

  $query_noticias = "SELECT fotografia, fecha, descripcion, id_usuario FROM publicidad ORDER BY fecha desc";
  $noticias = mysql_query($query_noticias, $kpop) or die(mysql_error());
  $row_noticias = mysql_fetch_assoc($noticias);
  $totalRows_noticias = mysql_num_rows($noticias);

  $query_artistas = "SELECT artista.*, IFNULL(CONTADOR_VOTOS.votos, 0) AS votos from artista LEFT JOIN (SELECT id_artista, COUNT(*) as votos FROM voto_artista GROUP BY id_artista) CONTADOR_VOTOS USING(id_artista) ORDER BY votos DESC;";
  $artistas = mysql_query($query_artistas, $kpop) or die(mysql_error());
  $row_artistas = mysql_fetch_assoc($artistas);
  $totalRows_artistas = mysql_num_rows($artistas);

  $query_grupo = "SELECT grupo.*, IFNULL(CONTADOR_VOTOS.votos, 0) AS votos from grupo LEFT JOIN (SELECT id_grupo, COUNT(*) as votos FROM voto_grupo GROUP BY id_grupo) CONTADOR_VOTOS USING(id_grupo) ORDER BY votos DESC;";
  $grupos = mysql_query($query_grupo, $kpop) or die(mysql_error());
  $row_grupos = mysql_fetch_assoc($grupos);
  $totalRows_grupos = mysql_num_rows($grupos);

  $query_cancion = "SELECT cancion.*, IFNULL(CONTADOR_VOTOS.votos, 0) AS votos from cancion LEFT JOIN (SELECT id_cancion, COUNT(*) as votos FROM voto_cancion GROUP BY id_cancion) CONTADOR_VOTOS USING(id_cancion) ORDER BY votos DESC;";
  $canciones = mysql_query($query_cancion, $kpop) or die(mysql_error());
  $row_canciones = mysql_fetch_assoc($canciones);
  $totalRows_canciones = mysql_num_rows($canciones);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KPOP</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-calendar/css/calendar.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">KPOP PARA EL MUNDO</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#grupos">GRUPOS</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#artistas">ARTISTAS</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#canciones">CANCIONES</a>
                    </li>
                    <li class="page-scroll" id="registrarse">
                        <a href="#register" data-toggle="modal">Registrarse</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact" data-toggle="modal" id="iniciarSesion">Iniciar<br>Sesion</a>
                        <a href="#" class="hide" id="cerrarSesion" onclick="cerrarSesion()">Cerrar<br>Sesion</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="Imagenes/front.jpg" alt="">
                    <div class="intro-text">
                        <span class="name">RANKING KPOP</span>
                        <hr class="star-light">
                        <span class="skills">GRUPOS Y ARTISTAS</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--grupos Section -->
    <section id="grupos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>RANKING GRUPOS</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php $i = 1; do { ?>
                    <div class="col-sm-12 portfolio-item success">
                        <div class="col-sm-6">
                            <a href="#gruposModal<?php echo $i; ?>" class="portfolio-link" data-toggle="modal">
                            <img src="<?php echo $row_grupos['fotografia']; ?>" class="img-responsive img-thumbnail" alt="" width="900" height="600">
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <p><?php echo $row_grupos['nombre_grupo']; ?></p>
                            <p><?php echo $row_grupos['caracteristicas']; ?></p>
                            <div class="col-sm-12 text-center">
                                <button id="<?php echo $row_grupos['id_grupo']; ?>" class="btn btn-success btn-block" onclick="votarGrupo(this, '<?php echo $row_grupos['id_grupo']; ?>')">
                                <?php
                                    echo $row_grupos['votos'];
                                ?>
                                 VOTOS - <i class="fa fa-thumbs-o-up"></i>
                                </button>
                            </div>
                            <?php 
                                echo "<script> ".
                                "var btn = document.getElementById('".$row_grupos['id_grupo']."');".
                                "btn.className = btn.className + ' disabled';;".
                                "setTimeout(function() { verVotosGrupos('".$row_grupos['id_grupo']."')  }, 3000);".
                                "</script>";
                            ?>
                        </div>
                    </div>
                <?php 
                    $i++;
                } while ($row_grupos = mysql_fetch_assoc($grupos)); ?>
            </div>
            <!-- <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#nuevoGrupo" data-toggle="modal" class="btn btn-lg" style="background-color: #2c3e50;">
                        <i class="fa fa-newspaper-o"></i> AGREGAR UN GRUPO
                    </a>
                </div>
            </div> -->
        </div>
    </section>

    <!-- ARTISTAS Section -->
    <section id="artistas">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>RANKING ARTISTAS</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php $i = 1; do { ?>
                    <div class="col-sm-12 portfolio-item">
                        <div class="col-sm-6">
                            <a href="#artistaModal<?php echo $i; ?>" class="portfolio-link" data-toggle="modal">
                                <img src="<?php echo $row_artistas['fotografia']; ?>" class="img-responsive img-thumbnail" alt="" width="900" height="600">
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <p><?php echo $row_artistas['nombre']; ?></p>
                            <p><?php #echo $row_artistas['fecha']; ?></p>
                            <div class="col-sm-12 text-center">
                                <button id="<?php echo $row_artistas['id_artista']; ?>" class="btn btn-success btn-block" onclick="votarArtista(this, '<?php echo $row_artistas['id_artista']; ?>')">
                                <?php
                                    echo $row_artistas['votos'];
                                ?>
                                 VOTOS - <i class="fa fa-thumbs-o-up"></i>
                                </button>
                            </div>
                            <?php 
                                echo "<script> ".
                                "var btn = document.getElementById('".$row_artistas['id_artista']."');".
                                "btn.className = btn.className + ' disabled';".
                                "setTimeout(function() { verVotosArtistas('".$row_artistas['id_artista']."')  }, 3000);".
                                "</script>";
                            ?>
                        </div>
                    </div>
                <?php 
                    $i++;
                } while ($row_artistas = mysql_fetch_assoc($artistas)); ?>
            </div>
            <!-- <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#nuevoArtista" data-toggle="modal" class="btn btn-lg" style="background-color: #2c3e50;">
                        <i class="fa fa-newspaper-o"></i> AGREGAR UN ARTISTA
                    </a>
                </div>
            </div> -->
        </div>
    </section>

    <!-- About Section -->
    <section id="canciones">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>RANKING CANCIONES</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                
                <?php $i = 1; do { ?>
                    <div class="col-sm-12 portfolio-item">
                        <!-- <div class="col-sm-6">
                            <a href="" class="portfolio-link" data-toggle="modal">
                                <img src="" class="img-responsive img-thumbnail" alt="" width="900" height="600">
                            </a>
                        </div> -->
                        <div class="col-sm-12 text-center">
                            <p> TEMA: <?php echo $row_canciones['nom_cancion']; ?></p>
                            <p> ARTISTA: <?php echo $row_canciones['autor']; ?></p>
                            <div class="col-sm-12 text-center">
                                <button id="<?php echo $row_canciones['autor']; ?>" class="btn btn-success" onclick="votarCancion(this, <?php echo $row_canciones['id_cancion']; ?>)">
                                <?php
                                    echo $row_canciones['votos'];
                                ?>
                                 VOTOS - <i class="fa fa-thumbs-o-up"></i>
                                </button>
                            </div>
                            <?php 
                                echo "<script> ".
                                "var btn = document.getElementById('".$row_canciones['autor']."');".
                                "btn.className = btn.className + ' disabled';".
                                "setTimeout(function() { verVotosCanciones('".$row_canciones['autor']."',".$row_canciones['id_cancion'].")  }, 3000);".
                                "</script>";
                            ?>
                        </div>
                    </div>
                <?php 
                    $i++;
                } while ($row_canciones = mysql_fetch_assoc($canciones)); ?>

            </div>
        </div>
    </section>

    <!-- Contact Section -->

    <div class="portfolio-modal modal fade" id="contact" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div id="contactFormClose" class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Iniciar Sesion</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form name="sentMessage" id="contactForm" novalidate>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control" placeholder="Usuario" id="user" required data-validation-required-message="Ingrese su usuario.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" placeholder="Contraseña" id="password" required data-validation-required-message="Ingrese su contraseña.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg">Iniciar Sesion</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Section -->

    <div class="portfolio-modal modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div id="regFormClose" class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Registrarse</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form name="sentMessage" id="registerForm" novalidate>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control" placeholder="Usuario" id="reguser" required data-validation-required-message="Ingrese su usuario.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" placeholder="Contraseña" id="regpassword" required data-validation-required-message="Ingrese su contraseña.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div id="regsuccess"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg">Crear Usuario</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Bolivia</h3>
                        <p>La Paz</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Compartir</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Acerca de Kpop para el Mundo</h3>
                        <p>Un sitio web para compartir noticias y eventos sobre el kpop</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Kpop para el Mundo 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Artistas Modals -->
    <?php
          $query_artistas = "SELECT * FROM artista";
          $artistas = mysql_query($query_artistas, $kpop) or die(mysql_error());
          $row_artistas = mysql_fetch_assoc($artistas);
          $totalRows_artistas = mysql_num_rows($artistas);

        $i = 1;
        do {
            ?>
            <div class="portfolio-modal modal fade" id="artistaModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <h2><?php echo $row_artistas['nombre']; ?></h2>
                                    <hr class="star-primary">
                                    <img src="<?php echo $row_artistas['fotografia']; ?>" class="img-responsive img-centered" alt="" width="900" height="600">
                                    <p><?php #echo $row_artistas['noticia']; ?></p>
                                    <ul class="list-inline item-details">
                                        <li>Usuario:
                                            <strong><?php 
                                                #echo $row_artistas['id_usuario'];
                                             ?></strong>
                                        </li>
                                        <li>Fecha:
                                            <strong><?php #echo $row_artistas['fecha']; ?></strong>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <?php
            $i++;
        } while ($row_artistas = mysql_fetch_assoc($artistas)); 
    ?>

    <!-- grupos Modals -->
    <?php
          $query_grupo = "SELECT * FROM grupo";
          $grupos = mysql_query($query_grupo, $kpop) or die(mysql_error());
          $row_grupos = mysql_fetch_assoc($grupos);
          $totalRows_grupos = mysql_num_rows($grupos);

        $i = 1;
        do {
            ?>
            <div class="portfolio-modal modal fade" id="gruposModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <h2><?php echo $row_grupos['nombre_grupo']; ?></h2>
                                    <hr class="star-primary">
                                    <img src="<?php echo $row_grupos['fotografia']; ?>" class="img-responsive img-centered" alt="" width="900" height="600">
                                    <p><?php #echo $row_artistas['noticia']; ?></p>
                                    <ul class="list-inline item-details">
                                        <li>Usuario:
                                            <strong><?php 
                                                #echo $row_artistas['id_usuario'];
                                             ?></strong>
                                        </li>
                                        <li>Fecha:
                                            <strong><?php #echo $row_artistas['fecha']; ?></strong>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <?php
            $i++;
        } while ($row_grupos = mysql_fetch_assoc($grupos)); 
    ?>

    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>


    <script type="text/javascript" src="bower_components/bootstrap-calendar/js/calendar.js"></script>
    <script type="text/javascript" src="bower_components/underscore/underscore.js"></script>
    <script type="text/javascript" src="bower_components/moment/moment.js"></script>
    <script type="text/javascript" src="bower_components/bootstrap-calendar/js/language/es-ES.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>

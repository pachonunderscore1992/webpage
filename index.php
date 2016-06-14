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

  $query_artistas = "SELECT * FROM artista";
  $artistas = mysql_query($query_artistas, $kpop) or die(mysql_error());
  $row_artistas = mysql_fetch_assoc($artistas);
  $totalRows_artistas = mysql_num_rows($artistas);

  $query_grupo = "SELECT * FROM grupo";
  $grupos = mysql_query($query_grupo, $kpop) or die(mysql_error());
  $row_grupos = mysql_fetch_assoc($grupos);
  $totalRows_grupos = mysql_num_rows($grupos);


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
                <a class="navbar-brand" href="#page-top">KPOP PARA EL MUNDO</a>
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
                        <a href="#portfolio">Noticias</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Ranking</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#calendar">Calendario</a>
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
                        <span class="name">KPOP PARA EL MUNDO</span>
                        <hr class="star-light">
                        <span class="skills">Un sitio web para compartir noticias y eventos sobre el kpop</span>
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
                    <h2>GRUPOS</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php $i = 1; do { ?>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#gruposModal<?php echo $i; ?>" class="portfolio-link" data-toggle="modal">
                            <!-- <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-newspaper-o fa-3x"></i>
                                </div>
                            </div> -->
                            <img src="<?php echo $row_grupos['fotografia']; ?>" class="img-responsive" alt="" width="900" height="600">
                        </a>
                        <p><?php echo $row_grupos['nombre_grupo']; ?></p>
                        <p><?php echo $row_grupos['caracteristicas']; ?></p>
                    </div>
                <?php 
                    $i++;
                } while ($row_grupos = mysql_fetch_assoc($grupos)); ?>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#nuevoGrupo" data-toggle="modal" class="btn btn-lg" style="background-color: #2c3e50;">
                        <i class="fa fa-newspaper-o"></i> AGREGAR UN GRUPO
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- ARTISTAS Section -->
    <section id="artistas">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>ARTISTAS</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php $i = 1; do { ?>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#artistaModal<?php echo $i; ?>" class="portfolio-link" data-toggle="modal">
                            <!-- <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-newspaper-o fa-3x"></i>
                                </div>
                            </div> -->
                            <img src="<?php echo $row_artistas['fotografia']; ?>" class="img-responsive" alt="" width="900" height="600">
                        </a>
                        <p><?php echo $row_artistas['nombre']; ?></p>
                        <p><?php #echo $row_artistas['fecha']; ?></p>
                    </div>
                <?php 
                    $i++ ; 
                } while ($row_artistas = mysql_fetch_assoc($artistas)); ?>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#nuevoArtista" data-toggle="modal" class="btn btn-lg" style="background-color: #2c3e50;">
                        <i class="fa fa-newspaper-o"></i> AGREGAR UN ARTISTA
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>NOTICIAS</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php $i = 1; do { ?>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal<?php echo $i; ?>" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-newspaper-o fa-3x"></i>
                                </div>
                            </div>
                            <img src="<?php echo $row_noticias['fotografia']; ?>" class="img-responsive" alt="" width="900" height="600">
                        </a>
                        <p><?php echo $row_noticias['descripcion']; ?></p>
                        <p><?php echo $row_noticias['fecha']; ?></p>
                    </div>
                <?php 
                    $i++ ; 
                } while ($row_noticias = mysql_fetch_assoc($noticias)); ?>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#nuevaNoticia" data-toggle="modal" class="btn btn-lg" style="background-color: #2c3e50;">
                        <i class="fa fa-newspaper-o"></i> AGREGAR UNA NOTICIA
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><a href="ranking.php">RANKING</a></h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <?php for ($i = 0 ; $i < 5 ; $i++) { ?>
                    <p><?php echo $row_ranking['puesto']." - "; ?>  <?php echo $row_ranking['nom_cancion']." - "; ?>  <?php echo $row_ranking['autor']; ?></p>
                    <?php $row_ranking = mysql_fetch_assoc($ranking); } ?>
                </div>
                <div class="col-lg-4">
                    <?php for ($i = 0 ; $i < 5 ; $i++) { ?>
                    <p><?php echo $row_ranking['puesto']." - "; ?>  <?php echo $row_ranking['nom_cancion']." - "; ?>  <?php echo $row_ranking['autor']; ?></p>
                    <?php $row_ranking = mysql_fetch_assoc($ranking); } ?>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#" class="btn btn-lg btn-outline">
                        <i class="fa fa-thumbs-o-up"></i> VOTA POR TU ARTISTA
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Calendar Section -->
    <section id="calendar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>CALENDARIO</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div id="calendario"></div>
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

    <!-- NuevaNoticia Section -->

    <div class="portfolio-modal modal fade" id="nuevaNoticia" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div id="nuevaNoticiaFormClose" class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>NUEVA NOTICIA</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form name="sentMessage" id="nuevaNoticiaForm" novalidate>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" placeholder="Titulo" id="titulo" required data-validation-required-message="Ingrese un titulo.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Noticia</label>
                                    <textarea rows="5" class="form-control" placeholder="Noticia" id="noticia" required data-validation-required-message="Ingrese la noticia"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div id="nuevasuccess"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">11
                                    <button type="submit" class="btn btn-success btn-lg">Crear Noticia</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- nuevoArtista Section -->

    <div class="portfolio-modal modal fade" id="nuevoArtista" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div id="nuevoArtistaFormClose" class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>NUEVO ARTISTA</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form action="nuevoartista.php" method="post" enctype="multipart/form-data">
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre_artista" id="nombre_artista" required data-validation-required-message="Ingrese el nombre.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                             <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label></label>
                                    <input type="file" id="foto" name="foto">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div id="nuevoArtistaSuccess"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg">Crear Grupo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- nuevoArtista Section -->

    <div class="portfolio-modal modal fade" id="nuevoGrupo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div id="nuevoGrupoFormClose" class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>NUEVO GRUPO</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <form action="nuevogrupo.php" method="post" enctype="multipart/form-data">
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre_grupo" id="nombre_grupo" required data-validation-required-message="Ingrese el nombre.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                             <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label></label>
                                    <input type="file" id="foto_grupo" name="foto_grupo">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div id="nuevoGrupoSuccess"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg">Crear Artista</button>
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

    <!-- Portfolio Modals -->
    <?php
        $query_noticias = "SELECT fotografia, fecha, descripcion, noticia, id_usuario FROM publicidad ORDER BY fecha desc";
        $noticias = mysql_query($query_noticias, $kpop) or die(mysql_error());
        $row_noticias = mysql_fetch_assoc($noticias);
        $i = 1;
        do {
            ?>
            <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2><?php echo $row_noticias['descripcion']; ?></h2>
                                    <hr class="star-primary">
                                    <img src="<?php echo $row_noticias['fotografia']; ?>" class="img-responsive img-centered" alt="" width="900" height="600">
                                    <p><?php echo $row_noticias['noticia']; ?></p>
                                    <ul class="list-inline item-details">
                                        <li>Usuario:
                                            <strong><?php 
                                                echo $row_noticias['id_usuario'];
                                             ?></strong>
                                        </li>
                                        <li>Fecha:
                                            <strong><?php echo $row_noticias['fecha']; ?></strong>
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
        } while ($row_noticias = mysql_fetch_assoc($noticias)); 
    ?>

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

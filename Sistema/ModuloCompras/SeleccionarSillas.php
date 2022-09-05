<?php
include("../../conexion.php");

session_start();

if(!isset($_SESSION['loggedin']))
{
    header('location: index.php');
}

$mensaje=$_GET["mensaje"];

$sql_usuario = "SELECT * FROM USUARIOS INNER JOIN EMPLEADOS ON EMPLEADOS.cod_usuario = USUARIOS.cod_usuario WHERE USUARIOS.nom_usuario = '$mensaje'";
$result = mysqli_query($con, $sql_usuario);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title Page-->
    <title>Cine Jungla</title>

    <!-- Fontfaces CSS-->
    <link href="Bienes/css/font-face.css" rel="stylesheet" media="all">
    <link href="Bienes/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="Bienes/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="Bienes/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="Bienes/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="Bienes/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="Bienes/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
        media="all">
    <link href="Bienes/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="Bienes/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="Bienes/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="Bienes/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="Bienes/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="Bienes/css/theme.css" rel="stylesheet" media="all">

    <script>
    document.getElementsByTagName("html")[0].className += " js";
    </script>

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="Bienes/css/style.css" />
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='css/normalize.css'>

    <script type="text/javascript" src="js/cambiar.js"></script>
</head>

<body class="">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block cambio">
            <div class="logo">
                <a href="#">
                    <img src="Img/CineJungla.jpg" alt="Cine Jungla" />
                </a>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container sinpadding">

            <!-- HEADER DESKTOP-->
            <header class="header-desktop cambio2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../../Fotos/Empleados/usuario.jpg"
                                                alt="<?php echo $row['nom_empleado']?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">
                                                <?php echo $row['nom_empleado']?>
                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../../Fotos/Empleados/<?php echo $row['foto_empleado']?>"
                                                            alt="<?php echo $row['nom_empleado']?>" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">
                                                            <?php echo $row['nom_empleado']?>
                                                        </a>
                                                    </h5>
                                                    <span class="email">C.C. <?php echo $row['ced_empleado']?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../../cerrarSesion.php">
                                                    <i class="zmdi zmdi-power"></i>Cerrar sesión</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- CONTENIDO SELECCIONAR SILLAS-->
            <main class="principal">
                <fieldset class="contenidoPrincipal">
                    <div class="pantalla">
                        <img src="Img/Pantalla.png" alt="Pantalla">
                    </div>
                    <div class="sillas">
                        <div class="panelDos">
                            <div class="panelIzq">
                            
                            <?php
                            for($i=1; $i <=12; $i++){
                                echo '<button id="btn'. $i . '" class="btn" onclick="changeColor(this)" title="Silla '. $i . '">  </button>';
                            }
                            ?>
                                
                            </div>

                            <div class="panelDer">
                            <?php
                            for($i=13; $i <=40; $i++){
                                echo '<button id="btn'. $i . '" class="btn" onclick="changeColor(this)" title="Silla '. $i . '">  </button>';
                            }
                            ?>
                            </div>

                        </div>

                        <div class="panelInferior">
                        <?php
                            for($i=41; $i <=60; $i++){
                                echo '<button id="btn'. $i . '" class="btn btnPre" onclick="changeColor(this)" title="Silla '. $i . '">  </button>';
                            }
                            ?>
                        </div>    
                        
                    </div>

                    <div class="informacion">

                        <div class="cajaInfo infoOcupado ">
                            <p title="Ocupado" >Ocupado</p>
                        </div>
                        <div class="cajaInfo infolibrePre ">
                            <p title="Libre Preferencial" >Libre preferencial</p>
                        </div>
                        <div class="cajaInfo infolibreGen ">
                            <p title="Libre General" >Libre general</p>
                        </div>

                        <div class="cajaInfo infolibreSeleccion">
                            <p title="Libre Seleccionado" >Seleccionado</p>
                        </div>
                    </div>

                    <div class="enviar">
                        <p>Cantidad sillas seleccionadas: <span id="valor">0</span></p>
                        <a title="Siguiente..." href="procesoPago.php">Comprar boletas</a>
                        <a title="Siguiente..." href="Comidas.php?mensaje= <?php echo $mensaje ?>">Seguir a confiteria</a>
                        
                    </div>

                </fieldset>  
            </main>
            <!--FIN CONTENIDO SELECCIONAR SILLAS-->
        </div>
        <!--FIN PAGE CONTAINER-->
    </div>
       

<!-- jQuery Plugins -->
    <!-- cd-cart -->
    <script src="Bienes/js/utilSnacks.js"></script>
    <!-- util functions included in the CodyHouse framework -->
    <script src="Bienes/js/mainSnacks.js"></script>

    <!-- Jquery JS-->
    <script src="Bienes/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="Bienes/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="Bienes/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="Bienes/vendor/slick/slick.min.js">
    </script>
    <script src="Bienes/vendor/wow/wow.min.js"></script>
    <script src="Bienes/vendor/animsition/animsition.min.js"></script>
    <script src="Bienes/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="Bienes/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="Bienes/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="Bienes/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="Bienes/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="Bienes/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="Bienes/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="Bienes/js/main.js"></script>

</body>

</html>
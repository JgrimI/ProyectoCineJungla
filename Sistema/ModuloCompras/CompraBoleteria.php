<?php
include("../../conexion.php");

session_start();

if(!isset($_SESSION['loggedin']))
{
    header('location: ../index.php');
}

$mensaje=$_GET["mensaje"];

$sql_usuario = "SELECT * FROM USUARIOS INNER JOIN EMPLEADOS ON EMPLEADOS.cod_usuario = USUARIOS.cod_usuario WHERE USUARIOS.nom_usuario = '$mensaje'";
$result = mysqli_query($con, $sql_usuario);
$row = mysqli_fetch_assoc($result);

?>
<!doctype html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Cine Jungla</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

     <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


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


</head>

<body>
    <div class="page-wrapper">
        <div class="dashboard-main-wrapper">

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
                                <div class="noti-wrap">
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../../Fotos/Empleados/<?php echo $row['foto_empleado']?>"
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
            <center>

                    <!--CONEXION A BASE DE DATOS PELICULAS-->

                    <?php 
                        
                        $sql_pelicula = "SELECT cod_pelicula, nom_pelicula, foto_pelicula FROM pelicula";
                        $resultPeli = mysqli_query($con, $sql_pelicula);
                        
                        
                    ?>
                
                    <div class="dashboard-ecommerce">
                        <div class="container-fluid dashboard-content ">

                            <br>
                            </br>

                            <!-- Menu Comidas -->
                            <h3 class="title-5 m-b-35">Peliculas</h3>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div id="store" class="col-md-8">
                                        <!-- store products -->
                                        <div class="row">
                                        
                                            <!-- product -->
                                            
                                                    <?php 
                                                        while($rowPe = mysqli_fetch_assoc($resultPeli)){
                                                     ?>
                                                <div class="col-md-4 col-xs-6">
                                                    <div class="product">
                                                        <div class="product-img">                                               
                                                            <a href="seleccionarMultiplex.php?mensaje= <?php echo $mensaje ?> &id_pelicula=<?php echo $rowPe["cod_pelicula"] ?>">
                                             
                                                            <img src="../../Fotos/Peliculas/<?php echo $rowPe['foto_pelicula'] ?>" alt=""></button>
                                                            
                                                        </div>
                                                        <div class="product-body">
                                                            <p class="product-category">Pelicula</p>
                                                            <h3 class="product-name"><a href="SeleccionarMultiplex.php?mensaje= <?php echo $mensaje ?> &id_pelicula=<?php echo $rowPe["cod_pelicula"] ?>"><?php echo $rowPe['nom_pelicula'] ?></a></h3>
                                                        </div>

                                                    </div>
                                                </div>
                                                        
                                            <!-- /product -->

                                            <?php 
                                                }

                                            ?>

                                

                                        </div>
                                    </div>
                                </div>                    
                        </div>
                    </div>
                </div>
                </center>    
        </div>
    </div>
                                           
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
    
    </div>
    <!-- jQuery Plugins -->
    <!-- cd-cart -->
    <script src="Bienes/js/utilSnacks.js"></script>
    <!-- util functions included in the CodyHouse framework -->
    <script src="../Bienes/js/mainSnacks.js"></script>

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
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
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">

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
</head>

<body class="animsition">
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


            <!-- MAIN CONTENT-->

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">

                            <?php 
                        
                        $sql_comida = "SELECT * FROM SNACKS ORDER BY tipo_snack ASC";
                        $resultSnack = mysqli_query($con, $sql_comida);
                        
                        
                    ?>

                                <!-- Menu Comidas -->
                                <center>
                                <h3 class="title-5 m-b-35">Comidas</h3></center>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div id="store" class="col-md-8">
                                        <!-- store products -->
                                        <div class="row">
                                            <!-- product -->
                                            <?php 
                                                        while($row = mysqli_fetch_assoc($resultSnack)){
                                                     ?>
                                            <div class="col-md-4 col-xs-6">
                                                <div class="product">
                                                    <div class="product-img">
                                                        <img src="../../Fotos/Productos/<?php echo $row['foto_snack'] ?>" alt="<?php echo $row['nom_snack'] ?>">
                                                    </div>
                                                    <div class="product-body">
                                                        <p class="product-category"><?php echo $row['tipo_snack'] ?></p>
                                                        <h3 class="product-name"><a href="#"><?php echo $row['nom_snack'] ?></a></h3>
                                                        <h4 style="color:green;"><?php echo $row['val_snack'] ?></h4>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a href="#" class="cd-add-to-cart js-cd-add-to-cart"
                                                            img="../../Fotos/Productos/<?php echo $row['foto_snack'] ?>" name="<?php echo $row['nom_snack'] ?>" data-price="<?php echo $row['val_snack'] ?>"><i
                                                                class="fa fa-shopping-cart"></i>Añadir al carrito</a>
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
                                <!--cart-->

                                <!-- cd-cart -->
                                <div class="cd-cart cd-cart--empty js-cd-cart">
                                    <a href="#0" class="cd-cart__trigger text-replace">

                                        <ul class="cd-cart__count">
                                            <!-- cart items count -->
                                            <li>0</li>
                                            <li>0</li>
                                        </ul> <!-- .cd-cart__count -->
                                    </a>
                                    <div class="cd-cart__content">
                                        <div class="cd-cart__layout">
                                            <header class="cd-cart__header">
                                                <h2>Carrito de compras</h2>
                                                <span class="cd-cart__undo">Elemento removido. <a
                                                        href="#0">Deshacer</a></span>
                                            </header>
                                            <div class="cd-cart__body">
                                                <ul>
                                                    <!-- products added to the cart will be inserted here using JavaScript -->
                                                </ul>
                                            </div>
                                            <div class="cd-cart__footer">
                                                <a href="procesoPago.php" class="cd-cart__checkout">
                                                    <em>Pagar $<span>0</span>
                                                        <svg class="icon icon--sm" viewBox="0 0 24 24">
                                                            <g fill="none" stroke="currentColor">
                                                                <line stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" x1="3" y1="12" x2="21"
                                                                    y2="12" />
                                                                <polyline stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    points="15,6 21,12 15,18 " />
                                                            </g>
                                                        </svg>
                                                    </em>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .cd-cart__content -->
                                </div>
                            </div>
                        </div>
                        <!-- Menu Comidas -->
                    </div>
                </div>
                <br><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                    href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
    </div>

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
<!-- end document-->
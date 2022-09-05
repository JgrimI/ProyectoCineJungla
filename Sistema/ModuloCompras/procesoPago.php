<?php
include("../../conexion.php");
header("Content-Type: text/html;charset=utf-8");
session_start();

if(!isset($_SESSION['loggedin']))
{
    header('location: index.php');
}





mysqli_query($con,"SET NAMES 'utf8'");
$sql_usuario = "SELECT * FROM USUARIOS INNER JOIN EMPLEADOS ON EMPLEADOS.cod_usuario = USUARIOS.cod_usuario WHERE USUARIOS.nom_usuario = ''";
$result = mysqli_query($con, $sql_usuario);
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
 
<head>
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
            
            <!-- CONSULTA A LA BASE DE DATOS DETALLES PELICULAS-->
        
            <!-- FIN CONSULTA-->
            
            <main class="contenido-Principal contenedor">
                <article class="detalles">
                    <div class="imagen">
                        <img src="../../Img/cover.jpg" alt="Efectivo" width=700  />
                    </div>

                    <div class="detalles-pelicula">
                        <h2>Valor a Pagar:</h2>
                        <h5>Productos:<span> </span></h5>

                    </div>

                </article>

             

                <div class="elegir">

                    <table class="selectores">
                        
                        <!--SELECCIONAR FUNCION -->
                        
                    
                        <tr><label for="lblMultiplex">Seleccionar Metodo de Pago: </label></tr>
                        <tr class="selec-funcion">
                         

                            <td>
								<input type="radio" id="Efectivo" name="pago" value="Efectivo">
								<label for="pago"><img src="../../Img/efectivo.jpg" alt="Efectivo" width=150  /></label><br>
								<input type="radio" id="Tarjeta" name="pago" value="Tarjeta">
								<label for="pago"><img src="../../Img/tarjeta.jpg" alt="Tarjeta" width=150  /></label>
							
                            </td>
                        </tr>
                        <!-- FIN SELECCIONAR FUNCION -->
                        
                    </table>

                </div>

                <div class="enviar">
                    <a title="Siguiente..." href="">  Efectuar Pago </a>
                </div>

            </main>

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

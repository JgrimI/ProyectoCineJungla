<?php
include("../../conexion.php");

session_start();

if(!isset($_SESSION['loggedin']))
{
    header('location: ../index.php');
}

$mensaje=$_GET["mensaje"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">

    <!-- Title Page-->
    <title>Cine Jungla</title>

    <!-- Fontfaces CSS-->
    <link href="../../Bienes/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../Bienes/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../Bienes/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../Bienes/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../Bienes/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../Bienes/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../Bienes/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../Bienes/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../Bienes/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../Bienes/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../Bienes/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../Bienes/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../Bienes/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">

<!-- Codigo PHP - Agregar -->

<?php
			if(isset($_POST['add'])){
      
                $num = rand();

				$nombre	= mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
                $cedula	= mysqli_real_escape_string($con,(strip_tags($_POST["cedula"],ENT_QUOTES)));//Escanpando caracteres    
                $correo	= mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));//Escanpando caracteres 
				$telefono	= mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 

				$cek = mysqli_query($con, "SELECT * FROM CLIENTES WHERE ced_cliente='$cedula'");
				if(mysqli_num_rows($cek) == 0){

					$sql = "INSERT INTO CLIENTES (cod_cliente, nom_cliente, ced_cliente, correo_cliente, tel_cliente, puntos_cliente) VALUES ('$num','$nombre', '$cedula', '$correo', '$telefono', 0)";
                    $insert = mysqli_query($con, $sql);
                    header("Location: ClientesCRUD.php?mensaje=$mensaje");
                        }
                    }
			?>

    <!-- Formulario-->
    <div class="main-content">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-form">
                            <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                                <div class="form-group">
                                    <label>Nombres y apellidos</label>
                                    <input class="au-input au-input--full" type="text" name="nombre" placeholder="Nombre" required>
                                </div>
                                <div class="form-group">
                                    <label>Cédula</label>
                                    <input class="au-input au-input--full" type="text" name="cedula" placeholder="Cedula" required>
                                </div>
                                <div class="form-group">
                                    <label>Correo electrónico</label>
                                    <input class="au-input au-input--full" type="text" name="correo" placeholder="Correo electrónico" required>
                                </div>
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input class="au-input au-input--full" type="text" name="telefono" placeholder="Teléfono" required>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="add">Registrar cliente</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>

    </div>
            </div>
    <!-- Fin formulario-->

    <!-- Jquery JS-->
    <script src="../../Bienes/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../Bienes/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../Bienes/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../../Bienes/vendor/slick/slick.min.js">
    </script>
    <script src="../../Bienes/vendor/wow/wow.min.js"></script>
    <script src="../../Bienes/vendor/animsition/animsition.min.js"></script>
    <script src="../../Bienes/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../../Bienes/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../../Bienes/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../../Bienes/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../Bienes/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../Bienes/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../Bienes/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../../Bienes/js/main.js"></script>

</body>

</html>
<!-- end document-->
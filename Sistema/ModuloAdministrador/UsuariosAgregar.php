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

                $usuario	= mysqli_real_escape_string($con,(strip_tags($_POST["usuario"],ENT_QUOTES)));//Escanpando caracteres    
                $contraseña	= mysqli_real_escape_string($con,(strip_tags($_POST["contraseña"],ENT_QUOTES)));//Escanpando caracteres 
                $cod_usuario_empleado	= mysqli_real_escape_string($con,(strip_tags($_POST["empleado"],ENT_QUOTES)));//Escanpando caracteres 


				$cek = mysqli_query($con, "SELECT * FROM USUARIOS WHERE nom_usuario='$usuario'");
                if(mysqli_num_rows($cek) == 0)
                {

                    $md5 = md5($contraseña);

                    $sql = "INSERT INTO USUARIOS (cod_usuario, nom_usuario, con_usuario) VALUES ('$num','$usuario', '$md5')";
                    $insert = mysqli_query($con, $sql);

                    $sql = "SELECT * FROM EMPLEADOS WHERE cod_empleado = '$cod_usuario_empleado'";
                    $query = mysqli_query($con, $sql);
                    $valores = mysqli_fetch_array($query);
                    if($valores['cod_usuario'] == null)
                    {
                        $sql = "UPDATE EMPLEADOS SET cod_usuario = '$num' WHERE cod_empleado = '$cod_usuario_empleado'";
                        $update = mysqli_query($con, $sql);
                    }

                    header("Location: UsuariosCRUD.php?mensaje=$mensaje");
                    
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
                                    <label>Usuario</label>
                                    <input class="au-input au-input--full" type="text" name="usuario" placeholder="Usuario" required>
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input class="au-input au-input--full" type="text" name="contraseña" placeholder="Contraseña" required>
                                </div>    
                                <div class="form-group">
                                <label>Empleado</label>
                                <div>
                                    <select name="empleado" id="select" class="au-input au-input--full" required>
                                    <option value="0" selected>Seleccionar empleado</option>
                                    <?php
                                        $sql = "SELECT * FROM EMPLEADOS";
                                        $query = mysqli_query($con, $sql);
                                        while ($valores = mysqli_fetch_array($query))
                                         {
                                        echo '<option value="'.$valores['cod_empleado'].'">'.$valores['nom_empleado'].'</option>';
                                         } 
                                    ?>
                                    </select>
                                </div>
                                </div>                    
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="add">Registrar usuario</button>
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
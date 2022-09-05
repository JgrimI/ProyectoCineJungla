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

				$numero_documento = mysqli_real_escape_string($con,(strip_tags($_POST["cedula"],ENT_QUOTES)));//Escanpando caracteres 

				$imgFile = $_FILES['user_image']['name'];
				$tmp_dir = $_FILES['user_image']['tmp_name'];
				$imgSize = $_FILES['user_image']['size'];
				
				
				if(empty($imgFile)){
					$userpic = "Imagen general.png";
				}
				else
				{
					$upload_dir = '../Fotos/Empleados/'; // upload directory
			
					$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
				
					// valid image extensions
					$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
				
					// rename uploading image
					$userpic = $numero_documento.".".$imgExt;
						
					// allow valid image file formats
                    if(in_array($imgExt, $valid_extensions))
                    {			
						// Check file size '1MB'
                        if($imgSize < 1000000)				
                        {
							move_uploaded_file($tmp_dir,$upload_dir.$userpic);
						}
						else{
							echo 'No se pudo';	
						}
					}
					else{
						echo 'Se pudo';	
					}
                }

                $num = rand();

				$nombre	= mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
                $cedula	= mysqli_real_escape_string($con,(strip_tags($_POST["cedula"],ENT_QUOTES)));//Escanpando caracteres    
                $fecha	= mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));//Escanpando caracteres 
                $telefono	= mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 
                $cargo	= mysqli_real_escape_string($con,(strip_tags($_POST["cargo"],ENT_QUOTES)));//Escanpando caracteres 
                $multiplex	= mysqli_real_escape_string($con,(strip_tags($_POST["multiplex"],ENT_QUOTES)));//Escanpando caracteres 


				$cek = mysqli_query($con, "SELECT * FROM EMPLEADOS WHERE ced_empleado='$cedula'");
                if(mysqli_num_rows($cek) == 0)
                {

                    $sql = "INSERT INTO EMPLEADOS (cod_empleado, nom_empleado, ced_empleado, tel_empleado, fecha_ingreso_empleado, multiplex_empleado, foto_empleado, cod_cargo) VALUES ('$num','$nombre', '$cedula', '$telefono', '$fecha', '$multiplex', '$userpic', '$cargo')";
                    $insert = mysqli_query($con, $sql);

                    header("Location: EmpleadosCRUD.php?mensaje=$mensaje");
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
                                    <label>Foto</label>
                                    <input id="file-input" name="user_image" class="form-control-file" type="file" name="foto">
                                </div>
                                <div class="form-group">
                                    <label>Nombres y apellidos</label>
                                    <input class="au-input au-input--full" type="text" name="nombre" placeholder="Nombre" required>
                                </div>
                                <div class="form-group">
                                    <label>Cédula</label>
                                    <input class="au-input au-input--full" type="text" name="cedula" placeholder="Cedula" required>
                                </div>
                                <div class="form-group">
                                    <label>Fecha de ingreso</label>
                                    <input class="au-input au-input--full" type="date" name="fecha" placeholder="Fecha de ingreso" required>
                                </div>
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input class="au-input au-input--full" type="text" name="telefono" placeholder="Teléfono" required>
                                </div>
                                <div class="form-group">
                                <label>Cargo</label>
                                <div>
                                    <select name="cargo" id="select" class="au-input au-input--full" required>
                                    <option value="0">Seleccionar cargo</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Empleado</option> 
                                    </select>
                                </div>
                                </div>
                                <div class="form-group">
                                <label>Multiplex</label>
                                <div>
                                    <select name="multiplex" id="select" class="au-input au-input--full" required>
                                    <option value="0" selected>Seleccionar multiplex</option>
                                    <?php
                                        $sql = "SELECT * FROM MULTIPLEX";
                                        $query = mysqli_query($con, $sql);
                                        while ($valores = mysqli_fetch_array($query))
                                         {
                                        echo '<option value="'.$valores['cod_multiplex'].'">'.$valores['nom_multiplex'].'</option>';
                                         } 
                                    ?>
                                    </select>
                                </div>
                                </div>       
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="add">Registrar empleado</button>
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
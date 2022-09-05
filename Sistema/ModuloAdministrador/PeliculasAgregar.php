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

				$nombre_pelicula = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 

				$imgFile = $_FILES['user_image']['name'];
				$tmp_dir = $_FILES['user_image']['tmp_name'];
				$imgSize = $_FILES['user_image']['size'];
				
				
				if(empty($imgFile)){
					$userpic = "Imagen general.png";
				}
				else
				{
					$upload_dir = '../Fotos/Peliculas/'; // upload directory
			
					$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
				
					// valid image extensions
					$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
				
					// rename uploading image
					$userpic = $nombre_pelicula.".".$imgExt;
						
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
                $idioma	= mysqli_real_escape_string($con,(strip_tags($_POST["idioma"],ENT_QUOTES)));//Escanpando caracteres    
                $resumen	= mysqli_real_escape_string($con,(strip_tags($_POST["resumen"],ENT_QUOTES)));//Escanpando caracteres 
                $fecha	= mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));//Escanpando caracteres 
                $duracion	= mysqli_real_escape_string($con,(strip_tags($_POST["duracion"],ENT_QUOTES)));//Escanpando caracteres 


                    $sql = "INSERT INTO PELICULA (cod_pelicula, nom_pelicula, idioma_pelicula, resumen_pelicula, fecha_pelicula, duracion_pelicula, foto_pelicula) VALUES ('$num','$nombre', '$idioma', '$resumen', '$fecha', '$duracion', '$userpic')";
                    $insert = mysqli_query($con, $sql);

                    header("Location: PeliculasCRUD.php?mensaje=$mensaje");

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
                                    <label>Poster</label>
                                    <input id="file-input" name="user_image" class="form-control-file" type="file" name="foto">
                                </div>
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input class="au-input au-input--full" type="text" name="nombre" placeholder="Titulo" required>
                                </div>
                                <div class="form-group">
                                    <label>Idioma</label>
                                    <input class="au-input au-input--full" type="text" name="idioma" placeholder="Idioma" required>
                                </div>
                                <div class="form-group">
                                    <label>Descripción (Resumen)</label>
                                    <input class="au-input au-input--full" type="text" name="resumen" placeholder="Resumen" required>
                                </div>
                                <div class="form-group">
                                    <label>Fecha de lanzamiento</label>
                                    <input class="au-input au-input--full" type="date" name="fecha" placeholder="Fecha de lanzamiento" required>
                                </div>
                                <div class="form-group">
                                    <label>Duración</label>
                                    <input class="au-input au-input--full" type="text" name="duracion" placeholder="Duración" required>
                                </div>
                                 
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="add">Registrar pelicula</button>
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
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


						$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
                        $sql = mysqli_query($con, "SELECT * FROM PELICULA WHERE cod_pelicula='$nik'");
                        if(mysqli_num_rows($sql) == 0){
                            header("Location: PeliculasCRUD.php?mensaje=$mensaje");
                        }else{
                            $row = mysqli_fetch_assoc($sql);
                        }
                        if(isset($_POST['save'])){

                            $nombre_pelicula = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 

                            $imgFile = $_FILES['user_image']['name'];
                            $tmp_dir = $_FILES['user_image']['tmp_name'];
                            $imgSize = $_FILES['user_image']['size'];
                                        
                            if($imgFile)
                            {
                                $upload_dir = '../Fotos/Peliculas/'; // upload directory	
                                $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
                                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                                $userpic = $nombre_pelicula.".".$imgExt;
                                if(in_array($imgExt, $valid_extensions))
                                {			
                                    if($imgSize < 1000000)
                                    {
                                        if($row['foto_pelicula'] != 'Imagen general.png')
                                        {
                                        unlink($upload_dir.$row['foto_pelicula']);
                                        }
                                    
                                           move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                                        
                                    }
                                    else
                                    {
                                        echo 'No se puedo';	
                            
                                    }
                                }
                                else
                                {
                                    echo 'Se pudo';	
                            
                                }	
                            }
                            else
                            {
                                // if no image selected the old image remain as it is.
                                $userpic = $row['foto_pelicula']; // old image from database
                            }		
            
                $nombre	= mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
                $idioma	= mysqli_real_escape_string($con,(strip_tags($_POST["idioma"],ENT_QUOTES)));//Escanpando caracteres    
                $resumen	= mysqli_real_escape_string($con,(strip_tags($_POST["resumen"],ENT_QUOTES)));//Escanpando caracteres 
                $fecha	= mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));//Escanpando caracteres 
                $duracion	= mysqli_real_escape_string($con,(strip_tags($_POST["duracion"],ENT_QUOTES)));//Escanpando caracteres 
                            
				$cek = mysqli_query($con, "SELECT * FROM PELICULA WHERE cod_pelicula='$nik'");
                if(mysqli_num_rows($cek) == 1)
                {
					$sql = "UPDATE PELICULA SET nom_pelicula = '$nombre', idioma_pelicula = '$idioma', resumen_pelicula = '$resumen', fecha_pelicula = '$fecha', duracion_pelicula = '$duracion', foto_pelicula = '$userpic' WHERE cod_pelicula = '$nik'";
                    $update = mysqli_query($con, $sql);
                    header("Location: PeliculasCRUD.php?mensaje=$mensaje");
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
                                    <label>Poster</label>
                                    <input id="file-input" name="user_image" class="form-control-file" type="file" name="foto">
                                </div>
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input class="au-input au-input--full" type="text" name="nombre" placeholder="Titulo" value="<?php echo $row ['nom_pelicula']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Idioma</label>
                                    <input class="au-input au-input--full" type="text" name="idioma" placeholder="Idioma" value="<?php echo $row ['idioma_pelicula']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Descripción (Resumen)</label>
                                    <input class="au-input au-input--full" type="text" name="resumen" placeholder="Resumen" value="<?php echo $row ['resumen_pelicula']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Fecha de lanzamiento</label>
                                    <input class="au-input au-input--full" type="date" name="fecha" placeholder="Fecha de lanzamiento" value="<?php echo $row ['fecha_pelicula']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Duración</label>
                                    <input class="au-input au-input--full" type="text" name="duracion" placeholder="Duración" value="<?php echo $row ['duracion_pelicula']; ?>">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="save">Actualizar pelicula</button>
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
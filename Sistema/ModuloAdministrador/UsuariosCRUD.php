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
    <title>Cine jungla</title>

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
    <div class="page-wrapper">
        
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="../../Img/CineJungla.jpg" alt="Cine Jungla" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a href="Administrador.php?mensaje=<?php echo $mensaje?>">
                                <i class="fas fa-home"></i>Inicio</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-table"></i>Gestión</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                    <a href="ClientesCRUD.php?mensaje=<?php echo $mensaje?>">Clientes</a>
                                </li>
                                <li>
                                    <a href="EmpleadosCRUD.php?mensaje=<?php echo $mensaje?>">Empleados</a>
                                </li>
                                <li>
                                    <a href="ProductosCRUD.php?mensaje=<?php echo $mensaje?>">Productos</a>
                                </li>
                                <li>
                                    <a href="PeliculasCRUD.php?mensaje=<?php echo $mensaje?>">Peliculas</a>
                                </li>
                                <li>
                                    <a href="CargoCRUD.php?mensaje=<?php echo $mensaje?>">Cargo</a>
                                </li>
                                <li>
                                    <a href="UsuariosCRUD.php?mensaje=<?php echo $mensaje?>">Usuarios</a>
                                </li>
                                <li>
                                    <a href="FuncionCRUD.php?mensaje=<?php echo $mensaje?>">Funcion</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
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
                                            <img src="../../Fotos/Empleados/<?php echo $row['foto_empleado']?>" alt="<?php echo $row['nom_empleado']?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $row['nom_empleado']?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../../Fotos/Empleados/<?php echo $row['foto_empleado']?>" alt="<?php echo $row['nom_empleado']?>" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $row['nom_empleado']?></a>
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

            <?php
			if(isset($_GET['aksi']) == 'delete'){

				$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
				$cek = mysqli_query($con, "SELECT * FROM USUARIOS WHERE cod_usuario ='$nik'");
                if(mysqli_num_rows($cek) == 0)
                {
					echo 'No se puedo eliminar';
                }
                else
                {
                    $delete = mysqli_query($con, "DELETE FROM USUARIOS WHERE cod_usuario ='$nik'");
                    
					echo 'Eliminado';
					
				}
			}
			?>

            <!-- MAIN CONTENT-->
            
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Usuarios</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                    <form>
                                        <div class="rs-select2--light rs-select2--md">
                                                <input class="au-input au-input--full" type="text" name="filter" placeholder="Nombre">
                                                <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
                                        </div>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href='UsuariosAgregar.php?mensaje=<?php echo $mensaje?>'><i class="zmdi zmdi-plus"></i>Agregar usuario</a>
                                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                                <select class="js-select2" name="type">
                                                    <option selected="selected">Export</option>
                                                    <option value="PDF">PDF</option>
                                                    <option value="Excel">Excel</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                    </div>
                                </div>
                                
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre de usuario</th>
                                                <th>Empleado</th>
                                            </tr>
                                            <?php

			    if($filter)
				{
				$sql = mysqli_query($con, "SELECT * FROM USUARIOS WHERE nom_usuario LIKE '%$filter%' ORDER BY nom_usuario ASC");
				}
			    else
				{
				$sql = mysqli_query($con, "SELECT * FROM USUARIOS ORDER BY nom_usuario ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){

                        $sql_cargo = "SELECT * FROM EMPLEADOS INNER JOIN USUARIOS ON USUARIOS.cod_usuario = EMPLEADOS.cod_usuario WHERE EMPLEADOS.cod_usuario = '$row[cod_usuario]'";
                        $result = mysqli_query($con, $sql_cargo);
                        $fila = mysqli_fetch_assoc($result);

                        echo '</thead>
                        <tbody>
                            <tr class=tr-shadow">
                                <td>'.$no.'</td>
                                <td>'.$row['nom_usuario'].'</td>
                                <td>'.$fila['nom_empleado'].'</td>
                                <td>
                                
                                    <div class="table-data-feature">
                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="UsuariosEditar.php?aksi=delete&nik='.$row['cod_usuario'].'&mensaje='.$mensaje.'">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="UsuariosCRUD.php?aksi=delete&nik='.$row['cod_usuario'].'&mensaje='.$mensaje.'">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                    </div>
                                </td>
                                </form>
                            </tr>
                            <tr class="spacer"></tr>
                        </tbody>';

						$no++;
					}
				}
				?>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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

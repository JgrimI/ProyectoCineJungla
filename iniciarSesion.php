<?php
    session_start();

    include 'conexion.php';

    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

			if(isset($_SESSION['loggedin']) == false )
			{
				
                $sql = "SELECT nom_usuario, con_usuario FROM USUARIOS WHERE nom_usuario='$usuario'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
            }
            if(isset($_SESSION['loggedin']) OR  $contraseña != ""  AND  md5($contraseña) == $row['con_usuario'])
                {
                    
                    $_SESSION['loggedin'] = true;
                    $sql_usuario = "SELECT * FROM EMPLEADOS INNER JOIN USUARIOS ON USUARIOS.cod_usuario = EMPLEADOS.cod_usuario WHERE USUARIOS.nom_usuario = '$usuario'";
                    $result = mysqli_query($con, $sql_usuario);
                    $row = mysqli_fetch_assoc($result);
                    
                  if($row['cod_cargo'] == 1)
                  {
                    header("location: Sistema/ModuloAdministrador/Administrador.php?mensaje=".urlencode($usuario));
                   }
                   else if($row['cod_cargo'] == 2)
                   {
                   header("location: Sistema/ModuloCompras/CompraBoleteria.php?mensaje=".urlencode($usuario));
                   }
                }
            else    
			{
                echo "<head>";
                echo "<style>
                
                .enlace
{
	text-decoration: none;
	font-size: 12px;
	line-height: 20px;
	color: white;
}
.enlace:hover {
	color: #9A9A9A;
  }
                
                </style>";
                echo "</head>";
                echo "<body style='background-color: black; color: white'>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
				echo "<center>Usuario o contraseña incorrecta</center>";

                echo "<br>";
                echo "<br>";

                echo "<center><a href='index.php' class='enlace'>Volver</a></center>";
                
                echo "</body>";
            }	
?>
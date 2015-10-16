<?php
        session_start();
        if(!isset($_SESSION['dni'])){ 
            session_destroy();
            header('Location: login.html');
        }
            if($_SESSION['rol']!='administrador'){
                session_destroy();
                header('Location: login.html');
            }

                $conexion = mysql_connect("localhost:3306","root","")
                            or die("Fuera de servicio");

                    mysql_select_db("tp_web");

                        $consulta = mysql_query("SELECT * 
                                                FROM empleado 
                                                WHERE dni=".$_SESSION['dni'].";");
                        $dato = mysql_fetch_assoc($consulta);

            mysql_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <title>JUAGMA | Logística</title>

        <script src="http://code.jquery.com/jquery.js"></script>
        <link href="bs/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
        <script src="bs/js/bootstrap.min.js"></script>
        <link href="bs/css/style.css" rel="stylesheet" media="screen"/>
  </head>
      <body>
            <div class="container top">
                <div class="row">
                    <div class="col-md-4">
                        <img src="img/logo.png" class="img-responsive" alt="Imagen responsive"/>
                    </div>
                    
                        <div class="col-md-4 col-md-offset-4 separador">
                            <?php
                                echo "<wfnombre>Hola ".$dato['nombre']." ".$dato['apellido']."</wfnombre></br>";
                                echo "<wfnombre>Hoy es ".date("d/m/Y")."</wfnombre></br>";
                            ?>
                                <a href="admin.php" title="Menu principal" class="separadorr">
                                    <img src="img/home.png"/>
                                </a>
                                    <a href="logout.php" title="Cerrar Sesión" class="separadorr">
                                        <img src="img/cerrar_sesion.png"/>
                                    </a>
                        </div>
                </div>
            </div>
                    <div class="container cont">
                        <h1><strong>Baja de vehiculo</strong></h1></br>
                            <form action="baja_de_vehiculo.php" method="post" enctype="multipart/form-data">
                               
                                Patente: <input type="text" size="9" maxlength="9" name="patente" class="holdtop" required/></br>
                                                                   
                                    <input type="submit" class="holdtop" value="Dar de baja el vehiculo"/> 
                                    <input type="reset" class="holdtop" value="Cancelar"/>
                            </form>
                    </div>
                
                        <div class="container pie">
                            Murano, Buzarquis, Calvo - Prog. Web 2 - 2015
                        </div>
      </body>
</html>
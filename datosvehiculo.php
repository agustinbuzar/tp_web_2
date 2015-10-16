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

                            $patente = $_POST['patente'];
                            $_SESSION['patente'] = $patente;

                                $dato_vehiculo = mysql_query("SELECT * 
                                                            FROM vehiculo 
                                                            WHERE patente = '".$patente."';");
                                $cant = mysql_num_rows($dato_vehiculo);
                                $vehiculo = mysql_fetch_assoc($dato_vehiculo);
                                    
                                    if($cant == 0){
                                        header ('Location: modvehiculo.php');
                                    }
                                   
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
                        <h1><strong>Modificar datos de vehiculo</strong></h1></br>
                            <h1>Datos de vehiculo</h1></br>
                            <?php
                                echo 
                                    "Marca: ".$vehiculo['marca']."</br>    
                                    Modelo: ".$vehiculo['modelo']."</br>
                                    Chasis: ".$vehiculo['nro_chasis']."</br>
                                    Motor: ".$vehiculo['nro_motor']."</br>
                                    Año: ".$vehiculo['ano_fabricacion']."</br>
                                    Kilometros: ".$vehiculo['kilometros']."</br>";
                            ?></br>
                            </br>Ingrese que valor quiere cambiar y su dato
                                <form action="modificardatos.php" method="post" enctype="multipart/form-data">
                                    
                                    <select name="datovehiculo[]">
                                        <option value="">- Elija una opcion -</option>
                                        <option value="marca">Marca</option>
                                        <option value="modelo">Modelo</option>
                                        <option value="nro_chasis">Nro. Chasis</option>
                                        <option value="nro_motor">Nro. Motor</option>
                                        <option value="ano_fabricacion">Año</option>
                                        <option value="kilometros">Kilometros</option>
                                    </select>
                                    
                                    <input type="text" size="18" maxlength="15" name="datomodificar" class="holdtop " required/></br>
                                        
                                        <input type="submit" class="holdtop" value="Modificar datos de vehiculo"/> 
                                        <input type="reset" class="holdtop" value="Cancelar"/>
                                </form>
                        </div>

                            <div class="container pie">
                                Murano, Buzarquis, Calvo - Prog. Web 2 - 2015
                            </div>
      </body>
</html>
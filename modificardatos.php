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
                $datos = $_POST ['datovehiculo'];
                foreach($datos as $dato);
                
                    $conexion = mysql_connect("localhost:3306","root","")
                            or die("Fuera de servicio");

                    mysql_select_db("tp_web");
        
                         $consulta = mysql_query("UPDATE vehiculo
                                                set ".$dato." = '".$_POST['datomodificar']."'
                                                WHERE patente = '".$_SESSION['patente']."';");
                    mysql_close($conexion);

                    header('Location: admin.php');
?>
<?php
    $patente = $_POST['patente'];
    
     $conexion = mysql_connect("localhost:3306","root","")
                    or die ("colgu");
        
        mysql_select_db("tp_web");
       
            $dato = "DELETE FROM vehiculo 
                    WHERE patente = '".$patente."';";

                $delete = mysql_query($dato);

                    mysql_close($conexion);       
                    
        header('Location: admin.php');     
?>
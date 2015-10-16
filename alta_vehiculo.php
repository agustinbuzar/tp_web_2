<?php
    $patente = $_POST['patente'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $chasis = $_POST['chasis'];
    $motor = $_POST['motor'];
    $año = $_POST['año'];
    $kilometros = $_POST['kilometros'];

     $conexion = mysql_connect("localhost:3306","root","")
                    or die ("colgu");
        
        mysql_select_db("tp_web");
       
            $dato = "INSERT INTO vehiculo (patente,marca,modelo,nro_chasis,nro_motor,ano_fabricacion,kilometros)  
                    VALUES('".$patente."','".$marca."','".$modelo."','".$chasis."','".$motor."',".$año.",".$kilometros.");";

                $insert = mysql_query($dato);

                    mysql_close($conexion);       
                    
       header('Location: admin.php');     
?>
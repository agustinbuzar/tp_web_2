<?php
        $conexion = mysql_connect("localhost:3306","root","");
        
        mysql_select_db("tp_web");
       
       $consulta = mysql_query("SELECT * 
                                FROM vehiculos;");
        
?>
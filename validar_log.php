<?php
        session_start();                                
        $nombre = $_POST ['usuario'];
        $clave = $_POST ['clave'];
            
            $conexion = mysql_connect("localhost:3306","root","")
                        or die("Fuera de servicio");
            
            mysql_select_db("tp_web");

                $consulta = mysql_query("SELECT * 
                                        FROM usuario as u join rol as r on u.cod_rol = r.cod_rol
                                        WHERE u.nombre='".$nombre."' and u.clave='".$clave."';");
                $cant_usuarios = mysql_num_rows($consulta);
                $dato = mysql_fetch_assoc($consulta);
            if($cant_usuarios == 0){
                header ('Location: login.html');
            }
                $_SESSION[dni] = $dato[dni];
                $_SESSION[rol] = $dato[descripcion];

               if($dato[descripcion]=='administrador'){
                    header('Location: admin.php');
                }
                    if($dato[descripcion]=='chofer'){
                        header('Location: chofer.php');
                    }
                        if($dato[descripcion]=='supervisor'){
                            header('Location: supervisor.php');
                        }
                       
        mysql_close($conexion);
    ?>
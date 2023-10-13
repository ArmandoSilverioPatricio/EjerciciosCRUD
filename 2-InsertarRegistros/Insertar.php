<?php

    // $busqueda = $_GET['buscar'];
    $estatusName = $_GET['estatusName'];
    require("./connection.php");

    $conProd = mysqli_connect($hostProd, $userNameProd, $passProd);
    if ($conProd->connect_errno) {
        echo "Fallo la conexion a MySQL: (" . $conProd->errno . ") " . $conProd->connect_errno;
        exit();
    } else {
        echo "Conexión exitosa <br>";
    }
    //Validando la base de datos que se esta usando
    mysqli_select_db($conProd, $dbNameProd) or die ("No se encontro las Base de datos");
    //Setiando la codificacion de caracteres
    mysqli_set_charset($conProd, "utf8");

    $queryBuscar = "INSERT INTO cat_Estatus_copy1 (c_estatus_nombre) VALUES ('$estatusName');";

    $resultadoQueryBuscar = mysqli_query($conProd, $queryBuscar);

    if ($resultadoQueryBuscar == false){
        echo "Error en la consulta";
    }else{
        echo "Registro guardado !!! <br><br>";

            echo "<table><tr><td>$estatusName</td></tr></table>";
        }


    mysqli_close($conProd);

?>
<?php

    // $busqueda = $_GET['buscar'];
    $estatusID = $_GET['estatusID'];
    //$estatusName = $_GET['estatusName'];
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

    $queryBuscar = "DELETE FROM cat_Estatus_copy1 WHERE n_estatus_id = '$estatusID';";

    $resultadoQueryBuscar = mysqli_query($conProd, $queryBuscar);

    if ($resultadoQueryBuscar == false){
        echo "Error en la consulta";
    }else{
        /*echo "Registro Eliminado !!! <br><br>";
        echo mysqli_affected_rows($conProd);*/
        if(mysqli_affected_rows($conProd) == 0){
            echo "No hay registros que eliminar con ese criterio";
        }else if(mysqli_affected_rows($conProd) == 1){
            echo "Se ha eliminado " . mysqli_affected_rows($conProd) . " registro";
        }else{
            echo "Se han eliminado " . mysqli_affected_rows($conProd) . " registros";
        }
        }


    mysqli_close($conProd);

?>
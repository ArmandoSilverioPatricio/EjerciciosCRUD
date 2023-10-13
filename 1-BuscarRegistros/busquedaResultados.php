<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php

    function ejecutaQuery($laBusqueda){

    // $busqueda = $_GET['buscar'];

    require("./connection.php");

    $conProd = mysqli_connect($hostProd, $userNameProd, $passProd);
    if ($conProd->connect_errno) {
        echo "Fallo la conexion a MySQL: (" . $conProd->errno . ") " . $conProd->connect_errno;
        exit();
    } else {
        echo "Conexión exitosa";
    }
    //Validando la base de datos que se esta usando
    mysqli_select_db($conProd, $dbNameProd) or die ("No se encontro las Base de datos");
    //Setiando la codificacion de caracteres
    mysqli_set_charset($conProd, "utf8");

    $queryBuscar = "SELECT n_estatus_id, c_estatus_nombre FROM cat_Estatus_copy1 WHERE c_estatus_nombre LIKE '%$busqueda%'";

    $resultadoQueryBuscar = mysqli_query($conProd, $queryBuscar);

    while ($fila = mysqli_fetch_array($resultadoQueryBuscar, MYSQLI_ASSOC)) {
        echo "<table><tr><td>";
        echo $fila['n_estatus_id'] . "</td><td>";
        echo $fila['c_estatus_nombre'] . "</td><td></tr></td></table>";
        echo "<br>";
        echo "<br>";
    }
    mysqli_close($conProd);
    }
    ?>

</head>
<body>

    <?php
        $miBusqueda = $_GET["buscar"];
        $miPag = $_SERVER["PHP_SELF"];

        if($miBusqueda != NULL){
            ejecutaQuery($miBusqueda);
        }else{
            echo "<form>";
        }
    ?>

</body>
</html>
<?php

$busqueda = $_GET['buscar'];

require("./connection.php");

$conProd = mysqli_connect($hostProd, $userNameProd, $passProd);
if ($conProd->connect_errno) {
    echo "Fallo la conexion a MySQL: (" . $conProd->errno . ") " . $conProd->connect_errno;
    exit();
}else{
    echo "Conexión exitosa";
}
//Validando la base de datos que se esta usando
mysqli_select_db($conProd, $dbNameProd) or die ("No se encontro las Base de datos");
//Setiando la codificacion de caracteres
mysqli_set_charset($conProd, "utf8");

$queryBuscar = "SELECT n_estatus_id, c_estatus_nombre FROM cat_Estatus_copy1 WHERE c_estatus_nombre LIKE '%$busqueda%'";

$resultadoQueryBuscar = mysqli_query($conProd, $queryBuscar);

while($fila = mysqli_fetch_array($resultadoQueryBuscar, MYSQLI_ASSOC)){
    //echo "<table><tr><td>";

    echo "<form action='Actualizar.php' method='GET'>";
    echo "<input type='text' name='n_estatus_id' value='" . $fila['n_estatus_id'] ."'><br>";
    echo "<input type='text' name='c_estatus_nombre' value='" . $fila['c_estatus_nombre'] ."'><br>";

    echo "<input type='submit' name='enviando' value='Actualizar'>";
    echo "</form>";
    echo "<br>";

    /*echo $fila['n_estatus_id'] . "</td><td>";
    echo $fila['c_estatus_nombre'] . "</td><td></tr></td></table>";*/
}
?>
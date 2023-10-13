<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title>Array exercises</title>
</head>
<body>
    <?php
        require ('./connection.php');

        $conLab = mysqli_connect($hostLab, $userNameLab, $passLab);
        if($conLab->connect_errno){
            echo "Fallo la conexión a MySQL:(" . $conLab->errno .") " . $conLab->connect_errno;
            exit();
        }else{
            echo "Conexion exitosa !!!";
        }
        //Validando la base de datos que se esta usando
        mysqli_select_db($conLab, $dbNameLab) or die ("No se encontro la base de datos ...");
        //Setiendo la configuración de caracters
        mysqli_set_charset($conLab, "utf8");

        $queryFetchRow = "SELECT n_estatus_id, c_estatus_nombre FROM cat_Estatus_copy1";

        $result = mysqli_query($conLab, $queryFetchRow);

        //Fetch associative array
        while ($row = mysqli_fetch_row($result)){
            echo "<table><tr><td>$row[0]</tr></td><tr><td>$row[1]</td></tr></table>";// . " " . " $row[1]</td></tr>";
            //echo "<tr><td>$row[1]</td></tr></table>";
        }
        mysqli_close($conLab);
    ?>
</body>
</html>

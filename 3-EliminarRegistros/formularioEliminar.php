<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title>Eliminado registros registros</title>
</head>
<body>
<h1>Eliminacion de registros en cat_Estatus</h1>
<form name="insertForm" method="get" action="Eliminar.php">
    <table border="0" align="center">
        <tr>
            <td>ID del estatus</td>
            <td><label for="estatusID" ></label>
                <input type="text" name="estatusID" id="estatusID"></td>
        </tr>
        <tr>
            <td>&nbsp</td>
            <td>&nbsp</td>
        </tr>
        <tr>
            <td><input type="submit" name="enviar" value="enviar"></td>
            <td><input type="reset" name="limpiar" value="Limpiar"></td>
        </tr>
    </table>
</form>

</body>
</html>
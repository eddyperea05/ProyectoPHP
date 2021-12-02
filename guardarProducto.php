<?php

include('config/database.php');

if (isset($_POST['guardarProducto'])) {
    $NmbProducto = $_POST['NmbProducto'];
    $Descripcion = $_POST['Descripcion'];
    $Stock = $_POST['Stock'];
    $Estado = $_POST['Estado'];

    $query = "INSERT INTO tblproductos (NmbProducto, Descripcion, Stock, Estado) VALUES ('$NmbProducto','$Descripcion', $Stock, '$Estado')";
    $result = mysqli_query($conexion,$query);

    if (!$result) {
        die("Ha ocurrido un al insertar el producto");
    }

    $_SESSION['message'] = 'Se ha registrado el producto correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: producto.php');
}

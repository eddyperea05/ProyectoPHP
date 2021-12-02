<?php

include('config/database.php');

if (isset($_GET['Idproducto'])) {
    $Idproducto = $_GET['Idproducto'];
    $Estado = ($_GET['Estado'] == '1') ? '2' : '1';
    echo $Estado;
    $query = "UPDATE tblproductos SET Estado = $Estado WHERE Idproducto = $Idproducto";
    $result = mysqli_query($conexion, $query);

    if (!$result) {
        die("Error al cambiar estado del producto");
    }
    
    //Se manda mensaje a la pantalla productos

    $_SESSION['message'] = 'Se ha cambiado el estado del producto';
    $_SESSION['message_type'] = 'info';

    //Se encamina a la vista productos
    
    header("Location: producto.php");
}

?>
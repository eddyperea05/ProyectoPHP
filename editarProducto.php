<?php 

include('config/database.php');

if (isset($_GET['Idproducto'])) {
    $Idproducto = $_GET['Idproducto'];
    
    $query = "SELECT * FROM tblproductos WHERE Idproducto = $Idproducto";
    $result = mysqli_query($conexion,$query);

    if (mysqli_num_rows($result) == 1) {
        
        $row = mysqli_fetch_array($result);

        $NmbProducto = $row['NmbProducto'];
        $Descripcion = $row['Descripcion'];
        $Stock = $row['Stock'];    
           
    }
}

if (isset($_POST['actualizar'])) {
    $Idproducto = $_GET['Idproducto'];
    $NmbProducto = $_POST['NmbProducto'];
    $Descripcion = $_POST['Descripcion'];
    $Stock = $_POST['Stock'];

    $query = "UPDATE tblproductos SET Descripcion = '$Descripcion', NmbProducto = '$NmbProducto', Stock = '$Stock' WHERE Idproducto = $Idproducto";
    $result = mysqli_query($conexion,$query);

    if (!$result) {
        die("Error al actualizar");
    }

    $_SESSION['message'] = 'Se ha actualizado el producto';
    $_SESSION['message_type'] = 'primary';
    header('Location: producto.php');

}


?>

<?php include('includes/header.php');?>

<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <h2>Editar Producto</h2>
                <form action="editarProducto.php?Idproducto=<?php echo $_GET['Idproducto']?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="NmbProducto" placeholder="Actualizar Nombre" class="form-control" value="<?php echo $NmbProducto?>">
                    </div>
                    <div class="form-group">
                        <textarea name="Descripcion" rows="2" placeholder="Actulizar Descripcion" class="form-control"><?php echo $Descripcion?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" name="Stock" placeholder="Actualizar cantidad de productos" class="form-control" value="<?php echo $Stock ?>">
                    </div>
                    <button name="actualizar" class="btn btn-success">Actualizar Producto</button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php  include('includes/footer.php');?>
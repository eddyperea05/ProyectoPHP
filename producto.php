<?php include('config/database.php') ?>
<?php include('includes/header.php') ?>
<div class="container">
    <h2>Administrar de Productos</h2>
    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            } ?>

            <div class="card card-body">
                <form action="guardarProducto.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="NmbProducto" class="form-control" placeholder="Ingrese nombre del producto" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="Descripcion" id="" rows="3" class="form-control" placeholder="Ingrese descripción del producto"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" name="Stock" class="form-control" placeholder="Ingrese la cantidad">
                    </div>
                    <div class="form-group">
                        <select name="Estado" id="" class="form-control">
                            <option value="">Seleccione el estado del producto</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-success" name="guardarProducto" value="Guardar Producto">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Fecha de creación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tblProductos";
                    $resultProductos = mysqli_query($conexion, $query);
                    while ($row = mysqli_fetch_array($resultProductos)) {
                    ?>
                        <tr>
                            <td><?php echo $row['NmbProducto'] ?></td>
                            <td><?php echo $row['Descripcion'] ?></td>
                            <td><?php echo $row['Stock'] ?></td>
                            <td><?php echo $row['FechaCreacion'] ?></td>
                            <td><?php if ($row['Estado'] == '1') {
                                    echo 'Activo';
                                } else {
                                    echo 'Inactivo';
                                }

                                ?></td>
                            <td>
                                <a href="editarProducto.php?Idproducto=<?php echo $row['Idproducto'] ?>" class="btn btn-secondary" title="Modificar">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="cambiarEstadoProducto.php?Idproducto=<?php echo $row['Idproducto'] ?>&Estado=<?php echo $row['Estado'] ?>" class="btn btn-info" title="Cambiar estado">
                                    <i class="fas fa-exchange-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>
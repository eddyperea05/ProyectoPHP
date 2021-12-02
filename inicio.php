<?php include('config/database.php') ?>
<?php include('includes/header.php') ?>
<div class="container">
    <div class="row">
        <div class="card card-body">
            <h2>Información del usuario</h2>
            <br>
            <div class="form-group">
                <h4>Bienvenido <?php echo $_SESSION['NmbUsuario'] ?></h4>
            </div>
            <div class="form-group">
                <h4>Tipo de usuario: <?php if ($_SESSION['Tipouser'] == '0') {
                    echo "Administrador";
                }else{
                    echo "Usuario";
                }?></h4>
            </div>
        </div>

    </div>
</div>
<?php include('includes/footer.php') ?>
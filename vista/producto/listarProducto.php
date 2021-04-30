<!doctype html>
<?php
include_once '../../controlador/controladorProducto.php';
include_once '../../modelo/conexion.php';
include_once '../../modelo/producto.php';
include_once '../../modelo/marca.php';
?>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Lista productos</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="text-center text-success">
                    LISTADO DE PRODUCTOS
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="formularioCrearProducto.php">Crear nuevo</a>
                    </div>
                </div>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Descripcion</td>
                            <td>Unidades</td>
                            <td>Precio</td>
                            <td>Marca</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $controladorProducto = new controladorProducto();
                        $productos = $controladorProducto->listar();
                        foreach ($productos as $producto) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $producto->getProId() ?>
                            </td>
                            <td>
                                <?php echo $producto->getProNombre() ?>
                            </td>
                            <td>
                            <?php echo $producto->getProDescripcion() ?>
                            </td>
                            <td>
                            <?php echo $producto->getProUnidades() ?>
                            </td>
                            <td>
                                <?php echo $producto->getProPrecio() ?>
                            </td>
                            <td>
                                <?php echo $producto->getMarca()->getMarNombre() ?>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col text-center">
                                        <a class="btn btn-warning" href="formularioEditarProducto.php?pro_id=<?php echo $producto->getProId() ?>">Editar</a>
                                    </div>
                                    <div class="col text-center">
                                        <a class="btn btn-danger" href="formularioEliminarProducto.php?pro_id=<?php echo $producto->getProId() ?>">Eliminar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
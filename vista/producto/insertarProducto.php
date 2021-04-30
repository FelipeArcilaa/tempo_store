<!doctype html>
<?php
include_once '../../modelo/producto.php';
include_once '../../modelo/conexion.php';
include_once '../../controlador/controladorProducto.php';
?>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <?php
                try {
                    if (!isset($_REQUEST["identificacion"])) {
                        throw new PDOException("Por favor digite la identificación");
                    }
                    if (!isset($_REQUEST["nombre"])) {
                        throw new PDOException("Por favor digite el nombre");
                    }
                    if (!isset($_REQUEST["descripcion"])) {
                        throw new PDOException("Por favor digite la descripcion");
                    }
                    if (!isset($_REQUEST["unidades"])) {
                        throw new PDOException("Por favor digite las unidades");
                    }
                    if (!isset($_REQUEST["precio"])) {
                        throw new PDOException("Por favor digite el precio");
                    }
                    if (!isset($_REQUEST["marca_id"])) {
                        throw new PDOException("Por favor seleccione la marca");
                    }
                    $pro_id = $_REQUEST["identificacion"];
                    $pro_nombre = $_REQUEST["nombre"];
                    $pro_descripcion = $_REQUEST["descripcion"];
                    $pro_unidades = $_REQUEST["unidades"];
                    $pro_precio = $_REQUEST["precio"];
                    $mar_id = $_REQUEST["marca_id"];

                    $producto = new producto();
                    $producto->setProId($pro_id);
                    $producto->setProNombre($pro_nombre);
                    $producto->setProDescripcion($pro_descripcion);
                    $producto->setProUnidades($pro_unidades);
                    $producto->setProPrecio($pro_precio);
                    $producto->setProMarcaId($mar_id);
                    $controladorProducto = new controladorProducto();
                    $resultado = $controladorProducto->crear($producto);

                    if($resultado["type"] == "success"){
                        echo '<h2 class="text-center text-success">'. $resultado["mensaje"] ."</h2>";
                    }else{
                        echo '<h2 class="text-center text-danger">'. $resultado["mensaje"] ."</h2>";
                    }
                } catch (PDOException $ex) {
                    echo '<h2 class="text-center text-danger">'. $ex->getMessage() ."</h2>";
                }
                ?>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <a class="btn btn-warning" href="listarProducto.php">Regresar al listado</a>
                </div>
            </div>
        </div>
    </div>







    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>
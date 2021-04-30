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

    <title>ELIMINAR PRODUCTOS</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <h1 class="text-center text-success">
                    ELMINAR PRODUCTOS
                </h1>
            </div>
        </div>
        <?php
            if(!isset($_GET["pro_id"])){
                throw new PDOException("No se recibio la identificación");
            }
            try{
                $pro_id = $_GET["pro_id"];
                $controladorProducto = new controladorProducto();
                $resultado = $controladorProducto->buscar($pro_id);
                if(count($resultado)>0){
                    $producto = $resultado[0];
                }
            }catch(PDOException $e){
                echo "Falló la conexión " . $e->getMessage();
            }
        ?>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-title">
                        <div class="row">
                            <div class="col">
                                <h3 class="text-center text-primary">
                                    <?php  echo $producto->getProId() . " - " .$producto->getProNombre() . " " . $producto->getProDescripcion() ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col">
                                        <h4>Descripcion: </h4>
                                    </div>
                                    <div class="col">
                                        <h4><?php echo $producto->getProDescripcion() ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4>Precio: </h4>
                                    </div>
                                    <div class="col">
                                        <h4><?php echo $producto->getProPrecio() ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="eliminarProducto.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input name="identificacion" type="hidden" class="form-control" id="identificacion" value="<?php echo $producto->getProId() ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                                <div class="col text-center">
                                    <a class="btn btn-success" href="listarProducto.php">Regresar al listado</a>
                                </div>
                            </div>
                        </form>
                    </div>
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
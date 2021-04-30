<!doctype html>
<?php
    include_once '../../modelo/producto.php';
    include_once '../../modelo/marca.php';
    include_once '../../modelo/conexion.php';
    include_once '../../controlador/controladorProducto.php';
    include_once '../../controlador/controladorMarca.php';
?>

<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>EDITAR PRODUCTOS</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <h1 class="text-center text-success">
                    EDITAR PRODUCTOS
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
                    <div class="card-body">
                        <form action="actualizarProducto.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="identificacion">Número de identificación</label>
                                    <input name="identificacion" type="number" class="form-control" id="identificacion" value="<?php echo $producto->getProId() ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nombre">Nombre</label>
                                    <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $producto->getProNombre() ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="descripcion">Descripcion</label>
                                    <input name="descripcion" type="text" class="form-control" id="descripcion" value="<?php echo $producto->getProDescripcion() ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="unidades">Unidades</label>
                                    <input name="unidades" type="numeric" class="form-control" id="unidades" value="<?php echo $producto->getProUnidades() ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="precio">Precio</label>
                                    <input name="precio" type="number" class="form-control" id="precio" value="<?php echo $producto->getProPrecio() ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="marca_id">Marca</label>
                                    <select name="marca_id" id="marca_id" class="form-control">
                                        <option value="">--Seleccione--</option>
                                        <?php
                                            $controladorMarca = new controladorMarca();
                                            $marcas = $controladorMarca->listar();
                                            if(count($marcas)>0){
                                                foreach($marcas as $marca){
                                                    if($producto->getProMarcaId() == $marca->getMarId()){
                                                        echo '<option value="'.$marca->getMarId().'" selected >'.$marca->getMarNombre().'</option>';
                                                    }else{
                                                        echo '<option value="'.$marca->getMarId().'" >'.$marca->getMarNombre().'</option>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
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
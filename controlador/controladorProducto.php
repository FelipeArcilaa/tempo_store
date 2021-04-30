<?php
// include_once '../modelo/conexion.php';
// include_once '../modelo/persona.php';

class controladorProducto{
    private $conexion;

    function __construct(){
        $this->conexion = new conexion();
        $this->conexion->getConexion()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /* Listar los datos de personas (Read) */
    function listar(){
        try {
            $sql = "select * from producto inner join marca on producto.mar_id = marca.mar_id";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(NULL);
            $resultado = [];
            while($row = $ps->fetch(PDO::FETCH_OBJ)){
                $marca = new marca();
                $marca->setMarId($row->mar_id);
                $marca->setMarNombre($row->mar_nombre);

                $producto = new producto();
                $producto->setProId($row->pro_id);
                $producto->setProNombre($row->pro_nombre);
                $producto->setProDescripcion($row->pro_descripcion);
                $producto->setProUnidades($row->pro_unidades);
                $producto->setProPrecio($row->pro_precio);
                $producto->setProMarcaId($row->mar_id);
                $producto->setMarca($marca);
                array_push($resultado,$producto);
            }
            $this->conexion = null;
        }catch(PDOException $e){
            echo "Falló la conexión " . $e->getMessage();
        }

        return $resultado;
    }

    function crear($producto){
        try{
            $resultado = [];
            $sql = "insert into producto values (?,?,?,?,?,?)";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $producto->getProId(),
                $producto->getProNombre(),
                $producto->getProDescripcion(),
                $producto->getProUnidades(),
                $producto->getProPrecio(),
                $producto->getProMarcaId()
            ));
            if($ps->rowCount() > 0){
                $mensaje = "Se creó el producto correctamente";
                $type = "success";
            }else{
                $mensaje = "No se pudo crear el producto";
                $type = "error";
            }
            $this->conexion = null;
        }catch(PDOException $e){
            $mensaje = "Error al crear el producto " .$e->getMessage(); 
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        return $resultado;
    }

    function buscar($pro_id){
        try{
            
            $sql = "select * from producto where pro_id = ?";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $pro_id
            ));
            $resultado = [];
            while($row = $ps->fetch(PDO::FETCH_OBJ)){
                $producto = new producto();
                $producto->setProId($row->pro_id);
                $producto->setProNombre($row->pro_nombre);
                $producto->setProDescripcion($row->pro_descripcion);
                $producto->setProUnidades($row->pro_unidades);
                $producto->setProPrecio($row->pro_precio);
                $producto->setProMarcaId($row->mar_id);
                array_push($resultado,$producto);
            }
            $this->conexion = null;
        }catch(PDOException $e){
            echo "Falló la conexión " .$e->getMessage();
        }
        return $resultado;
    }

    function actualizar($producto){
        $resultado = [];
        $sql = "update producto set pro_nombre=?, pro_descripcion=?, pro_unidades=?, pro_precio=?, mar_id=? where pro_id=?";
        $ps = $this->conexion->getConexion()->prepare($sql);
        $ps->execute(array(
            $producto->getProNombre(),
            $producto->getProDescripcion(),
            $producto->getProUnidades(),
            $producto->getProPrecio(),
            $producto->getProMarcaId(),
            $producto->getProId()
        ));
        if($ps->rowCount() > 0){
            $mensaje = "Se actualizó el producto correctamente";
            $type = "success";
        }else{
            $mensaje = "No se pudo actualizar el producto";
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        $this->conexion = null;
        return $resultado;
    }

    function eliminar($producto) {
        $resultado = [];
        $sql = "delete from producto where pro_id=?";
        $ps = $this->conexion->getConexion()->prepare($sql);
        $ps->execute(array(
            $producto->getProId()
        ));
        if($ps->rowCount() > 0){
            $mensaje = "Se eliminó el producto correctamente";
            $type = "success";
        }else{
            $mensaje = "No se pudo eliminar el producto";
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        $this->conexion = null;
        return $resultado;
    }
}
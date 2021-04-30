<?php

class controladorMarca
{


    function __construct()
    {
        $this->conexion = new conexion();
        $this->conexion->getConexion()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function listar()
    {
        try {
            $sql = "select * from marca";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(NULL);
            $resultado = [];
            while ($row = $ps->fetch(PDO::FETCH_OBJ)) {
                $marca = new marca();
                $marca->setMarId($row->mar_id);
                $marca->setMarNombre($row->mar_nombre);
                array_push($resultado, $marca);
            }
            $this->conexion = null;
        } catch (PDOException $e) {
            echo "Falló la conexión " . $e->getMessage();
        }

        return $resultado;
    }
    function crear($marca)
    {
        try {
            $resultado = [];
            $sql = "insert into marca values (?,?)";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $marca->getMarId(),
                $marca->getMarNombre()
            ));
            if ($ps->rowCount() > 0) {
                $mensaje = "Se creó la marca correctamente";
                $type = "success";
            } else {
                $mensaje = "No se pudo crear la marca";
                $type = "error";
            }
            $this->conexion = null;
        } catch (PDOException $e) {
            $mensaje = "Error al crear el producto " . $e->getMessage();
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        return $resultado;
    }

    function buscar($mar_id)
    {
        try {

            $sql = "select * from marca where mar_id = ?";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $mar_id
            ));
            $resultado = [];
            while ($row = $ps->fetch(PDO::FETCH_OBJ)) {
                $marca = new marca();
                $marca->setMarId($row->mar_id);
                $marca->setMarNombre($row->mar_nombre);
                array_push($resultado, $marca);
            }
            $this->conexion = null;
        } catch (PDOException $e) {
            echo "Falló la conexión " . $e->getMessage();
        }
        return $resultado;
    }

    function actualizar($marca)
    {
        $resultado = [];
        $sql = "update marca set mar_nombre=? where mar_id=?";
        $ps = $this->conexion->getConexion()->prepare($sql);
        $ps->execute(array(
            $marca->getMarNombre(),
            $marca->getMarId()
        ));
        if ($ps->rowCount() > 0) {
            $mensaje = "Se actualizó la marca correctamente";
            $type = "success";
        } else {
            $mensaje = "No se pudo actualizar la marca";
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        $this->conexion = null;
        return $resultado;
    }

    function eliminar($marca)
    {
        try {
            if ($this->validarProducto($marca)) {
                $sql = "delete from marca where mar_id=?";
                $ps = $this->conexion->getConexion()->prepare($sql);
                $ps->execute(array(
                    $marca->getMarId()
                ));
                if ($ps->rowCount() > 0) {
                    $mensaje = "Se eliminó la marca correctamente";
                    $type = "success";
                } else {
                    $mensaje = "No se pudo eliminar la marca";
                    $type = "error";
                }
                $this->conexion = null;
            } else {
                $mensaje = "No se pudo eliminar la marca porque contiene productos";
                $type = "error";
            }
        } catch (PDOException $pe) {
            $mensaje = "No se pudo eliminar la marca " . $pe->getMessage();
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        return $resultado;
    }

    function validarProducto($marca)
    {
        try {
            $sql = "select * from producto where mar_id=?";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $marca->getMarId()
            ));
            if ($ps->rowCount() > 0) {
                return false;
            } else {
                return true;
            }
            $this->conexion = null;
        } catch (PDOException $e) {
            echo "Falló la conexión " . $e->getMessage();
        }
    }
}

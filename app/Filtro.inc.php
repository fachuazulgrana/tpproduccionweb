<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Continente.inc.php';
include_once 'app/Pais.inc.php';
include_once 'app/Producto.inc.php';

class Filtro {

    public static function obtener_productos($conexion) {
        $productos = [];

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM produccion_web.productos";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {

                    foreach ($resultado as $fila) {

                        $productos[] = new Producto(
                                $fila['id'],
                                $fila['ciudad'],
                                $fila['descripcion'],
                                $fila['paises_id'],
                                $fila['continentes_id'],
                                $fila['precio'],
                                $fila['activo'],
                                $fila['destacado']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR EN OBTENER PRODUCTOS ' . $ex->getMessage();
            }
        }
        return $productos;
    }



    public static function obtener_productos_destacados($conexion) {
        $productos = [];

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM produccion_web.productos WHERE destacado = 1";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {

                    foreach ($resultado as $fila) {

                        $productos[] = new Producto(
                                $fila['id'],
                                $fila['ciudad'],
                                $fila['descripcion'],
                                $fila['paises_id'],
                                $fila['continentes_id'],
                                $fila['precio'],
                                $fila['activo'],
                                $fila['destacado']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR EN OBTENER PRODUCTOS ' . $ex->getMessage();
            }
        }
        return $productos;
    }


    public static function obtener_productos_con_pais($conexion, $pais_id) {
        $productos = [];

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM produccion_web.productos WHERE paises_id = :paises_id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':paises_id', $pais_id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {

                    foreach ($resultado as $fila) {

                        $productos[] = new Producto(
                                $fila['id'],
                                $fila['ciudad'],
                                $fila['descripcion'],
                                $fila['paises_id'],
                                $fila['continentes_id'],
                                $fila['precio'],
                                $fila['activo'],
                                $fila['destacado']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR EN OBTENER PRODUCTOS ' . $ex->getMessage();
            }
        }
        return $productos;
    }

    public static function obtener_continentes($conexion) {
        $continentes = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM produccion_web.continentes";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {

                    foreach ($resultado as $fila) {

                        $continentes[] = new Continente(
                                $fila['id'],
                                $fila['nombre'],
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR EN OBTENER CONTINENTE ' . $ex->getMessage();
            }
        }
        return $continentes;        
    }

    public static function obtener_paises($conexion){
        
        $paises = array();
        
        if (isset($conexion)) {

            try {
                $sql = "SELECT * FROM produccion_web.paises";
                
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                
                if(count($resultado)){
                    foreach ($resultado as $fila){
                        $paises[] = new Pais(
                                $fila['id'],
                                $fila['nombre'],
                                $fila['continentes_id']
                            );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR EN OBTENER PAISES' . $ex->getMessage();
            }
    }
    return $paises;
}


public static function obtener_paises_con_continente($conexion, $continente_id){
        
    $paises = array();
    
    if (isset($conexion)) {

        try {
            $sql = "SELECT * FROM produccion_web.paises WHERE continentes_id = :continentes_id";
            
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':continentes_id', $continente_id, PDO::PARAM_STR);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            
            if(count($resultado)){
                foreach ($resultado as $fila){
                    $paises[] = new Pais(
                            $fila['id'],
                            $fila['nombre'],
                            $fila['continentes_id']
                        );
                }
            }
        } catch (PDOException $ex) {
            print 'ERROR EN OBTENER PAISES' . $ex->getMessage();
        }
}
return $paises;
}

public static function obtener_productos_filtro($conexion, $filtro = array()) {
    $productos = [];

    if (isset($conexion)) {

        try {
            $sql = "SELECT * FROM produccion_web.productos WHERE 1=1";

            if(!empty($filtro['continente'])){
                $sql .= ' AND continentes_id  =' . $filtro['continente'];
            }

            if(!empty($filtro['pais'])){
                $sql .= ' AND paises_id  =' . $filtro['pais'];
            }

            if(!empty($filtro['ciudad'])){
                $sql .= ' AND id  =' . $filtro['ciudad'];
            }

            if(!empty($where)){
                $sql .= 'WHERE ' .implode(' AND ', $where);
            }

            $sentencia = $conexion->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();

            if (count($resultado)) {

                foreach ($resultado as $fila) {

                    $productos[] = new Producto(
                            $fila['id'],
                            $fila['ciudad'],
                            $fila['descripcion'],
                            $fila['paises_id'],
                            $fila['continentes_id'],
                            $fila['precio'],
                            $fila['activo'],
                            $fila['destacado']
                    );
                }
            }
        } catch (PDOException $ex) {
            print 'ERROR EN OBTENER PRODUCTOS POR PAIS' . $ex->getMessage();
        }
    }
    return $productos;
}
    
}

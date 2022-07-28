<?php
    class Transacciones extends Conectar{
        
        function get_transacciones(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * from transaccion;";
            $sql = $conectar->prepare($sql);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        function get_transaccion($CodigoTransaccion){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * from transaccion where CodigoTransaccion = ?;";
            $sql = $conectar->prepare($sql);
            $sql->bindvalue(1, $CodigoTransaccion);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        
        function insert_transaccion($CodigoTransaccion,$TipoTransaccion,$CodigoCliente,$FechaTransaccion,$MontoTransaccion,$Sucursal,$NumeroDeCuenta){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO transaccion (CodigoTransaccion,TipoTransaccion,CodigoCliente,FechaTransaccion,MontoTransaccion,Sucursal,NumeroDeCuenta) 
            VALUES(?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $CodigoTransaccion);
            $sql->bindValue(2, $TipoTransaccion);
            $sql->bindValue(3, $CodigoCliente);
            $sql->bindValue(4, $FechaTransaccion);
            $sql->bindValue(5, $MontoTransaccion);
            $sql->bindValue(6, $Sucursal);
            $sql->bindValue(7, $NumeroDeCuenta);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function update_transaccion($CodigoTransaccion,$TipoTransaccion,$CodigoCliente,$FechaTransaccion,$MontoTransaccion,$Sucursal,$NumeroDeCuenta){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE transaccion SET TipoTransaccion = ?, CodigoCliente = ?,FechaTransaccion = ?, MontoTransaccion = ? ,Sucursal = ? , NumeroDeCuenta = ?
            where CodigoTransaccion = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $TipoTransaccion);
            $sql->bindValue(2, $CodigoCliente);
            $sql->bindValue(3, $FechaTransaccion);
            $sql->bindValue(4, $MontoTransaccion);
            $sql->bindValue(5, $Sucursal);
            $sql->bindValue(6, $NumeroDeCuenta);
            $sql->bindValue(7, $CodigoTransaccion);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function delete_transaccion($CodigoTransaccion){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "DELETE from transaccion where CodigoTransaccion = $CodigoTransaccion;";
            $sql = $conectar->prepare($sql);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>

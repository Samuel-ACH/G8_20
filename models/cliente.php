<?php
    class Clientes extends Conectar{
        
        function get_clientes(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * from cliente;";
            $sql = $conectar->prepare($sql);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        function get_cliente($NumeroCliente){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * from cliente where NumeroCliente = ?;";
            $sql = $conectar->prepare($sql);
            $sql->bindvalue(1, $NumeroCliente);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        
        function insert_cliente($NumeroCliente, $Nombres, $Apellidos, $RTN, $FechaAfilicacion, $SaldoActual, $NumeroCuenta){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "INSERT INTO cliente (NumeroCliente,Nombres,Apellidos,RTN,FechaAfiliacion,SaldoActual,NumeroCuenta) 
            VALUES(?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroCliente);
            $sql->bindValue(2, $Nombres);
            $sql->bindValue(3, $Apellidos);
            $sql->bindValue(4, $RTN);
            $sql->bindValue(5, $FechaAfilicacion);
            $sql->bindValue(6, $SaldoActual);
            $sql->bindValue(7, $NumeroCuenta);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function update_cliente($NumeroCliente, $Nombres, $Apellidos, $RTN, $FechaAfilicacion, $SaldoActual, $NumeroCuenta){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "UPDATE cliente SET Nombres = ?,Apellidos = ?, RTN= ?, FechaAfiliacion = ?, SaldoActual = ?, NumeroCuenta = ?
            where NumeroCliente = ?;";
            $sql=$conectar->prepare($sql);          
            $sql->bindValue(1, $Nombres);
            $sql->bindValue(2, $Apellidos);
            $sql->bindValue(3, $RTN);
            $sql->bindValue(4, $FechaAfilicacion);
            $sql->bindValue(5, $SaldoActual);
            $sql->bindValue(6, $NumeroCuenta);
            $sql->bindValue(7, $NumeroCliente);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        function delete_cliente($NumeroCliente){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "DELETE from cliente where NumeroCliente = $NumeroCliente;";
            $sql = $conectar->prepare($sql);
            $sql ->execute();
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
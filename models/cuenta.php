<?php
 class Cuenta extends Conectar {
    
    public  function get_cuenta() {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT * from cuenta;";
        $sql = $conectar->prepare($sql);
        $sql ->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_cuenta ($NumeroDeCuenta){
        $conectar = parent::Conexion();
        parent::set_names();
    
        $sql = "SELECT * from cuenta WHERE NumeroDeCuenta = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $NumeroDeCuenta);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function insert_cuenta($NumeroDeCuenta,$NombreDeCuenta,$NumeroDeCliente,$FechaDeApertura,$SaldoActual,$SaldoRetenido,$TipoMoneda){
        $conectar= parent::Conexion();
        parent::set_names();

        $sql ="INSERT INTO cuenta (NumeroDeCuenta,NombreDeCuenta,NumeroDeCliente,FechaDeApertura,SaldoActual,SaldoRetenido,TipoMoneda)
        VALUES (?, ?, ?, ?, ?, ?, ?);";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$NumeroDeCuenta);
        $sql->bindValue(2,$NombreDeCuenta);
        $sql->bindValue(3,$NumeroDeCliente);
        $sql->bindValue(4,$FechaDeApertura);
        $sql->bindValue(5,$SaldoActual);
        $sql->bindValue(6,$SaldoRetenido);
        $sql->bindValue(7,$TipoMoneda);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_cuenta($NumeroDeCuenta,$NombreDeCuenta,$NumeroDeCliente,$FechaDeApertura,$SaldoActual,$SaldoRetenido,$TipoMoneda){
        $conectar= parent::Conexion();
        parent::set_names();
        
        $sql="UPDATE cuenta SET NumeroDeCuenta=?,NombreDeCuenta=?,NumeroDeCliente=?,FechaDeApertura=?,SaldoActual=?,SaldoRetenido=?,TipoMoneda=?
        WHERE NumeroDeCuenta=?;";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$NumeroDeCuenta);
        $sql->bindValue(2,$NombreDeCuenta);
        $sql->bindValue(3,$NumeroDeCliente);
        $sql->bindValue(4,$FechaDeApertura);
        $sql->bindValue(5,$SaldoActual);
        $sql->bindValue(6,$SaldoRetenido);
        $sql->bindValue(7,$TipoMoneda);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_cuenta($NumeroDeCuenta){
        $conectar= parent::Conexion();
        parent::set_names();
        $sql="DELETE FROM cuenta WHERE NumeroDeCuenta = $NumeroDeCuenta;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
 }
?> 
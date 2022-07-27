<?php
 class Banco extends conectar {
    
    public  function get_bancos() {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT * from banco";
        $sql = $conectar->prepare($sql);
        $sql ->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_banco($codigo_banco){
        $conectar = parent::Conexion();
        parent::set_names();
    
        $sql = "SELECT * from banco WHERE codigo_banco = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $codigo_banco);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function insert_banco($codigo_banco,$nombre_banco,$oficina_principal,$cantidad_sucursales,$pais,$fechafundacion,$RTN){
        $conectar= parent::Conexion();
        parent::set_names();

        $sql ="INSERT INTO banco (codigo_banco,nombre_banco,oficina_principal,cantidad_sucursales,pais,fechafundacion,RTN)
        VALUES (?, ?, ?, ?, ?, ?, ?);";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$codigo_banco);
        $sql->bindValue(2,$nombre_banco);
        $sql->bindValue(3,$oficina_principal);
        $sql->bindValue(4,$cantidad_sucursales);
        $sql->bindValue(5,$pais);
        $sql->bindValue(6,$fechafundacion);
        $sql->bindValue(7,$RTN);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_banco($codigo_banco,$nombre_banco,$oficina_principal,$cantidad_sucursales,$pais,$fechafundacion,$RTN){
        $conectar= parent::Conexion();
        parent::set_names();
        
        $sql="UPDATE banco SET codigo_banco=?,nombre_banco=?,oficina_principal=?,cantidad_sucursales=?,pais=?,fechafundacion=?,RTN=?
        WHERE codigo_banco=?;";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$codigo_banco);
        $sql->bindValue(2,$nombre_banco);
        $sql->bindValue(3,$oficina_principal);
        $sql->bindValue(4,$cantidad_sucursales);
        $sql->bindValue(5,$pais);
        $sql->bindValue(6,$fechafundacion);
        $sql->bindValue(7,$RTN);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_banco($codigo_banco){
        $conectar= parent::Conexion();
        parent::set_names();
        $sql="DELETE FROM banco WHERE codigo_banco = $codigo_banco;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
 }
?> 
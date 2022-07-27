<?php
class Conectar{
    protected $dbh;

    protected function Conexion(){
        try{
            $conectar = $this->dbh = new PDO("mysql:host=20.216.41.245;dbname=g8_20","G8_20","mcdxYXrx");
            return $conectar;
        } catch (Exception $e){
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
?>
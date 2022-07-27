<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}

header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');
    
    require_once("../../config/conexion.php");
    require_once("../models/banco.php");

    $bancos = new Bancos();

    $body = json_decode(file_get_contents("php://input"),true);
    
    switch ($_GET["opc"]) {

     case "GetBanco":
        $datos = $bancos->get_bancos();
        echo json_encode($datos);
     break;

     case "GetBanco":
        $datos=$bancos->get_bancos($body["codigo_banco"]);
        if ($datos==null){
            print"El numero de banco no existe";
        } 
        else{
            echo json_encode($datos);
        }
        break;

        case "InsertBanco":
            $datos=$bancos->insert_banco($body["codigo_banco"],$body["nombre_banco"], $body["oficina_principal"], $body["cantidad_sucursales"],
            $body["pais"],$body["fechafundacion"], $body["RTN"]);
            print "¡El Banco se agrego exitosamente!";
            echo json_encode($datos);
        break;

        case "UpdateBanco":
            $datos=$bancos->update_banco($body["codigo_banco"],$body["nombre_banco"], $body["oficina_principal"], $body["cantidad_sucursales"],
            $body["pais"],$body["fechafundacion"], $body["RTN"]);
            print "¡El Banco fue actualizado exitosamente!";
            echo json_encode($datos);
       break;

       case "DeleteBanco":
        $datos = $bancos->delete_banco($body["codigo_banco"]);
        print "¡Banco eliminado exitosamente!";
        break;

        default:
         print "El API que consulta no se encontró o no existe...";
         break;
       }
?>
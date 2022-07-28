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
    
    require_once("../config/conexion.php");
    require_once("../models/cuenta.php");

    $cuentas = new Cuenta();

    $body = json_decode(file_get_contents("php://input"),true);
    
    switch ($_GET["opc"]) {

     case "GetCuentas":
        $datos = $cuentas->get_cuentas();
        echo json_encode($datos);
     break;

     case "GetCuenta":
        $datos=$cuentas->get_cuenta($body["NumeroDeCuenta"]);
        if ($datos==null){
            print"El número de cuenta que busca no existe.";
        } 
        else{
            echo json_encode($datos);
        }
        break;
        
    case "InsertCuenta":
            $datos=$cuentas->insert_cuenta($body["NumeroDeCuenta"],$body["NombreDeCuenta"], $body["NumeroDeCliente"], $body["FechaDeApertura"],
            $body["SaldoActual"],$body["SaldoRetenido"], $body["TipoMoneda"]);
            print "¡Número de cuenta agregado exitosamente!";
            echo json_encode($datos);
    break;

    case "UpdateCuenta":
            $datos=$cuentas->update_cuenta($body["NumeroDeCuenta"],$body["NombreDeCuenta"], $body["NumeroDeCliente"], $body["FechaDeApertura"],
            $body["SaldoActual"],$body["SaldoRetenido"], $body["TipoMoneda"]);
            print "¡Número de cuenta actualizado exitosamente!";
            
    break;

    case "DeleteCuenta":
            $datos = $cuentas->delete_cuenta($body["NumeroDeCuenta"]);
            print "¡Número de cuenta eliminado exitosamente!";
    break;


    default:
    print "El API que consulta no se encontró o no existe...";
    break;

    }
?>  
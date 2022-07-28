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
    require_once("../models/transaccion.php");
    $transacciones = new Transacciones();

    $body = json_decode(file_get_contents("php://input"),true);
    switch ($_GET["opc"]) {
        case "GetTransacciones":
            $datos = $transacciones->get_transacciones();
            echo json_encode($datos);
            break;
        case "GetTransaccion":
                $datos = $transacciones->get_transaccion($body["CodigoTransaccion"]);
                if ($datos == null) {
                    print "La transaccion no existe.";
                }else{
                    echo json_encode($datos);
                }
                break;
             
        case "InsertTransaccion":
            $datos = $transacciones->insert_transaccion($body["CodigoTransaccion"],$body["TipoTransaccion"],$body["CodigoCliente"],$body["FechaTransaccion"],$body["MontoTransaccion"],$body["Sucursal"],$body["NumeroDeCuenta"]);
            print "Transaccion agregada";
            echo json_encode($datos);
            break;   
     
               
        case "UpdateTransaccion":
                $datos = $transacciones->update_transaccion($body["CodigoTransaccion"],$body["TipoTransaccion"],$body["CodigoCliente"],$body["FechaTransaccion"],$body["MontoTransaccion"],$body["Sucursal"],$body["NumeroDeCuenta"]);
                    print "Transaccion actualizada";
                break;

        case "DeleteTransaccion":
                $datos = $transacciones->delete_transaccion($body["CodigoTransaccion"]);
                print "Transaccion eliminada";
                break;      
    
            default:
                print "El API que consulta no se encontró o no existe...";
                break;
     }
    

?>
    
       

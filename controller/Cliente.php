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
    require_once("../models/cliente.php");
    $clientes = new Clientes();

    $body = json_decode(file_get_contents("php://input"),true);
    switch ($_GET["opc"]) {
        case "GetClientes":
            $datos = $clientes->get_clientes();
            echo json_encode($datos);
            break;
        case "GetCliente":
                $datos = $clientes->get_cliente($body["NumeroCliente"]);
                if ($datos == null) {
                    print "Este Cliente no existe.";
                }else{
                    echo json_encode($datos);
                }
                break;
             
        case "InsertCliente":
            $datos = $clientes->insert_cliente($body["NumeroCliente"],$body["Nombres"],$body["Apellidos"],$body["RTN"],$body["FechaAfiliacion"],$body["SaldoActual"],$body["NumeroCuenta"]);
            print "Cliente agregado con exito!";
            echo json_encode($datos);
            break;   
     
               
        case "UpdateCliente":
            $datos = $clientes->insert_cliente($body["NumeroCliente"],$body["Nombres"],$body["Apellidos"],$body["RTN"],$body["FechaAfiliacion"],$body["SaldoActual"],$body["NumeroCuenta"]);
            print "Cliente Actualizado con exito!";
                break;

        case "DeleteCliente":
                $datos = $clientes->delete_cliente($body["NumeroCliente"]);
                print "Cliente eliminado con exito!";
                break;      
    
            default:
                print "El API que consulta no se encontró o no existe...";
                break;
     }
    

?>
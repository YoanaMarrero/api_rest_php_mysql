<?php

header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/categoria.php");

$categoria = new Categoria ();
$params = json_decode(file_get_contents("php://input"), true);

switch($_GET['op']){
    case 'getAll':
        $datos = $categoria->get_categoria();
        echo json_encode($datos);
        break;
    
    case 'getId':
        $datos = $categoria->get_categoria_x_id($params['cat_id']);
        echo json_encode($datos);
        break;
    
    case 'insert':
        $datos = $categoria->insert_categoria($params['cat_name'], $params['cat_obs']);
        echo json_encode("Insertado correctamente");
        break;
    
    case 'update':
        $datos = $categoria->update_categoria($params['cat_id'], $params['cat_name'], $params['cat_obs']);
        echo json_encode("Actualizada correctamente");
        break;
    
    case 'delete':
        $datos = $categoria->delete_categoria($params['cat_id']);
        echo json_encode("Desactivada correctamente");
        break;

}
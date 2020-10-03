<?php
include_once 'app/controllers/tool.controller.php';


// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'listar'; // acción por defecto si no envían
}

// parsea la accion 
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $controller = new ToolController();
        $controller->showTools();
    break;

    case 'modi-rubro':
        $controller = new ToolController();
        $controller->showRubros();
    break;

    case 'listar':
        $controller = new ToolController();
        $controller->showToolsconRubros();
    break;
     
    case 'listar-rubros':
        $controller = new ToolController();
        $controller->showRubros();
    break;
    
    case 'insertar':
        $controller = new ToolController();
        $controller->addTool();
        break;

    case 'insertar-rubro':
        $controller = new ToolController();
        $controller->addRubro();
        break;
    
    case 'eliminar': // eliminar/:ID
        $controller = new ToolController();
        $id = $params[1];
        $controller->deleteTool($id);
        break;
    case 'filtrar': // filtrar/:ID
        $controller = new ToolController();
        $id = $params[1];
    //    var_dump($id);
    //    die;
        $controller->showToolsFiltro($id);
        break;

/*     case 'finalizar':
        $controller = new ToolController();
        $controller->finalizeTask();
        break; */
    default:
        header("HTTP/1.0 404 Not Found");
        echo('404 Page not found');
        break;
}
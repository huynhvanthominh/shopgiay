<?php
session_start();
require_once __DIR__ . "/mvc/controllers/controller.php";
$controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : "cview";
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'home';
$path =  __DIR__ . "/mvc/controllers/$controller.php";
if (file_exists($path)) {
    require_once $path;
    $controller = new $controller();
    if (method_exists($controller, $action)) {
        $controller->$action();
    }
}

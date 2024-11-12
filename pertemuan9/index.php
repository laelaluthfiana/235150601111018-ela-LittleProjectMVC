<?php
$path = isset($_GET['path']) ? $_GET['path'] : '';
$segments = explode('/', $path);
$controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'PengurusController';
$action = isset($segments[1]) ? $segments[1] : 'index';


$controllerFile = "controllers/{$controllerName}.php";
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    
    
    if (class_exists($controllerName)) {
        
        $dependency = "Ini adalah argumen yang dibutuhkan"; 
        $controller = new $controllerName($dependency);
        
        
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            echo "Error: Action '$action' tidak ditemukan dalam controller '$controllerName'.";
        }
    } else {
        echo "Error: Controller class '$controllerName' tidak ditemukan.";
    }
} else {
    echo "Error: File controller '$controllerFile' tidak ditemukan.";
}
?>

<?php
class Router {
    public function handleRequest() {
        $url = trim($_SERVER['REQUEST_URI'], '/'); // Lấy URL
        $parts = explode('/', $url);
        
        $controllerName = ucfirst($parts[0] ?? 'home') . 'Controller'; // Mặc định 'home'
        $method = $parts[1] ?? 'index'; // Mặc định 'index'

        if (file_exists("../app/controllers/$controllerName.php")) {
            require_once "../app/controllers/$controllerName.php";
            $controller = new $controllerName();
            
            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                echo "Method $method not found!";
            }
        } else {
            echo "Controller $controllerName not found!";
        }
    }
}
?>

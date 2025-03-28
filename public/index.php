<?php
require_once '../core/Router.php'; // Load Router
require_once '../app/controllers/HomeController.php'; // Load Controller chính

$router = new Router();
$router->handleRequest();
?>

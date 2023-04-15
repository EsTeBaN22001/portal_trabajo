<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\DashboardController;
use MVC\Router;
use Controllers\IndexController;
use Controllers\LoginController;

$router = new Router();

// Página principal
$router->get('/', [IndexController::class, 'index']);

// Registro e inicio de sesión de usuarios
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/register', [LoginController::class, 'register']);
$router->post('/register', [LoginController::class, 'register']);
$router->get('/logout', [LoginController::class, 'logout']);

// Ruta principal para el dashboard - una vez que se inicia sesión
$router->get('/dashboard', [DashboardController::class, 'dashboard']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->checkRoutes();
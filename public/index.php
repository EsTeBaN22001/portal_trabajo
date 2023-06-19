<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\DashboardController;
use MVC\Router;
use Controllers\IndexController;
use Controllers\JobController;
use Controllers\LoginController;
use Controllers\ProfileController;

$router = new Router();

// Página principal
$router->get('/', [IndexController::class, 'index']);

// Registro e inicio de sesión de usuarios
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/register', [LoginController::class, 'register']);
$router->post('/register', [LoginController::class, 'register']);
$router->get('/logout', [LoginController::class, 'logout']);

// Rutas de las acciones del perfíl
$router->get('/profile', [ProfileController::class, 'profile']);
$router->post('/profile', [ProfileController::class, 'profile']);

// Ruta principal para el dashboard - una vez que se inicia sesión
$router->get('/dashboard', [DashboardController::class, 'dashboard']);

// RUTAS PARA LOS TRABAJOS
$router->get('/new-job', [JobController::class, 'newJob']);
$router->post('/new-job', [JobController::class, 'newJob']);
$router->get('/view-job', [JobController::class, 'viewJob']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->checkRoutes();
<?php

namespace Controllers;

use Model\Business;
use Model\Worker;
use MVC\Router;

class LoginController {

	public static function login(Router $router) {

		// Variable para las alertas
		$alerts = [];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			// Verificar si se está logueando una empresa o un alumno
			$userPost = Worker::where('email', $_POST['email']);

			if ($userPost) {
				$userExists = $userPost;
			} else {
				$userExists = Business::where('email', $_POST['email']);
			}

			if ($userExists) {

				$passwordVerify = password_verify($_POST['password'], $userExists->password);

				if ($passwordVerify) {

					// Iniciar la sesión con $_SESSION
					$userExists->startSession();

					header('Location: ' . $_ENV['HOST'] . '/dashboard');

				} else {
					$alerts = Worker::setAlert('error', 'La contraseña es incorrecta');
				}

			} else {

				$alerts = Worker::setAlert('error', 'El usuario no existe');

			}

		}

		$alerts = Worker::getAlerts();

		$router->renderLogin('login', [
			'title' => 'Iniciar sesión',
			'alerts' => $alerts,
		]);

	}

	public static function register(Router $router) {

		// Variable por si se registra un alumno
		$worker = new Worker();

		// Variable por si se registra una empresa
		$business = new Business();

		$alerts = [];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if ($_POST['type'] == "worker") {

				$worker->syncUp($_POST);

				$alerts = $worker->validateNewAccount();

				if (empty($alerts)) {

					// validar la contraseña y hasearla
					$worker->hashPassword();

					// liberar el campo de confirmar contraseña si es igual
					unset($worker->confirmPassword);
					unset($worker->newPassword);

					// Si no hay errores guardar en la base de datos
					$result = $worker->save();

					if ($result) {
						header('Location: /login?alert=success');
					}

				}

			}

			if ($_POST['type'] == "business") {

				$business->syncUp($_POST);

				$alerts = $business->validateNewAccount();

				if (empty($alerts)) {

					// validar la contraseña y hasearla
					$business->hashPassword();

					// liberar el campo de confirmar contraseña si es igual
					unset($business->confirmPassword);
					unset($business->newPassword);

					// Si no hay errores guardar en la base de datos
					$result = $business->save();

					if ($result) {
						header('Location: /login?alert=success');
					}

				}

			}

		}

		$router->renderLogin('register', [
			'title' => 'Registrate',
			'alerts' => $alerts,
			'worker' => $worker,
			'business' => $business,
		]);
	}

	public static function logout() {

		session_unset();

		header('Location: /');

	}

}

?>
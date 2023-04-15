<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Sitio para realizar, crear y contestas encuestas de tus temas preferidos">
	<meta name="keywords" content="Encuestas, equizzyApp, crear encuestas, realizar encuestas, iniciar sesión, registrarse">
	<meta name="author" content="Esteban Redón">
	<meta name="copyright" content="Esteban Redón">
	<meta name="robots" content="index">
	<meta name="robots" content="follow">
	<title><?= $title; ?> | Equizzy</title>
	<!-- App Icon -->
	<link rel="shortcut icon" href="/build/img/EquizzyAppIcon.svg" type="image/x-icon">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Custom CSS -->
	<link rel="stylesheet" href="build/css/app.css">
</head>

<body>

	<section class="navbar-container reveal-top">
		<div class="navbar container">
			<div class="logo">
				<a href="<?= $_ENV['HOST'] ?>/" class="logo">equizzy<span>App</span></a>
			</div>
			<nav class="nav">
				<?php if (isset($_SESSION['login']) && $_SESSION['login']): ?>
					<a class="nav-link" href="<?=$_ENV['HOST']?>/polls/list">Ver encuestas</a>
					<a class="nav-link logout-button" href="<?=$_ENV['HOST']?>/logout">Cerrar sesión</a>
				<?php else: ?>
					<a class="nav-link" href="<?=$_ENV['HOST']?>/register">Regístrate</a>
					<a class="nav-link" href="<?=$_ENV['HOST']?>/login">Iniciar sesión</a>
				<?php endif?>
			</nav>
		</div>
	</section>

	<main>
		<?php echo $content; ?>
	</main>

	<!-- Font Awesome -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://unpkg.com/scrollreveal"></script>
	<script src="build/js/indexScrollReveal.js"></script>

	<?php echo $script ?? ''; ?>
</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Esteban Redón">
	<meta name="copyright" content="Esteban Redón">
	<meta name="robots" content="index">
	<meta name="robots" content="follow">
	<title><?=$title;?> | Portal Trabajo</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Custom CSS -->
	<link rel="stylesheet" href="build/css/app.css">
</head>

<body>

	<div class="site-container">
		<aside class="aside">
			<div class="profile-info-container">
				<div class="img-container">
					<i class="fa-solid fa-user"></i>
				</div>
				<p class="username">Esteban Redón</p>
			</div>
			<div class="options-list">
				<div class="option">
					<div class="icon-container">
						<i class="fa-solid fa-magnifying-glass"></i>
					</div>
					<p>Buscar empleo</p>
				</div>
				<div class="option">
					<div class="icon-container">
						<i class="fas fa-file-alt"></i>
					</div>
					<p>Mis postulaciones</p>
				</div>
				<div class="option">
					<div class="icon-container">
						<i class="fa-solid fa-plus"></i>
					</div>
					<p>Nuevo trabajo</p>
				</div>
				<div class="option">
					<div class="icon-container">
						<i class="fa-solid fa-address-card"></i>
					</div>
					<p>Perfil</p>
				</div>
			</div>
			<div class="logout-container">
				<i class="fa-solid fa-arrow-right-from-bracket"></i>
				<p>Cerrar sesión</p>
			</div>
		</aside>
		<main class="main">
			<?php echo $content; ?>
		</main>
	</div>

	<!-- Font Awesome -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<?php echo $script ?? ''; ?>
</body>

</html>
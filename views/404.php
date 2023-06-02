<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página no encontrada | Portal Trabajo</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

<div class="header-container">
		<header class="header container-sm">
			<div class="logo-container">
				<a href="<?= $_SERVER['HOST'] ?>/">
					<p class="logo">Porta<span>LT</span>rabajo</p>
				</a>
			</div>
			<div class="navbar-container">
				<nav class="nav">
					<?php if(isset($_SESSION['login']) && $_SESSION['login']): ?>
						<a href="<?= $_SERVER['HOST']  ?>/profile" class="link">Perfil</a>
						<a href="<?= $_SERVER['HOST']  ?>/logout" class="link">Cerrar sesión</a>
						<?php else: ?>
							<a href="<?= $_SERVER['HOST']  ?>/register" class="link">Registrate</a>
							<a href="<?= $_SERVER['HOST']  ?>/login" class="link">Iniciar Sesión</a>
					<?php endif ?>
				</nav>
			</div>
		</header>
	</div>

  <main class="section-sm container-sm page-container no-page-container bx-shadow">
    <div class="principal-content">
      <h1>Página no encontrada</h1>
      <p>Parece que la página que estás buscando no existe.</p>
      <p> Volver a la <a href="<?= $_ENV['HOST'] ?>/">página de inicio</a></p>
    </div>
  </main>

	<footer class="footer">
		<p>&#169;Todos los derechos reservados por PortalTrabajo 2022</p>
	</footer>

  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <?php echo $script ?? ''; ?>
</body>

</html>
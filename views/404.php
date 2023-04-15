<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página no encontrada | Equizzy</title>
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

  <section class="navbar-container">
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

  <main class="page-container">
    <div class="principalContent">
      <h1>Página no encontrada</h1>
      <p>Parece que la página que estás buscando no existe.</p>
      <p> Volver a la <a href="<?= $_ENV['HOST'] ?>/">página de inicio</a></p>
    </div>
  </main>

  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <?php echo $script ?? ''; ?>
</body>

</html>
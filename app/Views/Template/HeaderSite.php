<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Ruta de archivo styleSite css -->
    <link rel="stylesheet" href="<?= URL_ROUTE; ?>/css/styleSite.css" />

    <!-- Link de iconos-->
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

	<!-- Ruta de archivo boostrap css -->
    <link rel="stylesheet" href="<?= URL_ROUTE; ?>/css/bootstrap.css" />

    <!-- Ruta del icono de GPSgt -->
    <link rel="shortcut icon" href="<?= URL_ROUTE; ?>/img/favicon.ico" />

    <title><?= SITE_NAME; ?></title>
</head>
<body>

	<div class="bg-box">
		<img src="<?= URL_ROUTE; ?>/img/fondo2.png" alt="">
	</div>
    <header class="header">
        <nav class="nav">
            <a href="#" class="nav_logo">
				<img src="<?= URL_ROUTE; ?>/img/logo.png" alt="LogoTipo" class="logo_img">
			</a>
            <ul class="nav_items">
                <li class="nav_item">
                    <a href="#home" class="nav_link">Inicio</a>
                    <a href="#gps-list" class="nav_link">Productos</a>
                    <a href="#booking" class="nav_link">Cita</a>
                    <a href="#" class="nav_link">Contacto</a>
                </li>
            </ul>
            <button class="button" id="form-open">Iniciar Sesión</button>
        </nav>
    </header>
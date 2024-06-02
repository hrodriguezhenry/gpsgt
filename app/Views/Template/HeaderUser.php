<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    redirect("");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fuente awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Ruta de archivo styleSite -->
    <link rel="stylesheet" href="<?= URL_ROUTE; ?>/css/styleUser.css" />

    <!-- Link de iconos-->
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />

    <!-- Ruta del icono de GPSgt -->
    <link rel="shortcut icon" href="<?= URL_ROUTE; ?>/img/favicon.ico" />

    <title><?= SITE_NAME; ?></title>
</head>
<body>
    <header class="header">
        <nav class="navigation">

            <!-- Logotipo -->
            <a href="<?= URL_ROUTE; ?>" class="logo">
				<img src="<?= URL_ROUTE; ?>/img/logo.png" class="logo_img" />
			</a>
            <span class="nav_user"><?= $_SESSION["user_name"]; ?></span>
            <ul class="nav_items">

                <!-- Menú de navegacion -->
                <li class="nav_item">
                    <a href="#home" class="nav_link">Inicio</a>
                    <a href="#products" class="nav_link">Productos</a>
                    <button class="nav_link" id="form_open">Cita</button>
                    <a href="#contact" class="nav_link">Contacto</a>
                </li>
            </ul>

            <!-- Botón de inicio de sesión -->
            <a href="<?= URL_ROUTE; ?>"><button class="button">Cerrar Sesión</button></a>
        </nav>
    </header>
    <div class="page">
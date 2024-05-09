<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Hoja de estilos css-->
    <link rel="stylesheet" href="<?= URL_ROUTE; ?>/css/styleAdmin.css" />

    <!-- Iconos de Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Icono de GPSgt -->
    <link rel="shortcut icon" href="<?= URL_ROUTE; ?>/img/favicon.ico" />
    <title>GPSgt</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="<?= URL_ROUTE; ?>/img/shortLogo.png" alt="">
            </div>
            <span class="logo_name">GPSgt</span>
        </div>
        <i class="bx bx-x close-icon"></i>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="<?= URL_ROUTE; ?>/dashboard">
                    <i class='bx bx-home'></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="<?= URL_ROUTE; ?>/calendario">
                    <i class='bx bx-calendar' ></i>
                    <span class="link-name">Calendario</span>
                </a></li>
                <li><a href="<?= URL_ROUTE; ?>/clientes">
                    <i class='bx bx-user'></i>
                    <span class="link-name">Clientes</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="<?= URL_ROUTE; ?>">
                    <i class='bx bx-log-out' ></i>
                    <span class="link-name">Salir</span>
                </a></li>

                <li class="mode">
                    <a href="">
                        <i class='bx bx-moon' ></i>
                        <span class="link-name">Modo Oscuro</span>
                    </a>

                    <div class="mode-toggle">
                    <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
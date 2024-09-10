<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    redirect("");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= SITE_NAME; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= URL_ROUTE; ?>/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Libraries Stylesheet -->
    <link href="<?= URL_ROUTE; ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= URL_ROUTE; ?>/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= URL_ROUTE; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= URL_ROUTE; ?>/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Cargando...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="<?= URL_ROUTE; ?>/calendariob5" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><img class="image me-2 mb-2" src="<?= URL_ROUTE; ?>/img/shortLogo.png">GPSgt</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <i class="bi bi-person-circle user-icons"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?= $_SESSION["user_name"]; ?></h6>
                        <span><?= $_SESSION["role_name"]; ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?= URL_ROUTE; ?>/dashboardb5" class="nav-item nav-link"><i class="bi bi-bar-chart-line me-2"></i>Dashboard</a>
                    <a href="<?= URL_ROUTE; ?>/calendariob5" class="nav-item nav-link active"><i class="bi bi-calendar me-2"></i>Calendario</a>
                    <a href="<?= URL_ROUTE; ?>/usuariob5" class="nav-item nav-link"><i class="bi bi-person me-2"></i>Usuarios</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="<?= URL_ROUTE; ?>/calendariob5" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary"><img class="image mt-2" src="<?= URL_ROUTE; ?>/img/shortLogo.png"></h2>
                </a>

                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle "></i>
                            <span class="d-none d-lg-inline-flex"><?= $_SESSION["user_name"]; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="<?= URL_ROUTE; ?>" class="dropdown-item">Salir</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
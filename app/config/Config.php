<?php
//Ruta de la aplicación
define("APP_ROUTE", dirname(dirname(__FILE__)));

//Ruta URL
const URL_ROUTE = "/gpsgt";

//Nombre del sitio
const SITE_NAME = "GPSgt";

//Zona horaria
date_default_timezone_set('America/Guatemala');

//Datos de conexión a la base de datos
const DB_HOST = "localhost";
const DB_NAME = "gpsgt";
const DB_USER = "root";
const DB_PASSWORD = "admin";
const DB_CHARSET = "chartset=utf8";

//Rutas de controladores de español a inglés
const ROUTE_MAP = [
    "inicio" => "HomeController",
    "dashboard" => "DashboardController",
    "calendario" => "CalendarController",
    "clientes" => "CustomerController",
    "pruebas" => "TestController"
];

//Rutas de métodos de español a inglés
const ROUTE_METHOD_MAP = [
    "ingresar" => "login",
    "registrar" => "register",
    "agendar" => "reservation",
    "horas" => "hours"
];
?>
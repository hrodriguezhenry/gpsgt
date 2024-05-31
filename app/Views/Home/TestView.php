<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta por Fecha</title>
</head>
<body>
    <form method="post" action="">
        <label for="fecha">Seleccione una fecha:</label>
        <input type="date" id="reservation_date" name="reservation_date">
        <button type="submit" name="submit">Consultar</button>
    </form>

    <select id="reservation_hour" name="reservation_hour">
        <!-- Opciones serán agregadas aquí dinámicamente -->
    </select>

    <div id="resultados"></div>

<script type="text/javascript" src="<?= URL_ROUTE; ?>/js/site.js"></script>
</body>
</html>

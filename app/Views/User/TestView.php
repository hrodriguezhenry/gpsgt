<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Fuente de Google - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            font-size: 16px;
        }
        body {
            background-color: #e2e2e9;
        }
        .modal_update_form {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Asegura que esté por encima de otros elementos */
        }
        .update_form_container {
            width: 100%;
            max-width: 600px;
            border-radius: 10px;
            background: #fff;
            padding: 25px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 25px;
            color: #000;
            font-weight: bold;
            padding-bottom: 10px;
            text-align: center;
        }
        .update_form_input_box {
            width: 100%;
            margin-top: 20px;
        }
        .update_form_input_box label {
            color: #333;
            text-align: left;
        }
        .update_form :where(.update_form_input_box input, .update_form_select_box) {
            position: relative;
            height: 40px;
            width: 100%;
            outline: none;
            font-size: 1rem;
            color: #000;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 0 15px;
        }
        .update_form_input_box input:focus {
            border-color: #007bff;
        }
        .update_form_column {
            display: flex;
            column-gap: 15px;
        }
        .update_form_select_box select {
            height: 100%;
            width: 100%;
            outline: none;
            border: #707070;
            color: #000;
            font-size: 1rem;
        }
        .update_form_button {
            width: 100%;
            margin-top: 20px;
        }
        .update_form_save_button {
            text-align: right;
            padding-right: 15px;
        }
        .update_form_cancel_button {
            text-align: left;
            padding-left: 15px;
        }
        .update_form_button button {
            background-color: #e2e2e9;
            margin-top: 10px;
            height: 55px;
            width: 50%;
            padding: 10px 0;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
        }
        .update_form_button .save_button {
            background-color: #007bff;
            border: none;
            color: #fff;
        }
        .update_form_button .cancel_button {
            background-color: #fff;
            border: 2px solid #cacaca;
            color: #333;
        }
    </style>
    <title>Consulta por Fecha</title>
</head>
<body>
    <div class="modal_update_form">
        <div class="update_form_container">
            <form action="<?php echo URL_ROUTE; ?>/inicio/agendar" method="POST" class="update_form">
                <h2>Editar Cliente</h2>

                <div class="update_form_column">
                    <div class="update_form_input_box">
                        <label>Nombre</label>
                        <input type="text" name="update_first_name" maxlength="50" required>
                    </div>

                    <div class="update_form_input_box">
                        <label>Apellido</label>
                        <input type="text" name="update_last_name" maxlength="50" required>
                    </div>
                </div>
                    
                <div class="update_form_column">
                    <div class="update_form_input_box">
                        <label>Correo Electrónico</label>
                        <input type="email" name="update_email" maxlength="100" required>
                    </div>

                    <div class="update_form_input_box">
                        <label>Teléfono</label>
                        <input type="number" name="update_phone_number" min="00000000" max="99999999" required>
                    </div>
                </div>
                <div class="update_form_column">
                    <div class="update_form_input_box">
                        <label>Dispositivo</label>
                        <div class="update_form_select_box">
                            <select name="update_product" required>
                                <option>GPS3G</option>
                                <option>GPS4G</option>
                                <option>GPS4G Motocicleta</option>
                            </select>
                        </div>
                    </div>

                    <div class="update_form_input_box">
                        <label>Cantidad</label>
                        <div class="update_form_select_box">
                            <select id="update_product_quantity" name="update_product_quantity" required>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="update_form_input_box">
                    <label>Dirección</label>
                    <input type="text" name="update_address" maxlength="100">
                </div>

                <div class="update_form_column">
                    <div class="update_form_input_box">
                        <label>Fecha</label>
                        <input type="date" id="update_date" name="update_date" min="<?= date("Y-m-d");?>" required>
                    </div>

                    <div class="update_form_input_box">
                        <label>Hora</label>
                        <div class="update_form_select_box">
                            <select id="update_hour" name="update_hour" required>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="update_form_column">
                    <div class="update_form_button update_form_save_button">
                        <button class="save_button" type="submit">Guardar</button>
                    </div>
                    <div class="update_form_button update_form_cancel_button">
                        <button class="cancel_button" type="button">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- <script type="text/javascript" src="<?= URL_ROUTE; ?>/js/site.js"></script> -->
</body>
</html>

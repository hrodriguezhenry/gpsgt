<?php require_once(APP_ROUTE."/Views/Template/HeaderAdmin.php"); ?>
    <section class="admin-section">
        <div class="modal_update_form">
            <div class="update_form_container">
                <form action="<?php echo URL_ROUTE; ?>/calendario/editar" method="POST" class="update_form">
                    <h2>Editar Cliente</h2>
                    
                    <input type="hidden" id="update_id" name="update_id">

                    <div class="update_form_column">
                        <div class="update_form_input_box">
                            <label>Nombre</label>
                            <input type="text" id="update_first_name" name="update_first_name" maxlength="50" required>
                        </div>

                        <div class="update_form_input_box">
                            <label>Apellido</label>
                            <input type="text" id="update_last_name" name="update_last_name" maxlength="50" required>
                        </div>
                    </div>
                        
                    <div class="update_form_column">
                        <div class="update_form_input_box">
                            <label>Correo Electrónico</label>
                            <input type="email" id="update_email" name="update_email" maxlength="100" required>
                        </div>

                        <div class="update_form_input_box">
                            <label>Teléfono</label>
                            <input type="number" id="update_phone_number" name="update_phone_number" min="00000000" max="99999999" required>
                        </div>
                    </div>
                    <div class="update_form_column">
                        <div class="update_form_input_box">
                            <label>Dispositivo</label>
                            <div class="update_form_select_box">
                                <select id="update_product" name="update_product" required>
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
                        <input type="text" id="update_address" name="update_address" maxlength="100">
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

        <div class="top">
            <i class='bx bx-menu sidebar-toggle'></i>
            <span><?= $_SESSION["user_name"]; ?></span>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class='bx bx-calendar'></i>
                    <span class="text">Calendario</span>
                    <input id="calendar_start_date" type="date" value="<?= date("Y-m-d");?>">
                    <input id="calendar_end_date" type="date" value="<?= date("Y-m-d");?>">
                </div>
            </div>
            <div class="activity">
                <div class="activity-data">
                    <table id="calendar_table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Producto</th>
                                <th>Hora</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php require_once(APP_ROUTE."/Views/Template/FooterAdmin.php"); ?>
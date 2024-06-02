<?php require_once(APP_ROUTE."/Views/Template/HeaderAdmin.php"); ?>
    <section class="admin-section">
        <div class="modal_update_form">
            <div class="update_form_container">
                <form action="<?php echo URL_ROUTE; ?>/usuarios/editar/<?= $_SESSION["user_id"]; ?>" method="POST" class="update_form">
                    <h2>Editar Usuario</h2>
                    
                    <input type="hidden" id="update_id" name="update_id">

                    <div class="update_form_column">
                        <div class="update_form_input_box">
                            <label>Nombre</label>
                            <input type="text" id="update_first_name" name="update_first_name" maxlength="50" required>
                        </div>

                        <div class="update_form_input_box">
                            <label>Apellido</label>
                            <input type="text" id="update_last_name" name="update_last_name" maxlength="50">
                        </div>
                    </div>
                        
                    <div class="update_form_column">
                        <div class="update_form_input_box">
                            <label>Correo Electrónico</label>
                            <input type="email" id="update_email" name="update_email" maxlength="100" required>
                        </div>

                        <div class="update_form_input_box">
                            <label>Teléfono</label>
                            <input type="number" id="update_phone_number" name="update_phone_number" min="00000000" max="99999999">
                        </div>
                    </div>
                    
                    <div class="update_form_column">
                        <div class="update_form_input_box">
                            <label>Rol</label>
                            <div class="update_form_select_box">
                                <select id="update_role" name="update_role" required>
                                    <option>Administrador</option>
                                    <option>Usuario</option>
                                </select>
                            </div>
                        </div>

                        <div class="update_form_input_box">
                            <label>Activo</label>
                            <div class="update_form_select_box">
                                <select id="update_active" name="update_active" required>
                                    <option>Si</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="update_form_column">
                        <div class="update_form_input_box">
                            <label>Dirección</label>
                            <input type="text" id="update_address" name="update_address" maxlength="100">
                        </div>

                        <div class="update_form_input_box">
                            <label>Restablecer Contraseña</label>
                            <input type="text"
                                id="update_password"
                                name="update_password"
                                minlength="8"
                                pattern="(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Debe contener al menos un número, un carácter especial [!@#$%^&*], una letra mayúscula, una letra minúscula y al menos 8 caracteres en total."
                                required
                            >
                        </div>
                    </div>
                    

                    <div class="update_form_column">
                        <div class="update_form_button update_form_save_button">
                            <button class="update_save_button" type="submit">Guardar</button>
                        </div>
                        <div class="update_form_button update_form_cancel_button">
                            <button class="update_cancel_button" type="button">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal_delete_form">
            <div class="delete_form_container">
                <form action="<?php echo URL_ROUTE; ?>/usuarios/borrar/<?= $_SESSION["user_id"]; ?>" method="POST" class="delete_form">
                    <h2>Eliminar Usuario</h2>
                    
                    <input type="hidden" id="delete_id" name="delete_id">
                    
                    <div class="delete_form_input_box">
                        <span>Nombre: </span><span id="delete_first_name"></span>
                    </div>

                    <div class="delete_form_input_box">
                        <span>Apellido: </span><span id="delete_last_name"></span>
                    </div>
                    
                    <div class="delete_form_input_box">
                        <span>Correo Electrónico: </span><span id="delete_email"></span>
                    </div>

                    <div class="delete_form_input_box">
                        <span>Teléfono: </span><span id="delete_phone_number"></span>
                    </div>
                    
                    <div class="delete_form_input_box">
                        <span>Rol: </span><span id="delete_role"></span>
                    </div>
                    
                    <div class="delete_form_input_box">
                        <span>Activo: </span><span id="delete_active"></span>
                    </div>

                    <div class="delete_form_input_box">
                        <span>Dirección: </span><span id="delete_address"></span>
                    </div>

                    <div class="delete_form_column">
                        <div class="delete_form_button delete_form_save_button">
                            <button class="delete_save_button" type="submit">Eliminar</button>
                        </div>
                        <div class="delete_form_button delete_form_cancel_button">
                            <button class="delete_cancel_button" type="button">Cancelar</button>
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
                    <i class='bx bx-user'></i>
                    <span class="text">Usuarios</span>
                </div>
            </div>
            <div class="activity">
                <div class="activity-data">
                    <table id="users_table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Activo</th>
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
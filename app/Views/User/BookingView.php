<section id="home" class="home">
        
        <div class="home_title">
            <h1>GPSgt Protegiendo tu Vehículo</h1>
            <p>Nos especializamos en la instalación de dispositivos GPS en vehículos terrestres y marinos, 
                garantizando una instalación precisa y confiable, brindando a 
                nuestros clientes tranquilidad y control sobre sus activos en cualquier entorno.
            </p>
        </div>
        <div class="background">
            <img src="<?= URL_ROUTE; ?>/img/background.png" />
        </div>

        <div class="login_form_container">
			<i class='bx bx-x form_close'></i>

            <!-- Formulario de inicio de sesión y registro -->
            <div class="form login_form">

                <!-- Formulario de inicio de sesión -->
                <form  action="<?php echo URL_ROUTE; ?>/usuario/agendar/<?= $_SESSION["user_id"]; ?>" method="POST" class="reservation_form">
                    <h2>Generar Cita</h2>
                    
                    <div class="reservation_form_column">
                        <div class="reservation_form_input_box">
                            <label>Dispositivo</label>
                            <div class="reservation_form_select_box">
                                <select name="reservation_product" required>
                                    <option value="" hidden>Escoge el dispositivo a adquirir</option>
                                    <option>GPS3G</option>
                                    <option>GPS4G</option>
                                    <option>GPS4G Motocicleta</option>
                                </select>
                            </div>
                        </div>

                        <div class="reservation_form_input_box">
                            <label>Cantidad</label>
                            <div class="reservation_form_select_box">
                                <select id="reservation_product_quantity" name="reservation_product_quantity" required>
                                    <option hidden value="">Escoge la cantidad de dispositivos</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="reservation_form_column">
                        <div class="reservation_form_input_box">
                            <label>Fecha a Reservar</label>
                            <input type="date" id="reservation_date" name="reservation_date" min="<?= date("Y-m-d");?>" required>
                        </div>

                        <div class="reservation_form_input_box">
                            <label>Hora</label>
                            <div class="reservation_form_select_box">
                                <select id="reservation_hour" name="reservation_hour" required>
                                    <option hidden value="">Escoge la hora de la cita</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="reservation_form_button">
                        <button id="signup" type="submit">Enviar</button>
                    </div>
                </form>
            </div>

            <!-- Formulario de registro -->
            <!-- <div class="form signup_form">
                          
                <h2>Registro</h2>
                <div class="login_signup">¿Tienes una cuenta? <a href="#" id="login">Iniciar Sesión</a></div>
            </div> -->
        </div>
    </section>
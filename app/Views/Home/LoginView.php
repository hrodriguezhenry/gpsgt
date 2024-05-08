<section id="home" class="home"> <!--Formularios para usuarios-->
        <div class="form_container">
			<i class='bx bx-x form_close' ></i>

            <!-- Login -->
            <div class="form login_form">
                <form action="#">
                    <h2>Inicio de Sesión</h2>

                    <div class="input_box">
                        <input type="email" placeholder="Ingresa tu correo" required>
                        <i class='bx bx-envelope email' ></i>
                    </div>

                    <div class="input_box">
                        <input type="password" placeholder="Ingresa tu contraseña" required>
						<i class='bx bx-lock-alt password'></i>
						<i class="bx bx-show pw_hide"></i>
                    </div>

                    <div class="option_field">
                        <span class="checkbox">
                            <input type="checkbox" id="check">
                            <label for="check">Recordarme</label>
                        </span>

                        <a href="#" class="forgot_pw">¿Olvidaste tu contraseña</a>
                    </div>

                    <button class="button">Ingresar</button>
                    <div class="login_signup">¿No tienes una cuenta? <a href="#" id="signup">Registrarme</a></div>
                </form>
            </div>
            <!--  Fin Login -->

            <!-- Registro -->
            <div class="form signup_form">
                <form action="#">
                    <h2>Registro</h2>

                    <div class="input_box">
                        <input type="email" placeholder="Ingresa tu correo" required>
                        <i class='bx bx-envelope email' ></i>
                    </div>
					
					<div class="input_box">
                        <input type="text" placeholder="Ingresa tu nombre" required>
                        <i class='bx bx-user-circle user_first_name' ></i>
                    </div>

					<div class="input_box">
                        <input type="test" placeholder="Ingresa tu apellido" required>
                        <i class='bx bx-user user_last_name' ></i>
                    </div>

					<div class="input_box">
                        <input type="text" placeholder="Ingresa tu teléfono" required>
                        <i class='bx bx-phone phone' ></i>
                    </div>

					<div class="input_box">
                        <input type="text" placeholder="Ingresa tu dirección" required>
						<i class='bx bx-map direction'></i>
                    </div>

                    <div class="input_box">
                        <input type="password" placeholder="Ingresa tu contraseña" required>
                        <i class='bx bx-lock-alt password'></i>
						<i class="bx bx-show pw_hide"></i>
                    </div>

                    <div class="input_box">
                        <input type="password" placeholder="Confirmar contraseña" required>
                        <i class='bx bx-lock-alt password'></i>
						<i class="bx bx-show pw_hide"></i>
                    </div>
                    
                    <button class="button">Registrarme</button>
                    <div class="login_signup">¿Tienes una cuenta? <a href="#" id="login">Iniciar Sesión</a></div>
                </form>
            </div>
            <!-- Fin Registro -->

        </div>
    </section>
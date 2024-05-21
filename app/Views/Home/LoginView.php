    <section id="home" class="home">
        <div class="login_form_container">
			<i class='bx bx-x form_close'></i>

            <!-- Formulario de inicio de sesión y registro -->
            <div class="form login_form">

                <!-- Formulario de inicio de sesión -->
                <form action="<?php echo URL_ROUTE; ?>/inicio/ingresar" method="POST">
                    <h2>Inicio de Sesión</h2>
                    <div class="input_box">
                        <input type="email" name="email" placeholder="Ingresa tu correo" required autocomplete="email" value="<?=$data["email"]; ?>">
                        <i class='bx bx-envelope email'></i>
                    </div>
                    <div class="input_box">
                        <input type="password" name="password" placeholder="Ingresa tu contraseña" required autocomplete="current-password" value="<?=$data["password"]; ?>">
						<i class='bx bx-lock-alt password'></i>
						<i class="bx bx-show pw_hide"></i>
                    </div>
                    <div class="invalid_login">
                        <span>
                        <?php
                        if(isset($_SESSION["loggedin_error"])){
                            echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                    document.querySelector(".home").classList.add("show");});
                                </script>';
                            
                            echo 'Contraseña o usuario incorrecto';
                            session_unset();
                            session_destroy();
                        }
                        ?>
                        </span>
                    </div>
                    <button class="button">Ingresar</button>
                    <div class="login_signup">¿No tienes una cuenta? <a href="." id="signup">Registrarme</a></div>
                </form>
            </div>

            <!-- Formulario de registro -->
            <div class="form signup_form">
                <form action="<?php echo URL_ROUTE; ?>/inicio/registrar" method="POST">
                    <h2>Registro</h2>
                    <div class="input_box duplicate_email">
                        <input type="email" name="email" placeholder="Ingresa tu correo" required value="<?php echo $data["email"]; ?>">
                        <i class='bx bx-envelope email'></i>
                        <span>
                        <?php
                        if(isset($_SESSION["register_error"])){
                            echo '<script>document.addEventListener("DOMContentLoaded", function() {
                                    document.querySelector(".home").classList.add("show");
                                    document.querySelector(".form_container").classList.add("active");});
                                </script>';
                            
                            echo 'Este usuario ya está registrado';
                            session_unset();
                            session_destroy();
                        }
                        ?>
                        </span>
                    </div>
					<div class="input_box">
                        <input type="text" name="name" placeholder="Ingresa tu nombre" required value="<?php echo $data["email"]; ?>">
                        <i class='bx bx-user-circle user_first_name'></i>
                    </div>
					<div class="input_box">
                        <input type="test" name="lastname" placeholder="Ingresa tu apellido" required value="<?php echo $data["lastname"]; ?>">
                        <i class='bx bx-user user_last_name'></i>
                    </div>
					<div class="input_box">
                        <input type="text" name="phone" placeholder="Ingresa tu teléfono" required value="<?php echo $data["phone"]; ?>">
                        <i class='bx bx-phone phone'></i>
                    </div>
					<div class="input_box">
                        <input type="text" name="location" placeholder="Ingresa tu dirección" required value="<?php echo $data["location"]; ?>">
						<i class='bx bx-map direction'></i>
                    </div>
                    <div class="input_box">
                        <input type="password" name="password" placeholder="Ingresa tu contraseña" required value="<?php echo $data["password"]; ?>">
                        <i class='bx bx-lock-alt password'></i>
						<i class="bx bx-show pw_hide"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" name="cpassword" placeholder="Confirmar contraseña" required value="<?php echo $data["cpassword"]; ?>">
                        <i class='bx bx-lock-alt password'></i>
						<i class="bx bx-show pw_hide"></i>
                    </div>
                    <button class="button">Registrarme</button>
                    <div class="login_signup">¿Tienes una cuenta? <a href="#" id="login">Iniciar Sesión</a></div>
                </form>
            </div>
        </div>
    </section>
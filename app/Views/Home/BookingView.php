	<section class="reservation" id="reservation">
        <div class="reservation_title">
            <h1>Agendar Cita</h1>
        </div>

		<div class="reservation_content">
			<div class="reservation_form_container">
				<form action="." class="reservation_form">
					<div class="reservation_form_column">
						<div class="reservation_form_input_box">
							<label>Nombre</label>
							<input type="text" placeholder="Ingresa tu nombre" maxlength="50" required>
						</div>

						<div class="reservation_form_input_box">
							<label>Apellido</label>
							<input type="text" placeholder="Ingresa tu apellido" maxlength="50" required>
						</div>
					</div>
						
					<div class="reservation_form_column">
						<div class="reservation_form_input_box">
							<label>Correo Electrónico</label>
							<input type="email" placeholder="Ingresa tu correo electrónico" maxlength="100" required>
						</div>

						<div class="reservation_form_input_box">
							<label>Número de Teléfono</label>
							<input type="number" placeholder="Ingresa tu número de teléfono" min="00000000" max="99999999" required>
						</div>
					</div>
					<div class="reservation_form_column">
						<div class="reservation_form_input_box">
							<label>Dispositivo</label>
							<div class="reservation_form_select_box">
								<select required>
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
								<select required>
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

					<div class="reservation_form_input_box">
						<label>Dirección</label>
						<input type="text" placeholder="Ingresa la dirección de instalación" maxlength="100">
					</div>

					<div class="reservation_form_column">
						<div class="reservation_form_input_box">
							<label>Fecha a Reservar</label>
							<input type="date" required>
						</div>

						<div class="reservation_form_input_box">
							<label>Hora</label>
							<div class="reservation_form_select_box">
								<select required>
									<option hidden value="">Escoge hora de la cita</option>
									<option>10:00am</option>
									<option>11:30am</option>
									<option>01:00pm</option>
									<option>02:30pm</option>
									<option>04:00pm</option>
								</select>
							</div>
						</div>
					</div>

					<div class="reservation_form_button">
						<button type="submit">Enviar</button>
					</div>
				</form>
			</div>

			<div class="reservation_map">
				<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1930.9899739268697!2d-90.5275824318383!3d14.543139406263274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8589a6a0590a620f%3A0x9c6f6466f0bb3d96!2sBoca%20del%20Monte%2C%20Cdad.%20de%20Guatemala!5e0!3m2!1ses-419!2sgt!4v1715399255944!5m2!1ses-419!2sgt"></iframe>
			</div>
			
		</div>
		
	</section>
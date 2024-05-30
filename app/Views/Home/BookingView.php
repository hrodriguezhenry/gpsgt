	<section class="reservation" id="reservation">
        <div class="reservation_title">
            <h1>Agendar Cita</h1>
        </div>

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
	</section>
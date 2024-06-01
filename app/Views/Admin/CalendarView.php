<?php require_once(APP_ROUTE."/Views/Template/HeaderAdmin.php"); ?>
    <section class="admin-section">
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
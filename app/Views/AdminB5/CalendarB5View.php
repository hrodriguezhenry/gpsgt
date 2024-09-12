<?php require_once APP_ROUTE."/Views/Template/HeaderB5Admin.php"; ?>
            <!-- Titulo del Módulo Inicio -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-4 mb-md-0">
                        <div class="bg-transparent rounded d-flex align-items-center px-4">
                            <i class="bi bi-calendar fa-2x text-dark"></i>
                            <h4 class="mb-0 ms-3">Citas</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                        <div class="bg-transparent rounded d-flex flex-column flex-sm-row justify-content-start justify-content-md-end">
                            <div class="bg-transparent rounded pe-2 mb-2 mb-ms-0">
                                <label for="startDate" class="col-form-label px-1" style="width: 60px;">Desde</label>
                                <input type="date" class="form-control" id="startDate" style="display: inline-block; width: auto;">
                            </div>
                            <div class="bg-transparent rounded ps-0 ps-sm-2">
                                <label for="endDate" class="px-1" style="width: 60px;">Hasta</label>
                                <input type="date" class="form-control" id="endDate" style="display: inline-block; width: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Titulo del Módulo Fin -->


            <!-- Citas Realizadas Inicio -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Citas Agendadas</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="dataTable">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Citas Realizadas Fin -->

            
<?php require_once APP_ROUTE."/Views/Template/FooterB5Admin.php"; ?>
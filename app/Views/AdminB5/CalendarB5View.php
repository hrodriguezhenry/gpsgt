<?php require_once APP_ROUTE."/Views/Template/HeaderB5Admin.php"; ?>
            <!-- Titulo del Módulo Inicio -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-xs-12 col-md-12 col-lg-12 col-xl-4 col-xxl-6">
                        <div class="bg-transparent rounded d-flex align-items-center px-4">
                            <i class="bi bi-calendar fa-2x text-dark"></i>
                            <div class="ms-3">
                                <h4 class="mb-0">Calendario</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                        <div class="bg-transparent rounded px-4">
                            <div class="row">
                                <label for="inputEmail3" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-form-label">Desde</label>
                                <div class="col-xs-7 col-sm-9 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                                    <input type="date" class="form-control" id="inputEmail3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                        <div class="bg-transparent rounded px-4">
                            <div class="row">
                                <label for="inputEmail3" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-form-label">Hasta</label>
                                <div class="col-xs-7 col-sm-9 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                                    <input type="date" class="form-control" id="inputEmail3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Titulo del Módulo Fin -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Citas Agendadas</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Blank Start -->
            <!-- <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <h3>This is blank page</h3>
                    </div>
                </div>
            </div> -->
            <!-- Blank End -->

            
<?php require_once APP_ROUTE."/Views/Template/FooterB5Admin.php"; ?>
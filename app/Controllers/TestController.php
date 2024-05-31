<?php
class TestController extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        if (isset($_GET['reservation_date'])){

            $data = ["date" => $_GET['reservation_date']];
            $hours = $this->model->getAvailableHour($data);

            if ($this->model->getAvailableHour($data)) {
                echo '<option value="">Escoge la hora de la cita</option>';
                foreach ($hours as $hour) {
                    echo '<option>'.$hour->reservation_hour.'</option>';
                }
            } else {
                echo '<option value="">Horario no disponible</option>';
            }
        }

        $this->view("Home/TestView");
    }
}
?>
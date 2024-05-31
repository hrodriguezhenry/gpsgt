<?php
//Clase controlador que se encarga de cargar los módelos y las vistas
class Controllers{
    protected $model;

    public function __construct(){
        $this->model();
    }

    //Cargar módelo
    public function model(){
        $model = get_class($this);
        $model = str_replace("Controller","Model", $model);
        $routClassModel = "../App/Models/".$model.".php";
        
        if(file_exists($routClassModel)){
            require_once($routClassModel);
            $this->model = new $model;
        }
    }

    //Cargar vista
    public function view($view, $data = []){
        require_once("../App/Views/".$view.".php");
    }

    // Destructor para cerrar la conexión
    public function __destruct() {
        if(isset($this->model)) {
            $this->model->closeConnection();
        }
    }
}
?>
<?php
class HomeController extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        session_start();
        $data = [
            "email" => "",
            "lastname" => "",
            "phone" => "",
            "location" => "",
            "password" => "",
            "cpassword" => ""
        ];
        if(isset($_SESSION['form_data'])) {
            $data = $_SESSION['form_data'];
            unset($_SESSION['form_data']);
        }
        $this->view("Home/HomeView", $data);
    }

    public function login(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            session_start();
            $data = [
                "email" => trim($_POST["email"]),
                "password" => trim($_POST["password"])
            ];

            if($this->model->getUser($data)){
                $_SESSION['loggedin'] = true;
                redirect("/dashboard");
            } else{
                $_SESSION['loggedin_error'] = true;
                $_SESSION['form_data'] = $data;
                redirect("", $data);
            }
        }

    }

    public function register(){

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            session_start();
            $data = [
                "email" => trim($_POST["email"]),
                "lastname" => trim($_POST["lastname"]),
                "phone" => trim($_POST["phone"]),
                "location" => trim($_POST["location"]),
                "password" => trim($_POST["password"]),
                "cpassword" => trim($_POST["cpassword"]),
            ];

            if($this->model->getUser($data)){
                $_SESSION['loggedin'] = true;
                redirect("");
            } else{
                $_SESSION['register_error'] = true;
                $_SESSION['form_data'] = $data;
                redirect("", $data);
            }
        }

    }

    public function insert(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = [
                "name" => trim($_POST["name"]),
                "email" => trim($_POST["email"]),
                "phone" => trim($_POST["phone"]),
            ];

            if($this->model->insertUser($data)){
                redirect("");
            } else{
                die("Algo salió mal");
            }
        } else {
            $data = [
                "name" => "",
                "email" => "",
                "telefono" => ""
            ];

            $this->view("Home/Insert", $data);
        }
    }

    public function update($id){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = [
                "id" => $id,
                "name" => trim($_POST["name"]),
                "email" => trim($_POST["email"]),
                "phone" => trim($_POST["phone"]),
            ];

            if($this->model->updateUser($data)){
                redirect("");
            } else{
                die("Algo salió mal");
            }
        } else {
            //Obtener informacion de usuario desde el modelo
            $user = $this->model->getUserId($id);

            $data = [
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "phone" => $user->phone
            ];

            $this->view("Home/Update", $data);
        }
    }

    public function delete($id){
        $user = $this->model->getUserId($id);

        $data = [
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
            "phone" => $user->phone
        ];

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = [
                "id" => $id
            ];

            if($this->model->deleteUser($data)){
                redirect("");
            } else{
                die("Algo salió mal");
            }
        }

        $this->view("Home/Delete", $data);
    }
}
?>
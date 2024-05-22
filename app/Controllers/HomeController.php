<?php
class HomeController extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        session_start();

        $data = [
            "login_email" => "",
            "login_password" => "",
            "register_email" => "",
            "register_first_name" => "",
            "register_last_name" => "",
            "register_phone" => "",
            "register_address" => "",
            "register_password" => "",
            "register_confirm_password" => ""
        ];

        if(isset($_SESSION['form_data'])) {
            foreach ($_SESSION['form_data'] as $key => $value) {
                if (!empty($value)) {
                    $data[$key] = $value;
                }
            }

            unset($_SESSION['form_data']);
        }
        $this->view("Home/HomeView", $data);
    }

    public function login(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            session_start();
            $data = [
                "login_email" => trim($_POST["login_email"]),
                "login_password" => trim($_POST["login_password"])
            ];

            if($this->model->getUser($data)){
                $_SESSION['loggedin'] = true;
                redirect("/dashboard");
            } else{
                $_SESSION['loggedin_error'] = true;
                $_SESSION['form_data'] = $data;
                redirect("");
            }
        }
    }

    public function register(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            session_start();
            
            $data = [
                "register_email" => trim($_POST["register_email"]),
                "register_first_name" => trim($_POST["register_first_name"]),
                "register_last_name" => trim($_POST["register_last_name"]),
                "register_phone" => trim($_POST["register_phone"]),
                "register_address" => trim($_POST["register_address"]),
                "register_password" => trim($_POST["register_password"]),
                "register_confirm_password" => trim($_POST["register_confirm_password"]),
            ];

            if($this->model->getUser($data)){
                $_SESSION['loggedin'] = true;
                redirect("");
            } else{
                $_SESSION['register_error'] = true;
                $_SESSION['form_data'] = $data;
                redirect("");
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
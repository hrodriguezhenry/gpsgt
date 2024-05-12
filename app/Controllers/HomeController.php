<?php
class HomeController extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view("Home/HomeView");
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
                redirect("");
            }
        }
        
        // $this->view("Admin/DashboardView");
    }

    public function register(){
        
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
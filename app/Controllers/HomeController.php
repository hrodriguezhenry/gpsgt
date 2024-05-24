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

            if($this->model->getLoginUser($data)){
                $_SESSION['loggedin'] = true;
                $view = $this->model->getLoginView($data);
                redirect("/".$view->view);
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
                "register_confirm_password" => trim($_POST["register_confirm_password"])
            ];
            
            $registerEmail = $this->model->getRegisterUser($data);

            if($registerEmail->email == $data["register_email"]){
                $_SESSION['duplicate_email'] = true;
                $_SESSION['form_data'] = $data;
                redirect("");
            } else if($data["register_password"] != $data["register_confirm_password"]){
                $_SESSION['distinct_password'] = true;
                $_SESSION['form_data'] = $data;
                redirect("");
            } else{
                if($this->model->insertUser($data)){
                    $_SESSION['loggedin'] = true;
                    $view = $this->model->getRegisterView($data);
                    redirect("/".$view->view);
                } else{
                    die("Algo salió mal");
                }
            }
        }
    }
}
?>
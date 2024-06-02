<?php
class UsersController extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view("Admin/UsersView");
    }

    public function users() {
        $data["users"] = $this->model->getUsers();
        // Preparar la respuesta como un array
        $response = [];

        if ($data["users"]) {
            // Agregar cada cliente al array
            foreach ($data["users"] as $user) {
                $response[] = [
                    'id' => $user->id,
                    'user_name' => $user->user_name,
                    'role' => $user->role,
                    'email' => $user->email,
                    'phone_number' => $user->phone_number,
                    'address' => $user->address,
                    'active' => $user->active
                ];
            }
        }
        
        // Devolver la respuesta como un JSON
        header('Content-Type: application/json');
        echo json_encode($response);
        
    }

    public function user($id) {
        if (isset($id)){
            $data["id"] = $id;
            
            $user = $this->model->getUser($data);
            // Preparar la respuesta como un array
            $response = [];

            $response[] = [
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'address' => $user->address,
                'role' => $user->role,
                'active' => $user->active
            ];

            // Devolver la respuesta como un JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    public function hours($date){
        if (isset($date)){
            $data["date"] = $date;
            $data["hours"] = $this->model->getAvailableHour($data);
            // Preparar la respuesta como un array
            $response = [];
    
            if ($data["hours"]) {
                // Agregar cada hora disponible al array
                foreach ($data["hours"] as $hour) {
                    $response[] = htmlspecialchars($hour->reservation_hour);
                }
            }
    
            // Devolver la respuesta como un JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    public function update($id){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = [
                "update_id" => trim($_POST["update_id"]),
                "update_first_name" => trim($_POST["update_first_name"]),
                "update_last_name" => trim($_POST["update_last_name"]),
                "update_email" => trim($_POST["update_email"]),
                "update_phone_number" => trim($_POST["update_phone_number"]),
                "update_role" => trim($_POST["update_role"]),
                "update_active" => trim($_POST["update_active"]),
                "update_address" => trim($_POST["update_address"]),
                "update_password" => trim($_POST["update_password"])
            ];
            
            $roleId = $this->model->getRole($data);

            $data["role_id"] = $roleId->id;
            $data["user_id"] = $id;


            if($this->model->updateUser($data)){
                redirect("/usuarios");
            } else{
                die("Algo salió mal");
            }
        }
    }
    public function delete($id){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data["delete_id"] = trim($_POST["delete_id"]);
            $data["user_id"] = $id;

            if($this->model->deleteUser($data)){
                redirect("/calendario");
            } else{
                die("Algo salió mal");
            }
        }
    }
}
?>
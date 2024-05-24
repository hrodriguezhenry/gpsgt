<?php
class HomeModel{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    
    public function getLoginUser($data){
        $this->db->query(
            "SELECT *
            FROM user
            WHERE deleted_at IS NULL
            AND active = 1
            AND email = :login_email
            AND password = SHA2( :login_password , 256) LIMIT 1;"
        );

        $this->db->bind(":login_email", $data["login_email"]);
        $this->db->bind(":login_password", $data["login_password"]);
        $row = $this->db->record();
        return $row;
    }

    public function getLoginView($data){
        $this->db->query(
            "SELECT v.`name` AS view
            FROM user AS u
            INNER JOIN role AS r
            ON u.rol_id = r.id
            INNER JOIN view AS v
            ON r.view_id = v.id
            WHERE u.deleted_at IS NULL
            AND u.active = 1
            AND u.email = :login_email
            LIMIT 1;"
        );

        $this->db->bind(":login_email", $data["login_email"]);
        $row = $this->db->record();
        return $row;
    }

    public function getRegisterUser($data){
        $this->db->query(
            "SELECT email
            FROM user
            WHERE deleted_at IS NULL
            AND active = 1 
            AND email = :register_email
            LIMIT 1;");
        $this->db->bind(":register_email", $data["register_email"]);
        $row = $this->db->record();
        return $row;
    }

    public function getRegisterView($data){
        $this->db->query(
            "SELECT v.`name` AS view
            FROM user AS u
            INNER JOIN role AS r
            ON u.rol_id = r.id
            INNER JOIN view AS v
            ON r.view_id = v.id
            WHERE u.deleted_at IS NULL
            AND u.active = 1
            AND u.email = :register_email
            LIMIT 1;"
        );

        $this->db->bind(":register_email", $data["register_email"]);
        $row = $this->db->record();
        return $row;
    }
    public function insertUser($data){
        $this->db->query(
            "INSERT INTO user(first_name, last_name, email, phone_number, password, address) 
            VALUES (:first_name, :last_name, :email, :phone_number, SHA2( :password, 256), :address)"
        );

        $this->db->bind(":first_name", $data["register_first_name"]);
        $this->db->bind(":last_name", $data["register_last_name"]);
        $this->db->bind(":email", $data["register_email"]);
        $this->db->bind(":phone_number", $data["register_phone"]);
        $this->db->bind(":password", $data["register_password"]);
        $this->db->bind(":address", $data["register_address"]);
        
        if($this->db->execute()){
            return true;
        } else{
            return false;
        }
    }
}
?>
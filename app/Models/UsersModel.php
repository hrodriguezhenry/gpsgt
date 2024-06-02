<?php
class UsersModel{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getUsers(){
        $this->db->query(
            "SELECT u.id,
                r.`name` AS role,
                CONCAT(u.first_name, ' ', u.last_name) AS user_name,
                u.email,
                u.phone_number,
                u.address,
                IF(u.`active` = 1, 'Si', 'No') AS active
            FROM user AS u
            INNER JOIN role AS r
            ON u.role_id = r.id
            INNER JOIN view AS v
            ON r.view_id = v.id
            WHERE u.deleted_at IS NULL
            AND u.active = 1
            ORDER BY u.created_at ASC;"
        );
        $row = $this->db->records();
        return $row;
    }

    public function getUser($data){
        $this->db->query(
            "SELECT u.id,
                r.`name` AS role,
                u.first_name,
                u.last_name,
                u.email,
                u.phone_number,
                u.address,
                IF(u.`active` = 1, 'Si', 'No') AS active
            FROM user AS u
            INNER JOIN role AS r
            ON u.role_id = r.id
            INNER JOIN view AS v
            ON r.view_id = v.id
            WHERE u.deleted_at IS NULL
            AND u.active = 1
            AND u.id = :id
            LIMIT 1;"
        );

        $this->db->bind(":id", $data["id"]);
        $row = $this->db->record();
        return $row;
    }
    
    public function getAvailableHour($data){
        $this->db->query(
            "SELECT rh.`name` AS reservation_hour
            FROM reservation_hour AS rh
            WHERE rh.`active` = 1
            AND rh.deleted_at IS NULL
            AND NOT EXISTS (
                SELECT 1
                FROM reservation AS r
                WHERE r.reservation_hour_id = rh.id
                AND r.deleted_at IS NULL
                AND r.reservation_date = :date
            );"
        );

        $this->db->bind(":date", $data["date"]);
        $row = $this->db->records();
        return $row;
    }

    public function getRole($data){
        $this->db->query(
            "SELECT r.id
            FROM `role` AS r
            WHERE r.deleted_at IS NULL
            AND r.`active` = 1
            AND r.name = :role
            LIMIT 1;"
        );

        $this->db->bind(":role", $data["update_role"]);
        $row = $this->db->record();
        return $row;
    }

    public function getReservationHour($data){
        $this->db->query(
            "SELECT rh.id
            FROM reservation_hour AS rh
            WHERE rh.`active` = 1
            AND rh.deleted_at IS NULL
            AND rh.`name` = :hour
            LIMIT 1;"
        );

        $this->db->bind(":hour", $data["update_hour"]);
        $row = $this->db->record();
        return $row;
    }

    public function updateUser($data){
        $this->db->query(
            "UPDATE user
            SET first_name = :first_name,
            last_name = :last_name,
            email = :email,
            phone_number = IF(:phone_number = '', NULL, :phone_number),
            role_id = :role_id,
            active = IF(:active = 'Si', 1, 0),
            address = IF(:address = '', NULL, :address),
            password = SHA2(:password , 256),
            updated_at = CURRENT_TIMESTAMP(),
            updated_by = :user_id
            WHERE id = :id;"
        );
        print_r($data);
        $this->db->bind(":id", $data["update_id"]);
        $this->db->bind(":first_name", $data["update_first_name"]);
        $this->db->bind(":last_name", $data["update_last_name"]);
        $this->db->bind(":email", $data["update_email"]);
        $this->db->bind(":phone_number", $data["update_phone_number"]);
        $this->db->bind(":role_id", $data["role_id"]);
        $this->db->bind(":active", $data["update_active"]);
        $this->db->bind(":address", $data["update_address"]);
        $this->db->bind(":password", $data["update_password"]);
        $this->db->bind(":user_id", $data["user_id"]);
        if($this->db->execute()){
            return true;
        } else{
            return false;
        }
    }

    public function deleteUser($data){
        $this->db->query(
            "UPDATE user
            SET deleted_at = CURRENT_TIMESTAMP(),
            deleted_by = :user_id
            WHERE id = :id;"
        );

        $this->db->bind(":id", $data["delete_id"]);
        $this->db->bind(":user_id", $data["user_id"]);

        if($this->db->execute()){
            return true;
        } else{
            return false;
        }
    }


    public function closeConnection() {
        $this->db->closeConnection();
    }
}
?>
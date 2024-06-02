<?php
class UserModel{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    
    public function getUser($data){
        $this->db->query(
            "SELECT first_name,
                last_name,
                email,
                phone_number,
                address
            FROM user
            WHERE deleted_at IS NULL
            AND active = 1
            AND id = :id
            LIMIT 1;"
        );

        $this->db->bind(":id", $data["reservation_user_id"]);
        $row = $this->db->record();
        return $row;
    }

    public function getProduct($data){
        $this->db->query(
            "SELECT p.id
            FROM product AS p
            WHERE p.`active` = 1
            AND p.deleted_at IS NULL
            AND p.`name` = :product
            LIMIT 1;"
        );

        $this->db->bind(":product", $data["reservation_product"]);
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

        $this->db->bind(":hour", $data["reservation_hour"]);
        $row = $this->db->record();
        return $row;
    }

    public function insertReservation($data){
        $this->db->query(
            "INSERT INTO reservation (first_name, last_name, email, phone_number, product_id, product_quantity, address, reservation_date, reservation_hour_id)
            VALUES(:first_name, :last_name, :email, :phone_number, :product_id, :product_quantity, :address, :date, :hour_id);"
        );

        $this->db->bind(":first_name", $data["first_name"]);
        $this->db->bind(":last_name", $data["last_name"]);
        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":phone_number", $data["phone_number"]);
        $this->db->bind(":product_id", $data["product_id"]);
        $this->db->bind(":product_quantity", $data["reservation_product_quantity"]);
        $this->db->bind(":address", $data["address"]);
        $this->db->bind(":date", $data["reservation_date"]);
        $this->db->bind(":hour_id", $data["hour_id"]);
        if($this->db->execute()){
            return true;
        } else{
            return false;
        }
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
    
    public function closeConnection() {
        $this->db->closeConnection();
    }
}
?>
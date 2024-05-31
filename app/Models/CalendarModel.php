<?php
class CalendarModel{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getCustomers($data){
        $this->db->query(
            "SELECT CONCAT(r.first_name, ' ', r.last_name) AS customer_name,
                r.email,
                r.phone_number,
                r.address,
                p.`name` AS product,
                rh.`name` AS hour_reservation,
                r.reservation_date
            FROM reservation AS r
            INNER JOIN product AS p
            ON r.product_id = p.id
            INNER JOIN reservation_hour AS rh
            ON r.reservation_hour_id = rh.id
            WHERE r.deleted_at IS NULL
            AND p.deleted_at IS NULL
            AND rh.deleted_at IS NULL
            AND r.reservation_date BETWEEN :start_date
            AND :end_date
            ORDER BY r.reservation_date ASC,
            rh.hour_order ASC;"
        );

        $this->db->bind(":start_date", $data["start_date"]);
        $this->db->bind(":end_date", $data["end_date"]);
        $row = $this->db->records();
        return $row;
    }
    
    public function closeConnection() {
        $this->db->closeConnection();
    }
}
?>
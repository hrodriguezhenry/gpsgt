<?php
class TestModel{
    private $db;

    public function __construct(){
        $this->db = new Database;
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
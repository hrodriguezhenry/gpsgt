<?php
class CalendarController extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view("Admin/CalendarView");
    }

    public function reservation(...$date) {
        if (isset($date)) {
            $data["start_date"] = $date[0];
            $data["end_date"] = $date[1];
            
            $data["customers"] = $this->model->getCustomers($data);
            // Preparar la respuesta como un array
            $response = [];

            if ($data["customers"]) {
                // Agregar cada cliente al array
                foreach ($data["customers"] as $customer) {
                    $response[] = [
                        'id' => $customer->id,
                        'customer_name' => $customer->customer_name,
                        'email' => $customer->email,
                        'phone_number' => $customer->phone_number,
                        'address' => $customer->address,
                        'product' => $customer->product,
                        'hour' => $customer->reservation_hour,
                        'date' => $customer->reservation_date
                    ];
                }
            }
            
            // Devolver la respuesta como un JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    public function customer($id) {
        if (isset($id)){
            $data["id"] = $id;
            
            $customer = $this->model->getCustomer($data);
            // Preparar la respuesta como un array
            $response = [];

            $response[] = [
                'id' => $customer->id,
                'first_name' => $customer->first_name,
                'last_name' => $customer->last_name,
                'email' => $customer->email,
                'phone_number' => $customer->phone_number,
                'address' => $customer->address,
                'product' => $customer->product,
                'product_quantity' => $customer->product_quantity,
                'hour' => $customer->reservation_hour,
                'date' => $customer->reservation_date
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

    public function update(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = [
                "update_id" => trim($_POST["update_id"]),
                "update_first_name" => trim($_POST["update_first_name"]),
                "update_last_name" => trim($_POST["update_last_name"]),
                "update_email" => trim($_POST["update_email"]),
                "update_phone_number" => trim($_POST["update_phone_number"]),
                "update_product" => trim($_POST["update_product"]),
                "update_product_quantity" => trim($_POST["update_product_quantity"]),
                "update_address" => trim($_POST["update_address"]),
                "update_date" => trim($_POST["update_date"]),
                "update_hour" => trim($_POST["update_hour"])
            ];
            
            $productId = $this->model->getProduct($data);
            $reservationHourId = $this->model->getReservationHour($data);

            $data["product_id"] = $productId->id;
            $data["hour_id"] = $reservationHourId->id;


            if($this->model->updateReservation($data)){
                redirect("/calendario");
            } else{
                die("Algo salió mal");
            }
        }
    }
    
}
?>
<?php
class CalendarController extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view("Admin/CalendarView");
    }

    public function customers(...$date) {
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
                        'customer_name' => $customer->customer_name,
                        'email' => $customer->email,
                        'phone_number' => $customer->phone_number,
                        'address' => $customer->address,
                        'product' => $customer->product,
                        'hour_reservation' => $customer->hour_reservation,
                        'reservation_date' => $customer->reservation_date
                    ];
                }
            }
            
            // Devolver la respuesta como un JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}
?>
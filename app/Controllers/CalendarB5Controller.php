<?php
class CalendarB5Controller extends Controllers{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->view("AdminB5/CalendarB5View");
    }
    
    public function reservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['startDate'] ?? '';
            $endDate = $_POST['endDate'] ?? '';
            
            $customers = $this->model->getCustomers(['start_date' => $startDate, 'end_date' => $endDate]);

            $html = '';

            if ($customers) {
                foreach ($customers as $customer) {
                    $html .= '<tr>';
                    // $html .= '<td>' . htmlspecialchars($customer->id) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->customer_name) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->email) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->phone_number) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->address) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->product) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->reservation_hour) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->reservation_date) . '</td>';
                    $html .= '<td>
                                <div class="d-flex">
                                    <a class="btn btn-sm btn-primary me-1" href=""><i class="bi bi-pencil"></i></a>
                                    <a class="btn btn-sm btn-danger" href=""><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </td>';
                    $html .= '</tr>';
                }
            }

            // Enviar el HTML como respuesta
            header('Content-Type: text/html');
            echo $html;
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

    public function update($id){
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
            $data["user_id"] = $id;


            if($this->model->updateReservation($data)){
                redirect("/calendarioB5");
            } else{
                die("Algo salió mal");
            }
        }
    }
    public function delete($id){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data["delete_id"] = trim($_POST["delete_id"]);
            $data["user_id"] = $id;

            if($this->model->deleteReservation($data)){
                redirect("/calendarioB5");
            } else{
                die("Algo salió mal");
            }
        }
    }
}
?>
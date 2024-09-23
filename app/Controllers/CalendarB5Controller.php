<?php
class CalendarB5Controller extends Controllers {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view("AdminB5/CalendarB5View");
    }

    private function jsonResponse($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    private function htmlResponse($html) {
        header('Content-Type: text/html');
        echo $html;
        exit;
    }

    public function reservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = filter_input(INPUT_POST, 'startDate', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';
            $endDate = filter_input(INPUT_POST, 'endDate', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';
            $customers = $this->model->getReservations(['start_date' => $startDate, 'end_date' => $endDate]);
            $html = '';

            if ($customers) {
                foreach ($customers as $customer) {
                    $html .= '<tr>';
                    $html .= '<td>' . htmlspecialchars($customer->customer_name) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->email) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->phone_number) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->address) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->product) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->quantity) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->reservation_hour) . '</td>';
                    $html .= '<td>' . htmlspecialchars($customer->reservation_date) . '</td>';
                    $html .= '<td>
                                <div class="d-flex">
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-primary me-1 btn-update-reservation"
                                        value="' . htmlspecialchars($customer->id) . '"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateReservationModal">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-danger btn-delete-reservation"
                                        value="' . htmlspecialchars($customer->id) . '"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateReservationModal">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </div>
                            </td>';
                    $html .= '</tr>';
                }
            }

            $this->htmlResponse($html);
        }
    }

    public function customer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';
            $customer = $this->model->getCustomer(['id' => $id]);

            if ($customer) {
                $response = [
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
                $this->jsonResponse($response);
            }
        }
    }

    public function hour() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';
            $hour = filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';
            $availableHours = $this->model->getAvailableHours(['date' => $date, 'hour' => $hour]);
            $html = '';

            if ($availableHours) {
                foreach ($availableHours as $availableHour) {
                    $selected = $availableHour->reservation_hour == $hour ? 'selected' : '';
                    $html .= '<option ' . $selected . ' value="' . htmlspecialchars($availableHour->id) . '">
                                ' . htmlspecialchars($availableHour->reservation_hour) . '
                            </option>';
                }
            }

            $this->htmlResponse($html);
        }
    }

    public function product() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = filter_input(INPUT_POST, 'product', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';
            $products = $this->model->getProducts();
            $html = '';

            if ($products) {
                foreach ($products as $productData) {
                    $selected = $productData->product == $product ? 'selected' : '';
                    $html .= '<option ' . $selected . ' value="' . htmlspecialchars($productData->id) . '">
                    ' . htmlspecialchars($productData->product) . '
                    </option>';
                }
            }

            $this->htmlResponse($html);
        }
    }

    
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $user_id = $_SESSION['user_id'] ?? 1;

            $data = [
                "id" => filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                "first_name" => filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS),
                "last_name" => filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS),
                "email" => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
                "phone_number" => filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                "product_id" => filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                "product_quantity" => filter_input(INPUT_POST, 'product_quantity', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                "address" => filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                "date" => filter_input(INPUT_POST, 'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                "hour_id" => filter_input(INPUT_POST, 'hour_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                "user_id" => $user_id
            ];

            if ($this->model->updateReservation($data)) {
                $this->jsonResponse(["success" => true]);
            } else {
                $this->jsonResponse(["success" => false]);
            }
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data["delete_id"] = filter_input(INPUT_POST, 'delete_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data["user_id"] = $id;

            if ($this->model->deleteReservation($data)) {
                redirect("/calendarioB5");
            } else {
                die("Algo salió mal");
            }
        }
    }
}

?>
<?php
class CustomerController extends Controllers{
    
    public function __construct(){
        // parent::__construct();
    }

    public function index(){
        $this->view("Admin/CustomerView");
    }
}
?>
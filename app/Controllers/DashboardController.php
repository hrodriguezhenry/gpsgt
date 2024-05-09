<?php
class DashboardController extends Controllers{
    
    public function __construct(){
        // parent::__construct();
    }

    public function index(){
        $this->view("Admin/DashboardView");
    }
}
?>
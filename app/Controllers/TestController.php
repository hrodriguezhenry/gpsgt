<?php
class TestController extends Controllers{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view("Home/TestView");
    }
}
?>
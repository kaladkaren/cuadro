<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/Order_model');
  }

  public function index()
  {
    $this->load->view('frontend/home');
  }

  public function add()
  {
    
  }


}

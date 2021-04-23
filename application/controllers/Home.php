<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/Order_model');
    $this->load->model('cms/Frame_model');
  }

  public function index()
  {
    $res = $this->Frame_model->all();

    $data['res'] = $res;
    $this->load->view('frontend/home', $data);
  }

  public function add()
  {
    
  }


}

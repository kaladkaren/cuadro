<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/Order_model');
    $this->load->model('cms/Frame_model');
    $this->load->model('cms/Home_model');
  }

  public function index()
  {
    $res = $this->Frame_model->all();
    $data['res'] = $res;
    $this->load->view('frontend/home', $data);
  }

  public function add()
  {
    if($this->Order_model->add(array_merge($this->input->post(null, true),$this->Home_model->upload('order_images')))){
      $this->session->set_flashdata('flash_msg', ['message' => 'New Order added successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error Saving Frame', 'color' => 'red']);
    }
      $this->admin_redirect('');
  }


}

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
    $images = $this->Home_model->batch_upload($_FILES['order_images']);
    $order_last_id = $this->Order_model->add($this->input->post(null, true));
    if ($images)
    {
      $image_upload_success = $this->Home_model->addImages($images, $order_last_id);
    }

    if(  $order_last_id || @$image_upload_success ){
      $this->session->set_flashdata('flash_msg', ['message' => 'New Order added successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error Placing Order', 'color' => 'red']);
    }
      $this->admin_redirect('home');
  }


}

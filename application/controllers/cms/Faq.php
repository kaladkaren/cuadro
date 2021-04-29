<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/Faq_model');
  }

  public function index()
  {
    $this->dashboard();
  }

  public function dashboard()
  {
    $res = $this->Faq_model->all();

    $data['res'] = $res;
    $this->wrapper('cms/faq', $data);
  }

  public function add()
  {
  
    if($this->Faq_model->add($this->input->post(null, true))){
     $this->session->set_flashdata('flash_msg', ['message' => 'FAQ added successfully', 'color' => 'green']);
   } else {
     $this->session->set_flashdata('flash_msg', ['message' => 'Error Saving FAQ', 'color' => 'red']);
   }
   $this->admin_redirect('cms/faq');
  }

  public function update($id)
  {
    if($this->Faq_model->update($id,$this->input->post(null, true))){
     $this->session->set_flashdata('flash_msg', ['message' => 'FAQ updated successfully', 'color' => 'green']);
   } else {
     $this->session->set_flashdata('flash_msg', ['message' => 'Error updating FAQ.', 'color' => 'red']);
   }
   $this->admin_redirect('cms/faq');
  }

  public function delete()
  {
    if($this->Faq_model->delete($this->input->post('id'))){
     $this->session->set_flashdata('flash_msg', ['message' => 'FAQ deleted successfully', 'color' => 'green']);
   } else {
     $this->session->set_flashdata('flash_msg', ['message' => 'Error deleting FAQ.', 'color' => 'red']);
   }
   $this->admin_redirect('cms/faq');
  }
  
}

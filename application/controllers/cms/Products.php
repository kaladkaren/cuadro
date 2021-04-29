<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/Product_model');
  }

  public function index()
  {
    $this->dashboard();
  }

  public function dashboard()
  {
    $res = $this->Product_model->all();

    $data['res'] = $res;
    $this->wrapper('cms/products', $data);
  }

  public function add()
  {
  
    if($this->Product_model->add(array_merge($this->input->post(null, true),$this->Product_model->upload('product_image')))){
     $this->session->set_flashdata('flash_msg', ['message' => 'New Product added successfully', 'color' => 'green']);
   } else {
     $this->session->set_flashdata('flash_msg', ['message' => 'Error Saving Product', 'color' => 'red']);
   }
   $this->admin_redirect('cms/products');
  }

  public function update($id)
  {
    if($this->Product_model->update($id, array_merge($this->input->post(null, true),$this->Product_model->upload('product_image')))){
     $this->session->set_flashdata('flash_msg', ['message' => 'Product updated successfully', 'color' => 'green']);
   } else {
     $this->session->set_flashdata('flash_msg', ['message' => 'Error updating Product.', 'color' => 'red']);
   }
   $this->admin_redirect('cms/products');
  }

  public function delete()
  {
    if($this->Product_model->delete($this->input->post('id'))){
     $this->session->set_flashdata('flash_msg', ['message' => 'Frame Product successfully', 'color' => 'green']);
   } else {
     $this->session->set_flashdata('flash_msg', ['message' => 'Error deleting Product.', 'color' => 'red']);
   }
   $this->admin_redirect('cms/products');
  }
  
}

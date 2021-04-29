<?php

class Product_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->table = 'products'; # Replace these properties on children
    $this->upload_dir = 'uploads/products/'; # Replace these properties on children
    $this->per_page = 15;
  }

  public function add($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function update($id, $data)
  {
    $this->db->where('product_id', $id);
    return $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    $this->db->where('product_id', $id);
    return $this->db->delete($this->table);
  }

   public function all()
  {
    $res = $this->db->get($this->table)->result();
    return $this->formatResImage($res);
  }

  public function formatResImage($res)
  {
    $data = [];
    foreach ($res as $key => $value){
      $value->product_image_f = base_url($this->upload_dir) . $value->product_image;
      $data[] = $value;
    }
    return $data;
  }

}

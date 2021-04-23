<?php

class Home_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->table = 'orderimages'; # Replace these properties on children
    $this->upload_dir = 'uploads/orders/'; # Replace these properties on children
    $this->per_page = 15;
  }

  public function add($data)
  {
    return $this->db->insert($this->table, $data);
  }

  //  public function all()
  // {
  //   $res = $this->db->get($this->table)->result();
  //   return $this->formatResImage($res);
  // }

  // public function formatResImage($res)
  // {
  //   $data = [];
  //   foreach ($res as $key => $value){
  //     $value->order_images_f = base_url($this->upload_dir) . $value->order_images;
  //     $data[] = $value;
  //   }
  //   return $data;
  // }

}

<?php

class Faq_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->table = 'faqs'; # Replace these properties on children
    $this->upload_dir = 'faqs'; # Replace these properties on children
    $this->per_page = 15;
  }

  public function add($data)
  {
    return $this->db->insert($this->table, $data);
  }


  public function update($id, $data)
  {
    $this->db->where('faq_id', $id);
    return $this->db->update($this->table, $data);
  }



  public function delete($id)
  {
    $this->db->where('faq_id', $id);
    return $this->db->delete($this->table);

  }

}

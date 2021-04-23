<?php

class Home_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->table = 'orderimages'; 
    $this->upload_dir = 'uploads/orders/';
    $this->per_page = 15;
  }

  public function add($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function batch_upload($files = [])
  {

    if($files == [] || $files == null ) return [];
    $k = key($files);

    $uploaded_files = [];
    $upload_path = 'uploads/' . $this->upload_dir;

    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'gif|jpg|jpeg|png';

    if (!is_dir($upload_path) && !mkdir($upload_path, DEFAULT_FOLDER_PERMISSIONS, true)){
      mkdir($upload_path, DEFAULT_FOLDER_PERMISSIONS, true);
    }

    foreach ($files['name'] as $key => $image) {
      $_FILES[$k]['name'] = $files['name'][$key];
      $_FILES[$k]['type'] = $files['type'][$key];
      $_FILES[$k]['tmp_name'] = $files['tmp_name'][$key];
      $_FILES[$k]['error'] = $files['error'][$key];
      $_FILES[$k]['size'] = $files['size'][$key];

      $filename = time() . "_" . $files['name'][$key];
      $images[] = $uploaded_files[$k][] = $filename;

      $config['file_name'] = $filename;
      $this->upload->initialize($config);

      $this->upload->do_upload($k);
    }

    return $uploaded_files;
  }

}

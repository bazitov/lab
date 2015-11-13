<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient_model extends CI_Model
{

  public function findAll() {
    return $this->db->get('patients')->result_array();
  }

  public function delete($id) {
    $this->db->where('id', $id);
    return $this->db->delete('patients');
  }
}?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tests_model extends CI_Model
{

  public function add($tests,$rid)
  {
      foreach ($tests as $key => $value) {
        $this->db->insert('tests', array('test'=>$value[0], 'result'=>$value[1], 'report_id'=>$rid));
      }
  }

  public function delete($id) {
    $this->db->where('id', $id);
    return $this->db->delete('tests');
  }

}?>
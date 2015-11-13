<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports_model extends CI_Model
{

  public function find($id) {
  	if($id != 0) {
		$this->db->where('patient_id',$id);
  	}
  	return $this->db->select('reports.reportname, reports.id, patients.name')
                  ->from('reports')
                  ->join('patients', 'reports.patient_id = patients.id')
                  ->get()
                  ->result_array();
  }

  public function delete($id) {
    $this->db->where('id', $id);
    return $this->db->delete('patients');
  }
}?>
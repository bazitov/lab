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

  public function add($name,$pid)
  {
    $data = array(
        'reportname' => $name,
        'patient_id' => $pid
  );

  $this->db->insert('reports', $data);
  $insert_id = $this->db->insert_id();
   return  $insert_id;
  }

  public function delete($id) {
    $this->db->where('report_id', $id);
    $this->db->delete('tests');
    $this->db->where('id', $id);
    $this->db->delete('reports');
  }

  public function getReport($id = 0) {
    if($id) {
      return $this->db->select('reports.*,reports.id AS reportid, patients.*,tests.*, tests.id AS testid')
                  ->from('reports')
                  ->where('reports.id',$id)
                  ->join('patients', 'reports.patient_id = patients.id')
                  ->join('tests', 'reports.id = tests.report_id')
                  ->get()
                  ->result_array();
    }
  }

  public function update($reportname,$id)
  {
    $data = array(
          'reportname' => $reportname
    );

    $this->db->set($data);
    $this->db->where('id', $id);
    $this->db->update('reports');
  }
}
?>



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

  public function getName($id) {
    return $this->db->where('id', $id)->select('name')->get('patients')->result_array();
  }

  public function getEmail($id) {
    return $this->db->where('id', $id)->select('email')->get('patients')->result_array();
  }

  public function getUserId($usr, $pwd)
   {
        $sql = "select id from patients where name = ? and passcode = ? and status = 'ok' and passused = '0'";
        $query = $this->db->query($sql,array($usr,md5($pwd)));
        return $query->result_array();
   }

   public function setStatus($id,$statusForDB)
   { 
      $this->db->set('status',$statusForDB);
      $this->db->where('id', $id);
      $this->db->update('patients');
   }

   public function makePassUsed($id)
   { 
      $this->db->set('passused','1');
      $this->db->where('id', $id);
      $this->db->update('patients');
   }

  public function getPatientById($id)
  {
  	return $this->db->where('id',$id)->get('patients')->result_array();
  }

  public function newPassCode($id,$passcode)
  {
  	$data = array(
        'passcode' => md5($passcode),
        'passused' => 0,
	);
  	$this->db->set($data);
  	$this->db->where('id', $id);
  	$this->db->update('patients');
  }

  public function add($name,$add,$phone,$email,$passcode) {
  	$data = array(
        'name' => $name,
        'address' => $add,
        'email' => $email,
        'phoneno' => $phone,
        'status' => 'ok',
        'passcode' => md5($passcode)
	);

	return $this->db->insert('patients', $data);
  }

  public function update($name,$add,$phone,$email,$id) {
  	$data = array(
          'name' => $name,
          'address' => $add,
          'email' => $email,
          'phoneno' => $phone
  	);

  	$this->db->set($data);
  	$this->db->where('id', $id);
  	$this->db->update('patients');
  }
}?>
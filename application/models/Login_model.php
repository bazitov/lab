<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from tbl_usrs
     function get_operator($usr, $pwd)
     {
          $sql = "select * from operators where username = ? and password = ? and status = 'ok'";
          $query = $this->db->query($sql,array($usr,md5($pwd)));
          return $query->num_rows();
     }

     //get the username & password from tbl_usrs
     function get_patient($usr, $pwd)
     {
          $sql = "select * from patients where name = ? and passcode = ? and status = 'ok' and passused = '0'";
          $query = $this->db->query($sql,array($usr,md5($pwd)));
          return $query->num_rows();
     }

     public function getData($keyword) {  
        $this->db->select('name');
        $this->db->order_by('id', 'DESC');
        $this->db->like("name", $keyword);
        return $this->db->get('patients')->result_array();
    }
}?>
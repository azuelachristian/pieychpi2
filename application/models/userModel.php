
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userModel extends CI_Model {

public function insertUser($user){
    $this->db->insert('tbluser', $user);
}
public function checkAccount($cond){
    	$this->db->where($cond);
    	$this->db->update('tbluser', array('status'=>'active'));
    	$q = $this->db->get_where('tbluser', $cond);
    	return $q->row();
    }
public function nameAvailability($name)
{
    $this->db->where('name',$name);
    $query  =   $this->db->get('tbluser');
    return $query->row();
}
public function validateName($name)
{
    $this->db->where('name',$name);
    $query  =   $this->db->get('tbluser');
    return $query->row();
}
public function passwordAvailability($password)
{
    $this->db->where('password',$password);
    $query  =   $this->db->get('tbluser');
    return $query->row();
}

}
?>
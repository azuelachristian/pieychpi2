
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminModel extends CI_Model {

public function getAllUsers(){
    $q = $this->db->get('tbluser');
    return $q->result();
}
public function getAllItems(){
    $q = $this->db->get('tblitem');
    return $q->result();
}
public function viewUser($id){
    $q = $this->db->get_where('tbluser', array('id' => $id));
    return $q->result();
}
public function viewInfo($name){
    $q = $this->db->get_where('tbluser', array('name' => $name));
    return $q->result();
}
public function getAdmin(){
     $q = $this->db->get('tbladmin');
     return $q->result();
}
public function deleteUser($id){
    $this->db->delete('tbluser', array('id' => $id));
}
public function getUser($id){
    $q = $this->db->get_where('tbluser', array('id' => $id));
    return $q->row();

}
public function getUserinfo($name){
    $q = $this->db->get_where('tbluser', array('name' => $name));
    return $q->row();

}
public function updateUser($id,$user){
    $this->db->where('id', $id);
    $this->db->update('tbluser', $user);
}

public function nameAvailability($name)
{
    $this->db->where('name',$name);
    $query  =   $this->db->get('tbladmin');
    return $query->row();
}
public function passwordAvailability($password)
{
    $this->db->where('password',$password);
    $query  =   $this->db->get('tbladmin');
    return $query->row();
}
}
?>
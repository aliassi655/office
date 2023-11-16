<?php
class AdminModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;

    }

    
    public function addAdmin($data) {
        return $this->db->insert('admins', $data);
    }

    public function updateAdmin($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('admins', $data);
    }

    public function deleteAdmin($id) {
        $this->db->where('id', $id);
        return $this->db->delete('admins');
    }

    public function getAdmins() {
        return $this->db->get('Admins');
    }

<<<<<<< HEAD
    public function getAdminById($id) {
        return $this->db->where('id', $id)->getOne('Admins');
    }

public function getAdminBypassAndEmail($password,$email){

return $this->db->where('password',$password)->where('$email',$email)->get("admins");
=======
    public function getCustomerById($id) {
        return $this->db->where('id', $id)->getOne('Admins');
    }


>>>>>>> a98b8851f568affe41778db417b8285a957732d5
}

    

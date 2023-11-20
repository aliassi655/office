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
        return $this->db->get('admins');
    }

    public function getAdminById($id) {
        return $this->db->where('id', $id)->getOne('admins');
    }

    public function getAdminByemailandpassword($email, $password) {
        return $this->db->where('email', $email)->where('password', $password)->getOne('admins');
    }

    public function getAdminByCard($card) {
        return $this->db->where('card', $card)->getOne('admins');
        /*if(isset($a)){
            return true;
        }*/
        

    }


}

    

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

    public function getCustomerById($id) {
        return $this->db->where('id', $id)->getOne('Admins');
    }


}

    

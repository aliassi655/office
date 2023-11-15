<?php

class CustomerModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;

    }

    
    public function addCustomer($data) {
        return $this->db->insert('customers', $data);
    }

    public function updateCustomer($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('customers', $data);
    }

    public function deleteCustomer($id) {
        $this->db->where('id', $id);
        return $this->db->delete('customers');
    }

    public function getCustomers() {
        return $this->db->get('customers');
    }

    public function getCustomerById($id) {
        return $this->db->where('id', $id)->getOne('customers');
    }


}

    

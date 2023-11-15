<?php

class RatingModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }


    public function addRating($data) {
        return $this->db->insert('Ratings', $data);
    }


    public function updateRating($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('Ratings', $data);
    }

    public function deleteRating($id) {
        $this->db->where('id', $id);
        return $this->db->delete('Ratings');
    }

    public function getRatings() {
        return $this->db->get('Ratings');
    }

    public function getRatingById($id) {
        return $this->db->where('id', $id)->getOne('Ratings');
    }


}


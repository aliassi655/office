<?php
class Book_flightModel{
    private $db;
public function __construct($db) {
    $this->db = $db;
}

public function getBooks()
{

return $this->db->get("bookings");


}
public function addBook($data)
{


return $this->db->insert("bookings",$data);



}
public function updateBook($id,$data)
{


return $this->db->where('id',$id)->update("bookings",$data);



}
public function deleteBook($id)
{


return $this->db->where('id',$id)->delete("bookings");



}


















}






?>
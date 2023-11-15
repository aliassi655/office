<?php
class TicketModel{
    private $db;
public function __construct($db) {
    $this->db = $db;
}

public function getTickets()
{
    return $this->db->get("tickets");}





public function addTicket($data)
{


return $this->db->insert("tickets",$data);

}



public function updateTicket($id,$data)
{


return $this->db->where('id',$id)->update("tickets",$data);



}
public function deleteFlight($id)
{


return $this->db->where('id',$id)->delete("tickets");



}

}





?>
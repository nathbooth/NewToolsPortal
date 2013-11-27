<?php 
class Datatables_query extends CI_Model {
 
    function __construct()
    {
        parent::__construct();
    }
 
    function get_table()
    {
        $this->db->select('*');
        $query = $this->db->get('netdevices');
        return $query->result();
    }    
 
}

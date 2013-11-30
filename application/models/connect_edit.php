<?php

class Connect_edit extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

      /** 
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

	function SaveForm($form_data)
	{
		unset($form_data['id']);
		$this->db->insert('netdevices', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		else
		{
		return FALSE;
		}
	}
	
	function EditForm($form_data)
	{
		$this->db->where('id', $form_data['id']);
		$this->db->update('netdevices', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	function GetData($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$q = $this->db->get('netdevices');
		
        if($q->num_rows() > 0) { 
            // by doing this it means you are returning array of records
                $data['netDevice'] = $q->result();
            // if your expecting only one record will be fetched from the table
            // use $row = $q->row();
            // then return $row;
            return $data;
        }
		else
		{
			return FALSE;
		}
		
		
	}

}
?>
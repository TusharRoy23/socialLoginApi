<?php
	class user_model extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		function insert_into_users($data){
			$this->db->insert('users', $data);
		}
	}
?>
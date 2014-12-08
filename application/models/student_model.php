<?php

class Student_model extends CI_MOdel
{
	public function register($new_user)
	{
		 $this->db->insert('users', $new_user);
	}

	public function fetch_user($email)
	{
		return $this->db->where('email', $email)
						->get('users')
						->row_array();
	}

}

?>
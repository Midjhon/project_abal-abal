<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model 
{
	public function getUsers()
	{
		// join dari tabel user_menu dan user_sub_menu
		$query = "SELECT `user`. * , `user_role`.`role`
                    FROM `user` JOIN `user_role` 
                    ON `user`.`role_id` = `user_role`.`id`
        ";
        return $this->db->query($query)->result_array();
	}
	
	
	public function getUsersById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function getInUser()
	{
		// join dari tabel user_menu dan user_sub_menu
		$query = "SELECT `user`. * , `user_role`.`role`
                    FROM `user` 
					JOIN `user_role` ON `user`.`role_id` = `user_role`.`id`
        ";
		
		
        return $this->db->query($query)->result_array();
	}



	
	
}
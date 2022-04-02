<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model 
{
	public function getSubMenu()
	{
		// join dari tabel user_menu dan user_sub_menu
		$query = "SELECT `user_sub_menu`. * , `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu` 
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
	}
	
	public function getSubMenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }
	
	public function getAccessMenu()
	{
		// join dari tabel user_menu dan user_sub_menu
		$query = "SELECT `user_access_menu`. * , `user_menu`.`menu` , `user_role`.`role`
                    FROM `user_access_menu` 
					JOIN `user_menu` ON `user_access_menu`.`menu_id` = `user_menu`.`id`
					JOIN `user_role` ON `user_access_menu`.`role_id` = `user_role`.`id`
        ";
		
		
        return $this->db->query($query)->result_array();
	}
	public function getAccessMenuById($id)
    {
        return $this->db->get_where('user_access_menu', ['id' => $id])->row_array();
    }
	
}

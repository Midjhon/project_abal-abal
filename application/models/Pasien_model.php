<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model 
{
	public function getPasienById($id)
    {
        return $this->db->get_where('pasien', ['id' => $id])->row_array();
    }
}
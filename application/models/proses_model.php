<?php
class Proses_model extends CI_Model 
{
    public function index() {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    // ambil data dari database
	$data['dokter'] = $this->db->get('dokter')-> result_array();
    }
}
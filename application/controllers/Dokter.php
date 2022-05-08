<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();
		// cek kalo blm login -> pake helper
		is_logged_in();
	}
    public function index()
	{
		$data['title'] = 'Dokter';
		// ambil data
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// ambil data dari database
		$data['dokter'] = $this->db->get('dokter')-> result_array();

		// rules nya
		$this->form_validation->set_rules('nip', 'NIP', 'required');

		// kondisi
		if($this->form_validation->run() == false ) { 
			// panggil view nya
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('dokter/index' );
			$this->load->view('templates/footer');
		} else {
			// insert 
			$this->db->insert('dokter', [
				'nip' => $this->input->post('nip'),
				'nama_dokter' => $this->input->post('nama_dokter'),
				'spesialis' => $this->input->post('spesialis'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp')
			]);

			// kasih pesan => flash data
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
														 New dokter added!
													   </div>');
			redirect('dokter');
		}

    }


	public function deleteDokter($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('dokter');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dokter berhasil dihapus!</div>');
        redirect('dokter');
    }
	public function editDokter($id)
	{
		$data = [
                'id' => $id,
                'nip' => $this->input->post('nip', true)
            ];
            $this->db->where('id', $id);
            $this->db->update('dokter', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">data dokter berhasil diperbaharui!</div>');
            redirect('menu');
	}
	
}
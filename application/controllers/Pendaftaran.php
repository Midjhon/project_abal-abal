<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();
		// cek kalo blm login -> pake helper
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'Pendaftaran Pasien';
		// ambil data
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		// rules
		$this->form_validation->set_rules('no_rm', 'No_rm', 'required|trim|integer|max_length[6]', [
			'required' => 'Nomor rekam medis Wajib diisi!',
			'integer' => 'Isi harus berupa angka',
			'max_length' => 'Isi maximal 6 karakter'
		]); 
		
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama Wajib diisi!'
		]);

		$this->form_validation->set_rules('tgl_kunjungan', 'tgl_kunjungan', 'required|trim', [
			'required' => 'tanggal kunjungan Wajib diisi!'
		]);
		
		$this->form_validation->set_rules('umur', 'umur', 'required|trim', [
			'required' => 'Umur Wajib diisi!'
		]);

		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
			'required' => 'jenis kelamin Wajib diisi!'
		]);

		$this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
			'required' => 'alamat Wajib diisi!'
		]);

		$this->form_validation->set_rules('agama', 'agama', 'required|trim', [
			'required' => 'agama Wajib diisi!'
		]);

		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required|trim', [
			'required' => 'pekerjaan Wajib diisi!'
		]);

		$this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim', [
			'required' => 'no. hp Wajib diisi!'
		]);

		if( $this->form_validation->run() == false ) 
		{
			// panggil view nya
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pendaftaran/index', $data);  //=> buat view user dgn folder index.php
			$this->load->view('templates/footer');
		} else {
			$data = [
				// siapkan datanya => di insert ke database
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'no_rm' => htmlspecialchars($this->input->post('no_rm', true)),
                'tgl_kunjungan' => time(),  //-> mengambil detik saat itu
				'umur' => htmlspecialchars($this->input->post('umur', true)),
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'agama' => htmlspecialchars($this->input->post('agama', true)),
				'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
				'no_hp' => htmlspecialchars($this->input->post('no_hp', true))
			];

			
			// lalu insert ke database
			$this->db->insert('pasien', $data);
			
			// kasih pesan => flash data
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
														  Kunjungan pasien berhasil di tambah!
													   </div>');
			
			// pindhka ke hal login
			redirect('pendaftaran/daftarKunjungan');

		}
		
	}

	public function daftarKunjungan()
	{
		$data['title'] = 'Pendaftaran Pasien';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Pasien_model','pasien');
		$data['pasien'] = $this->db->get('pasien')->result_array();


		// panggil view nya
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pendaftaran/daftarKunjungan', $data);  
		$this->load->view('templates/footer');
	}

	public function detailPasien()
	{

	}

}
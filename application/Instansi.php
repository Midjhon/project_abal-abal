<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		// cek kalo blm login -> pake helper
		is_logged_in();
	}
	
	
	public function index()
	{
		$data['title'] = 'Daftar Instansi';
		// ambil data
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		// load model nya
		$this->load->model('Instansi_model','instansi');
		
		// query submenu
		$data['index'] = $this->instansi->getInstansi(); //-> buat modelnya 'menu()'
		
		$data['role'] = $this->db->get('user_role')->result_array(); //-> looping ke view submenu
		
		
		// rules
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered!'
		]);
		// is_unique[user.email] -> email nya sudah ada ga didalam database tabel 'user'
		
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'password too short!'
		]);
		
		$this->form_validation->set_rules('role_id', 'Role', 'required|trim', [
			'required' => 'Role harus di isi!'
		]);
		
		
		if( $this->form_validation->run() == false ) {
			// panggil view nya
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('instansi/index', $data);  //=> buat view user dgn folder index.php
			$this->load->view('templates/footer');
		} else {
			
			$email = $this->input->post('email', true);
			$data = [
				// siapkan datanya => di insert ke database
				'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'is_active' => 1,
                'date_created' => time()  //-> mengambil detik saat itu
			];
		
		
			// lalu insert ke database
			$this->db->insert('user', $data);
			
			// kasih pesan => flash data
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
														  Instansi berhasil di daftar!
													   </div>');
			
			// pindhka ke hal login
			redirect('instansi');
		}
	}
	
	
}
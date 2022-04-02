<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	// berlakukan disemua method
	public function __construct()
	{
		// panggil parentnya
		parent::__construct(); //-> manggil contruster dlm controller CI
		// lalu load
		$this->load->library('form_validation');
	}
	public function index()
	{
		if ($this->session->userdata('email')) {
            redirect('user');
        }
		
		// RULES
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		// cek
		if($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');   //-> buat view login.php
			$this->load->view('templates/auth_footer');
		} else {
			// ketika validasinya berhasil => jalankan fungsi login
			$this->_login();   //-> buat method baru di controller ini => Auth => _login ---> private ===> agar tdk terlalu panjang
		}
	}
	
	
	private function _login()
	{
		// ambil email dan password yg sudah lolos ato berhasil => input
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		// query ke database/ select * from user ......  
		$user = $this->db->get_where('user', ['email' => $email ])->row_array();
		
		// jika user ada
		if($user) {
			// jika usernya aktif
			if($user['is_active'] == 1) {
				// Cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']        
                    ];  //-> 'role_id' => $user['role_id']  : menentukan menu nya
                    $this->session->set_userdata($data);
					
					// cek rolenya
					if($user['role_id'] == 1){
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
					
					
					// arahkan ke view nya
					redirect('user');
					
					
				} else {
					// kasih pesan => flash data
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
															 Wrong password!
														   </div>');
				redirect('auth');
				}
			
			} else {
			// kasih pesan => flash data
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
														 This email has not been activated!
													   </div>');
			redirect('auth');
			}
			
		} else {
			// kasih pesan => flash data
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
														 Email is not registered!
													   </div>');
			redirect('auth');
		}
	}
	
	
	public function logout()
	{
		// bersihin session
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		
		// redirect
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
														  You have been logout!
													   </div>');
			
		// pindhka ke hal login
		redirect('auth');
	}
	
	public function blocked()
	{
		// ambil dari sbadmin2 => 404
		$this->load->view('auth/blocked');
	}
	
	
	
	
}
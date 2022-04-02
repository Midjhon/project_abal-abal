<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		// cek kalo blm login -> pake helper
		is_logged_in();
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		// ambil data
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		// panggil view nya
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);  //=> buat view user dgn folder index.php
		$this->load->view('templates/footer');
	}
	
	public function role()
	{
		$data['title'] = 'Role';
		// ambil data -> Menyimpan di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		// query role nya -> agar dikenali
		$data['role'] = $this->db->get('user_role')->result_array();
		
		// rules nya
		$this->form_validation->set_rules('role', 'Role', 'required');
		
		// kondisi
		if($this->form_validation->run() == false ) { //-> SIMPAN form_validation di autoload.php
			// panggil view nya
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);  //=> buat view user dgn folder index.php
			$this->load->view('templates/footer');
		} else {
			// insert 
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			// kasih pesan => flash data
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
														 New Role added!
													   </div>');
			redirect('admin/role');
		}
	}
	
	public function editRole($id)
    {
        $data['title'] = 'Pengaturan Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();

        $this->form_validation->set_rules('role', 'Role', 'required|trim', [
            "required" => "Nama Role tidak boleh kosong"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editRole', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id', true),
                'role' => $this->input->post('role', true)
            ];

            $this->db->where('id', $id);
            $this->db->update('user_Role', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil diperbaharui!</div>');
            redirect('admin/role');
        }
    }
	
	public function deleteRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role berhasil dihapus!</div>');
        redirect('admin/role');
    }
	
	
	public function users()
	{
		$data['title'] = 'User';
		// ambil data -> Menyimpan di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		// model
		$this->load->model('Admin_model', 'admin');
		
        // kirim data utk di viewnya
		$data['users'] = $this->admin->getUsers();
		
		// query role nya -> agar dikenali
		$data['role'] = $this->db->get('user_role')->result_array();
		
		// panggil view nya
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/users', $data);  //=> buat view user dgn folder index.php
		$this->load->view('templates/footer');
	
	}

	public function tambah_user()
	{
		$data['title'] = 'User';
		// ambil data
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		// load model nya
		$this->load->model('Admin_model','admin');
		
		// query submenu
		$data['tambah_user'] = $this->admin->getInUser(); //-> buat modelnya 'menu()'
		
		$data['role'] = $this->db->get('user_role')->result_array(); //-> looping ke view submenu
		
		
		// rules
		$this->form_validation->set_rules('name', 'Name', 'required|trim', [
			'required' => 'Nama Wajib diisi!'
		]);
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email sudah terdaftar!',
			'required' => 'Email wajib diisi!',
			'valid_email' => 'Format email tidak sesuai. Contoh(adm@gmail.com)'
		]);
		// is_unique[user.email] -> email nya sudah ada ga didalam database tabel 'user'
		
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password minimal 3 karakter!',
			'required' => 'Password wajib diisi!'
		]);
		
		$this->form_validation->set_rules('role_id', 'Role', 'required|trim', [
			'required' => 'Pilih Hak Akses!'
		]);
		
		
		if( $this->form_validation->run() == false ) {
			// panggil view nya
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/tambah_user', $data);  //=> buat view user dgn folder index.php
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
														  User berhasil di tambah!
													   </div>');
			
			// pindhka ke hal login
			redirect('admin/users');
		}
	}
	
	public function detailUser($id)
	{
		$data['title'] = 'User';
		// ambil data
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		
		// load model nya
		$this->load->model('Admin_model','admin');
		$data['users'] = $this->admin->getUsers();
		$data['usersById'] = $this->admin->getUsersById($id);
		
		// query submenu
		
		$data['role'] = $this->db->get('user_role')->result_array(); //-> looping ke view submenu
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/detailUser', $data);  //=> buat view user dgn folder index.php
		$this->load->view('templates/footer');
	}
	
	public function editUser($id)
    {
        $data['title'] = 'User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['users'] = $this->admin->getUsers();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['usersById'] = $this->admin->getUsersById($id);

        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            "required" => "Nama tidak boleh kosong"
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            "required" => "Pilihan email harus dipilih"
        ]);
        $this->form_validation->set_rules('role_id', 'Role', 'required|trim', [
            "required" => "Pilihan Role harus dipilih"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editUser', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => $this->input->post('image'),
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->where('id', $id);
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil diperbaharui!</div>');
            redirect('admin/users');
        }
	}

	
	public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil dihapus!</div>');
        redirect('admin/users');
    }
	
	
	public function roleAccess($role_id)
	{
		$data['title'] = 'Role Access';
		// ambil data -> Menyimpan di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		// query role nya -> agar dikenali
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
		
		// menghilangkan checkbox menu adminnya
		$this->db->where('id !=', 1);
		
		// query semua data menu -> dapat semua menunya
		$data['menu'] = $this->db->get('user_menu')->result_array();
		
		// panggil view nya
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);  //=> buat view user dgn folder index.php
		$this->load->view('templates/footer');
	}
	
	public function changeAccess()
    {
		// ambil data yg dikirim dari ajax
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        // siapin data
		$data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        // query berdasarkan data yg sudah disiapkan diatas
		$result = $this->db->get_where('user_access_menu', $data);

        // cek
		if ($result->num_rows() < 1) {  //-> jika kosong
			// insert ke tabel user_access_menu
            $this->db->insert('user_access_menu', $data);
        } else {
			// kalo ada hapus/hilang
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses Telah diubah!</div>');
    }
	
	
	
}
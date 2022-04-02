<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		// cek kalo blm login -> pake helper
		is_logged_in();
	}
	public function index() 
	{
		$data['title'] = 'Menu Management';
		// ambil data
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		// query data menu nya
		$data['menu'] = $this->db->get('user_menu')-> result_array(); //-> looping menunya di view indexnya
		
		// rules nya
		$this->form_validation->set_rules('menu', 'Menu', 'required');
		
		// kondisi
		if($this->form_validation->run() == false ) { //-> SIMPAN form_validation di autoload.php
			// panggil view nya
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);  //=> buat view user dgn folder index.php
			$this->load->view('templates/footer');
		} else {
			// insert 
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			// kasih pesan => flash data
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
														 New menu added!
													   </div>');
			redirect('menu');
		}
		
		
		
	}
	
	public function editMenuManagement($id)
    {
        $data['title'] = 'Pengaturan Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
            "required" => "Nama Menu tidak boleh kosong"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editMenuManagement', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id', true),
                'menu' => $this->input->post('menu', true)
            ];

            $this->db->where('id', $id);
            $this->db->update('user_menu', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil diperbaharui!</div>');
            redirect('menu');
        }
    }
	
	public function deleteMenuManagement($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil dihapus!</div>');
        redirect('menu');
    }
	
	public function submenu()
	{
		$data['title'] = 'Submenu Management';
		// ambil data
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		// load model nya
		$this->load->model('Menu_model','menu');
		
		// query submenu
		$data['subMenu'] = $this->menu->getSubMenu(); //-> buat modelnya 'menu()'
		
		// query menu
		$data['menu'] = $this->db->get('user_menu')->result_array(); //-> looping ke view submenu
		
		// rules nya
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		
		// kondisi
		if($this->form_validation->run() == false ) {
			// panggil view nya
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);  //=> buat view nya di views/menu/submenu.php
			$this->load->view('templates/footer');
		} else {
			// siapkan datanya
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			// insert 
			$this->db->insert('user_sub_menu', $data);
			
			// lalu redirect / arahkan
			// kasih pesan => flash data
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
														 New sub menu added!
													   </div>');
			redirect('menu/submenu');
		}
		
		
	}
	
	public function accessmenu()
	{
		$data['title'] = 'User Access Menu';
		// ambil data
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		// load model nya
		$this->load->model('Menu_model','menu');
		
		// query submenu
		$data['accessMenu'] = $this->menu->getAccessMenu(); //-> buat modelnya 'menu()'
		
		// query menu
		$data['menu'] = $this->db->get('user_menu')->result_array(); //-> looping ke view submenu
		$data['role'] = $this->db->get('user_role')->result_array(); //-> looping ke view submenu
		
		// rules nya
		$this->form_validation->set_rules('role_id', 'Role', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		
		// kondisi
		if($this->form_validation->run() == false ) {
			// panggil view nya
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/accessmenu', $data);  //=> buat view nya di views/menu/submenu.php
			$this->load->view('templates/footer');
		} else {
			// siapkan datanya
			$data = [
				'role_id' => $this->input->post('role_id'),
				'menu_id' => $this->input->post('menu_id'),
			];
			// insert 
			$this->db->insert('user_access_menu', $data);
			
			// lalu redirect / arahkan
			// kasih pesan => flash data
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
														 New sub menu added!
													   </div>');
			redirect('menu/accessmenu');
		}
		
		
	}
	
	public function editAccessMenu($id)
    {
        $data['title'] = 'Pengaturan Access Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // load model nya
		$this->load->model('Menu_model','menu');
		
		// query submenu
		$data['accessMenu'] = $this->menu->getAccessMenu(); //-> buat modelnya 'menu()'
		
		// query menu
		$data['menu'] = $this->db->get('user_menu')->result_array(); //-> looping ke view submenu
		$data['role'] = $this->db->get('user_role')->result_array(); //-> looping ke view submenu
		
		$data['accessMenuById'] = $this->menu->getAccessMenuById($id);
		
		// rules nya
		$this->form_validation->set_rules('role_id', 'Role', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		
		// kondisi
		if($this->form_validation->run() == false ) {
			// panggil view nya
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/editAccessMenu', $data);  //=> buat view nya di views/menu/submenu.php
			$this->load->view('templates/footer');
		} else {
			// siapkan datanya
			$data = [
				'role_id' => $this->input->post('role_id'),
				'menu_id' => $this->input->post('menu_id'),
			];
			// insert 
			$this->db->insert('user_access_menu', $data);
			
			// lalu redirect / arahkan
			// kasih pesan => flash data
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
														 New Access Menu added!
													   </div>');
			redirect('menu/accessmenu');
		}
		
		
    }
	
	public function deleteAccessMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_access_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil dihapus!</div>');
        redirect('menu/accessMenu');
    }
	
	
	
	public function editSubMenu($id)
    {
        $data['title'] = 'Pengaturan Submenu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['subMenuById'] = $this->menu->getSubMenuById($id);

        $this->form_validation->set_rules('title', 'Title', 'required|trim', [
            "required" => "Nama Submenu tidak boleh kosong"
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim', [
            "required" => "Pilihan Menu harus dipilih"
        ]);
        $this->form_validation->set_rules('url', 'URL', 'required|trim', [
            "required" => "URL Submenu tidak boleh kosong"
        ]);
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim', [
            "required" => "Icon Submenu tidak boleh kosong"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editSubMenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu berhasil diperbaharui!</div>');
            redirect('menu/submenu');
        }
    }
	
	public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu berhasil dihapus!</div>');
        redirect('menu/submenu');
    }
	
	
	
	
}
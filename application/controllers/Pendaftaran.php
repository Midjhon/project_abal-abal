<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
		$data['title'] = 'Pasien';
		// ambil data
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // panggil view nya
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pendaftaran/index' );  //=> buat view user dgn folder index.php
		$this->load->view('templates/footer');
    }
    public function pasienBaru()
    {
        $data['title'] = 'Pasien';
		// ambil data
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        // rules
		$this->form_validation->set_rules('no_rm', 'No_rm', 'required|trim|max_length[6]|integer|is_unique[pasien.no_rm]' , [
			'required' => 'Nomor rekam medis Wajib diisi!',
			'integer' => 'Isi harus berupa angka',
            'is_unique' => 'No. Rekam Medis Sudah Terdaftar',
			'max_length' => 'Isi maximal 6 karakter'
		]); 
		
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama Wajib diisi!'
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

		$this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim|integer', [
			'required' => 'no. hp Wajib diisi!',
            'integer' => 'No. Handphone harus berupa angka',
		]);

		if( $this->form_validation->run() == false ) 
		{
			// panggil view nya
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pendaftaran/pasienBaru', $data);  //=> buat view user dgn folder index.php
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
			redirect('pendaftaran/pasienLama');
        }

    }

    public function pasienLama()
    {
        $data['title'] = 'Pasien';

		// ambil data
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		

		// query data menu nya
		$data['pasien'] = $this->db->get('pasien')-> result_array(); //-> looping menunya di view indexnya
		
		// load model
		$this->load->model('Pasien_model', 'pasien');

		$data['hasil'] = $this->pasien->dataTabel('pasien');
		
		// kondisi
		if($this->form_validation->run() == false ) { //-> SIMPAN form_validation di autoload.php
			// panggil view nya
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pendaftaran/pasienLama', $data);  //=> buat view user dgn folder index.php
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
	public function detailPasien($id)
    {
        $data['title'] = 'Pendaftaran Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pasien'] = $this->db->get_where('pasien', ['id' => $id])->row_array();

        $this->form_validation->set_rules('no_rm', 'no.RM', 'required|trim', [
            "required" => "No R.M tidak boleh kosong"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pendaftaran/detailPasien', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id', true),
                'no_rm' => $this->input->post('no_rm', true),
                'nama' => $this->input->post('nama', true),
                'tgl_kunjungan' => $this->input->post('tgl_kunjungan', true),
                'umur' => $this->input->post('umur', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat' => $this->input->post('alamat', true),
                'agama' => $this->input->post('agama', true),
                'pekerjaan' => $this->input->post('pekerjaan', true),
                'no_hp' => $this->input->post('no_hp', true),
            ];
        }
    }

	public function editPasien($id)
    {
        $data['title'] = 'Pendaftaran Pasien';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pasien'] = $this->db->get_where('pasien', ['id' => $id])->row_array();

        $this->form_validation->set_rules('no_rm', 'no.RM', 'required|trim', [
            "required" => "No R.M tidak boleh kosong"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pendaftaran/editPasien', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id', true),
                'no_rm' => $this->input->post('no_rm', true),
                'nama' => $this->input->post('nama', true),
                'tgl_kunjungan' => time(),
                'umur' => $this->input->post('umur', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat' => $this->input->post('alamat', true),
                'agama' => $this->input->post('agama', true),
                'pekerjaan' => $this->input->post('pekerjaan', true),
                'no_hp' => $this->input->post('no_hp', true),
            ];

            $this->db->where('id', $id);
            $this->db->update('pasien', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pasien berhasil diperbaharui!</div>');
            redirect('pendaftaran/pasienLama');
        }
    }

	public function deletePasien($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pasien');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pasien berhasil dihapus!</div>');
        redirect('pendaftaran/pasienLama');
    }



}
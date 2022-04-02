<?php
// buat fungsi
function is_logged_in()
{
	// panggil instansiasi ci nya / library ci
	$ci = get_instance();
	// cek kalo blm login
	if(!$ci->session->userdata('email')) {
		$ci->session->set_flashdata(
			'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          	Silahkan login terlebih dahulu!
          	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
		);
		redirect('auth');
	} else { //-> kalo uda login
	    // role_idnya brp
		$role_id = $ci->session->userdata('role_id');
		// skrg berada di menu mana/controller mana
		$menu = $ci->uri->segment(1);
		
		// query tabel menu atau user_menu berdaskan menu_id nya
		$queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
		
		// dapatkan id nya
		$menu_id = $queryMenu['id'];
		
		// query user_access_menu
		$userAccess = $ci->db->get_where('user_access_menu', [
			'role_id' => $role_id, 
			'menu_id' => $menu_id
		]);
		
		// lalu cek
		if($userAccess->num_rows() < 1) {
			// kalo 0 tidak boleh ngaksesnya
			redirect('auth/blocked');
		}
		
	}
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    // cari data dari tabel 'user_access_menu' yang 'role_id' nya berapa --> dan 'menu_id' nya berapa
	$result = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

    if ($result->num_rows() > 0) {
        return "checked = 'checked' ";
    }
}

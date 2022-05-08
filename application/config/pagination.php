<?php 
// CONFIG
        $config['base_url'] = 'http://localhost/myproject/sisfo/pasien/pasienLama';//-> url tapi ditambah index => karna kita ada method index
		$config['num_links'] = 5;              //-> buat jumlah pagination kiri kanannya misalnya 5 kiri 5 kanan
		
		// styling
		//-> Adding Enclosing Markup
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';
		
		//-> Customizing the First Link
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		
		//-> Customizing the Last Link
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		
		//-> Customizing the “Next” Link
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		
		//-> Customizing the “Previous” Link
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		
		//-> Customizing the “Current Page” Link => yang lagi aktif
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		//-> Customizing the “Digit” Link => buat angka
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		
		//-> Adding attributes to anchors
		$config['attributes'] = array('class' => 'page-link');
		
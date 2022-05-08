

       
       

                <!-- Begin Page Content -->
                <div class="container-fluid">
					
					<!--- pesan errornya ---->
					<?= form_error('dokter', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    
					<div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="form-group d-flex col-3 mb-0" style="margin-left: 40%; letter-spacing: 2px;">
                                <h1 class="h3 text-gray-800 mb-0" style=""> <b> Daftar <?= $title; ?></b></h1>
                            </div>
                            
                        </div>
                    </div>
					<!--- pesan berhasil ---->
					<?= $this->session->flashdata('message'); ?>

           			<div class="card-content">
					<div class="card-body">
					<!--- tabel tambahan --->
					<div class="row">
                        <div class="col-12 text-center" style="letter-spacing: 2px;">
                            <div class="form-group text-right d-flex" style="margin-left: 85%;">
                                <a href="" class="btn btn-sm btn-primary" style="border-radius: 15px;" data-toggle="modal" data-target="#newDokterModal" id="add_dokter">
                                    <i class="fas fa-plus"></i> Tambah Data
                                </a>
                            </div>
                        </div>
                            
						<div class="col-lg-12">
							<table class="table table-hover" id="dataTables">
							  <thead>
								<tr>
								  	<th scope="col">#</th>
									<th scope="col">NIP</th>
									<th scope="col">Nama</th>
									<th scope="col">Spesialis</th>
                                    <th scope="col">Aksi</th>
								</tr>
							  </thead>
							  <tbody>
                                <?php $i = 1; ?> <!--- akalin biar no urutnya berurut ---->
							    <?php foreach($dokter as $d) : ?>
								<tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $d['nip'];?></td>
                                    <td><?= $d['nama_dokter'];?></td>
                                    <td><?= $d['spesialis'];?></td>
                                    <td>
										<!-- detail -->
                                        <a href="" class="btn-sm btn-info fas fa-eye" data-toggle="modal" data-target="#detailDokterModal<?= $d['id'] ?>">
										</a>	
										<!-- edit -->
                                        <a id ="edit_dokter"class="btn-sm btn-success fas fa-edit" href=""
										data-toggle="modal" data-target="#edit"
										data-id_dok="<?= $d['id']; ?>"
										data-nip_dok="<?= $d['nip'];?>"
										data-nama_dok="<?= $d['nama_dokter'];?>"
										data-spesialis_dok="<?= $d['spesialis'];?>"
										data-email_dok="<?= $d['email'];?>"
										data-alamat_dok="<?= $d['alamat'];?>"
										data-no_dok="<?= $d['no_telp'];?>"
										>
										</a>
										<!-- hapus -->
                                        <a class="btn-sm btn-danger fas fa-trash-alt" href="<?= base_url('dokter/deleteDokter/') . $d['id']; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"></a>
                                    </td>   
								</tr>
								<?php $i++; ?>
                                <?php endforeach; ?>
							  </tbody>
							</table>
						</div>
					</div>
					</div>
					</div>
					</div>
					
					

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
	


<!-- modal detail -->
<!-- value nya dari foreach -->
<?php foreach($dokter as $d) : ?>
	<div class="modal fade" id="detailDokterModal<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="detailDokterModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document" style="border-radius:15px;">
		<div class="modal-content">
		  <div class="container">
		  <div class="card mt-3 mb-3">
			<div class="row">
				<div class="col" >
				<div class="card-header">
					<h5 class="modal-title text-center" id="detailDokterModallLabel">Detail Dokter</h5>
				</div>					
					<div class="card-body">
						<!-- form -->
						<form action="" method="post" >
							<div class="modal-body">
								<div class="row">
									<!-- jlh row 12, jika dibagi 2 jadi 3+9=12 -->
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="nip">NIP </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Nomor Induk Pegawai" class="form-control" name="nip" id="nip" value="<?= $d['nip'];?>">
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="nama_dokter">Nama </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Nama Lengkap Dokter" class="form-control" name="nama_dokter" id="nama_dokter" value="<?= $d['nama_dokter'];?>">
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="spesialis">Spesialisasi </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Spesialisasi dokter" class="form-control" name="spesialis" id="spesialis" value="<?= $d['spesialis'];?>">
                        					 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="email">Email </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Email yang aktif" class="form-control" name="email" id="email" value="<?= $d['email']; ?>">
                        					<?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="alamat">Alamat </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Tempat tinggal saat ini" class="form-control" name="alamat" id="alamat" value="<?= $d['alamat']; ?>">
                        					<?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="no_telp">No.Hp </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Nomor yang bisa dihubungi" class="form-control" name="no_telp" id="no_telp" value="<?= $d['no_telp']; ?>">
                        					<?= form_error('no_telp', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
								</div>
							</div>
					</div>
							<div class="modal-footer text-right">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
							</div>
					</form>
					<!-- end form --->
				</div>
			</div>
		  </div>
		<!-- end card -->
		  </div>
		</div>
	  </div>
	</div>
<?php endforeach; ?>



	<!-- modal edit -->
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editDokterModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document" style="border-radius:15px;">
		<div class="modal-content">
		  <div class="container">
		  <div class="card mt-3 mb-3">
			<div class="row">
				<div class="col" >
				<div class="card-header">
					<h5 class="modal-title text-center" id="editDokterModallLabel">Edit Dokter</h5>
				</div>					
					<div class="card-body">
						<!-- form -->
						<form id="form" enctype="multipart/form-data">
							<div class="modal-body" id="modal-edit">
								<div class="row">
									<!-- jlh row 12, jika dibagi 2 jadi 3+9=12 -->
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="nip">NIP </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="hidden" id="id">
											<input type="text" placeholder="Nomor Induk Pegawai" class="form-control" name="nip" id="nip">
                        					<?= form_error('nip', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="nama_dokter">Nama </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Nama Lengkap Dokter" class="form-control" name="nama_dokter" id="nama_dokter">
                        					<?= form_error('nama_dokter', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="spesialis">Spesialisasi </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Spesialisasi dokter" class="form-control" name="spesialis" id="spesialis">
                        					<?= form_error('spesialis', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="email">Email </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Email yang aktif" class="form-control" name="email" id="email">
                        					<?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="alamat">Alamat </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Tempat tinggal saat ini" class="form-control" name="alamat" id="alamat">
                        					<?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="no_telp">No.Hp </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Nomor yang bisa dihubungi" class="form-control" name="no_telp" id="no_telp">
                        					<?= form_error('no_telp', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
								</div>
							</div>
					</div>
							<div class="modal-footer text-right">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
								<button type="submit" class="btn btn-primary fas fa fa-edit" name="edit" id="submit"> Edit</button>
							</div>
					</form>
					<!-- end form --->
				</div>
			</div>
		  </div>
		<!-- end card -->
		  </div>
		</div>
	  </div>
	</div>
	<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
	<script>
		const baseUrl = "http://localhost/myproject/sisfo/"
		$(document).on('click', '#edit_dokter',function() {
			
            var nip_doc = $(this).data('nip_dok');
            var nm_doc = $(this).data('nama_dok');
            var spesial_doc = $(this).data('spesialis_dok');
            var email_doc = $(this).data('email_dok');
            var alamat_doc = $(this).data('alamat_dok');
            var no_doc = $(this).data('no_dok');
			
            $('#modal-edit #nip').val(nip_doc);
			$('#modal-edit #nama_dokter').val(nm_doc);
			$('#modal-edit #spesialis').val(spesial_doc);
			$('#modal-edit #email').val(email_doc);
			$('#modal-edit #alamat').val(alamat_doc);
			$('#modal-edit #no_telp').val(no_doc);
        })
		// proses ubahnya
		
		$(document).ready(function(e){
            $("#form").on("submit", (function(e) {
                e.preventDefault();
                var id_doc = $('#modal-edit #id').val();
                $.ajax({
                    url : `${baseUrl}/Dokter/editDokter/${id_doc}`,
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(msg){
                        $('.table').html(msg);
                    }
                    
                });
            }));
        })
	</script>


	<!-- modal tambah dokter -->
		<!-- Modal -->
	<div class="modal fade" id="newDokterModal" tabindex="-1" role="dialog" aria-labelledby="newDokterModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document" style="border-radius:15px;">
		<div class="modal-content">
		  <div class="container">
		  <div class="card mt-3 mb-3">
			<div class="row">
				<div class="col" >
				<div class="card-header">
					<h5 class="modal-title text-center" id="newDokterModallLabel">Tambah Dokter</h5>
				</div>					
					<div class="card-body">
						<!-- form -->
						<form action="" method="post" >
							<div class="modal-body">
								<div class="row">
									<!-- jlh row 12, jika dibagi 2 jadi 3+9=12 -->
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="nip">NIP </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Nomor Induk Pegawai" class="form-control" name="nip" id="nip" value="<?= set_value('nip') ?>">
                        					<?= form_error('nip', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="nama_dokter">Nama </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Nama Lengkap Dokter" class="form-control" name="nama_dokter" id="nama_dokter" value="<?= set_value('nama_dokter') ?>">
                        					<?= form_error('nama_dokter', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="spesialis">Spesialisasi </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Spesialisasi dokter" class="form-control" name="spesialis" id="spesialis" value="<?= set_value('spesialis') ?>">
                        					<?= form_error('spesialis', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="email">Email </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Email yang aktif" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
                        					<?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="alamat">Alamat </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Tempat tinggal saat ini" class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat') ?>">
                        					<?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
									<div class="col-3" style="margin-top: 4px;">
										<div class="form-group">
											<b> <label for="no_telp">No.Hp </label> </b>
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<input type="text" placeholder="Nomor yang bisa dihubungi" class="form-control" name="no_telp" id="no_telp" value="<?= set_value('no_telp') ?>">
                        					<?= form_error('no_telp', '<small class="text-danger pl-2">', '</small>'); ?> 
										</div>
									</div>
								</div>
							</div>
					</div>
							<div class="modal-footer text-right">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
								<button type="submit" class="btn btn-primary fas fa fa-user"> Simpan</button>
							</div>
					</form>
					<!-- end form --->
				</div>
			</div>
		  </div>
		<!-- end card -->
		  </div>
		</div>
	  </div>
	</div>


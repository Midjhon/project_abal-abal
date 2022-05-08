

       
       

                <!-- Begin Page Content -->
                <div class="container-fluid">
				
			

                    <!-- Page Heading -->
				<div class="card body mb-1">
				<div class="row">
					<div class="col-4">
						<div class="form-group">
						<a href="<?= base_url('pendaftaran') ?>" class="btn btn-primary fas fa-arrow-alt-circle-left mt-3 ml-3" style="border-radius: 20px;"> Kembali</a>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
						<h1 class="h3 text-gray-800 mt-3 ml-3" style=""> <b> Daftar Kunjungan <?= $title; ?></b></h1>
						</div>
					</div>
				</div>
				</div>
					
					<!--- pesan errornya ---->
					<?= form_error('pasien', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					
					<!--- pesan berhasil ---->
					<?= $this->session->flashdata('message'); ?>

					<div class="card mb-3">
           			<div class="card-content">
					<div class="card-body">
					<!--- tabel tambahan --->
					<div class="row">
						<div class="col-lg-12">
							<table class="table table-hover" id="dataTables">
							  <thead>
								<tr>
								  	<th scope="col">#</th>
									<th scope="col">No. Rekam Medis</th>
									<th scope="col">Nama Lengkap</th>
									<th scope="col">Umur</th>
									<th scope="col">Jenis Kelamin</th>
									<th scope="col">Kunjungan</th>
									<th scope="col">Action</th>
								</tr>
							  </thead>
							  <tbody>
								<?php $i = 1; ?> <!--- akalin biar no urutnya berurut ---->
							    <?php foreach($hasil as $h) : ?>
								<tr>
								  <th scope="row"><?= $i; ?></th>
												<td><?= $h['no_rm']; ?></td>
												<td><?= $h['nama']; ?></td>
												<td><?= $h['umur']; ?></td>
												<td><?= $h['jenis_kelamin']; ?></td>
												<td>
													<?php date_default_timezone_set('Asia/Jakarta'); ?>
													<?= date('d-m-Y', $h['tgl_kunjungan']); ?>
												</td>
												<td>
													<a href="<?= base_url('pendaftaran/detailPasien/') . $h['id']; ?>" class="btn-sm btn-info fas fa-eye"> </a>
													<a class="btn-sm btn-success fas fa-edit" href="<?= base_url('pendaftaran/editPasien/') . $h['id']; ?>"></a>
													<a class="btn-sm btn-danger fas fa-trash-alt" href="<?= base_url('pendaftaran/deletePasien/') . $h['id']; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"></a>
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

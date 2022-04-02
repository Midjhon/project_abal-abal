

       
       

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Daftar Kunjungan Pasien</h1>

					<?php if(validation_errors()) : ?>
					    <!--- pesan errornya ---->
						<div class="alert alert-danger" role="alert">
							<?= validation_errors(); ?>
						</div>
					
					<?php endif; ?> 

					<!--- pesan berhasil ---->
					<?= $this->session->flashdata('message'); ?>

					<!--- tabel tambahan --->
					<section id="basic-horizontal-layouts">
					<div class="row match-height">
						<div class="col-md-12 col-12">
						<div class="card">
							<div class="card-content">
								<div class="card-body">	
									<div class="row">
										<div class="col-lg">
											<table class="table table-hover">
											<thead>
												<tr>
													<th scope="col">No.Rekam Medis</th>
													<th scope="col">Nama</th>
													<th scope="col">Umur</th>
													<th scope="col">Jenis Kelamin</th>
													<th scope="col">Action</th>                               
												</tr>
											</thead>
											<tbody> <!--- akalin biar no urutnya berurut ---->
												<?php foreach($pasien as $p) : ?>
												<tr>
													<td><?= $p['no_rm']; ?></td>
													<td><?= $p['nama']; ?></td>
													<td><?= $p['umur']; ?></td>
													<td><?= $p['jenis_kelamin']; ?></td>
													<td>
														<a href="" class="badge badge-primary mb-3 fa fa-eye p-2" data-toggle="modal" data-target="#newPasienModal">Detail</a>

														<a class="badge badge-success" href=""></i> Edit</a>
														<a class="badge badge-danger" href="" onclick="return confirm('Are you sure delete this data?'); "><i class="fas fa-trash-alt"></i> Hapus</a>
													</td>
												</tr>
												<?php endforeach; ?>
										
											</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
					</section>	

					

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

			
			<?php foreach($pasien as $p) : ?>

			<div class="modal fade" id="newPasienModal" tabindex="-1" role="dialog" aria-labelledby="newPasienModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="border-radius:5%;">
						<div class="modal-header">
							<div>
							<h5 class="modal-title" style="margin-left: 160px; font-family: times new roman;" id="newPasienModallLabel"><strong>Identitas Pasien</strong></h5>
							</div>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							
						</div>


						<!-- form -->
		  				<form action="" method="post">
							<div class="modal-body">
								<div class="form-group">
									<h5 class="modal-title text-center" id="newPasienModallLabel"><strong>Detail Pasien</strong></h5>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="form-group row">
											<div class="col-md-4">
												<label for="tgl_kunjungan">Berkunjung pada</label>
											</div>
											<div class="col-md-8">
												: <label for="tgl_kunjungan" style="border-bottom: solid grey;"><?= $p['tgl_kunjungan']; ?></label>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-4">
												<label for="no_rm">No. Rekam Medis</label>
											</div>
											<div class="col-md-8">
												: <label for="tgl_kunjungan" style="border-bottom: solid grey;"><?= $p['no_rm']; ?></label>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-4">
												<label for="nama">Nama Lengkap</label>
											</div>
											<div class="col-md-8">
												<input type="text" class="form-control" name="nama" id="nama" value="<?= $p['nama']; ?>">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-4">
												<label for="umur">Umur</label>
											</div>
											<div class="col-md-8">
												<input type="text" placeholder="" class="form-control" name="umur" id="umur" >
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-4">
												<label for="umur">Jenis Kelamin</label>
											</div>
											<div class="col-md-8">
												<input type="text" placeholder="" class="form-control" name="umur" id="umur" value="<?= set_value('umur') ?>">
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</form>
						
					</div>
				</div>
			
			</div>
			<?php endforeach; ?>

		

			


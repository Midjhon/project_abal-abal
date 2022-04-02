<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Tambah User</h1>


   
                <!-- Nested Row within Card Body -->
                <div class="row">
                 
                    <div class="col-lg-10">
					        <?= $this->session->flashdata('message'); ?>
							<!-- buat method dan action(kemana mau diarahkan) --->
                            <form class="" method="post" action="<?= base_url('admin/tambah_user'); ?>">
                                
								<div class="col-xs-12 col-sm-6">
								    <div class="form-group">
										<label for="name">Nama lengkap</label>
										<input type="text" name="name" id="name" class="form-control" placeholder="Nama lengkap" value="<?= set_value('name') ?>">
										<?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?> 
								    </div>
								</div>
								
								<div class="col-xs-12 col-sm-6">
								    <div class="form-group">
										<label for="email">Email</label>
										<input type="text" name="email" id="email" class="form-control" placeholder="Masukan email" value="<?= set_value('email') ?>">
										<?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?> 
								    </div>
								</div>
								<div class="col-xs-12 col-sm-6">
								    <div class="form-group">
										<label for="password">Password</label>
										<input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= set_value('password') ?>">
										<?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?> 
								    </div>
								</div>
								
								<div class="col-lg-3">
									<label for="role_id">Hak Akses</label>
									<select name="role_id" id="role_id" class="form-control">
										
										<option value="<?= set_value('role_id'); ?>">---Pilih Hak Akses---</option>
										<!--- LOOPING --->
										<?php foreach($role as $r) : ?>
											<option value="<?= $r['id']; ?>" <?php echo set_select('role_id', $r['id']); ?>><?= $r['role']; ?></option>
										<?php endforeach; ?>
                                        
									</select>
									<?= form_error('role_id', '<small class="text-danger pl-2">', '</small>'); ?> 
								</div>
										
									
								
								<div class="form-group mt-4 m-3">
                                    
                                    <a href="<?= base_url('admin/users'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>

									<button type="submit" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button>
								</div>


							</form>				
				    </div>
		        </div>
	
       
    
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
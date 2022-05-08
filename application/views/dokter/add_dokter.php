

       
       

                <!-- Begin Page Content -->
                <div class="container-fluid">
				
                <!--- pesan errornya ---->
					<?= form_error('dokter', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
					
					<!--- pesan berhasil ---->
					<?= $this->session->flashdata('message'); ?>
                    
					<div class="card mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="form-group d-flex col-3 mb-0" style="margin-left: 40%; letter-spacing: 2px;">
                                    <h1 class="h3 text-gray-800 mb-0" style=""> <b> Daftar <?= $title; ?></b></h1>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-content">
                        <div class="card-body">
                        </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
					
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Pages</h1>
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
									
									<!--- pesan alert --->
									
									
									<!--- method dan action -->
                                    <form class="user" method="post" action="<?= base_url('auth') ?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email') ?>">
											<?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?> 
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
											<?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?> 
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                     
                                    </form>
                                    <hr>
                                        <h5><i class="fa fa-code"> Petunjuk Login :</i></h5>
                                        <H6 class="fa fa-eye"> Pastikan bahwa anda sudah didaftarkan oleh Admin</H6>
                                        <H6 class="fa fa-hand-point-right"> Silahkan login sesuai dengan peran yang sudah ditentukan</H6>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

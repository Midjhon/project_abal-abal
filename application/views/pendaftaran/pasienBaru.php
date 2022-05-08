<!-- Begin Page Content -->
<div class="container-fluid mb-3">
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
                  <h1 class="h3 text-gray-800 mt-3 ml-3" style="letter-spacing: 2px;"> <b> Pendaftaran <?= $title; ?> </b> </h1>
                </div>
            </div>
          </div>
        </div>
        <div class="wadah">
          <div class="card pl-3 pr-3 m-auto">
			      <div class="card-body">

            <?= $this->session->flashdata('message'); ?>
            
            <form action="<?= base_url('pendaftaran/pasienBaru'); ?>" method="post">  
              <div class="form-body">
                <div class="row">
                  <div class="col-4">
                    <div class="form-group row">
                        <b> <label for="no_rm" style="margin-left: 10px; font-size:20px;" class="text-center">IDENTITAS</label> </b>
                        <input type="text" placeholder="Nomor Rekam Medis Pasien" class="form-control" name="no_rm" id="no_rm" value="<?= set_value('no_rm') ?>">
                        <?= form_error('no_rm', '<small class="text-danger pl-2">', '</small>'); ?> 
                      
                    </div>
                    <div class="form-group row">
                        <input type="text" placeholder="Nama Lengkap Pasien" class="form-control" name="nama" id="nama" value="<?= set_value('nama') ?>">
                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?> 
                      
                    </div>

                    <div class="form-group row">
                        <div>
                        <input type="text" placeholder="Usia" class="form-control col-4" name="umur" id="umur" value="<?= set_value('umur') ?>">
                        <?= form_error('umur', '<small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div>
                        <label for="" style="margin-top:5px;"><b> Tahun </b></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control col-9"> <!-- col-9: mengatur ukuran form inputannya -->
                          <option value="">--Pilih Jenis Kelamin--</option>
                          <option value="Laki-laki" <?php echo set_select('jenis_kelamin', 'Laki-laki'); ?> >Laki-laki</option>
                          <option value="Perempuan" <?php echo set_select('jenis_kelamin', 'Perempuan'); ?> >Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                        <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat Pasien" name="alamat"><?= set_value('alamat'); ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                        <select name="agama" id="agama" class="form-control">
                          <option value="">--Pilih Agama Pasien--</option>
                          <option value="Kristen" <?php echo set_select('agama', 'Kristen'); ?> >Kristen</option>
                          <option value="Islam" <?php echo set_select('agama', 'Islam'); ?> >Islam</option>
                          <option value="Islam" <?php echo set_select('agama', 'Islam'); ?> >Budha</option>
                        </select>
                        <?= form_error('agama', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                        <input type="text" placeholder="Pekerjaan pasien" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= set_value('pekerjaan') ?>">
                        <?= form_error('pekerjaan', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>

                    <div class="form-group row">
                        <input type="text" placeholder="Nomor Hp Pasien" class="form-control" name="no_hp" id="no_hp" value="<?= set_value('no_hp') ?>">
                        <?= form_error('no_hp', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group row m-auto">
                        <b> <label for="no_rm" style="margin-left: 10px; font-size:20px;">Jam Masuk</label> </b>
                        <!-- <input type="text" placeholder="Nomor Rekam Medis Pasien" class="form-control" name="no_rm" id="no_rm" value="<?= set_value('no_rm') ?>">
                        <?= form_error('no_rm', '<small class="text-danger pl-2">', '</small>'); ?>  -->
                      
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group row">
                        <b> <label for="no_rm" style="margin-left: 10px; font-size:20px;">KUNJUNGAN</label> </b>
                        <!-- <input type="text" placeholder="Nomor Rekam Medis Pasien" class="form-control" name="no_rm" id="no_rm" value="<?= set_value('no_rm') ?>">
                        <?= form_error('no_rm', '<small class="text-danger pl-2">', '</small>'); ?> 
                       -->
                    </div>
                    
                  </div>
                  <div class="footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          </div>
        </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
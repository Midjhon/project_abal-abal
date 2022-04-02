<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Identitas Pasien</h1>

    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-12 col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">

            <?= $this->session->flashdata('message'); ?>

            <?= anchor('pendaftaran/daftarKunjungan', '<button class="btn btn-primary btn-sm mb-3 round waves-effect waves-light"><i class="fas fa-plus fa-sm"></i> Daftar Pasien </button>') ?>

            <form action="<?= base_url('pendaftaran'); ?>" method="post">
              <div class="form-body">
                <div class="row">
                  <div class="col-12">

                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="no_rm">Nomor Rekam Medis</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" placeholder="Nomor Rekam Medis Pasien" class="form-control" name="no_rm" id="no_rm" value="<?= set_value('no_rm') ?>">
                        <?= form_error('no_rm', '<small class="text-danger pl-2">', '</small>'); ?> 
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="nama">Nama Lengkap</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" placeholder="Nama Lengkap Pasien" class="form-control" name="nama" id="nama" value="<?= set_value('nama') ?>">
                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?> 
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="tgl_kunjungan">Tanggal Kunjungan </label>
                      </div>
                      <div class="col-md-8">
                        <input type="date" placeholder="Tanggal lahir pasien" class="form-control" name="tgl_kunjungan" id="tgl_kunjungan" value="<?= set_value('tgl_kunjungan') ?>">
                        <?= form_error('tgl_kunjungan', '<small class="text-danger pl-2">', '</small>'); ?> 
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="umur">Umur </label>
                      </div>
                      <div class="col-md-2">
                        <input type="text" placeholder=".." class="form-control" name="umur" id="umur" value="<?= set_value('umur') ?>">
                        <?= form_error('umur', '<small class="text-danger pl-2">', '</small>'); ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="jenis_kelamin">Jenis Kelamin </label>
                      </div>
                      <div class="col-md-2">
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                          <option value="">--Pilih Jenis Kelamin--</option>
                          <option value="Laki-laki" <?php echo set_select('jenis_kelamin', 'Laki-laki'); ?> >Laki-laki</option>
                          <option value="Perempuan" <?php echo set_select('jenis_kelamin', 'Perempuan'); ?> >Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-2">', '</small>'); ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="alamat">Alamat</label>
                      </div>
                      <div class="col-md-8">
                        <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat Pasien" name="alamat" value="<?= set_value('alamat') ?>"></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="agama">Agama </label>
                      </div>
                      <div class="col-md-2">
                        <select name="agama" id="agama" class="form-control">
                          <option value="">--Pilih Agama Pasien--</option>
                          <option value="Kristen" <?php echo set_select('agama', 'Kristen'); ?> >Kristen</option>
                          <option value="Islam" <?php echo set_select('agama', 'Islam'); ?> >Islam</option>
                          <option value="Islam" <?php echo set_select('agama', 'Islam'); ?> >Budha</option>
                          
                        </select>
                        <?= form_error('agama', '<small class="text-danger pl-2">', '</small>'); ?>
                      </div>
                     
                    </div>
                  </div>


                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="pekerjaan">Pekerjaan </label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" placeholder="Pekerjaan pasien" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= set_value('pekerjaan') ?>">
                        <?= form_error('pekerjaan', '<small class="text-danger pl-2">', '</small>'); ?>
                      </div>
                    </div>
                  </div>


                  <div class="col-12">
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="no_hp">Nomor Handphone</label>
                      </div>
                      <div class="col-md-8">
                        <input type="text" placeholder="Nomor Hp Pasien" class="form-control" name="no_hp" id="no_hp" value="<?= set_value('no_hp') ?>">
                        <?= form_error('no_hp', '<small class="text-danger pl-2">', '</small>'); ?>
                      </div>
                    </div>
                  </div>
                  

                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
	<br>
    <br>
       
    
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
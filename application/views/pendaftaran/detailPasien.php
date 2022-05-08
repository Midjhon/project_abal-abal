 <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Detail Data Pasien</h1>
        <section id="basic-horizontal-layouts">
        <div class="row match-height">
        <div class="col-md-8 col-12 m-auto"> 
        <!--- untuk sampul nya -->
        <div class="card mb-3">
        <div class="card-content" style="margin-left: 20%; font-weight:bold;">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $pasien['id']; ?>">
            <div class="row">
                <div class="col">
                    <h1 class="h3 mb-5 text-gray-800 mt-5" style="margin-left: 18%;">Identitas Pasien</h1>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="tgl_kunjungan">Berkunjung pada </label>
                      </div>
                      <div class="col-md-8">
                        : <label for="tgl_kunjungan" style=""> <strong> <?php date_default_timezone_set('Asia/Jakarta'); ?> <?= date('d F Y => H:i a', $pasien['tgl_kunjungan']); ?> </strong></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="no_rm">Nomor Rekam Medis</label>
                      </div>
                      <div class="col-md-8">
                        : <label for="no_rm" style=""><?= $pasien['no_rm']; ?></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="nama">Nama Lengkap</label>
                      </div>
                      <div class="col-md-8">
                        : <label for="nama" style=""><?= $pasien['nama']; ?></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="umur">Umur</label>
                      </div>
                      <div class="col-md-8">
                        : <label for="umur" style=""><?= $pasien['umur']; ?></label>
                         <label>Tahun</label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                      </div>
                      <div class="col-md-8">
                        : <label for="jenis_kelamin" style=""><?= $pasien['jenis_kelamin']; ?></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="agama">Agama</label>
                      </div>
                      <div class="col-md-8">
                        : <label for="agama" style=""><?= $pasien['agama']; ?></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="alamat">Alamat</label>
                      </div>
                      <div class="col-md-8">
                        : <label for="alamat" style=""><?= $pasien['alamat']; ?></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="pekerjaan">Pekerjaan</label>
                      </div>
                      <div class="col-md-8">
                        : <label for="pekerjaan" style=""><?= $pasien['pekerjaan']; ?></label>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-4">
                        <label for="no_hp">No. Handphone</label>
                      </div>
                      <div class="col-md-8">
                        : <label for="no_hp" style=""><?= $pasien['no_hp']; ?></label>
                      </div>
                    </div>

                    <div class="modal-footer mb-2">
                    <a href="<?= base_url('pendaftaran/pasienLama'); ?>" class="btn btn-danger float-left"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>

                </div>
            </div>
        </form>
        </div>
        </div>
        </div>
        </div>
        </section>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
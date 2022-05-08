 <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Pengaturan Data Pasien</h1>
        <section id="basic-horizontal-layouts">
        <div class="row match-height">
        <div class="col-md-8 col-12 m-auto"> 
        <!--- untuk sampul nya -->
        <div class="card mb-3">
        <div class="card-content">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $pasien['id']; ?>">
            <div class="row m-auto">
                <div class="col-md-8 m-auto">
                    <h1 class="h3 mb-4 text-gray-800 mt-5">Identitas Pasien</h1>
                    <div class="form-group">
                        <label for="no_rm">No. Rekam Medis</label>
                        <input type="text" name="no_rm" class="form-control" id="no_rm" placeholder="Enter roel" value="<?= $pasien['no_rm']; ?>">
                        <small class="form-text text-danger"><?= form_error('no_rm'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $pasien['nama']; ?>">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="tgl_kunjungan">Berkunjung Pada</label>
                        <input type="text" name="tgl_kunjungan" class="form-control" id="tgl_kunjungan" value="<?php date_default_timezone_set('Asia/Jakarta'); ?> <?= date('d F Y, H:i a', $pasien['tgl_kunjungan']); ?>
                        " readonly>
                        <small class="form-text text-danger"><?= form_error('tgl_kunjungan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="text" name="umur" class="form-control" id="umur" value="<?= $pasien['umur']; ?>">
                        <small class="form-text text-danger"><?= form_error('umur'); ?></small>
                    </div>
                    <div class="form-group">
                       <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="Laki-laki" <?= ($pasien['jenis_kelamin'] ==  'Laki-laki')  ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value="Perempuan" <?= ($pasien['jenis_kelamin'] ==  'Perempuan')  ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $pasien['alamat']; ?>">
                        <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control">
                            <option value="Kristen" <?= ($pasien['agama'] ==  'Kristen')  ? 'selected' : '' ?>>Kristen</option>
                            <option value="Islam" <?= ($pasien['agama'] ==  'Islam')  ? 'selected' : '' ?>>Islam</option>
                            <option value="Budha" <?= ($pasien['agama'] ==  'Budha')  ? 'selected' : '' ?>>Budha</option>
                        </select>
                        <?= form_error('agama', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?= $pasien['pekerjaan']; ?>">
                        <small class="form-text text-danger"><?= form_error('pekerjaan'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No. Handphone</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?= $pasien['no_hp']; ?>">
                        <small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
                    </div>
                    <div class="modal-footer mb-2">
                    <a href="<?= base_url('pendaftaran/pasienLama'); ?>" class="btn btn-danger float-left"><i class="fas fa-arrow-alt-circle-left"></i> Batal</a>
                    <button type="submit" class="btn btn-success float-right" name="edit"><i class="fas fa-edit"></i> Ubah</button>
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
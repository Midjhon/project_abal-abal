<!-- Begin Page Content -->
<div class="container-fluid">


<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col d-flex ">
                <h3 class="card-title align-self-center" style="font-size: 25px; margin-left: 39%;">
                    <b>Pendaftaran <?= $title; ?> </b>
                </h3>
            </div>
            
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0 table-responsive">
        <table class="table table-striped datatable">
            <div class="col text-center mt-4 mb-4">
                <a href="<?= base_url('pendaftaran/pasienLama'); ?>" class="btn btn-sm btn-info" style="font-size: 30px; border-radius:20px;">
                    <i class="fas fa-user"></i> <b>Pasien Lama</b>
                </a>
                <a href="<?= base_url('pendaftaran/pasienBaru'); ?>" class="btn btn-sm btn-success ml-3" style="font-size: 30px; border-radius:20px;">
                    <i class="fas fa-plus"></i> Pasien Baru
                </a>
            </div>
        </table>
    </div>
    <!-- /.card-body -->
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
				<!-- COPY RIGHT --->
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Mid Company <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
	
	<script>
		// MENAMPILKAN EXTENSI FILE YG INGIN DI UPLOAD
		$('.custom-file-input').on('change', function() {
			let fileName = $(this).val().split('\\').pop();
			$(this).next('.custom-file-label').addClass("selected").html(fileName);
		});
		
		// tanggkap elemennya
		$('.form-check-input').on('click', function() {
			// AMBIL datanya
			const menuId = $(this).data('menu');
			const roleId = $(this).data('role');
			
			// jalankan ajaxnya 
			$.ajax({
				url: "<?= base_url('admin/changeaccess'); ?>",
				type: 'post',
				data: {
					menuId: menuId,
					roleId: roleId
				},
				success: function() {
					document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
				}
			});
		});

			
	</script>

    <script src="<?= base_url('assets/'); ?>js/script.js"></script>

    <!-- sambungkan script untuk dataTables nya -->
    <script src="<?= base_url('assets/'); ?>js/data_tables/jquery-3.5.1.js"></script>
    <script src="<?= base_url('assets/'); ?>js/data_tables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/data_tables/dataTables.bootstrap4.min.js"></script>
    <!-- lalu atur table disini -->
    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable();
        } );

        // modal edit
        // $(document).ready(function(){
        //     $(document).on('click', '#edit_dokter',function() {
        //         var nip = $(this).data('nip');
        //         var nama_dokter = $(this).data('nama_dokter');
        //         var spesialis = $(this).data('spesialis');
        //         var email = $(this).data('email');
        //         var alamat = $(this).data('alamat');
        //         var no_telp = $(this).data('no_telp');
        //         $('#nip').val(nip);
        //         $('#nama_dokter').val(nama_dokter);
        //         $('#spesialis').val(spesialis);
        //         $('#email').val(email);
        //         $('#alamat').val(alamat);
        //         $('#no_telp').val(no_telp);
        //     })
        // })

    </script>


</body>

</html>
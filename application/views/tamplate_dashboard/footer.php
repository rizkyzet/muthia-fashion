</div>
<!-- End of Content Wrapper -->

<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-success" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>








<!-- Bootstrap core JavaScript-->
<script src="<?= base_url("vendor/sbadmin/") ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url("vendor/sbadmin/") ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url("vendor/sbadmin/") ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url("vendor/sbadmin/") ?>js/sb-admin-2.min.js"></script>

<!-- datatables -->
<script src="<?= base_url() ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url("vendor/sbadmin/") ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<!-- <script src="<?= base_url("vendor/sbadmin/") ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url("vendor/sbadmin/") ?>js/demo/chart-pie-demo.js"></script> -->
<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url("assets/js/") ?>scripts.js"></script>



</body>

</html>
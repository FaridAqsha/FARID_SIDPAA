<footer class="footer">
    <div class="w-100 clearfix">
        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2022 FARID SIDPAA. All Rights Reserved.</span>
        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-fire text-danger"></i> by <a href="https://www.instagram.com/farid_aqsha/" class="text-dark" target="_blank">AXA</a></span>
    </div>
</footer>
</div>
</div>

<div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body d-flex align-items-center">
                <div class="container">
                    <div class="apps-wrap">
                        <div class="app-item">
                            <a href="<?= base_url('Dashboard') ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>
                        <div class="app-item">
                            <a href="<?= base_url('User') ?>"><i class="ik ik-users"></i><span>User</span></a>
                        </div>
                        <div class="app-item">
                            <a href="<?= base_url('Donasi_Uang') ?>"><i class="ik ik-dollar-sign"></i><span>Donasi Uang</span></a>
                        </div>
                        <div class="app-item">
                            <a href="<?= base_url('Donasi_Barang') ?>"><i class="ik ik-package"></i><span>Donasi Barang</span></a>
                        </div>
                        <div class="app-item">
                            <a href="<?= base_url('Pengeluaran') ?>"><i class="ik ik-file-text"></i><span>Pengeluaran</span></a>
                        </div>
                        <div class="app-item">
                            <a href="<?= site_url('Auth/logout') ?>" onclick="return confirm('Apakah anda yakin ingin logout akun ini?');"><i class="ik ik-lock"></i><span>Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    window.jQuery || document.write('<script src="<?= base_url('assets/') ?>/src/js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
<script src="<?= base_url('assets/') ?>/plugins/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url('assets/') ?>/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets/') ?>/plugins/screenfull/dist/screenfull.js"></script>
<script src="<?= base_url('assets/') ?>/plugins/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url('assets/') ?>/plugins/summernote/dist/summernote-bs4.min.js"></script>
<script src="<?= base_url('assets/') ?>/dist/js/theme.min.js"></script>
<script src="<?= base_url('assets/') ?>/js/layouts.js"></script>
<script src="<?= base_url('assets/') ?>/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>/js/datatables.js"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();

        $(this).next('.custom-file-label').addClass("selected").html(fileName);

    })
</script>
<script>
    (function(b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function() {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
</body>

</html>
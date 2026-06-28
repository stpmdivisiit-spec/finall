<?php
// C:\xampp\htdocs\FINAL\footer.php
?>

<?php if (isset($_SESSION['flash_message'])): ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-4" style="z-index: 1055;">
        <div id="liveToast" class="toast align-items-center text-white bg-<?= $_SESSION['flash_type'] ?> border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body fs-6">
                    <?php if($_SESSION['flash_type'] == 'success'): ?>
                        <i class="fas fa-check-circle me-2 fs-5 align-middle"></i>
                    <?php elseif($_SESSION['flash_type'] == 'danger'): ?>
                        <i class="fas fa-exclamation-triangle me-2 fs-5 align-middle"></i>
                    <?php else: ?>
                        <i class="fas fa-info-circle me-2 fs-5 align-middle"></i>
                    <?php endif; ?>
                    
                    <span class="align-middle"><?= $_SESSION['flash_message'] ?></span>
                </div>
                <button type="button" class="btn-close btn-close-white me-3 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<style>
    /* Mengatasi Bug Tinggi Footer Bawaan Template */
    .footer-kampus {
        height: auto !important; 
        min-height: 100px;
        border-top: 4px solid #0d6efd; /* Aksen Garis Biru */
    }
    .footer-link {
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
        transition: color 0.2s ease-in-out, padding-left 0.2s ease-in-out;
        display: inline-block;
        margin-bottom: 0.5rem;
    }
    .footer-link:hover {
        color: #ffffff;
        padding-left: 5px;
    }
    .social-icon {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        transition: background-color 0.2s;
    }
    .social-icon:hover {
        background-color: #0d6efd; /* Warna Primary */
        color: #fff;
    }
</style>

<footer class="footer-kampus mt-auto bg-dark text-white pt-5">
    <div class="container-xl px-4">
        
        <div class="row gx-5 pb-4">
            
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-graduation-cap fa-2x text-primary me-2"></i>
                    <h5 class="fw-bold mb-0 text-white">STPM Santa Ursula</h5>
                </div>
                <p class="small text-white-50 mb-4" style="line-height: 1.8;">
                    Perguruan Tinggi yang Unggul, Inovatif, dan Berkarakter di bidang Pembangunan Sosial dan Ilmu Pemerintahan dengan semangat pengabdian Serviam.
                </p>
                <div class="d-flex gap-2">
                    <a href="#!" class="social-icon text-decoration-none"><i class="fab fa-facebook-f"></i></a>
                    <a href="#!" class="social-icon text-decoration-none"><i class="fab fa-instagram"></i></a>
                    <a href="#!" class="social-icon text-decoration-none"><i class="fab fa-youtube"></i></a>
                    <a href="#!" class="social-icon text-decoration-none"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mb-4 mb-md-0">
                <h6 class="text-uppercase fw-bold mb-3 text-white">Eksplorasi</h6>
                <ul class="list-unstyled mb-0 small">
                    <li><a href="index.php?module=beranda" class="footer-link">Beranda</a></li>
                    <li><a href="index.php?module=sejarah_lembaga" class="footer-link">Sejarah Institusi</a></li>
                    <li><a href="index.php?module=visi_misi" class="footer-link">Visi & Misi</a></li>
                    <li><a href="index.php#portal-berita" class="footer-link">Portal Berita</a></li>
                    <li><a href="#!" class="footer-link">Karir / Lowongan</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mb-4 mb-md-0">
                <h6 class="text-uppercase fw-bold mb-3 text-white">Unit Layanan</h6>
                <ul class="list-unstyled mb-0 small">
                    <li><a href="https://siakad.stpmsanur.ac.id" target="_blank" class="footer-link">SIAKAD Online</a></li>
                    <li><a href="#!" class="footer-link">E-Library</a></li>
                    <li><a href="index.php?module=lp2m" class="footer-link">Lembaga Riset (LP2M)</a></li>
                    <li><a href="index.php?module=lpm" class="footer-link">Penjaminan Mutu (LPM)</a></li>
                    <li><a href="index.php?module=kemahasiswaan" class="footer-link">Kemahasiswaan</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6">
                <h6 class="text-uppercase fw-bold mb-3 text-white">Hubungi Kami</h6>
                <ul class="list-unstyled mb-0 small text-white-50" style="line-height: 2;">
                    <li class="d-flex align-items-start mb-2">
                        <i class="fas fa-map-marker-alt mt-1 me-3 text-primary"></i>
                        <span>Jl. Wirajaya, Kabupaten Ende,<br>Nusa Tenggara Timur, Indonesia</span>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fas fa-envelope me-3 text-primary"></i>
                        <span>info@stpmsanur.ac.id</span>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="fas fa-phone-alt me-3 text-primary"></i>
                        <span>(0381) 123456</span>
                    </li>
                    <li class="d-flex align-items-center">
                        <i class="far fa-clock me-3 text-primary"></i>
                        <span>Senin - Jumat: 08.00 - 16.00 WITA</span>
                    </li>
                </ul>
            </div>
            
        </div>

        <div class="row align-items-center border-top border-light border-opacity-25 pt-4 pb-4">
            <div class="col-md-6 small text-white-50 text-center text-md-start mb-2 mb-md-0">
                Copyright &copy; STPM Santa Ursula <?= date('Y') ?>. All rights reserved.
            </div>
            <div class="col-md-6 text-center text-md-end small">
                <a href="#!" class="text-white-50 text-decoration-none footer-link d-inline mb-0">Privacy Policy</a>
                <span class="mx-2 text-white-25">&middot;</span>
                <a href="#!" class="text-white-50 text-decoration-none footer-link d-inline mb-0">Terms &amp; Conditions</a>
            </div>
        </div>

    </div>
</footer>

    </div> 
</div> 

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="/FINAL/js/scripts2.js"></script> 

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="/FINAL/js/datatables/datatables-simple-demo.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // 1. Inisialisasi AOS (Animasi Saat Scroll)
    if (typeof AOS !== 'undefined') {
        AOS.init({ once: false, offset: 50 }); 
    }

    // 2. Inisialisasi Flash Message Toast
    <?php if (isset($_SESSION['flash_message'])): ?>
    document.addEventListener("DOMContentLoaded", function() {
        var toastEl = document.getElementById('liveToast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl, { delay: 4000 }); 
            toast.show();
        }
    });
    <?php endif; ?>
</script>

<?php 
    if (isset($_SESSION['flash_message'])) {
        unset($_SESSION['flash_type']);
        unset($_SESSION['flash_message']);
    }
?>

</body>
</html>
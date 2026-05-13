<?php
// Matikan error di production
define('AKSES_DIIZINKAN', true);
error_reporting(E_ALL);          // Menangkap semua error
ini_set('display_errors', 1);    // Menampilkan error ke layar
ob_start();
session_start();
include "config/koneksi.php";
include "config/fungsi_alert.php";

// Cek apakah user sudah login
$is_logged_in = (isset($_SESSION['username']) && isset($_SESSION['roles']));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sistem Informasi Kampus - STPM Santa Ursula</title>
    
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/style2.css" rel="stylesheet" /> <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
</head>

<body class="nav-fixed bg-light <?php echo $is_logged_in ? '' : 'sidenav-toggled'; ?>">
        <style>
            /* --- CSS KHUSUS DESKTOP (Layar > 992px) --- */
            @media all and (min-width: 992px) {
                .dropdown-menu li {
                    position: relative;
                }

                .dropdown-menu .submenu {
                    display: none;
                    position: absolute;
                    left: 100%;
                    top: 0;
                    right: auto;

                    /* KUNCI PERBAIKAN DI SINI: SESUAIKAN margin-top INI */
                    margin-top: -8px; /* Nilai -8px biasanya lebih pas karena <li> punya padding/margin */
                    /* Jika masih kurang pas, coba -9px atau -10px */

                    margin-left: 0px;

                    background-color: #fff;
                    border-radius: 0.375rem;
                    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
                    border: 1px solid rgba(0, 0, 0, 0.15);
                    min-width: 12rem;
                }

                .dropdown-menu .submenu.show {
                    display: block;
                }
            }

            /* --- CSS KHUSUS MOBILE (Layar < 991px) --- */
            @media (max-width: 991px) {
                .dropdown-menu .submenu {
                    display: none;
                    position: static;
                    width: auto;
                    margin-top: 0;
                    background-color: transparent;
                    border: 0;
                    box-shadow: none;
                    padding-left: 20px;
                    border-left: 2px solid #eee;
                }

                .dropdown-menu .submenu.show {
                    display: block;
                }
            }
        </style>




<nav class="topnav navbar navbar-expand-lg navbar-light bg-light shadow-sm" id="sidenavAccordion">
    <div class="container-fluid px-4 bg-light mb-1"> <?php if ($is_logged_in): ?>
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle">
            <i data-feather="menu"></i>
        </button>
        <?php endif; ?>

        <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.php">STPM Santa Ursula</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="main_nav">
            
            <?php if (!$is_logged_in): ?>
                <?php include "logged.php" ?>
            <?php else: ?>
                <ul class="navbar-nav ms-auto"></ul>
            <?php endif; ?>

            <ul class="navbar-nav align-items-center">
                
                <?php if ($is_logged_in): ?>
                    <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
                        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                            <h6 class="dropdown-header dropdown-notifications-header">
                                <i class="me-2" data-feather="bell"></i>
                                Pusat Notifikasi
                            </h6>
                            <a class="dropdown-item dropdown-notifications-item" href="#!">
                                <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                                <div class="dropdown-notifications-item-content">
                                    <div class="dropdown-notifications-item-content-details">Info Sistem</div>
                                    <div class="dropdown-notifications-item-content-text">Selamat datang kembali!</div>
                                </div>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-fluid" src="assets/img/illustrations/profiles/profile-1.png" alt="User" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                            <h6 class="dropdown-header d-flex align-items-center">
                                <img class="dropdown-user-img" src="assets/img/illustrations/profiles/profile-1.png" />
                                <div class="dropdown-user-details">
                                    <div class="dropdown-user-details-name"><?php echo ucfirst($_SESSION['username']); ?></div>
                                    <div class="dropdown-user-details-email">Role: <?php echo implode(',', $_SESSION['roles']); ?></div>
                                </div>
                            </h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">
                                <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                                Logout
                            </a>
                        </div>
                    </li>

                <?php else: ?>
                    <li class="nav-item me-3 me-lg-4">
                    
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>







    <div id="layoutSidenav">
        
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light"> <div class="sidenav-menu">
                    
                    <?php include "menu.php"; ?>
                    
                </div>
                
                <?php if ($is_logged_in): ?>
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Logged in as:</div>
                        <div class="sidenav-footer-title"><?php echo ucfirst($_SESSION['username']); ?></div>
                    </div>
                </div>
                <?php endif; ?>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <?php include "content.php"; ?>
            </main>

            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; STPM Santa Ursula <?php echo date('Y'); ?></div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a> &middot; <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="js/scripts2.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables/datatables-simple-demo.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#datatablesDosen').DataTable({
            // Atur jumlah data per halaman
            "pageLength": 5,
            "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"] ],
            
            // Bahasa Indonesia (Opsional, biar lebih rapi)
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Tidak ada data",
                "infoFiltered":("(disaring dari _MAX_ total data)"),
                "search": "Cari:",
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "next": "Lanjut",
                    "previous": "Kembali"
                }
            },

            // Pengaturan Layout Tombol Export
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                 
            buttons: [
                { extend: 'copy', className: 'btn btn-secondary btn-sm', text: '<i class="fas fa-copy"></i>' },
                { extend: 'excel', className: 'btn btn-success btn-sm', text: '<i class="fas fa-file-excel"></i>' },
                { extend: 'pdf', className: 'btn btn-danger btn-sm', text: '<i class="fas fa-file-pdf"></i>' },
                { extend: 'print', className: 'btn btn-info btn-sm', text: '<i class="fas fa-print"></i>' }
            ]
        });

        // Memindahkan tombol Export ke sebelah Search agar rapi
        // Buat container baru di atas tabel jika belum ada
        table.buttons().container().appendTo( '#datatablesSimple_wrapper .col-md-6:eq(0)' );
    });
</script>



        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Seleksi semua elemen dropdown toggle di dalam dropdown menu
                document.querySelectorAll(".dropdown-menu .dropdown-toggle").forEach(function (element) {
                    element.addEventListener("click", function (e) {
                        let nextEl = this.nextElementSibling;

                        // Cek apakah elemen selanjutnya adalah submenu
                        if (nextEl && nextEl.classList.contains("submenu")) {
                            // Stop default link behavior
                            e.preventDefault();

                            // PENTING: Mencegah event naik ke atas (bubbling)
                            // Ini agar Menu Utama (Menu 1) TIDAK tertutup saat Menu 1.1 diklik
                            e.stopPropagation();

                            // Toggle class show
                            if (nextEl.classList.contains("show")) {
                                nextEl.classList.remove("show");
                            } else {
                                // (Opsional) Tutup submenu lain yang sejajar jika ada
                                let parent = this.closest(".dropdown-menu");
                                if (parent) {
                                    parent.querySelectorAll(".submenu.show").forEach(function (submenu) {
                                        submenu.classList.remove("show");
                                    });
                                }
                                nextEl.classList.add("show");
                            }
                        }
                    });
                });
            });
        </script>
</body>
</html>
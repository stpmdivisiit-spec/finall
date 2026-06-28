<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Menarik data arsip dengan kategori 'pedoman_umum'
$q_pedoman = $koneksi->query("SELECT * FROM sekretariat_arsip WHERE kategori_arsip = 'pedoman_umum' ORDER BY tanggal DESC");
?>

<style>
    /* CSS Kustom untuk menyesuaikan DataTables Grid Card */
    .table-card-wrapper td { padding: 0 !important; border: none !important; background: transparent !important; display: block; width: 100%; }
    .table-card-wrapper tr { background: transparent !important; display: block; width: 100%; }
    .table-card-wrapper thead { display: none; } /* Menyembunyikan header tabel */
    
    /* Layout Filter DataTables */
    .dataTables_wrapper .dataTables_filter { float: right !important; text-align: right !important; }
    .dataTables_wrapper .dataTables_filter input { border-radius: 50px !important; padding: 0.3rem 1rem !important; border: 1px solid #ced4da; margin-left: 0.5em; outline: none; }
    
    .dataTables_wrapper .dataTables_length { float: left !important; margin-top: 4px; }
    .dataTables_wrapper .dataTables_length select { border-radius: 10px !important; padding: 0.2rem 0.5rem; border: 1px solid #ced4da; margin: 0 0.5em; }
    
    /* Layout Pagination DataTables */
    .dataTables_wrapper .dataTables_paginate { float: right !important; margin-top: 15px; }
    .dataTables_wrapper .dataTables_paginate .paginate_button { padding: 0.3em 0.8em !important; margin-left: 2px; border-radius: 5px !important; }
    .dataTables_wrapper .dataTables_info { float: left !important; margin-top: 20px; color: #6c757d !important; font-size: 0.875em; }
    
    /* Clearfix agar container tidak berantakan */
    .dataTables_wrapper::after { content: ""; display: block; clear: both; }

    /* CSS Tambahan untuk Grid di dalam DataTables */
    /* Karena DataTables merender tr > td secara vertikal, kita akali tampilannya agar berbentuk grid responsif */
    #tabelPedoman tbody {
        display: flex;
        flex-wrap: wrap;
        margin-right: -0.5rem;
        margin-left: -0.5rem;
    }
    #tabelPedoman tbody tr {
        width: 33.333333%; /* Sama dengan col-lg-4 */
        padding: 0.5rem;
        display: flex;
        flex-direction: column;
    }
    
    /* Penyesuaian Mobile: Jadikan 1 kolom penuh di layar kecil */
    @media (max-width: 991.98px) {
        #tabelPedoman tbody tr { width: 50%; } /* col-md-6 */
    }
    @media (max-width: 767.98px) {
        #tabelPedoman tbody tr { width: 100%; } /* col-12 */
    }
</style>

<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="folder-plus"></i></div>
                            Pedoman Umum Institusi
                        </h1>
                        <div class="page-header-subtitle text-white-50 mt-2">Standar tata naskah, desain logo, dan kerumahtanggaan.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0 rounded-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card-body p-4 p-md-5">
                
                <div class="table-responsive overflow-hidden">
                    <table id="tabelPedoman" class="table table-borderless table-card-wrapper w-100 m-0">
                        <thead class="d-none"><tr><th>Data Pedoman</th></tr></thead>
                        <tbody>
                            <?php if($q_pedoman->num_rows > 0): 
                                // Variasi warna untuk ikon agar tidak membosankan
                                $warna = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
                                $ikon_acak = ['file-signature', 'palette', 'desktop', 'book-reader', 'layer-group', 'shield-alt'];
                                $i = 0;
                                
                                while($row = $q_pedoman->fetch_assoc()): 
                                    $w = $warna[$i % count($warna)];
                                    $ikon = $ikon_acak[$i % count($ikon_acak)];
                                    $i++;
                            ?>
                                <tr>
                                    <td>
                                        <div class="card border-0 shadow-sm h-100 py-4 lift rounded-4 border-bottom border-<?= $w ?> border-4">
                                            <div class="card-body text-center d-flex flex-column">
                                                
                                                <div class="icon-stack icon-stack-xl bg-<?= $w ?>-soft text-<?= $w ?> mb-3 mx-auto flex-shrink-0">
                                                    <i class="fas fa-<?= $ikon ?>"></i>
                                                </div>
                                                
                                                <h5 class="fw-bold text-dark fs-6 mb-2"><?= htmlspecialchars($row['judul_arsip']) ?></h5>
                                                
                                                <p class="small text-muted mb-4 flex-grow-1" style="line-height: 1.6;">
                                                    <?= nl2br(htmlspecialchars($row['keterangan'])) ?>
                                                </p>
                                                
                                                <div class="mt-auto">
                                                    <?php if(!empty($row['file_lampiran'])): ?>
                                                        <a href="uploads/sekretariat/dokumen/<?= htmlspecialchars($row['file_lampiran']) ?>" target="_blank" download class="btn btn-sm btn-outline-<?= $w ?> rounded-pill px-4 fw-bold shadow-sm w-100">
                                                            <i class="fas fa-download me-1"></i>Unduh PDF
                                                        </a>
                                                    <?php else: ?>
                                                        <button class="btn btn-sm btn-light text-muted rounded-pill px-4 w-100 disabled">Tidak Ada File</button>
                                                    <?php endif; ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; endif; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</main>

<script>
    if (typeof feather !== 'undefined') feather.replace();
    if (typeof AOS !== 'undefined') AOS.init({ duration: 800, once: true });

    document.addEventListener("DOMContentLoaded", function() {
        if ($.fn.DataTable.isDataTable('#tabelPedoman')) { $('#tabelPedoman').DataTable().destroy(); }
        
        $('#tabelPedoman').DataTable({
            "ordering": false,
            "pageLength": 6, // Tampilkan 6 kartu per halaman
            "lengthMenu": [[6, 12, 24, -1], [6, 12, 24, "Semua"]],
            // DOM Layout Bootstrap 5 standar untuk presisi Search dan Pagination
            "dom": "<'row mb-4 align-items-center'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row mt-4 align-items-center'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "language": {
                "search": "",
                "searchPlaceholder": "Cari pedoman...",
                "lengthMenu": "Tampilkan _MENU_",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ pedoman",
                "infoEmpty": "Tidak ada data pedoman",
                "zeroRecords": "Pedoman tidak ditemukan.",
                "paginate": { "first": "Awal", "last": "Akhir", "next": "Berikutnya", "previous": "Sebelumnya" }
            }
        });
    });
</script>
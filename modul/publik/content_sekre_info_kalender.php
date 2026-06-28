<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
$q_kalender = $koneksi->query("SELECT * FROM sekretariat_arsip WHERE kategori_arsip = 'kalender_akademik' ORDER BY tanggal DESC");
?>

<style>
    /* PENYESUAIAN CSS UNTUK TATA LETAK DATATABLES PADA LIST GROUP */
    .table-list-wrapper td { padding: 0 !important; border: none !important; background: transparent !important; }
    .table-list-wrapper tr { background: transparent !important; }
    
    .dataTables_filter { float: right !important; text-align: right !important; }
    .dataTables_filter input { border-radius: 50px !important; padding: 0.4rem 1rem !important; border: 1px solid #ced4da; margin-left: 10px; outline: none; }
    .dataTables_length { float: left !important; margin-top: 5px; }
    .dataTables_length select { border-radius: 10px !important; padding: 0.3rem; border: 1px solid #ced4da; }
    .dataTables_paginate { float: right !important; margin-top: 10px; }
    .dataTables_info { float: left !important; margin-top: 15px; color: #6c757d !important; font-size: 0.875em; }
    .dataTables_wrapper::after { content: ""; display: table; clear: both; }
</style>

<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white fw-bold">
                            <div class="page-header-icon text-white"><i data-feather="calendar"></i></div>
                            Kalender Kegiatan Institusi
                        </h1>
                        <div class="page-header-subtitle text-white-50 mt-2">Jadwal acara kelembagaan, perayaan hari besar, dan kegiatan tata usaha.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        
        <div class="card shadow-sm border-0 mb-4 bg-light rounded-4" data-aos="fade-up">
            <div class="card-body p-4 p-md-5 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center">
                <div class="mb-3 mb-lg-0">
                    <h5 class="fw-bold text-dark mb-2"><i class="fas fa-graduation-cap text-secondary me-2"></i> Mencari Jadwal Kuliah / Ujian?</h5>
                    <p class="text-muted mb-0" style="line-height: 1.6;">Halaman ini khusus untuk kalender institusi umum. Untuk jadwal akademik, silakan kunjungi Kalender BAAK.</p>
                </div>
                <a href="/FINAL/index.php?module=kalender" class="btn btn-outline-dark rounded-pill px-4 shadow-sm flex-shrink-0 fw-bold py-2">
                    Buka Kalender Akademik
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0 rounded-4 mb-4" data-aos="fade-up" data-aos-delay="50">
            <div class="card-body p-4 bg-white rounded-4">
                <div class="row align-items-end">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <label class="small fw-bold text-muted mb-1"><i class="far fa-calendar-alt me-1"></i> Dari Tanggal</label>
                        <input type="date" id="minDateKalender" class="form-control bg-light">
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <label class="small fw-bold text-muted mb-1"><i class="far fa-calendar-check me-1"></i> Sampai Tanggal</label>
                        <input type="date" id="maxDateKalender" class="form-control bg-light">
                    </div>
                    <div class="col-md-4 text-md-end mt-2 mt-md-0">
                        <button type="button" id="btnResetKalender" class="btn btn-outline-secondary w-100 rounded-pill fw-bold">
                            <i class="fas fa-sync-alt me-2"></i>Reset Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-4">
            <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden border-top border-secondary border-4">
                    <div class="card-header bg-white p-4 border-bottom border-light">
                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-flag text-secondary me-2"></i> Daftar Agenda Kelembagaan</h5>
                    </div>
                    <div class="card-body p-4">
                        <table id="tabelKalender" class="table table-borderless table-list-wrapper w-100">
                            <thead class="d-none"><tr><th>Kegiatan</th></tr></thead>
                            <tbody>
                                <?php if($q_kalender->num_rows > 0): 
                                    $warna = ['secondary', 'primary', 'success', 'danger', 'warning text-dark', 'info'];
                                    $i = 0;
                                    while($row = $q_kalender->fetch_assoc()): 
                                        $w = $warna[$i % count($warna)]; $i++;
                                ?>
                                    <tr>
                                        <td data-sort="<?= date('Y-m-d', strtotime($row['tanggal'])) ?>">
                                            <div class="list-group-item p-4 d-flex align-items-center transition-all border rounded-3 mb-3 shadow-sm bg-white border-start border-4 border-<?= str_replace(' text-dark', '', $w) ?>" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor='#fff'">
                                                
                                                <div class="text-center me-4 pe-4 border-end d-flex flex-column justify-content-center" style="min-width: 110px;">
                                                    <div class="fs-2 fw-black text-dark lh-1 mb-1"><?= date('d', strtotime($row['tanggal'])) ?></div>
                                                    <div class="small text-uppercase text-<?= $w ?> fw-bold"><?= date('M Y', strtotime($row['tanggal'])) ?></div>
                                                </div>
                                                
                                                <div class="flex-grow-1">
                                                    <h6 class="fw-bold text-dark mb-2 fs-5"><?= htmlspecialchars($row['judul_arsip']) ?></h6>
                                                    <p class="text-muted mb-2" style="line-height: 1.6;"><?= nl2br(htmlspecialchars($row['keterangan'])) ?></p>
                                                    
                                                    <?php if(!empty($row['file_lampiran'])): ?>
                                                        <a href="uploads/sekretariat/dokumen/<?= htmlspecialchars($row['file_lampiran']) ?>" target="_blank" download class="btn btn-sm btn-outline-secondary rounded-pill px-3 mt-1 shadow-none fw-500">
                                                            <i class="fas fa-download me-1"></i> Unduh Lampiran
                                                        </a>
                                                    <?php endif; ?>
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
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            if (settings.nTable.id !== 'tabelKalender') return true;
            var min = $('#minDateKalender').val();
            var max = $('#maxDateKalender').val();
            var dateStr = $(settings.aoData[dataIndex].nTr).find('td:eq(0)').attr('data-sort') || "";
            var dateOnly = dateStr.substring(0, 10);

            if (min === '' && max === '') return true;
            if (min === '' && dateOnly <= max) return true;
            if (min <= dateOnly && max === '') return true;
            if (min <= dateOnly && dateOnly <= max) return true;
            return false;
        });

        var tableKal = $('#tabelKalender').DataTable({
            "ordering": false,
            "pageLength": 10,
            "dom": "<'row mb-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row mt-2'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "language": {
                "search": "",
                "searchPlaceholder": "Cari kegiatan...",
                "lengthMenu": "Tampilkan _MENU_",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ kegiatan",
                "infoEmpty": "Tidak ada kalender",
                "zeroRecords": "Kegiatan tidak ditemukan pada rentang waktu ini.",
                "paginate": { "first": "Awal", "last": "Akhir", "next": "Berikutnya", "previous": "Sebelumnya" }
            }
        });

        $('#minDateKalender, #maxDateKalender').on('change', function () { tableKal.draw(); });
        $('#btnResetKalender').on('click', function() {
            $('#minDateKalender').val(''); $('#maxDateKalender').val('');
            tableKal.search('').draw();
        });
    });
</script>
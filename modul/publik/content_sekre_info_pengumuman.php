<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$q_pengumuman = $koneksi->query("SELECT * FROM sekretariat_arsip WHERE kategori_arsip = 'pengumuman' ORDER BY tanggal DESC");
?>

<style>
    /* PENYESUAIAN CSS UNTUK TATA LETAK DATATABLES */
    .table-list-wrapper td { padding: 0 !important; border: none !important; background: transparent !important; }
    .table-list-wrapper tr { background: transparent !important; }
    
    /* Memaksa elemen Search ke pojok kanan */
    .dataTables_filter { float: right !important; text-align: right !important; }
    .dataTables_filter input { border-radius: 50px !important; padding: 0.4rem 1rem !important; border: 1px solid #ced4da; margin-left: 10px; outline: none; }
    
    /* Memaksa elemen Length (Tampilkan) ke pojok kiri */
    .dataTables_length { float: left !important; margin-top: 5px; }
    .dataTables_length select { border-radius: 10px !important; padding: 0.3rem; border: 1px solid #ced4da; }
    
    /* Memaksa Pagination ke pojok kanan bawah */
    .dataTables_paginate { float: right !important; margin-top: 10px; }
    .dataTables_info { float: left !important; margin-top: 15px; color: #6c757d !important; font-size: 0.875em; }
    
    /* Membersihkan Float (Clearfix) agar container tidak bocor */
    .dataTables_wrapper::after { content: ""; display: table; clear: both; }
</style>

<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white fw-bold">
                            <div class="page-header-icon text-white"><i data-feather="bell"></i></div>
                            Pengumuman Resmi Kampus
                        </h1>
                        <div class="page-header-subtitle text-white-50 mt-2">Surat edaran, ketetapan institusi, dan pemberitahuan libur nasional.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        
        <div class="card shadow-sm border-0 rounded-4 mb-4" data-aos="fade-up">
            <div class="card-body p-4 bg-white rounded-4">
                <div class="row align-items-end">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <label class="small fw-bold text-muted mb-1"><i class="far fa-calendar-alt me-1"></i> Mulai Tanggal</label>
                        <input type="date" id="minDate" class="form-control bg-light">
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <label class="small fw-bold text-muted mb-1"><i class="far fa-calendar-check me-1"></i> Sampai Tanggal</label>
                        <input type="date" id="maxDate" class="form-control bg-light">
                    </div>
                    <div class="col-md-4 text-md-end mt-2 mt-md-0">
                        <button type="button" id="btnResetFilter" class="btn btn-outline-secondary w-100 rounded-pill fw-bold">
                            <i class="fas fa-sync-alt me-2"></i>Reset Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0 rounded-4 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
            <div class="card-header bg-white p-4 border-bottom border-light">
                <h5 class="fw-bold text-dark mb-0"><i class="fas fa-bullhorn text-secondary me-2"></i> Papan Edaran Kampus</h5>
            </div>
            
            <div class="card-body p-4">
                <table id="tabelPengumuman" class="table table-borderless table-list-wrapper w-100">
                    <thead class="d-none">
                        <tr><th>Data Pengumuman</th></tr>
                    </thead>
                    <tbody>
                        <?php if($q_pengumuman->num_rows > 0): while($row = $q_pengumuman->fetch_assoc()): ?>
                            <tr>
                                <td data-sort="<?= date('Y-m-d', strtotime($row['tanggal'])) ?>">
                                    <div class="list-group-item p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center transition-all border rounded-3 mb-3 shadow-sm bg-white" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor='#fff'">
                                        <div class="d-flex align-items-start mb-3 mb-md-0">
                                            <div class="icon-stack bg-secondary bg-opacity-10 text-secondary me-4 mt-1 flex-shrink-0 rounded-circle">
                                                <i class="fas fa-exclamation"></i>
                                            </div>
                                            <div>
                                                <h6 class="fw-bold text-dark mb-1 fs-5"><?= htmlspecialchars($row['judul_arsip']) ?></h6>
                                                <p class="text-muted mb-2" style="line-height: 1.6;"><?= nl2br(htmlspecialchars($row['keterangan'])) ?></p>
                                                <div class="badge bg-light text-muted border px-2 py-1"><i class="far fa-calendar-alt me-1"></i> Dipublikasikan: <?= date('d M Y', strtotime($row['tanggal'])) ?></div>
                                            </div>
                                        </div>
                                        
                                        <?php if(!empty($row['file_lampiran'])): ?>
                                            <a href="uploads/sekretariat/dokumen/<?= htmlspecialchars($row['file_lampiran']) ?>" target="_blank" download class="btn btn-outline-secondary btn-sm rounded-pill px-4 flex-shrink-0 fw-bold">
                                                <i class="fas fa-download me-1"></i> Unduh Edaran
                                            </a>
                                        <?php else: ?>
                                            <button class="btn btn-light btn-sm rounded-pill px-4 text-muted disabled flex-shrink-0">Tanpa Lampiran</button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ekstensi Filter Tanggal Custom
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            if (settings.nTable.id !== 'tabelPengumuman') return true;
            
            var min = $('#minDate').val();
            var max = $('#maxDate').val();
            var dateStr = $(settings.aoData[dataIndex].nTr).find('td:eq(0)').attr('data-sort') || "";
            var dateOnly = dateStr.substring(0, 10);

            if (min === '' && max === '') return true;
            if (min === '' && dateOnly <= max) return true;
            if (min <= dateOnly && max === '') return true;
            if (min <= dateOnly && dateOnly <= max) return true;
            return false;
        });

        var table = $('#tabelPengumuman').DataTable({
            "ordering": false,
            "pageLength": 10,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
            // Parameter 'dom' untuk memaksa struktur HTML pembungkus DataTables
            "dom": "<'row mb-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row mt-2'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "language": {
                "search": "",
                "searchPlaceholder": "Cari dokumen pengumuman...",
                "lengthMenu": "Tampilkan _MENU_",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ pengumuman",
                "infoEmpty": "Tidak ada pengumuman",
                "zeroRecords": "Dokumen yang dicari tidak ditemukan.",
                "paginate": { "first": "Awal", "last": "Akhir", "next": "Berikutnya", "previous": "Sebelumnya" }
            }
        });

        $('#minDate, #maxDate').on('change', function () { table.draw(); });
        $('#btnResetFilter').on('click', function() {
            $('#minDate').val(''); $('#maxDate').val('');
            table.search('').draw();
        });
    });
</script>
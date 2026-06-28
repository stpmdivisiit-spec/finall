<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Tarik data arsip dengan kategori 'formulir'
$q_form = $koneksi->query("SELECT * FROM sekretariat_arsip WHERE kategori_arsip = 'formulir' ORDER BY judul_arsip ASC");
?>

<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="file-text"></i></div>
                            Formulir Tata Usaha
                        </h1>
                        <div class="page-header-subtitle text-white-50">Kumpulan berkas dan borang permohonan administrasi cetak.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-white p-4 border-bottom">
                <h5 class="fw-bold text-dark mb-0"><i class="fas fa-copy text-secondary me-2"></i>Database Formulir Kosong</h5>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table id="tabelFormSekre" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted text-uppercase">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="45%">Nama Formulir / Dokumen</th>
                                <th width="20%" class="text-center">Peruntukan (Keterangan)</th>
                                <th width="15%" class="text-center">Format File</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; if($q_form->num_rows > 0): while($row = $q_form->fetch_assoc()): 
                                // Ekstrak format file (PDF/Docx)
                                $ext = empty($row['file_lampiran']) ? '-' : strtoupper(pathinfo($row['file_lampiran'], PATHINFO_EXTENSION));
                                $bg_badge = ($ext == 'PDF') ? 'danger' : (($ext == 'DOCX' || $ext == 'DOC') ? 'primary' : 'secondary');
                            ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="fw-bold text-dark fs-6"><?= htmlspecialchars($row['judul_arsip']) ?></td>
                                <td class="text-center text-muted"><?= htmlspecialchars($row['keterangan']) ?: 'Umum' ?></td>
                                <td class="text-center"><span class="badge bg-<?= $bg_badge ?>-soft text-<?= $bg_badge ?> px-2 py-1"><?= $ext ?></span></td>
                                <td class="text-center">
                                    <?php if(!empty($row['file_lampiran'])): ?>
                                        <a href="uploads/sekretariat/dokumen/<?= htmlspecialchars($row['file_lampiran']) ?>" download class="btn btn-xs btn-secondary px-3 rounded-pill small fw-bold">
                                            <i class="fas fa-download me-1"></i>Unduh
                                        </a>
                                    <?php endif; ?>
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
    
    document.addEventListener("DOMContentLoaded", function() {
        if ($.fn.DataTable.isDataTable('#tabelFormSekre')) { $('#tabelFormSekre').DataTable().destroy(); }
        var table = $('#tabelFormSekre').DataTable({
            "paging": true, "ordering": true, "info": true, "searching": true, "responsive": true,
            "pageLength": 10, "columnDefs": [ { "orderable": false, "targets": [0, 4] } ],
            // Bootstrap 5 DataTables DOM Layout
            "dom": "<'row mb-3 align-items-center'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row mt-3 align-items-center'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "language": { 
                "search": "", 
                "searchPlaceholder": "Cari Nama Formulir...",
                "lengthMenu": "Tampilkan _MENU_ Formulir",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ Formulir",
                "paginate": { "first": "Awal", "last": "Akhir", "next": "Berikutnya", "previous": "Sebelumnya" }
            }
        });
        
        table.on('order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) { cell.innerHTML = i + 1; });
        }).draw();
        
        // Custom styling untuk Search Box
        $('.dataTables_filter input').addClass('rounded-pill px-3 py-2');
    });
</script>
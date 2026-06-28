<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Tarik data arsip dengan kategori 'sk_ketua'
$q_sk = $koneksi->query("SELECT * FROM sekretariat_arsip WHERE kategori_arsip = 'sk_ketua' ORDER BY tanggal DESC");
?>

<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="award"></i></div>
                            Surat Keputusan (SK) Ketua
                        </h1>
                        <div class="page-header-subtitle text-white-50">Arsip publik Surat Keputusan Pimpinan STPM Santa Ursula yang bersifat terbuka.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table id="tabelSK" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted text-uppercase">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="65%">Nomor & Perihal SK</th>
                                <th width="15%" class="text-center">Tgl. Ditetapkan</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; if($q_sk->num_rows > 0): while($row = $q_sk->fetch_assoc()): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td>
                                    <div class="fw-bold text-dark fs-6"><?= htmlspecialchars($row['judul_arsip']) ?></div>
                                    <div class="text-muted small mt-1"><?= htmlspecialchars($row['keterangan']) ?></div>
                                </td>
                                <td class="text-center fw-bold text-dark"><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                                <td class="text-center">
                                    <?php if(!empty($row['file_lampiran'])): ?>
                                        <a href="uploads/sekretariat/dokumen/<?= htmlspecialchars($row['file_lampiran']) ?>" target="_blank" download class="btn btn-xs btn-secondary px-3 rounded-pill small fw-bold">
                                            <i class="fas fa-download me-1"></i>Unduh
                                        </a>
                                    <?php else: ?>
                                        <span class="badge bg-light text-muted border">Tidak Ada File</span>
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
        if ($.fn.DataTable.isDataTable('#tabelSK')) { $('#tabelSK').DataTable().destroy(); }
        var table = $('#tabelSK').DataTable({
            "paging": true, "ordering": true, "info": true, "searching": true, "responsive": true,
            "pageLength": 10, 
            "columnDefs": [ { "orderable": false, "targets": [0, 3] } ],
            "dom": "<'row mb-3 align-items-center'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row mt-3 align-items-center'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "language": { 
                "search": "", 
                "searchPlaceholder": "Cari Nomor/Judul SK...",
                "lengthMenu": "Tampilkan _MENU_ SK",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ SK",
                "paginate": { "first": "Awal", "last": "Akhir", "next": "Berikutnya", "previous": "Sebelumnya" }
            }
        });
        
        table.on('order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) { cell.innerHTML = i + 1; });
        }).draw();
        
        $('.dataTables_filter input').addClass('rounded-pill px-3 py-2');
    });
</script>
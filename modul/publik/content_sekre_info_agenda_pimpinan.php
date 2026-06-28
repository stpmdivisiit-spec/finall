<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
$q_agenda = $koneksi->query("SELECT * FROM sekretariat_arsip WHERE kategori_arsip = 'agenda_pimpinan' ORDER BY tanggal DESC");
?>

<style>
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
                            <div class="page-header-icon text-white"><i data-feather="users"></i></div>
                            Agenda Pimpinan
                        </h1>
                        <div class="page-header-subtitle text-white-50 mt-2">Transparansi jadwal kegiatan dinas dan audiensi Ketua STPM Santa Ursula.</div>
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
                        <input type="date" id="minDateAgenda" class="form-control bg-light">
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <label class="small fw-bold text-muted mb-1"><i class="far fa-calendar-check me-1"></i> Sampai Tanggal</label>
                        <input type="date" id="maxDateAgenda" class="form-control bg-light">
                    </div>
                    <div class="col-md-4 text-md-end mt-2 mt-md-0">
                        <button type="button" id="btnResetAgenda" class="btn btn-outline-secondary w-100 rounded-pill fw-bold">
                            <i class="fas fa-sync-alt me-2"></i>Reset Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-4">
            <div class="col-lg-8 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm border-0 h-100 rounded-4 overflow-hidden border-top border-dark border-4">
                    <div class="card-header bg-white text-dark p-4 border-bottom">
                        <h5 class="fw-bold mb-0"><i class="fas fa-calendar-week text-secondary me-2"></i> Rekapitulasi Jadwal Rektorat</h5>
                    </div>
                    <div class="card-body p-4">
                        <table id="tabelAgenda" class="table table-hover align-middle mb-0 w-100">
                            <thead class="bg-light text-muted small text-uppercase">
                                <tr>
                                    <th width="20%" class="text-center">Tanggal</th>
                                    <th width="80%">Detail Agenda & Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if($q_agenda->num_rows > 0): 
                                    $hari_indo = ['Sunday'=>'Minggu', 'Monday'=>'Senin', 'Tuesday'=>'Selasa', 'Wednesday'=>'Rabu', 'Thursday'=>'Kamis', 'Friday'=>'Jumat', 'Saturday'=>'Sabtu'];
                                    while($row = $q_agenda->fetch_assoc()): 
                                        $tgl = strtotime($row['tanggal']);
                                        $nama_hari = $hari_indo[date('l', $tgl)];
                                ?>
                                    <tr>
                                        <td data-sort="<?= date('Y-m-d', $tgl) ?>" class="bg-light text-center fw-bold text-secondary border-end border-bottom" style="vertical-align: middle;">
                                            <span class="fs-6 d-block text-dark"><?= $nama_hari ?></span>
                                            <small class="text-muted"><?= date('d M Y', $tgl) ?></small>
                                        </td>
                                        <td class="p-4 border-bottom">
                                            <div class="fw-bold text-dark fs-6 mb-1"><?= htmlspecialchars($row['judul_arsip']) ?></div>
                                            <div class="text-muted mb-2" style="line-height: 1.5; font-size: 0.95rem;"><?= nl2br(htmlspecialchars($row['keterangan'])) ?></div>
                                            
                                            <?php if(!empty($row['file_lampiran'])): ?>
                                                <a href="uploads/sekretariat/dokumen/<?= htmlspecialchars($row['file_lampiran']) ?>" target="_blank" class="badge bg-secondary text-white text-decoration-none py-2 px-3 mt-1 shadow-sm"><i class="fas fa-paperclip me-1"></i> Lihat Undangan / Lampiran</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endwhile; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4" data-aos="fade-left" data-aos-delay="200">
                <div class="card shadow-sm border-0 h-100 bg-light text-center p-5 d-flex flex-column justify-content-center rounded-4">
                    <i class="fas fa-calendar-check fa-4x text-secondary mb-4 opacity-50"></i>
                    <h4 class="fw-bold text-dark mb-3">Permohonan Audiensi</h4>
                    <p class="text-muted mb-4" style="line-height: 1.6;">Bagi instansi luar atau mahasiswa yang ingin menjadwalkan pertemuan resmi dengan Ketua STPM, silakan mengajukan surat permohonan ke loket Sekretariat minimal <strong>H-3</strong>.</p>
                    <a href="/FINAL/index.php?module=sekre_layanan_surat" class="btn btn-secondary rounded-pill fw-bold shadow-sm py-2">
                        <i class="fas fa-envelope-open-text me-2"></i>Ajukan Surat Audiensi
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            if (settings.nTable.id !== 'tabelAgenda') return true;
            var min = $('#minDateAgenda').val();
            var max = $('#maxDateAgenda').val();
            var dateStr = $(settings.aoData[dataIndex].nTr).find('td:eq(0)').attr('data-sort') || "";
            var dateOnly = dateStr.substring(0, 10);

            if (min === '' && max === '') return true;
            if (min === '' && dateOnly <= max) return true;
            if (min <= dateOnly && max === '') return true;
            if (min <= dateOnly && dateOnly <= max) return true;
            return false;
        });

        var tableAgenda = $('#tabelAgenda').DataTable({
            "ordering": false,
            "pageLength": 10,
            "dom": "<'row mb-3'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row mt-2'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "language": {
                "search": "",
                "searchPlaceholder": "Cari nama agenda...",
                "lengthMenu": "Tampilkan _MENU_",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ agenda",
                "infoEmpty": "Tidak ada agenda",
                "zeroRecords": "Agenda tidak ditemukan pada rentang waktu ini.",
                "paginate": { "first": "Awal", "last": "Akhir", "next": "Berikutnya", "previous": "Sebelumnya" }
            }
        });

        $('#minDateAgenda, #maxDateAgenda').on('change', function () { tableAgenda.draw(); });
        $('#btnResetAgenda').on('click', function() {
            $('#minDateAgenda').val(''); $('#maxDateAgenda').val('');
            tableAgenda.search('').draw();
        });
    });
</script>
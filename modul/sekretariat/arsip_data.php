<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
// C:\xampp\htdocs\FINAL\modul\sekretariat\arsip_data.php

$kategori = $_GET['kat'] ?? 'surat_menyurat';
$judul_halaman = ucwords(str_replace('_', ' ', $kategori));

// Proses Update Status Permohonan
if (isset($_POST['update_status'])) {
    $id_permohonan = (int)$_POST['id_permohonan'];
    $status_baru = $koneksi->real_escape_string($_POST['status_surat']);
    
    $koneksi->query("UPDATE sekretariat_permohonan_surat SET status='$status_baru' WHERE id='$id_permohonan'");
    setFlashMessage('success', 'Status permohonan surat berhasil diperbarui!');
    header("Location: index.php?module=sekretariat&act=arsip&kat=$kategori"); exit;
}

// Proses Hapus Permohonan
if (isset($_GET['hapus_permohonan'])) {
    $id = (int)$_GET['hapus_permohonan'];
    $koneksi->query("DELETE FROM sekretariat_permohonan_surat WHERE id='$id'");
    setFlashMessage('success', 'Permohonan surat berhasil dihapus dari sistem!');
    header("Location: index.php?module=sekretariat&act=arsip&kat=$kategori"); exit;
}

// Tarik data permohonan dari database
$query_surat = $koneksi->query("SELECT * FROM sekretariat_permohonan_surat ORDER BY tanggal_pengajuan DESC");
?>

<style>
    /* Styling Kustom Untuk DataTables */
    .dt-buttons .btn {
        margin-right: 5px;
        margin-bottom: 10px;
        border-radius: 5px !important;
    }
    .dataTables_filter input {
        border-radius: 20px;
        padding: 5px 15px;
        border: 1px solid #ced4da;
    }
    .dataTables_length select {
        border-radius: 5px;
    }
</style>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content pt-3 pb-3">
            <h1 class="page-header-title fw-bold text-dark">
                <div class="page-header-icon"><i class="fas fa-envelope-open-text text-secondary"></i></div>
                Kelola Daftar Permohonan <?= $judul_halaman ?>
            </h1>
        </div>
    </div>
</header>

<div class="container-fluid px-4">
    
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5 border-top border-secondary border-4">
        <div class="card-header bg-white text-dark py-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="fw-bold fs-5"><i class="fas fa-inbox me-2 text-secondary"></i> Antrean Surat Masuk</span>
                <span class="badge bg-secondary bg-opacity-10 text-secondary border">Total: <?= $query_surat->num_rows ?> Permohonan</span>
            </div>
            
            <!-- FORM RENTANG TANGGAL (DATE RANGE FILTER) -->
            <div class="row bg-light p-3 rounded-3 border align-items-end gx-3">
                <div class="col-md-4 mb-3 mb-md-0">
                    <label class="small fw-bold text-muted mb-1">Mulai Tanggal:</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="far fa-calendar-alt"></i></span>
                        <input type="date" id="min_date" class="form-control" placeholder="Pilih tanggal awal">
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <label class="small fw-bold text-muted mb-1">Sampai Tanggal:</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="far fa-calendar-check"></i></span>
                        <input type="date" id="max_date" class="form-control" placeholder="Pilih tanggal akhir">
                    </div>
                </div>
                <div class="col-md-4">
                    <button id="btn_reset_filter" class="btn btn-outline-secondary w-100 fw-bold">
                        <i class="fas fa-sync-alt me-1"></i> Reset Filter
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <!-- Tambahkan ID 'tablePermohonan' agar bisa dieksekusi DataTables -->
                <table id="tablePermohonan" class="table table-hover align-middle mb-0 w-100">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th class="px-4 py-3" width="15%">Waktu Masuk</th>
                            <th width="20%">Data Mahasiswa</th>
                            <th width="40%">Rincian Pengajuan Surat</th>
                            <th width="12%" class="text-center">Status</th>
                            <th class="text-center px-4" width="13%">Tinjauan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($query_surat->num_rows > 0): while($row = $query_surat->fetch_assoc()): ?>
                        <tr>
                            <!-- 1. TANGGAL & WAKTU (Gunakan data-sort untuk pengurutan DataTables yg presisi) -->
                            <td class="px-4" data-sort="<?= date('Y-m-d H:i:s', strtotime($row['tanggal_pengajuan'])) ?>">
                                <span class="fw-bold text-dark"><?= date('d M Y', strtotime($row['tanggal_pengajuan'])) ?></span><br>
                                <span class="small text-muted"><i class="far fa-clock me-1"></i><?= date('H:i', strtotime($row['tanggal_pengajuan'])) ?> WITA</span>
                            </td>
                            
                            <!-- 2. DATA IDENTITAS PEMOHON -->
                            <td>
                                <div class="fw-bold text-primary fs-6 mb-1"><?= htmlspecialchars($row['nama_lengkap']) ?></div>
                                <div class="small text-dark fw-500 mb-1">NIM: <?= htmlspecialchars($row['nim']) ?></div>
                                <?php if(!empty($row['program_studi'])): ?>
                                    <div class="small text-muted border-top pt-1 mt-1">
                                        <i class="fas fa-graduation-cap me-1 text-secondary"></i> <?= htmlspecialchars($row['program_studi']) ?>
                                        <?php if(!empty($row['semester'])): ?> (Sem. <?= htmlspecialchars($row['semester']) ?>) <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            
                            <!-- 3. RINCIAN DATA KONDISIONAL SURAT -->
                            <td>
                                <span class="badge bg-secondary text-white mb-2 py-2 px-3 text-wrap" style="text-align: left; font-size: 0.75rem;">
                                    <i class="fas fa-file-alt me-1"></i> <?= htmlspecialchars(str_replace('_', ' ', strtoupper($row['jenis_surat']))) ?>
                                </span>
                                
                                <div class="bg-light p-3 rounded-3 border-start border-secondary border-3 small text-dark" style="line-height: 1.6;">
                                    <div class="mb-1"><strong>Tujuan / Keperluan:</strong> <span class="text-muted"><?= htmlspecialchars($row['keperluan']) ?></span></div>
                                    
                                    <?php if(!empty($row['tempat_tanggal_lahir'])): ?>
                                        <div class="mb-1"><strong>TTL:</strong> <span class="text-muted"><?= htmlspecialchars($row['tempat_tanggal_lahir']) ?></span></div>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($row['lokasi_pelaksanaan'])): ?>
                                        <div class="mb-1"><strong>Lokasi Instansi/Riset:</strong> <span class="text-muted"><?= htmlspecialchars($row['lokasi_pelaksanaan']) ?></span></div>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($row['nama_dpa'])): ?>
                                        <div class="mb-1"><strong>Nama DPA:</strong> <span class="text-muted"><?= htmlspecialchars($row['nama_dpa']) ?></span></div>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($row['waktu_pelaksanaan'])): ?>
                                        <div class="mb-1"><strong>Waktu Pelaksanaan:</strong> <span class="text-muted"><?= htmlspecialchars($row['waktu_pelaksanaan']) ?></span></div>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($row['judul_penelitian'])): ?>
                                        <div class="mb-1"><strong>Judul Penelitian:</strong> <span class="text-muted fst-italic">"<?= htmlspecialchars($row['judul_penelitian']) ?>"</span></div>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($row['peserta'])): ?>
                                        <div class="mt-2 pt-2 border-top border-gray-300">
                                            <strong>Daftar Anggota / Peserta:</strong><br>
                                            <span class="text-muted"><?= nl2br(htmlspecialchars($row['peserta'])) ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </td>
                            
                            <!-- 4. STATUS PERMOHONAN -->
                            <td class="text-center">
                                <?php 
                                    $bg_status = 'warning'; $txt_status = 'dark'; $icon_status = 'fa-clock';
                                    if ($row['status'] == 'Diproses') { $bg_status = 'info'; $txt_status = 'white'; $icon_status = 'fa-sync fa-spin'; }
                                    elseif ($row['status'] == 'Selesai') { $bg_status = 'success'; $txt_status = 'white'; $icon_status = 'fa-check-circle'; }
                                    elseif ($row['status'] == 'Ditolak') { $bg_status = 'danger'; $txt_status = 'white'; $icon_status = 'fa-times-circle'; }
                                ?>
                                <span class="badge bg-<?= $bg_status ?> text-<?= $txt_status ?> px-3 py-2 fw-bold shadow-sm">
                                    <i class="fas <?= $icon_status ?> me-1"></i> <?= $row['status'] ?>
                                </span>
                            </td>
                            
                            <!-- 5. AKSI -->
                            <td class="text-center px-4">
                                <button type="button" class="btn btn-sm btn-outline-primary rounded-circle me-1 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalStatus<?= $row['id'] ?>" title="Proses & Update Status Surat">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <a href="index.php?module=sekretariat&act=arsip&kat=<?= $kategori ?>&hapus_permohonan=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-circle shadow-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus permohonan surat ini secara permanen?')" title="Hapus Permohonan">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ========================================================================= -->
<!-- PEMANGGILAN KOMPONEN MODAL -->
<!-- ========================================================================= -->
<?php 
if($query_surat->num_rows > 0): 
    $query_surat->data_seek(0); 
    while($row = $query_surat->fetch_assoc()): 
        $jenis_modal = 'backend_status_surat';
        include 'komponen_modal.php'; 
    endwhile; 
endif; 
?>

<!-- ========================================================================= -->
<!-- SCRIPT INITIALISASI DATATABLES, BUTTONS EXPORT, DAN FILTER RENTANG TANGGAL-->
<!-- ========================================================================= -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    
    // 1. Ekstensi Kustom DataTables Untuk Menyaring Rentang Tanggal
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        var minDateStr = $('#min_date').val();
        var maxDateStr = $('#max_date').val();
        
        // Ambil tanggal mentah dari atribut data-sort pada kolom pertama (index 0)
        var rowDateStr = $('#tablePermohonan').DataTable().row(dataIndex).node().querySelector('td:eq(0)').getAttribute('data-sort');
        
        if (!rowDateStr) return true; // Jika tidak ada tanggal, tampilkan baris
        
        var dateVal = new Date(rowDateStr);
        var minDate = minDateStr ? new Date(minDateStr) : null;
        var maxDate = maxDateStr ? new Date(maxDateStr) : null;
        
        // Set jam ke 00:00:00 untuk perbandingan yang akurat
        dateVal.setHours(0,0,0,0);
        if (minDate) minDate.setHours(0,0,0,0);
        if (maxDate) maxDate.setHours(23,59,59,999);

        // Logika Perbandingan
        if (
            (minDate === null && maxDate === null) ||
            (minDate === null && dateVal <= maxDate) ||
            (minDate <= dateVal && maxDate === null) ||
            (minDate <= dateVal && dateVal <= maxDate)
        ) {
            return true;
        }
        return false;
    });

    // 2. Inisialisasi DataTables Bersama Ekstensi Buttons Export
    var table = $('#tablePermohonan').DataTable({
        responsive: true,
        ordering: true, // Mengaktifkan Short List (Asc/Desc)
        order: [[0, 'desc']], // Default: Urutkan Tanggal Masuk paling baru
        pageLength: 10,
        lengthMenu: [10, 25, 50, 100],
        language: {
            search: "Cari Data:",
            lengthMenu: "Tampilkan _MENU_ baris",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Data tidak ditemukan",
            zeroRecords: "Pencarian tidak menemukan hasil."
        },
        dom: "<'row mb-3'<'col-md-4'l><'col-md-4 text-center'B><'col-md-4'f>>" +
             "<'row'<'col-md-12'tr>>" +
             "<'row mt-3'<'col-md-5'i><'col-md-7'p>>",
        buttons: [
            { extend: 'copy', className: 'btn btn-secondary btn-sm', text: '<i class="fas fa-copy"></i> Copy' },
            { extend: 'csv', className: 'btn btn-success btn-sm', text: '<i class="fas fa-file-csv"></i> CSV' },
            { extend: 'excel', className: 'btn btn-success btn-sm', text: '<i class="fas fa-file-excel"></i> Excel' },
            { extend: 'pdf', className: 'btn btn-danger btn-sm', text: '<i class="fas fa-file-pdf"></i> PDF' },
            { extend: 'print', className: 'btn btn-primary btn-sm', text: '<i class="fas fa-print"></i> Print' }
        ]
    });

    // 3. Event Listener: Trigger filter saat input rentang tanggal diisi
    $('#min_date, #max_date').on('change', function () {
        table.draw();
    });

    // 4. Event Listener: Tombol Reset
    $('#btn_reset_filter').on('click', function() {
        $('#min_date').val('');
        $('#max_date').val('');
        table.search(''); // Reset form pencarian bawaan datatables
        table.draw();
    });

});
</script>
<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

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

// Proses Hapus Permohonan (beserta file bukti SPP-nya)
if (isset($_GET['hapus_permohonan'])) {
    $id = (int)$_GET['hapus_permohonan'];
    $data = $koneksi->query("SELECT file_bukti_spp FROM sekretariat_permohonan_surat WHERE id='$id'")->fetch_assoc();
    
    if ($data && !empty($data['file_bukti_spp'])) {
        $file_path = 'uploads/sekretariat/bukti_spp/' . $data['file_bukti_spp'];
        if (file_exists($file_path)) unlink($file_path);
    }
    
    $koneksi->query("DELETE FROM sekretariat_permohonan_surat WHERE id='$id'");
    setFlashMessage('success', 'Permohonan surat berhasil dihapus dari sistem!');
    header("Location: index.php?module=sekretariat&act=arsip&kat=$kategori"); exit;
}

// Tarik data permohonan dari database
$query_surat = $koneksi->query("SELECT * FROM sekretariat_permohonan_surat ORDER BY tanggal_pengajuan DESC");
?>

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
        <div class="card-header bg-white text-dark d-flex justify-content-between align-items-center py-3">
            <span class="fw-bold"><i class="fas fa-inbox me-2 text-secondary"></i> Antrean Surat Masuk dari Mahasiswa</span>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th class="px-4 py-3" width="15%">Tanggal Masuk</th>
                            <th width="30%">Identitas Pemohon</th>
                            <th width="30%">Jenis Surat & Keperluan</th>
                            <th width="10%" class="text-center">Status</th>
                            <th class="text-center px-4" width="15%">Aksi / Tinjauan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // LOOPING PERTAMA: HANYA MENCETAK BARIS TABEL (TR & TD)
                        if($query_surat->num_rows > 0): 
                            while($row = $query_surat->fetch_assoc()): 
                        ?>
                        <tr>
                            <td class="px-4">
                                <span class="fw-bold text-dark"><?= date('d M Y', strtotime($row['tanggal_pengajuan'])) ?></span><br>
                                <span class="small text-muted"><?= date('H:i', strtotime($row['tanggal_pengajuan'])) ?> WITA</span>
                            </td>
                            <td>
                                <div class="fw-bold text-primary"><?= htmlspecialchars($row['nama_lengkap']) ?></div>
                                <div class="small text-muted fw-500">NIM: <?= htmlspecialchars($row['nim']) ?></div>
                            </td>
                            <td>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary border mb-1" style="white-space: normal; text-align: left;"><?= htmlspecialchars($row['jenis_surat']) ?></span>
                                <div class="small text-muted line-clamp-2"><?= htmlspecialchars($row['keperluan']) ?></div>
                            </td>
                            <td class="text-center">
                                <?php 
                                    $bg_status = 'warning'; $txt_status = 'dark';
                                    if ($row['status'] == 'Diproses') { $bg_status = 'info'; $txt_status = 'white'; }
                                    elseif ($row['status'] == 'Selesai') { $bg_status = 'success'; $txt_status = 'white'; }
                                    elseif ($row['status'] == 'Ditolak') { $bg_status = 'danger'; $txt_status = 'white'; }
                                ?>
                                <span class="badge bg-<?= $bg_status ?> text-<?= $txt_status ?> px-2 py-1"><?= $row['status'] ?></span>
                            </td>
                            <td class="text-center px-4">
                                <a href="uploads/sekretariat/bukti_spp/<?= htmlspecialchars($row['file_bukti_spp']) ?>" target="_blank" class="btn btn-sm btn-outline-secondary rounded-pill me-1" title="Cek Bukti SPP">
                                    <i class="fas fa-file-pdf"></i> Cek
                                </a>
                                
                                <button class="btn btn-sm btn-outline-primary rounded-pill me-1" data-bs-toggle="modal" data-bs-target="#modalStatus<?= $row['id'] ?>" title="Proses Surat">
                                    <i class="fas fa-cog"></i>
                                </button>
                                
                                <a href="index.php?module=sekretariat&act=arsip&kat=<?= $kategori ?>&hapus_permohonan=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Hapus permohonan ini?')" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; else: ?>
                            <tr><td colspan="5" class="text-center py-5 text-muted"><i class="far fa-envelope-open fa-3x mb-3 opacity-25 d-block"></i>Belum ada permohonan surat masuk.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
if($query_surat->num_rows > 0): 
    // Kembalikan penunjuk array database ke indeks 0 agar bisa di-looping lagi
    $query_surat->data_seek(0); 
    while($row = $query_surat->fetch_assoc()): 
?>
<div class="modal fade" id="modalStatus<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <form action="" method="POST" class="modal-content border-0 shadow-lg rounded-4">
            <input type="hidden" name="id_permohonan" value="<?= $row['id'] ?>">
            
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title fw-bold">Update Status Surat</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            
            <div class="modal-body p-4 bg-light text-start">
                <p class="small text-muted text-center mb-3">Pilih status proses untuk permohonan surat dari <strong class="text-dark"><?= htmlspecialchars($row['nama_lengkap']) ?></strong>.</p>
                
                <div class="mb-3">
                    <select class="form-select form-select-lg shadow-sm" name="status_surat" required>
                        <option value="Menunggu" <?= ($row['status'] == 'Menunggu') ? 'selected' : '' ?>>🟡 Menunggu Antrean</option>
                        <option value="Diproses" <?= ($row['status'] == 'Diproses') ? 'selected' : '' ?>>🔵 Sedang Diproses</option>
                        <option value="Selesai" <?= ($row['status'] == 'Selesai') ? 'selected' : '' ?>>🟢 Selesai (Bisa Diambil)</option>
                        <option value="Ditolak" <?= ($row['status'] == 'Ditolak') ? 'selected' : '' ?>>🔴 Ditolak (Ada Tunggakan)</option>
                    </select>
                </div>
            </div>
            
            <div class="modal-footer bg-white border-0">
                <button type="submit" name="update_status" class="btn btn-primary w-100 fw-bold rounded-pill shadow-sm">Simpan Status</button>
            </div>
        </form>
    </div>
</div>
<?php 
    endwhile; 
endif; 
?>
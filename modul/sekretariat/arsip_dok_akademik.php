<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$upload_dir = 'uploads/sekretariat/dok_akademik/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

// 1. PROSES UPDATE TEKS PROSEDUR LEGALISIR
if (isset($_POST['update_info_legalisir'])) {
    $deskripsi = $koneksi->real_escape_string($_POST['deskripsi_prosedur']);
    $s1_j = $koneksi->real_escape_string($_POST['step1_judul']);
    $s1_d = $koneksi->real_escape_string($_POST['step1_deskripsi']);
    $s2_j = $koneksi->real_escape_string($_POST['step2_judul']);
    $s2_d = $koneksi->real_escape_string($_POST['step2_deskripsi']);
    $s3_j = $koneksi->real_escape_string($_POST['step3_judul']);
    $s3_d = $koneksi->real_escape_string($_POST['step3_deskripsi']);
    $catatan = $koneksi->real_escape_string($_POST['catatan_penting']);

    $koneksi->query("UPDATE sekretariat_info_legalisir SET deskripsi_prosedur='$deskripsi', step1_judul='$s1_j', step1_deskripsi='$s1_d', step2_judul='$s2_j', step2_deskripsi='$s2_d', step3_judul='$s3_j', step3_deskripsi='$s3_d', catatan_penting='$catatan' WHERE id=1");
    setFlashMessage('success', 'Informasi Prosedur Legalisir berhasil diperbarui!');
    header("Location: index.php?module=sekretariat&act=arsip&kat=dok_akademik"); exit;
}

// 2. PROSES UPLOAD DOKUMEN AKADEMIK BARU
if (isset($_POST['upload_dokumen'])) {
    $judul = $koneksi->real_escape_string($_POST['judul_dokumen']);
    $kategori = $koneksi->real_escape_string($_POST['kategori_dokumen']);
    
    if (isset($_FILES['file_dokumen']) && $_FILES['file_dokumen']['error'] == 0) {
        $ext = pathinfo($_FILES['file_dokumen']['name'], PATHINFO_EXTENSION);
        $nama_file = 'DOK_AKD_' . time() . '.' . $ext;
        
        if (move_uploaded_file($_FILES['file_dokumen']['tmp_name'], $upload_dir . $nama_file)) {
            $koneksi->query("INSERT INTO sekretariat_dokumen_akademik (judul_dokumen, kategori_dokumen, file_dokumen) VALUES ('$judul', '$kategori', '$nama_file')");
            setFlashMessage('success', 'Dokumen Akademik berhasil dipublikasikan!');
        }
    }
    header("Location: index.php?module=sekretariat&act=arsip&kat=dok_akademik"); exit;
}

// 3. PROSES HAPUS DOKUMEN
if (isset($_GET['hapus_dokumen'])) {
    $id = (int)$_GET['hapus_dokumen'];
    $data = $koneksi->query("SELECT file_dokumen FROM sekretariat_dokumen_akademik WHERE id='$id'")->fetch_assoc();
    if ($data && file_exists($upload_dir . $data['file_dokumen'])) {
        unlink($upload_dir . $data['file_dokumen']);
    }
    $koneksi->query("DELETE FROM sekretariat_dokumen_akademik WHERE id='$id'");
    setFlashMessage('success', 'Dokumen Akademik berhasil dihapus!');
    header("Location: index.php?module=sekretariat&act=arsip&kat=dok_akademik"); exit;
}

// Tarik Data
$info_leg = $koneksi->query("SELECT * FROM sekretariat_info_legalisir WHERE id=1")->fetch_assoc();
$q_dok = $koneksi->query("SELECT * FROM sekretariat_dokumen_akademik ORDER BY tanggal_upload DESC");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content pt-3 pb-3">
            <h1 class="page-header-title fw-bold text-dark">
                <div class="page-header-icon"><i class="fas fa-folder-open text-primary"></i></div>
                Kelola Arsip Dokumen Akademik & Legalisir
            </h1>
        </div>
    </div>
</header>

<div class="container-fluid px-4">
    
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5 border-top border-primary border-4">
        <div class="card-header bg-white text-dark py-3 cursor-pointer" data-bs-toggle="collapse" data-bs-target="#collapseInfoLegalisir">
            <span class="fw-bold"><i class="fas fa-edit me-2 text-primary"></i> Atur Teks Prosedur Legalisir (Tampil di Frontend)</span>
            <i class="fas fa-chevron-down float-end mt-1 text-muted"></i>
        </div>
        <div id="collapseInfoLegalisir" class="collapse">
            <div class="card-body bg-light p-4">
                <form action="" method="POST">
                    <div class="mb-4">
                        <label class="small fw-bold text-dark mb-1">Deskripsi Utama Prosedur Legalisir</label>
                        <textarea class="form-control" name="deskripsi_prosedur" rows="3" required><?= htmlspecialchars($info_leg['deskripsi_prosedur'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="row gx-4 mb-3">
                        <div class="col-md-4 mb-3">
                            <div class="p-3 border rounded bg-white">
                                <div class="text-center mb-2"><i class="fas fa-search fa-2x text-primary"></i></div>
                                <label class="small fw-bold text-dark mb-1">Judul Langkah 1</label>
                                <input type="text" class="form-control mb-2" name="step1_judul" value="<?= htmlspecialchars($info_leg['step1_judul'] ?? '') ?>" required>
                                <label class="small fw-bold text-dark mb-1">Deskripsi Langkah 1</label>
                                <textarea class="form-control" name="step1_deskripsi" rows="3" required><?= htmlspecialchars($info_leg['step1_deskripsi'] ?? '') ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="p-3 border rounded bg-white">
                                <div class="text-center mb-2"><i class="fas fa-copy fa-2x text-secondary"></i></div>
                                <label class="small fw-bold text-dark mb-1">Judul Langkah 2</label>
                                <input type="text" class="form-control mb-2" name="step2_judul" value="<?= htmlspecialchars($info_leg['step2_judul'] ?? '') ?>" required>
                                <label class="small fw-bold text-dark mb-1">Deskripsi Langkah 2</label>
                                <textarea class="form-control" name="step2_deskripsi" rows="3" required><?= htmlspecialchars($info_leg['step2_deskripsi'] ?? '') ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="p-3 border rounded bg-white">
                                <div class="text-center mb-2"><i class="fas fa-hand-holding fa-2x text-success"></i></div>
                                <label class="small fw-bold text-dark mb-1">Judul Langkah 3</label>
                                <input type="text" class="form-control mb-2" name="step3_judul" value="<?= htmlspecialchars($info_leg['step3_judul'] ?? '') ?>" required>
                                <label class="small fw-bold text-dark mb-1">Deskripsi Langkah 3</label>
                                <textarea class="form-control" name="step3_deskripsi" rows="3" required><?= htmlspecialchars($info_leg['step3_deskripsi'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="small fw-bold text-danger mb-1"><i class="fas fa-exclamation-triangle me-1"></i> Peringatan / Catatan Penting (Box Bawah)</label>
                        <textarea class="form-control" name="catatan_penting" rows="2" required><?= htmlspecialchars($info_leg['catatan_penting'] ?? '') ?></textarea>
                    </div>
                    
                    <button type="submit" name="update_info_legalisir" class="btn btn-primary fw-bold rounded-pill px-5"><i class="fas fa-save me-2"></i>Simpan Konfigurasi Teks</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row gx-4">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white fw-bold py-3"><i class="fas fa-cloud-upload-alt text-primary me-2"></i> Upload Dokumen</div>
                <div class="card-body bg-light">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="small fw-bold text-dark mb-1">Judul Dokumen</label>
                            <input type="text" class="form-control" name="judul_dokumen" placeholder="Cth: Pedoman Akademik 2026" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold text-dark mb-1">Kategori Arsip</label>
                            <select class="form-select" name="kategori_dokumen" required>
                                <option value="Buku Pedoman">Buku Pedoman Akademik</option>
                                <option value="Kalender Akademik">Kalender Akademik</option>
                                <option value="SK Rektor/Ketua">SK Rektor / Ketua</option>
                                <option value="Edaran Resmi">Surat Edaran Resmi</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="small fw-bold text-dark mb-1">Pilih File (PDF)</label>
                            <input type="file" class="form-control" name="file_dokumen" accept=".pdf" required>
                        </div>
                        <button type="submit" name="upload_dokumen" class="btn btn-dark w-100 fw-bold rounded-pill shadow-sm"><i class="fas fa-upload me-2"></i>Publikasikan Dokumen</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-dark text-white fw-bold py-3"><i class="fas fa-list-alt me-2"></i> Arsip Dokumen Publik</div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="tableDokumen" class="table table-hover align-middle mb-0" style="width: 100%;">
                            <thead class="bg-light text-muted small text-uppercase">
                                <tr>
                                    <th class="px-3" width="50%">Judul & Kategori</th>
                                    <th width="25%">Tanggal Rilis</th>
                                    <th class="text-center px-3" width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($q_dok->num_rows > 0): while($row = $q_dok->fetch_assoc()): ?>
                                <tr>
                                    <td class="px-3">
                                        <div class="fw-bold text-primary mb-1"><?= htmlspecialchars($row['judul_dokumen']) ?></div>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border"><?= htmlspecialchars($row['kategori_dokumen']) ?></span>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark"><?= date('d M Y', strtotime($row['tanggal_upload'])) ?></span>
                                    </td>
                                    <td class="text-center px-3">
                                        <a href="uploads/sekretariat/dok_akademik/<?= htmlspecialchars($row['file_dokumen']) ?>" target="_blank" class="btn btn-sm btn-outline-info rounded-circle me-1" title="Lihat/Unduh">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="index.php?module=sekretariat&act=arsip&kat=dok_akademik&hapus_dokumen=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-circle" onclick="return confirm('Hapus dokumen ini dari arsip publik?')" title="Hapus Dokumen">
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
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    $('#tableDokumen').DataTable({
        "order": [[ 1, "desc" ]], // Urut berdasarkan tanggal terbaru
        "language": {
            "search": "Cari Dokumen:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ dokumen",
            "infoEmpty": "Tidak ada dokumen yang tersedia",
            "zeroRecords": "Dokumen tidak ditemukan."
        }
    });
});
</script>
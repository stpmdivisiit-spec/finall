<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$upload_dir = 'uploads/sekretariat/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

// ==========================================
// 1. PROSES UPDATE INFORMASI UTAMA & KONTAK
// ==========================================
if (isset($_POST['update_info'])) {
    $tentang = $koneksi->real_escape_string($_POST['tentang_kami']);
    $fokus = $koneksi->real_escape_string($_POST['fokus_utama']);
    $jam_sk = $koneksi->real_escape_string($_POST['jam_senin_kamis']);
    $jam_j = $koneksi->real_escape_string($_POST['jam_jumat']);
    $email = $koneksi->real_escape_string($_POST['email_resmi']);
    $wa = $koneksi->real_escape_string($_POST['nomor_wa']);

    $koneksi->query("UPDATE secretariat_info SET tentang_kami='$tentang', fokus_utama='$fokus', jam_senin_kamis='$jam_sk', jam_jumat='$jam_j', email_resmi='$email', nomor_wa='$wa' WHERE id=1");
    setFlashMessage('success', 'Informasi profil sekretariat berhasil diperbarui!');
    header("Location: index.php?module=dashboard"); exit;
}

// ==========================================
// 2. PROSES UPLOAD BERKAS BARU (PUSAT UNDUHAN)
// ==========================================
if (isset($_POST['upload_berkas'])) {
    $nama_dokumen = $koneksi->real_escape_string($_POST['nama_dokumen']);
    $tipe_file = $koneksi->real_escape_string($_POST['tipe_file']);
    $tanggal_sekarang = date('Y-m-d');

    if (isset($_FILES['lampiran_file']) && $_FILES['lampiran_file']['error'] == 0) {
        $ext = pathinfo($_FILES['lampiran_file']['name'], PATHINFO_EXTENSION);
        $nama_file_baru = 'doc_' . time() . '.' . $ext;
        
        if (move_uploaded_file($_FILES['lampiran_file']['tmp_name'], $upload_dir . $nama_file_baru)) {
            $koneksi->query("INSERT INTO sekretariat_arsip (nama_dokumen, tipe_file, nama_file, tanggal_upload) VALUES ('$nama_dokumen', '$tipe_file', '$nama_file_baru', '$tanggal_sekarang')");
            setFlashMessage('success', 'Berkas formulir baru berhasil dipublikasikan!');
        } else {
            setFlashMessage('danger', 'Gagal memindahkan file ke server.');
        }
    }
    header("Location: index.php?module=dashboard"); exit;
}

// ==========================================
// 3. PROSES HAPUS BERKAS
// ==========================================
if (isset($_GET['hapus_file'])) {
    $id_hapus = (int)$_GET['hapus_file'];
    $data_file = $koneksi->query("SELECT nama_file FROM sekretariat_arsip WHERE id='$id_hapus'")->fetch_assoc();
    
    if ($data_file) {
        if (!empty($data_file['nama_file']) && file_exists($upload_dir . $data_file['nama_file'])) {
            unlink($upload_dir . $data_file['nama_file']);
        }
        $koneksi->query("DELETE FROM sekretariat_arsip WHERE id='$id_hapus'");
        setFlashMessage('success', 'Berkas berhasil dihapus dari pusat unduhan!');
    }
    header("Location: index.php?module=dashboard"); exit;
}

// Tarik Data untuk kebutuhan View
$info = $koneksi->query("SELECT * FROM sekretariat_info WHERE id=1")->fetch_assoc();
$q_arsip = $koneksi->query("SELECT * FROM sekretariat_arsip ORDER BY id DESC");
$total_arsip = $q_arsip->num_rows;
?>

<header class="page-header page-header-dark bg-teal pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fas fa-inbox"></i></div>
                        Panel Kontrol Sekretariat
                    </h1>
                    <div class="page-header-subtitle">Pusat kelola teks beranda, operasional layanan, dan manajemen file formulir publik.</div>
                </div>
                <div class="col-12 col-xl-auto mt-4 text-white opacity-75 fw-bold">
                    <i class="far fa-user-circle me-1"></i> Petugas Administrasi
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-n10">
    
    <div class="row mb-4">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-start-lg border-start-teal h-100 shadow-sm border-0 bg-white">
                <div class="card-body py-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="small fw-bold text-teal text-uppercase mb-1">Total Berkas Publik</div>
                            <div class="h3 fw-black text-dark mb-0"><?= $total_arsip ?> Dokumen</div>
                        </div>
                        <div class="avatar bg-teal bg-opacity-10 text-teal rounded-circle d-flex justify-content-center align-items-center" style="width:50px;height:50px;">
                            <i class="fas fa-folder-open fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row gx-4">
        <div class="col-lg-7 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-bottom fw-bold py-3"><i class="fas fa-edit text-teal me-2"></i> Sunting Informasi & Jam Operasional</div>
                <div class="card-body bg-light">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="small fw-bold text-dark mb-1">Teks Tentang Kami (Paragraf 1)</label>
                            <textarea class="form-control" name="tentang_kami" rows="3" required><?= htmlspecialchars($info['tentang_kami'] ?? '') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold text-dark mb-1">Fokus Utama Pelayanan (Paragraf 2)</label>
                            <textarea class="form-control" name="fokus_utama" rows="3" required><?= htmlspecialchars($info['fokus_utama'] ?? '') ?></textarea>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6"><label class="small fw-bold text-dark mb-1">Jam Operasional (Senin - Kamis)</label><input type="text" class="form-control" name="jam_senin_kamis" value="<?= htmlspecialchars($info['jam_senin_kamis'] ?? '') ?>" required></div>
                            <div class="col-md-6"><label class="small fw-bold text-dark mb-1">Jam Operasional (Jumat)</label><input type="text" class="form-control" name="jam_jumat" value="<?= htmlspecialchars($info['jam_jumat'] ?? '') ?>" required></div>
                        </div>
                        <div class="row gx-3 mb-4">
                            <div class="col-md-6"><label class="small fw-bold text-dark mb-1">Email Resmi Sekretariat</label><input type="email" class="form-control" name="email_resmi" value="<?= htmlspecialchars($info['email_resmi'] ?? '') ?>" required></div>
                            <div class="col-md-6"><label class="small fw-bold text-dark mb-1">WhatsApp Admin (Gunakan Kode Negara)</label><input type="text" class="form-control" name="nomor_wa" value="<?= htmlspecialchars($info['nomor_wa'] ?? '') ?>" placeholder="Cth: 6281234567890" required></div>
                        </div>
                        <button type="submit" name="update_info" class="btn btn-teal fw-bold px-4 rounded-pill"><i class="fas fa-check-circle me-1"></i> Simpan Perubahan Profil</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-bottom fw-bold py-3"><i class="fas fa-cloud-upload-alt text-teal me-2"></i> Publikasikan Dokumen Baru</div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="small fw-bold text-dark mb-1">Nama Dokumen / Formulir</label>
                            <input type="text" class="form-control" name="nama_dokumen" placeholder="Cth: Formulir Pengajuan Bebas SPP" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold text-dark mb-1">Format Berkas</label>
                            <select name="tipe_file" class="form-select" required>
                                <option value="PDF">Dokumen PDF (.pdf)</option>
                                <option value="DOCX">Microsoft Word (.docx)</option>
                                <option value="XLSX">Microsoft Excel (.xlsx)</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="small fw-bold text-dark mb-1">Pilih File Berkas</label>
                            <input type="file" class="form-control" name="lampiran_file" required>
                        </div>
                        <button type="submit" name="upload_berkas" class="btn btn-dark w-100 fw-bold rounded-pill shadow-sm">Unggah & Terbitkan Berkas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5">
        <div class="card-header bg-dark text-white fw-bold py-3"><i class="fas fa-file-invoice me-2"></i> Manajemen Pusat Unduhan Formulir</div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th class="px-4 py-3" width="55%">Judul Formulir / Dokumen</th>
                            <th width="15%">Format</th>
                            <th width="15%">Tanggal Rilis</th>
                            <th class="text-center px-4" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($q_arsip->num_rows > 0): while($row = $q_arsip->fetch_assoc()): ?>
                        <tr>
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-stack bg-teal-soft text-teal me-3 flex-shrink-0"><i class="far fa-file-alt"></i></div>
                                    <span class="fw-bold text-dark"><?= htmlspecialchars($row['nama_dokumen']) ?></span>
                                </div>
                            </td>
                            <td><span class="badge bg-secondary px-3 py-2"><?= $row['tipe_file'] ?></span></td>
                            <td><span class="small text-muted fw-bold"><?= date('d M Y', strtotime($row['tanggal_upload'])) ?></span></td>
                            <td class="text-center px-4">
                                <a href="index.php?module=dashboard&hapus_file=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-bold" onclick="return confirm('Hapus berkas ini dari pusat unduhan?')">
                                    <i class="fas fa-trash-alt me-1"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; else: ?>
                            <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada dokumen formulir yang diunggah.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
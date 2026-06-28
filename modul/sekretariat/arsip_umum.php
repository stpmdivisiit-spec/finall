<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$act = $_GET['act'] ?? 'arsip';
$kategori = $_GET['kat'] ?? 'umum';
$judul_halaman = ucwords(str_replace('_', ' ', $kategori));

$upload_dir = 'uploads/sekretariat/dokumen/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

// ==========================================
// PROSES TAMBAH ARSIP
// ==========================================
if (isset($_POST['simpan_arsip'])) {
    $judul_arsip = $koneksi->real_escape_string($_POST['judul_arsip']);
    $keterangan = $koneksi->real_escape_string($_POST['keterangan']);
    $tanggal = $koneksi->real_escape_string($_POST['tanggal']);
    $file_lampiran = '';

    if (isset($_FILES['file_lampiran']) && $_FILES['file_lampiran']['error'] == 0) {
        $ext = pathinfo($_FILES['file_lampiran']['name'], PATHINFO_EXTENSION);
        $file_lampiran = 'ARSIP_' . strtoupper($kategori) . '_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['file_lampiran']['tmp_name'], $upload_dir . $file_lampiran);
    }

    $koneksi->query("INSERT INTO sekretariat_arsip (kategori_arsip, judul_arsip, keterangan, file_lampiran, tanggal) 
                     VALUES ('$kategori', '$judul_arsip', '$keterangan', '$file_lampiran', '$tanggal')");
    
    setFlashMessage('success', "Data $judul_halaman berhasil ditambahkan!");
    header("Location: index.php?module=sekretariat&act=$act&kat=$kategori"); exit;
}

// ==========================================
// PROSES HAPUS ARSIP
// ==========================================
if (isset($_GET['hapus_arsip'])) {
    $id = (int)$_GET['hapus_arsip'];
    $data = $koneksi->query("SELECT file_lampiran FROM sekretariat_arsip WHERE id='$id'")->fetch_assoc();
    
    if ($data && !empty($data['file_lampiran'])) {
        if (file_exists($upload_dir . $data['file_lampiran'])) unlink($upload_dir . $data['file_lampiran']);
    }
    
    $koneksi->query("DELETE FROM sekretariat_arsip WHERE id='$id'");
    setFlashMessage('success', "Arsip berhasil dihapus!");
    header("Location: index.php?module=sekretariat&act=$act&kat=$kategori"); exit;
}

// Tarik Data Berdasarkan Kategori Saat Ini
$query = $koneksi->query("SELECT * FROM sekretariat_arsip WHERE kategori_arsip = '$kategori' ORDER BY tanggal DESC");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content pt-3 pb-3">
            <h1 class="page-header-title fw-bold text-dark">
                <div class="page-header-icon"><i class="fas fa-folder text-primary"></i></div>
                Manajemen <?= $judul_halaman ?>
            </h1>
        </div>
    </div>
</header>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0 border-top border-primary border-4 rounded-4">
                <div class="card-header bg-white fw-bold"><i class="fas fa-plus-circle me-2 text-primary"></i> Upload Data Baru</div>
                <div class="card-body bg-light">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="small fw-bold text-dark mb-1">Judul Dokumen / Informasi</label>
                            <input class="form-control" name="judul_arsip" type="text" placeholder="Masukkan judul..." required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold text-dark mb-1">Tanggal Rilis / Berlaku</label>
                            <input class="form-control" name="tanggal" type="date" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold text-dark mb-1">Keterangan Singkat</label>
                            <textarea class="form-control" name="keterangan" rows="3" placeholder="Opsional..."></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="small fw-bold text-dark mb-1">Lampiran Berkas (PDF / Image)</label>
                            <input class="form-control" name="file_lampiran" type="file" accept=".pdf,.jpg,.png,.jpeg,.xlsx,.doc,.docx">
                        </div>
                        <button class="btn btn-primary w-100 fw-bold rounded-pill shadow-sm" name="simpan_arsip" type="submit">
                            <i class="fas fa-upload me-2"></i> Simpan ke Database
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-dark text-white fw-bold"><i class="fas fa-list me-2"></i> Daftar Arsip <?= $judul_halaman ?></div>
                <div class="card-body p-3 p-md-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 datatable-standar" style="width: 100%;">
                            <thead class="bg-light text-muted small text-uppercase">
                                <tr>
                                    <th width="15%">Tanggal</th>
                                    <th width="50%">Judul & Keterangan</th>
                                    <th width="20%" class="text-center">Lampiran</th>
                                    <th width="15%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = $query->fetch_assoc()): ?>
                                <tr>
                                    <td><span class="fw-bold text-dark"><?= date('d M Y', strtotime($row['tanggal'])) ?></span></td>
                                    <td>
                                        <div class="fw-bold text-primary"><?= htmlspecialchars($row['judul_arsip']) ?></div>
                                        <div class="small text-muted mt-1"><?= htmlspecialchars($row['keterangan']) ?></div>
                                    </td>
                                    <td class="text-center">
                                        <?php if(!empty($row['file_lampiran'])): ?>
                                            <a href="uploads/sekretariat/dokumen/<?= $row['file_lampiran'] ?>" target="_blank" class="btn btn-sm btn-outline-info rounded-pill px-3">Buka Berkas</a>
                                        <?php else: ?>
                                            <span class="badge bg-light text-muted border">Tidak Ada</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="index.php?module=sekretariat&act=<?= $act ?>&kat=<?= $kategori ?>&hapus_arsip=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-circle" onclick="return confirm('Hapus arsip ini?')"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
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
    $('.datatable-standar').DataTable({ "order": [[0, "desc"]], "pageLength": 10 });
});
</script>
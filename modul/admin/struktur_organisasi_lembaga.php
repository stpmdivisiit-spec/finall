<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$upload_dir = 'uploads/struktur/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

// ==========================================
// 1. PROSES UPDATE GAMBAR BAGAN (DESKTOP)
// ==========================================
if (isset($_POST['update_gambar'])) {
    $gambar_lama = $_POST['gambar_lama'] ?? '';
    $gambar_bagan = $gambar_lama;

    if (isset($_FILES['gambar_bagan']) && $_FILES['gambar_bagan']['error'] == 0) {
        $ext = pathinfo($_FILES['gambar_bagan']['name'], PATHINFO_EXTENSION);
        $gambar_bagan = 'bagan_' . time() . '.' . $ext;
        if (move_uploaded_file($_FILES['gambar_bagan']['tmp_name'], $upload_dir . $gambar_bagan)) {
            if (!empty($gambar_lama) && file_exists($upload_dir . $gambar_lama)) {
                unlink($upload_dir . $gambar_lama);
            }
        }
    }
    
    // Simpan ke database (selalu ID 1 karena hanya ada 1 gambar struktur)
    $koneksi->query("UPDATE setting_struktur SET gambar_bagan='$gambar_bagan' WHERE id=1");
    setFlashMessage('success', 'Gambar bagan struktur berhasil diperbarui!');
    header("Location: index.php?module=admin&act=struktur_organisasi_lembaga"); exit;
}

// ==========================================
// 2. PROSES CRUD ITEM JABATAN (MOBILE)
// ==========================================
if (isset($_POST['simpan_item'])) {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $nama_jabatan = $koneksi->real_escape_string($_POST['nama_jabatan']);
    $nama_pejabat = $koneksi->real_escape_string($_POST['nama_pejabat']);
    $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
    $warna_ikon = $koneksi->real_escape_string($_POST['warna_ikon']);
    $urutan = (int)$_POST['urutan'];

    if ($id > 0) {
        $koneksi->query("UPDATE struktur_organisasi_item SET nama_jabatan='$nama_jabatan', nama_pejabat='$nama_pejabat', deskripsi='$deskripsi', warna_ikon='$warna_ikon', urutan='$urutan' WHERE id='$id'");
        setFlashMessage('success', 'Data pejabat berhasil diperbarui!');
    } else {
        $koneksi->query("INSERT INTO struktur_organisasi_item (nama_jabatan, nama_pejabat, deskripsi, warna_ikon, urutan) VALUES ('$nama_jabatan', '$nama_pejabat', '$deskripsi', '$warna_ikon', '$urutan')");
        setFlashMessage('success', 'Data pejabat baru berhasil ditambahkan!');
    }
    header("Location: index.php?module=admin&act=struktur_organisasi_lembaga"); exit;
}

if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    $koneksi->query("DELETE FROM struktur_organisasi_item WHERE id='$id'");
    setFlashMessage('success', 'Data pejabat berhasil dihapus!');
    header("Location: index.php?module=admin&act=struktur_organisasi_lembaga"); exit;
}

// Ambil Data
$q_bagan = $koneksi->query("SELECT gambar_bagan FROM setting_struktur WHERE id=1")->fetch_assoc();
$gambar_aktif = $q_bagan['gambar_bagan'] ?? '';
$q_items = $koneksi->query("SELECT * FROM struktur_organisasi_item ORDER BY urutan ASC");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fas fa-sitemap text-info"></i></div>
                        Manajemen Struktur Organisasi
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid px-4">
    
    <div class="card shadow-sm border-0 rounded-3 mb-4 border-top-lg border-top-info">
        <div class="card-header bg-white fw-bold d-flex justify-content-between align-items-center">
            <span><i class="fas fa-image text-info me-2"></i> Gambar Bagan Struktur (Versi Desktop)</span>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data" class="row align-items-center">
                <div class="col-md-3 text-center mb-3 mb-md-0">
                    <?php if(!empty($gambar_aktif)): ?>
                        <img src="<?= $upload_dir . $gambar_aktif ?>" class="img-thumbnail shadow-sm" style="max-height: 150px;">
                    <?php else: ?>
                        <div class="p-4 border-dashed rounded text-muted">Belum ada gambar</div>
                    <?php endif; ?>
                </div>
                <div class="col-md-9">
                    <input type="hidden" name="gambar_lama" value="<?= $gambar_aktif ?>">
                    <label class="small fw-bold mb-1">Upload Gambar Bagan Baru</label>
                    <input type="file" class="form-control mb-2" name="gambar_bagan" accept="image/*" required>
                    <small class="text-muted d-block mb-3">Rekomendasi ukuran: Resolusi tinggi (Landscape). Format: JPG, PNG.</small>
                    <button type="submit" name="update_gambar" class="btn btn-info fw-bold text-white"><i class="fas fa-upload me-1"></i> Update Gambar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-3 mb-5">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span class="fw-bold"><i class="fas fa-list-ul me-2"></i> Daftar Pejabat (Versi Timeline Mobile)</span>
            <button class="btn btn-sm btn-light text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus me-1"></i> Tambah Pejabat</button>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted small text-uppercase">
                    <tr>
                        <th width="10%" class="text-center px-4">Urutan</th>
                        <th width="30%">Jabatan</th>
                        <th width="45%">Nama Pejabat & Deskripsi</th>
                        <th width="15%" class="text-center px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($q_items->num_rows > 0): while($row = $q_items->fetch_assoc()): ?>
                    <tr>
                        <td class="text-center fw-bold text-muted px-4"><?= $row['urutan'] ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="icon-stack bg-<?= $row['warna_ikon'] ?>-soft text-<?= $row['warna_ikon'] ?> me-2"><i class="fas fa-user-tie"></i></div>
                                <span class="fw-bold text-dark"><?= htmlspecialchars($row['nama_jabatan']) ?></span>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold text-primary"><?= htmlspecialchars($row['nama_pejabat']) ?></div>
                            <div class="small text-muted line-clamp-2"><?= htmlspecialchars($row['deskripsi']) ?></div>
                        </td>
                        <td class="text-center px-4">
                            <button class="btn btn-sm btn-outline-info rounded-pill" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id'] ?>"><i class="fas fa-edit"></i></button>
                            <a href="index.php?module=admin&act=struktur_organisasi_lembaga&hapus=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Hapus item ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <form action="" method="POST" class="modal-content">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <div class="modal-header bg-info text-white"><h5 class="modal-title fw-bold">Edit Pejabat</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
                                <div class="modal-body bg-light">
                                    <div class="row mb-3">
                                        <div class="col-md-6"><label class="small fw-bold">Nama Jabatan</label><input type="text" class="form-control" name="nama_jabatan" value="<?= htmlspecialchars($row['nama_jabatan']) ?>" required></div>
                                        <div class="col-md-6"><label class="small fw-bold">Nama Pejabat</label><input type="text" class="form-control" name="nama_pejabat" value="<?= htmlspecialchars($row['nama_pejabat']) ?>" required></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small fw-bold">Deskripsi Tugas</label>
                                        <textarea class="form-control" name="deskripsi" rows="3" required><?= htmlspecialchars($row['deskripsi']) ?></textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="small fw-bold">Warna Ikon</label>
                                            <select name="warna_ikon" class="form-select">
                                                <option value="primary" <?= $row['warna_ikon']=='primary'?'selected':'' ?>>Biru (Primary)</option>
                                                <option value="success" <?= $row['warna_ikon']=='success'?'selected':'' ?>>Hijau (Success)</option>
                                                <option value="warning" <?= $row['warna_ikon']=='warning'?'selected':'' ?>>Kuning (Warning)</option>
                                                <option value="danger" <?= $row['warna_ikon']=='danger'?'selected':'' ?>>Merah (Danger)</option>
                                                <option value="info" <?= $row['warna_ikon']=='info'?'selected':'' ?>>Cyan (Info)</option>
                                                <option value="purple" <?= $row['warna_ikon']=='purple'?'selected':'' ?>>Ungu (Purple)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6"><label class="small fw-bold">Nomor Urut Tampil</label><input type="number" class="form-control" name="urutan" value="<?= $row['urutan'] ?>" required></div>
                                    </div>
                                </div>
                                <div class="modal-footer"><button type="submit" name="simpan_item" class="btn btn-info text-white fw-bold">Simpan Perubahan</button></div>
                            </form>
                        </div>
                    </div>
                    <?php endwhile; else: ?>
                        <tr><td colspan="4" class="text-center py-4">Data pejabat belum ditambahkan.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="" method="POST" class="modal-content">
            <div class="modal-header bg-dark text-white"><h5 class="modal-title fw-bold">Tambah Pejabat Baru</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
            <div class="modal-body bg-light">
                <div class="row mb-3">
                    <div class="col-md-6"><label class="small fw-bold">Nama Jabatan</label><input type="text" class="form-control" name="nama_jabatan" placeholder="Cth: Wakil Ketua I" required></div>
                    <div class="col-md-6"><label class="small fw-bold">Nama Pejabat</label><input type="text" class="form-control" name="nama_pejabat" placeholder="Cth: Ngea Andreas, S.Sos., M.Si" required></div>
                </div>
                <div class="mb-3">
                    <label class="small fw-bold">Deskripsi Tugas</label>
                    <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsikan tugas atau wewenang secara singkat..." required></textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="small fw-bold">Warna Ikon Tema</label>
                        <select name="warna_ikon" class="form-select">
                            <option value="primary">Biru (Primary)</option>
                            <option value="success">Hijau (Success)</option>
                            <option value="warning">Kuning (Warning)</option>
                            <option value="danger">Merah (Danger)</option>
                            <option value="info">Cyan (Info)</option>
                            <option value="purple">Ungu (Purple)</option>
                        </select>
                    </div>
                    <div class="col-md-6"><label class="small fw-bold">Nomor Urut Tampil</label><input type="number" class="form-control" name="urutan" value="<?= $q_items->num_rows + 1 ?>" required></div>
                </div>
            </div>
            <div class="modal-footer"><button type="submit" name="simpan_item" class="btn btn-dark fw-bold">Simpan Data</button></div>
        </form>
    </div>
</div>
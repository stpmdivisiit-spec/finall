<?php
// Pastikan akses aman
if (!defined('AKSES_DIIZINKAN')) {
    die("Akses ditolak!");
}

// =========================================================================
// 1. PROSES CRUD CAROUSEL (TAMBAH / EDIT / HAPUS)
// =========================================================================
$upload_dir = 'uploads/carousel/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

// A. PROSES SIMPAN / UPDATE CAROUSEL
if (isset($_POST['simpan_carousel'])) {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $badge_teks = $koneksi->real_escape_string($_POST['badge_teks']);
    $badge_warna = $koneksi->real_escape_string($_POST['badge_warna']);
    $judul = $koneksi->real_escape_string($_POST['judul']);
    $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
    
    $gambar_landscape = $_POST['gambar_landscape_lama'] ?? '';
    $gambar_portrait = $_POST['gambar_portrait_lama'] ?? '';

    // Upload Landscape
    if (isset($_FILES['gambar_landscape']) && $_FILES['gambar_landscape']['error'] == 0) {
        $ext = pathinfo($_FILES['gambar_landscape']['name'], PATHINFO_EXTENSION);
        $gambar_landscape = 'land_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['gambar_landscape']['tmp_name'], $upload_dir . $gambar_landscape);
    }
    // Upload Portrait
    if (isset($_FILES['gambar_portrait']) && $_FILES['gambar_portrait']['error'] == 0) {
        $ext = pathinfo($_FILES['gambar_portrait']['name'], PATHINFO_EXTENSION);
        $gambar_portrait = 'port_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['gambar_portrait']['tmp_name'], $upload_dir . $gambar_portrait);
    }

    if ($id > 0) {
        $koneksi->query("UPDATE setting_carousel SET badge_teks='$badge_teks', badge_warna='$badge_warna', judul='$judul', deskripsi='$deskripsi', gambar_landscape='$gambar_landscape', gambar_portrait='$gambar_portrait' WHERE id='$id'");
        setFlashMessage('success', 'Slide berhasil diperbarui!');
    } else {
        $koneksi->query("INSERT INTO setting_carousel (badge_teks, badge_warna, judul, deskripsi, gambar_landscape, gambar_portrait) VALUES ('$badge_teks', '$badge_warna', '$judul', '$deskripsi', '$gambar_landscape', '$gambar_portrait')");
        setFlashMessage('success', 'Slide baru berhasil ditambahkan!');
    }
    header("Location: index.php?module=admin&act=dashboard"); exit;
}

// B. PROSES HAPUS CAROUSEL
if (isset($_GET['hapus_carousel'])) {
    $id = (int)$_GET['hapus_carousel'];
    $data = $koneksi->query("SELECT gambar_landscape, gambar_portrait FROM setting_carousel WHERE id='$id'")->fetch_assoc();
    if ($data) {
        if (file_exists($upload_dir . $data['gambar_landscape'])) unlink($upload_dir . $data['gambar_landscape']);
        if (file_exists($upload_dir . $data['gambar_portrait'])) unlink($upload_dir . $data['gambar_portrait']);
        $koneksi->query("DELETE FROM setting_carousel WHERE id='$id'");
        setFlashMessage('success', 'Slide berhasil dihapus!');
    }
    header("Location: index.php?module=admin&act=dashboard"); exit;
}

// =========================================================================
// 2. PERHITUNGAN STATISTIK UNTUK ADMIN
// =========================================================================
$q_dosen = $koneksi->query("SELECT COUNT(d.id) as tot FROM dosen d JOIN user_roles ur ON d.user_id = ur.user_id JOIN roles r ON ur.role_id = r.id WHERE r.role_name IN ('dosen_pemerintahan', 'dosen_sosiatri')")->fetch_assoc();
$total_dosen = $q_dosen['tot'] ?? 0;
$q_tendik = $koneksi->query("SELECT COUNT(id) as tot FROM tendik")->fetch_assoc();
$total_tendik = $q_tendik['tot'] ?? 0;
$q_user = $koneksi->query("SELECT COUNT(id) as tot FROM users")->fetch_assoc();
$total_user = $q_user['tot'] ?? 0;

// Cek Total Slide Saat Ini (Maksimal 4)
$q_slide = $koneksi->query("SELECT * FROM setting_carousel ORDER BY id ASC");
$jumlah_slide = $q_slide->num_rows;
?>

<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="activity"></i></div>
                        Dashboard Administrator
                    </h1>
                    <div class="page-header-subtitle">Sistem Informasi Manajemen Kampus STPM Santa Ursula</div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-xl px-4 mt-n10">
    
    <div class="row mb-4">
        <div class="col-xxl-4 col-xl-4 col-md-6 mb-4">
            <div class="card h-100 border-start-lg border-start-primary shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="small fw-bold text-primary mb-1">Total Dosen Pengajar</div>
                        <div class="h3 fw-bold text-dark mb-1"><?= $total_dosen ?> Orang</div>
                        <a class="text-arrow-icon small text-primary" href="index.php?module=admin&act=data_pegawai">Kelola Dosen <i data-feather="arrow-right"></i></a>
                    </div>
                    <i class="fas fa-chalkboard-teacher fa-2x text-gray-200"></i>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-xl-4 col-md-6 mb-4">
            <div class="card h-100 border-start-lg border-start-success shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="small fw-bold text-success mb-1">Tenaga Kependidikan</div>
                        <div class="h3 fw-bold text-dark mb-1"><?= $total_tendik ?> Orang</div>
                        <a class="text-arrow-icon small text-success" href="index.php?module=admin&act=data_pegawai">Kelola Tendik <i data-feather="arrow-right"></i></a>
                    </div>
                    <i class="fas fa-user-tie fa-2x text-gray-200"></i>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-xl-4 col-md-6 mb-4">
            <div class="card h-100 border-start-lg border-start-warning shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="small fw-bold text-warning mb-1">Akun Pengguna Sistem</div>
                        <div class="h3 fw-bold text-dark mb-1"><?= $total_user ?> Akun</div>
                        <a class="text-arrow-icon small text-warning" href="index.php?module=admin&act=kelola_pengguna">Kelola User <i data-feather="arrow-right"></i></a>
                    </div>
                    <i class="fas fa-users fa-2x text-gray-200"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white fw-bold text-dark"><i class="fas fa-bolt me-2 text-primary"></i> Akses Cepat (Shortcut)</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-3"><a href="index.php?module=admin&act=tambah_dosen" class="btn btn-outline-primary w-100 py-3"><i class="fas fa-user-plus fa-2x mb-2 d-block"></i> Tambah Dosen</a></div>
                <div class="col-md-3 col-sm-6 mb-3"><a href="index.php?module=admin&act=tambah_pegawai" class="btn btn-outline-success w-100 py-3"><i class="fas fa-user-plus fa-2x mb-2 d-block"></i> Tambah Tendik</a></div>
                <div class="col-md-3 col-sm-6 mb-3"><a href="index.php?module=admin&act=pengguna_tambah" class="btn btn-outline-warning w-100 py-3"><i class="fas fa-key fa-2x mb-2 d-block"></i> Buat Akun Login</a></div>
                <div class="col-md-3 col-sm-6 mb-3"><a href="index.php" target="_blank" class="btn btn-outline-dark w-100 py-3"><i class="fas fa-globe fa-2x mb-2 d-block"></i> Pantau Web Kampus</a></div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span class="fw-bold"><i class="fas fa-images me-2"></i> Manajemen Banner/Slider Beranda</span>
            <?php if($jumlah_slide < 4): ?>
                <button class="btn btn-sm btn-light text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#modalCarousel"><i class="fas fa-plus me-1"></i> Tambah Slide</button>
            <?php else: ?>
                <span class="badge bg-danger text-white">Batas Maksimal 4 Slide Tercapai</span>
            <?php endif; ?>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" width="25%">Preview Gambar</th>
                            <th width="60%">Informasi Teks</th>
                            <th class="text-center" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($jumlah_slide > 0): while($row = $q_slide->fetch_assoc()): ?>
                        <tr>
                            <td class="text-center align-middle">
                                <div class="small fw-bold text-muted mb-1">Landscape (PC)</div>
                                <img src="uploads/carousel/<?= $row['gambar_landscape'] ?>" class="rounded shadow-sm mb-2" style="width:100%; max-height:80px; object-fit:cover;">
                                <div class="small fw-bold text-muted mb-1">Portrait (HP)</div>
                                <img src="uploads/carousel/<?= $row['gambar_portrait'] ?>" class="rounded shadow-sm" style="width:40px; height:60px; object-fit:cover;">
                            </td>
                            <td class="align-middle">
                                <span class="badge bg-<?= $row['badge_warna'] ?> mb-2"><?= htmlspecialchars($row['badge_teks']) ?></span>
                                <h5 class="fw-bold text-dark"><?= htmlspecialchars($row['judul']) ?></h5>
                                <p class="small text-muted mb-0"><?= htmlspecialchars($row['deskripsi']) ?></p>
                            </td>
                            <td class="text-center align-middle">
                                <a href="index.php?module=admin&act=dashboard&hapus_carousel=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus slide ini?')"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; else: ?>
                            <tr><td colspan="3" class="text-center py-4">Belum ada slider yang diatur. Tampilan default beranda akan digunakan.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="modalCarousel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="" method="POST" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold">Tambah Slider Beranda</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-light">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <label class="fw-bold small">Teks Badge (Label Atas)</label>
                        <input type="text" class="form-control" name="badge_teks" placeholder="Contoh: Penerimaan Mahasiswa Baru" required>
                    </div>
                    <div class="col-md-4">
                        <label class="fw-bold small">Warna Badge</label>
                        <select class="form-select" name="badge_warna">
                            <option value="primary">Biru (Primary)</option>
                            <option value="success">Hijau (Success)</option>
                            <option value="warning">Kuning (Warning)</option>
                            <option value="danger">Merah (Danger)</option>
                            <option value="info">Cyan (Info)</option>
                            <option value="dark">Hitam (Dark)</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="fw-bold small">Judul Utama</label>
                    <input type="text" class="form-control fw-bold" name="judul" required>
                </div>
                <div class="mb-4">
                    <label class="fw-bold small">Deskripsi Sub-Judul</label>
                    <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
                </div>
                
                <div class="row">
                    <div class="col-md-6 border-end">
                        <label class="fw-bold text-primary mb-2"><i class="fas fa-desktop"></i> Gambar Desktop (Landscape)</label>
                        <input type="file" class="form-control" name="gambar_landscape" accept="image/*" required>
                        <small class="text-muted">Rekomendasi ukuran: 1920 x 800 px</small>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-success mb-2"><i class="fas fa-mobile-alt"></i> Gambar HP (Portrait)</label>
                        <input type="file" class="form-control" name="gambar_portrait" accept="image/*" required>
                        <small class="text-muted">Rekomendasi ukuran: 800 x 1200 px</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="simpan_carousel" class="btn btn-primary fw-bold">Simpan Slide</button>
            </div>
        </form>
    </div>
</div>
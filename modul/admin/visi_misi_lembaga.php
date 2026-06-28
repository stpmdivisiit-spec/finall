<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// ==========================================
// 1. PROSES UPDATE VISI (Tunggal)
// ==========================================
if (isset($_POST['update_visi'])) {
    $konten_visi = $koneksi->real_escape_string($_POST['konten_visi']);
    // Cek apakah visi sudah ada
    $cek = $koneksi->query("SELECT id FROM profil_lembaga WHERE kategori='visi'");
    if ($cek->num_rows > 0) {
        $koneksi->query("UPDATE profil_lembaga SET konten='$konten_visi' WHERE kategori='visi'");
    } else {
        $koneksi->query("INSERT INTO profil_lembaga (kategori, konten, urutan) VALUES ('visi', '$konten_visi', 1)");
    }
    setFlashMessage('success', 'Visi Kampus berhasil diperbarui!');
    header("Location: index.php?module=admin&act=visi_misi_lembaga"); exit;
}

// ==========================================
// 2. PROSES CRUD MISI & NILAI INTI
// ==========================================
if (isset($_POST['simpan_item'])) {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $kategori = $koneksi->real_escape_string($_POST['kategori']);
    $konten = $koneksi->real_escape_string($_POST['konten']);
    $urutan = (int)$_POST['urutan'];

    if ($id > 0) {
        $koneksi->query("UPDATE profil_lembaga SET kategori='$kategori', konten='$konten', urutan='$urutan' WHERE id='$id'");
        setFlashMessage('success', 'Data berhasil diperbarui!');
    } else {
        $koneksi->query("INSERT INTO profil_lembaga (kategori, konten, urutan) VALUES ('$kategori', '$konten', '$urutan')");
        setFlashMessage('success', 'Data baru berhasil ditambahkan!');
    }
    header("Location: index.php?module=admin&act=visi_misi_lembaga"); exit;
}

if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    $koneksi->query("DELETE FROM profil_lembaga WHERE id='$id' AND kategori != 'visi'");
    setFlashMessage('success', 'Data berhasil dihapus!');
    header("Location: index.php?module=admin&act=visi_misi_lembaga"); exit;
}

// Ambil Data Saat Ini
$q_visi = $koneksi->query("SELECT konten FROM profil_lembaga WHERE kategori='visi'")->fetch_assoc();
$teks_visi = $q_visi['konten'] ?? '';

$q_item = $koneksi->query("SELECT * FROM profil_lembaga WHERE kategori IN ('misi', 'nilai_inti') ORDER BY kategori ASC, urutan ASC");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fas fa-bullseye text-success"></i></div>
                        Manajemen Visi, Misi & Nilai Inti
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid px-4">
    
    <!-- KARTU 1: UPDATE VISI -->
    <div class="card shadow-sm border-0 rounded-3 mb-4 border-top-lg border-top-success">
        <div class="card-header bg-white fw-bold"><i class="fas fa-eye text-success me-2"></i> Visi Utama Institusi</div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="small text-muted mb-1">Teks Visi Kampus</label>
                    <textarea class="form-control text-center fw-bold text-success fs-5 p-4" name="konten_visi" rows="3" required><?= htmlspecialchars($teks_visi) ?></textarea>
                </div>
                <button type="submit" name="update_visi" class="btn btn-success fw-bold"><i class="fas fa-save me-1"></i> Simpan Visi Utama</button>
            </form>
        </div>
    </div>

    <!-- KARTU 2: DAFTAR MISI & NILAI INTI -->
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span class="fw-bold"><i class="fas fa-list-ol me-2"></i> Daftar Misi & Nilai Inti</span>
            <button class="btn btn-sm btn-light text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus me-1"></i> Tambah Baru</button>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted small text-uppercase">
                    <tr>
                        <th width="10%" class="text-center px-4">Urutan</th>
                        <th width="15%">Kategori</th>
                        <th width="60%">Isi / Konten Teks</th>
                        <th width="15%" class="text-center px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($q_item->num_rows > 0): while($row = $q_item->fetch_assoc()): ?>
                    <tr>
                        <td class="text-center fw-bold text-muted px-4"><?= $row['urutan'] ?></td>
                        <td>
                            <?php if($row['kategori'] == 'misi'): ?>
                                <span class="badge bg-primary text-white px-3 py-2">MISI INSTITUSI</span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark px-3 py-2">NILAI INTI</span>
                            <?php endif; ?>
                        </td>
                        <td><p class="mb-0 text-dark"><?= htmlspecialchars($row['konten']) ?></p></td>
                        <td class="text-center px-4">
                            <button class="btn btn-sm btn-outline-info rounded-pill" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id'] ?>"><i class="fas fa-edit"></i></button>
                            <a href="index.php?module=admin&act=visi_misi_lembaga&hapus=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-pill" onclick="return confirm('Hapus item ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="" method="POST" class="modal-content">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <div class="modal-header bg-info text-white"><h5 class="modal-title fw-bold">Edit Data</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
                                <div class="modal-body bg-light">
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <label class="small fw-bold">Kategori</label>
                                            <select name="kategori" class="form-select" required>
                                                <option value="misi" <?= $row['kategori'] == 'misi' ? 'selected' : '' ?>>Misi Institusi</option>
                                                <option value="nilai_inti" <?= $row['kategori'] == 'nilai_inti' ? 'selected' : '' ?>>Nilai Inti (Serviam)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="small fw-bold">Nomor Urut</label>
                                            <input type="number" class="form-control" name="urutan" value="<?= $row['urutan'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small fw-bold">Konten Teks</label>
                                        <textarea class="form-control" name="konten" rows="4" required><?= htmlspecialchars($row['konten']) ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer"><button type="submit" name="simpan_item" class="btn btn-info text-white fw-bold">Simpan Perubahan</button></div>
                            </form>
                        </div>
                    </div>
                    <?php endwhile; else: ?>
                        <tr><td colspan="4" class="text-center py-4">Data Misi dan Nilai Inti belum ditambahkan.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Baru -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form action="" method="POST" class="modal-content">
            <div class="modal-header bg-dark text-white"><h5 class="modal-title fw-bold">Tambah Misi / Nilai Inti</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
            <div class="modal-body bg-light">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <label class="small fw-bold">Kategori</label>
                        <select name="kategori" class="form-select" required>
                            <option value="misi">Misi Institusi</option>
                            <option value="nilai_inti">Nilai Inti (Serviam)</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="small fw-bold">Nomor Urut</label>
                        <input type="number" class="form-control" name="urutan" value="1" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="small fw-bold">Konten Teks</label>
                    <textarea class="form-control" name="konten" rows="4" placeholder="Ketikkan misi atau nilai inti di sini..." required></textarea>
                </div>
            </div>
            <div class="modal-footer"><button type="submit" name="simpan_item" class="btn btn-dark fw-bold">Simpan Data</button></div>
        </form>
    </div>
</div>
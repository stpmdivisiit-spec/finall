<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// ==========================================
// PROSES CRUD DATA SLA (STANDAR LAYANAN)
// ==========================================
if (isset($_POST['simpan_sla'])) {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $jenis_layanan = $koneksi->real_escape_string($_POST['jenis_layanan']);
    $waktu_penyelesaian = $koneksi->real_escape_string($_POST['waktu_penyelesaian']);
    $urutan = (int)$_POST['urutan'];

    if ($id > 0) {
        $koneksi->query("UPDATE sekretariat_sla SET jenis_layanan='$jenis_layanan', waktu_penyelesaian='$waktu_penyelesaian', urutan='$urutan' WHERE id='$id'");
        setFlashMessage('success', 'Standar Waktu Layanan berhasil diperbarui!');
    } else {
        $koneksi->query("INSERT INTO sekretariat_sla (jenis_layanan, waktu_penyelesaian, urutan) VALUES ('$jenis_layanan', '$waktu_penyelesaian', '$urutan')");
        setFlashMessage('success', 'Standar Waktu Layanan baru berhasil ditambahkan!');
    }
    header("Location: index.php?module=sekretariat&act=profil&kat=layanan"); exit;
}

if (isset($_GET['hapus_sla'])) {
    $id_hapus = (int)$_GET['hapus_sla'];
    $koneksi->query("DELETE FROM sekretariat_sla WHERE id='$id_hapus'");
    setFlashMessage('success', 'Layanan berhasil dihapus dari daftar SLA!');
    header("Location: index.php?module=sekretariat&act=profil&kat=layanan"); exit;
}

// Ambil Data SLA untuk ditampilkan di tabel Admin
$q_sla = $koneksi->query("SELECT * FROM sekretariat_sla ORDER BY urutan ASC");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content pt-3 pb-3">
            <h1 class="page-header-title fw-bold text-teal">
                <div class="page-header-icon"><i class="fas fa-shield-alt"></i></div>
                Kelola Maklumat & Standar Layanan
            </h1>
        </div>
    </div>
</header>

<div class="container-fluid px-4">
    
    <div class="alert alert-danger border-start-lg border-start-danger shadow-sm mb-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-ban fa-2x me-3"></i>
            <div>
                <h6 class="fw-bold mb-1">Zona Integritas Anti Pungli (Aktif)</h6>
                <p class="small mb-0">Halaman publik saat ini menampilkan komitmen layanan <strong>GRATIS (Tanpa Biaya Retribusi)</strong>. Pastikan seluruh layanan administrasi mematuhi aturan ini.</p>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
            <span class="fw-bold"><i class="fas fa-stopwatch me-2"></i> Service Level Agreement (SLA)</span>
            <button class="btn btn-sm btn-teal text-white fw-bold rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus me-1"></i> Tambah Layanan</button>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th class="text-center px-4" width="10%">Urutan</th>
                            <th width="45%">Jenis Layanan Administrasi</th>
                            <th width="30%">Target Waktu Penyelesaian</th>
                            <th class="text-center px-4" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($q_sla->num_rows > 0): while($row = $q_sla->fetch_assoc()): ?>
                        <tr>
                            <td class="text-center fw-bold text-teal px-4">#<?= $row['urutan'] ?></td>
                            <td><span class="fw-bold text-dark"><?= htmlspecialchars($row['jenis_layanan']) ?></span></td>
                            <td><span class="badge bg-success bg-opacity-10 text-success px-3 py-2 border border-success border-opacity-25"><?= htmlspecialchars($row['waktu_penyelesaian']) ?></span></td>
                            <td class="text-center px-4">
                                <button class="btn btn-sm btn-outline-info rounded-circle me-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id'] ?>"><i class="fas fa-edit"></i></button>
                                <a href="index.php?module=sekretariat&act=profil&kat=layanan&hapus_sla=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-circle" onclick="return confirm('Hapus daftar layanan SLA ini?')"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <form action="" method="POST" class="modal-content border-0 shadow-lg rounded-4">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <div class="modal-header bg-info text-white border-0"><h5 class="modal-title fw-bold">Edit Standar Layanan</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
                                    <div class="modal-body p-4 bg-light">
                                        <div class="mb-3">
                                            <label class="small fw-bold mb-1">Jenis Layanan Administrasi</label>
                                            <input type="text" class="form-control" name="jenis_layanan" value="<?= htmlspecialchars($row['jenis_layanan']) ?>" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label class="small fw-bold mb-1">Masa Penyelesaian (SLA)</label>
                                                <input type="text" class="form-control fw-bold text-success" name="waktu_penyelesaian" value="<?= htmlspecialchars($row['waktu_penyelesaian']) ?>" placeholder="Cth: Maks. 1 Hari Kerja" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="small fw-bold mb-1">No. Urut</label>
                                                <input type="number" class="form-control" name="urutan" value="<?= $row['urutan'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-white border-0"><button type="submit" name="simpan_sla" class="btn btn-info text-white fw-bold rounded-pill px-4">Simpan Perubahan</button></div>
                                </form>
                            </div>
                        </div>
                        <?php endwhile; else: ?>
                            <tr><td colspan="4" class="text-center py-4 text-muted">Daftar Service Level Agreement (SLA) belum ditambahkan.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form action="" method="POST" class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-teal text-white border-0"><h5 class="modal-title fw-bold">Tambah Standar Layanan (SLA)</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
            <div class="modal-body p-4 bg-light">
                <div class="mb-3">
                    <label class="small fw-bold mb-1">Jenis Layanan Administrasi</label>
                    <input type="text" class="form-control" name="jenis_layanan" placeholder="Cth: Penerbitan Surat Izin Penelitian" required>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label class="small fw-bold mb-1">Masa Penyelesaian (SLA)</label>
                        <input type="text" class="form-control fw-bold text-success" name="waktu_penyelesaian" placeholder="Cth: Maks. 2 Hari Kerja" required>
                    </div>
                    <div class="col-md-4">
                        <label class="small fw-bold mb-1">No. Urut</label>
                        <input type="number" class="form-control" name="urutan" value="<?= $q_sla->num_rows + 1 ?>" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-white border-0"><button type="submit" name="simpan_sla" class="btn btn-teal text-white fw-bold rounded-pill px-4">Simpan Layanan</button></div>
        </form>
    </div>
</div>
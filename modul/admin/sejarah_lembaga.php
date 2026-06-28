<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$upload_dir = 'uploads/sejarah/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

// ==========================================
// PROSES CRUD SEJARAH
// ==========================================
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan_sejarah'])) {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $tahun = $koneksi->real_escape_string($_POST['tahun']);
    $judul = $koneksi->real_escape_string($_POST['judul_peristiwa']);
    $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
    $urutan = (int)$_POST['urutan'];
    $gambar = $_POST['gambar_lama'] ?? '';

    // Proses Upload Gambar Baru
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $gambar = 'sejarah_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['gambar']['tmp_name'], $upload_dir . $gambar);
        
        // Hapus gambar lama jika diganti
        if ($id > 0 && !empty($_POST['gambar_lama']) && file_exists($upload_dir . $_POST['gambar_lama'])) {
            unlink($upload_dir . $_POST['gambar_lama']);
        }
    }

    if ($id > 0) {
        $koneksi->query("UPDATE sejarah_lembaga SET tahun='$tahun', judul_peristiwa='$judul', deskripsi='$deskripsi', gambar='$gambar', urutan='$urutan' WHERE id='$id'");
        setFlashMessage('success', 'Catatan sejarah berhasil diperbarui!');
    } else {
        $koneksi->query("INSERT INTO sejarah_lembaga (tahun, judul_peristiwa, deskripsi, gambar, urutan) VALUES ('$tahun', '$judul', '$deskripsi', '$gambar', '$urutan')");
        setFlashMessage('success', 'Catatan sejarah baru berhasil ditambahkan!');
    }
    header("Location: index.php?module=admin&act=sejarah_lembaga"); exit;
}

if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    $data = $koneksi->query("SELECT gambar FROM sejarah_lembaga WHERE id='$id'")->fetch_assoc();
    if ($data && !empty($data['gambar']) && file_exists($upload_dir . $data['gambar'])) {
        unlink($upload_dir . $data['gambar']);
    }
    $koneksi->query("DELETE FROM sejarah_lembaga WHERE id='$id'");
    setFlashMessage('success', 'Catatan sejarah berhasil dihapus!');
    header("Location: index.php?module=admin&act=sejarah_lembaga"); exit;
}

$sejarah_data = $koneksi->query("SELECT * FROM sejarah_lembaga ORDER BY urutan ASC");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="clock"></i></div>
                        Manajemen Sejarah Lembaga
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus me-1"></i> Tambah Histori</button>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid px-4">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th width="10%" class="text-center px-4">Urutan</th>
                        <th width="15%" class="px-3">Tahun/Masa</th>
                        <th width="50%">Deskripsi Peristiwa</th>
                        <th width="25%" class="text-center px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($sejarah_data->num_rows > 0): while($row = $sejarah_data->fetch_assoc()): ?>
                    <tr>
                        <td class="text-center px-4 fw-bold text-primary">#<?= $row['urutan'] ?></td>
                        <td class="px-3 fw-bold"><?= htmlspecialchars($row['tahun']) ?></td>
                        <td>
                            <div class="d-flex align-items-start mt-2">
                                <?php if(!empty($row['gambar'])): ?>
                                    <img src="<?= $upload_dir . $row['gambar'] ?>" class="rounded shadow-sm me-3" style="width: 80px; height: 60px; object-fit: cover;">
                                <?php endif; ?>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark"><?= htmlspecialchars($row['judul_peristiwa']) ?></h6>
                                    <p class="small text-muted mb-0 line-clamp-2"><?= htmlspecialchars($row['deskripsi']) ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="text-center px-4">
                            <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id'] ?>"><i class="fas fa-edit"></i> Edit</button>
                            <a href="index.php?module=admin&act=sejarah_lembaga&hapus=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus histori ini secara permanen?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <form action="" method="POST" enctype="multipart/form-data" class="modal-content">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="gambar_lama" value="<?= $row['gambar'] ?>">
                                <div class="modal-header bg-info text-white"><h5 class="modal-title fw-bold">Edit Histori Lembaga</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
                                <div class="modal-body bg-light">
                                    <div class="row mb-3">
                                        <div class="col-md-4"><label class="small fw-bold">Tahun / Periode</label><input type="text" class="form-control" name="tahun" value="<?= htmlspecialchars($row['tahun']) ?>" required></div>
                                        <div class="col-md-8"><label class="small fw-bold">Judul Peristiwa Utama</label><input type="text" class="form-control" name="judul_peristiwa" value="<?= htmlspecialchars($row['judul_peristiwa']) ?>" required></div>
                                    </div>
                                    <div class="mb-3"><label class="small fw-bold">Deskripsi Perjalanan</label><textarea class="form-control" name="deskripsi" rows="4" required><?= htmlspecialchars($row['deskripsi']) ?></textarea></div>
                                    <div class="row">
                                        <div class="col-md-8"><label class="small fw-bold">Ganti Foto Histori (Opsional)</label><input type="file" class="form-control" name="gambar" accept="image/*"></div>
                                        <div class="col-md-4"><label class="small fw-bold">Nomor Urut Tampil</label><input type="number" class="form-control" name="urutan" value="<?= $row['urutan'] ?>" required></div>
                                    </div>
                                </div>
                                <div class="modal-footer"><button type="submit" name="simpan_sejarah" class="btn btn-info fw-bold text-white">Simpan Perubahan</button></div>
                            </form>
                        </div>
                    </div>
                    <?php endwhile; else: ?>
                        <tr><td colspan="4" class="text-center py-5">Catatan historis belum ditambahkan.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="" method="POST" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header bg-primary text-white"><h5 class="modal-title fw-bold">Tambah Histori Lembaga</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
            <div class="modal-body bg-light">
                <div class="row mb-3">
                    <div class="col-md-4"><label class="small fw-bold">Tahun / Periode</label><input type="text" class="form-control" name="tahun" placeholder="Cth: 1980 atau Era 90an" required></div>
                    <div class="col-md-8"><label class="small fw-bold">Judul Peristiwa Utama</label><input type="text" class="form-control" name="judul_peristiwa" placeholder="Cth: Berdirinya Gedung Utama" required></div>
                </div>
                <div class="mb-3"><label class="small fw-bold">Deskripsi Singkat</label><textarea class="form-control" name="deskripsi" rows="4" placeholder="Ceritakan bagaimana momen tersebut terjadi..." required></textarea></div>
                <div class="row">
                    <div class="col-md-8"><label class="small fw-bold">Foto Histori (Opsional)</label><input type="file" class="form-control" name="gambar" accept="image/*"></div>
                    <div class="col-md-4"><label class="small fw-bold">Nomor Urut Tampil</label><input type="number" class="form-control" name="urutan" value="<?= $sejarah_data->num_rows + 1 ?>" required></div>
                </div>
            </div>
            <div class="modal-footer"><button type="submit" name="simpan_sejarah" class="btn btn-primary fw-bold">Simpan Histori</button></div>
        </form>
    </div>
</div>
<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// Deteksi prodi aktif
$kode_prodi = ($module_url == 'prodi_sosiatri') ? 'sosiatri' : 'pemerintahan';

// ==========================================
// 1. UPDATE PROFIL UTAMA
// ==========================================
if (isset($_POST['update_profil'])) {
    $nama_prodi = $koneksi->real_escape_string($_POST['nama_prodi']);
    $sub_judul = $koneksi->real_escape_string($_POST['sub_judul']);
    $judul_tentang = $koneksi->real_escape_string($_POST['judul_tentang']);
    $deskripsi_tentang = $koneksi->real_escape_string($_POST['deskripsi_tentang']);
    $visi_keilmuan = $koneksi->real_escape_string($_POST['visi_keilmuan']);
    $akreditasi = $koneksi->real_escape_string($_POST['akreditasi']);
    $gelar = $koneksi->real_escape_string($_POST['gelar']);
    $masa_studi = $koneksi->real_escape_string($_POST['masa_studi']);
    $jenjang = $koneksi->real_escape_string($_POST['jenjang']);

    $koneksi->query("UPDATE profil_prodi SET nama_prodi='$nama_prodi', sub_judul='$sub_judul', judul_tentang='$judul_tentang', deskripsi_tentang='$deskripsi_tentang', visi_keilmuan='$visi_keilmuan', akreditasi='$akreditasi', gelar='$gelar', masa_studi='$masa_studi', jenjang='$jenjang' WHERE kode_prodi='$kode_prodi'");
    
    setFlashMessage('success', 'Profil Prodi berhasil diperbarui!');
    header("Location: index.php?module=$module_url&act=profil_prodi"); exit;
}

// ==========================================
// 2. CRUD PROSPEK KARIR
// ==========================================
if (isset($_POST['simpan_karir'])) {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $nama_karir = $koneksi->real_escape_string($_POST['nama_karir']);
    $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
    $ikon = $koneksi->real_escape_string($_POST['ikon']);
    $warna_ikon = $koneksi->real_escape_string($_POST['warna_ikon']);
    $urutan = (int)$_POST['urutan'];

    if ($id > 0) {
        $koneksi->query("UPDATE prospek_karir SET nama_karir='$nama_karir', deskripsi='$deskripsi', ikon='$ikon', warna_ikon='$warna_ikon', urutan='$urutan' WHERE id='$id'");
    } else {
        $koneksi->query("INSERT INTO prospek_karir (kode_prodi, nama_karir, deskripsi, ikon, warna_ikon, urutan) VALUES ('$kode_prodi', '$nama_karir', '$deskripsi', '$ikon', '$warna_ikon', '$urutan')");
    }
    setFlashMessage('success', 'Data prospek karir berhasil disimpan!');
    header("Location: index.php?module=$module_url&act=profil_prodi"); exit;
}

if (isset($_GET['hapus_karir'])) {
    $id = (int)$_GET['hapus_karir'];
    $koneksi->query("DELETE FROM prospek_karir WHERE id='$id'");
    setFlashMessage('success', 'Data prospek karir berhasil dihapus!');
    header("Location: index.php?module=$module_url&act=profil_prodi"); exit;
}

// Tarik Data
$q_profil = $koneksi->query("SELECT * FROM profil_prodi WHERE kode_prodi='$kode_prodi'");
$profil = $q_profil->fetch_assoc();
$q_karir = $koneksi->query("SELECT * FROM prospek_karir WHERE kode_prodi='$kode_prodi' ORDER BY urutan ASC");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content pt-3 pb-3">
            <h1 class="page-header-title fw-bold text-primary">
                <div class="page-header-icon"><i data-feather="layout"></i></div>
                Kelola Profil Beranda Prodi
            </h1>
        </div>
    </div>
</header>

<div class="container-fluid px-4">
    
    <div class="card shadow-sm border-0 rounded-3 mb-5 border-top-lg border-top-primary">
        <div class="card-header bg-white fw-bold"><i class="fas fa-globe me-2 text-primary"></i> Data Identitas Program Studi</div>
        <div class="card-body bg-light">
            <form action="" method="POST">
                <div class="row gx-4 mb-3">
                    <div class="col-md-6 mb-3"><label class="small fw-bold">Nama Program Studi</label><input type="text" class="form-control" name="nama_prodi" value="<?= htmlspecialchars($profil['nama_prodi'] ?? '') ?>" required></div>
                    <div class="col-md-6 mb-3"><label class="small fw-bold">Sub Judul (Slogan)</label><input type="text" class="form-control" name="sub_judul" value="<?= htmlspecialchars($profil['sub_judul'] ?? '') ?>" required></div>
                </div>
                <div class="row gx-4 mb-3">
                    <div class="col-md-12 mb-3"><label class="small fw-bold">Judul Deskripsi</label><input type="text" class="form-control" name="judul_tentang" value="<?= htmlspecialchars($profil['judul_tentang'] ?? '') ?>" required></div>
                    <div class="col-md-12 mb-3"><label class="small fw-bold">Deskripsi Utama Prodi (Paragraf)</label><textarea class="form-control" name="deskripsi_tentang" rows="4" required><?= htmlspecialchars($profil['deskripsi_tentang'] ?? '') ?></textarea></div>
                    <div class="col-md-12 mb-3"><label class="small fw-bold">Visi Keilmuan (Kutipan Miring)</label><textarea class="form-control" name="visi_keilmuan" rows="2" required><?= htmlspecialchars($profil['visi_keilmuan'] ?? '') ?></textarea></div>
                </div>
                <hr>
                <div class="row gx-4 mb-4">
                    <div class="col-md-3"><label class="small fw-bold text-success">Nilai Akreditasi</label><input type="text" class="form-control" name="akreditasi" value="<?= htmlspecialchars($profil['akreditasi'] ?? '') ?>" required></div>
                    <div class="col-md-3"><label class="small fw-bold">Gelar Kelulusan</label><input type="text" class="form-control" name="gelar" value="<?= htmlspecialchars($profil['gelar'] ?? '') ?>" required></div>
                    <div class="col-md-3"><label class="small fw-bold">Masa Studi</label><input type="text" class="form-control" name="masa_studi" value="<?= htmlspecialchars($profil['masa_studi'] ?? '') ?>" required></div>
                    <div class="col-md-3"><label class="small fw-bold">Jenjang Pendidikan</label><input type="text" class="form-control" name="jenjang" value="<?= htmlspecialchars($profil['jenjang'] ?? '') ?>" required></div>
                </div>
                <button type="submit" name="update_profil" class="btn btn-primary fw-bold px-4 rounded-pill shadow-sm"><i class="fas fa-save me-2"></i>Simpan Pembaruan Profil</button>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-3 mb-5">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
            <span class="fw-bold"><i class="fas fa-briefcase me-2"></i> Daftar Prospek Karir Lulusan</span>
            <button class="btn btn-sm btn-light text-dark fw-bold rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus me-1"></i> Tambah Karir</button>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted small text-uppercase">
                    <tr><th class="px-4 py-3" width="10%">Urutan</th><th width="25%">Nama Profesi</th><th width="40%">Deskripsi Pekerjaan</th><th width="15%">Ikon Tema</th><th class="text-center px-4" width="10%">Aksi</th></tr>
                </thead>
                <tbody>
                    <?php if($q_karir->num_rows > 0): while($row = $q_karir->fetch_assoc()): ?>
                    <tr>
                        <td class="text-center fw-bold text-muted px-4"><?= $row['urutan'] ?></td>
                        <td><span class="fw-bold text-dark"><?= htmlspecialchars($row['nama_karir']) ?></span></td>
                        <td><p class="small text-muted mb-0"><?= htmlspecialchars($row['deskripsi']) ?></p></td>
                        <td><div class="badge bg-<?= $row['warna_ikon'] ?>-soft text-<?= $row['warna_ikon'] ?> px-3 py-2"><i data-feather="<?= $row['ikon'] ?>" class="me-1" style="width: 14px;"></i> <?= $row['ikon'] ?></div></td>
                        <td class="text-center px-4">
                            <button class="btn btn-sm btn-outline-info rounded-circle" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id'] ?>"><i class="fas fa-edit"></i></button>
                            <a href="index.php?module=<?= $module_url ?>&act=profil_prodi&hapus_karir=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-circle" onclick="return confirm('Hapus prospek karir ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="" method="POST" class="modal-content border-0 shadow-lg rounded-4">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <div class="modal-header bg-info text-white border-0"><h5 class="modal-title fw-bold">Edit Prospek Karir</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
                                <div class="modal-body p-4 bg-light">
                                    <div class="mb-3"><label class="small fw-bold">Nama Profesi</label><input type="text" class="form-control" name="nama_karir" value="<?= htmlspecialchars($row['nama_karir']) ?>" required></div>
                                    <div class="mb-3"><label class="small fw-bold">Deskripsi Singkat</label><textarea class="form-control" name="deskripsi" rows="3" required><?= htmlspecialchars($row['deskripsi']) ?></textarea></div>
                                    <div class="row">
                                        <div class="col-md-5"><label class="small fw-bold">Nama Ikon (Feather)</label><input type="text" class="form-control" name="ikon" value="<?= htmlspecialchars($row['ikon']) ?>" placeholder="heart, briefcase, users, dll" required></div>
                                        <div class="col-md-4">
                                            <label class="small fw-bold">Warna Tema</label>
                                            <select name="warna_ikon" class="form-select">
                                                <option value="primary" <?= $row['warna_ikon']=='primary'?'selected':'' ?>>Biru</option>
                                                <option value="success" <?= $row['warna_ikon']=='success'?'selected':'' ?>>Hijau</option>
                                                <option value="warning" <?= $row['warna_ikon']=='warning'?'selected':'' ?>>Kuning</option>
                                                <option value="danger" <?= $row['warna_ikon']=='danger'?'selected':'' ?>>Merah</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3"><label class="small fw-bold">Urutan</label><input type="number" class="form-control" name="urutan" value="<?= $row['urutan'] ?>" required></div>
                                    </div>
                                </div>
                                <div class="modal-footer bg-white"><button type="submit" name="simpan_karir" class="btn btn-info text-white fw-bold rounded-pill px-4">Simpan Perubahan</button></div>
                            </form>
                        </div>
                    </div>
                    <?php endwhile; else: ?>
                        <tr><td colspan="5" class="text-center py-4">Data prospek karir belum ada.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form action="" method="POST" class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-dark text-white border-0"><h5 class="modal-title fw-bold">Tambah Prospek Karir</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
            <div class="modal-body p-4 bg-light">
                <div class="mb-3"><label class="small fw-bold">Nama Profesi</label><input type="text" class="form-control" name="nama_karir" placeholder="Cth: Peneliti Sosial" required></div>
                <div class="mb-3"><label class="small fw-bold">Deskripsi Singkat</label><textarea class="form-control" name="deskripsi" rows="3" placeholder="Jelaskan peran pekerjaan tersebut..." required></textarea></div>
                <div class="row">
                    <div class="col-md-5">
                        <label class="small fw-bold">Nama Ikon <a href="https://feathericons.com/" target="_blank">(FeatherIcon)</a></label>
                        <input type="text" class="form-control" name="ikon" placeholder="Cth: edit-3, users, globe" value="briefcase" required>
                    </div>
                    <div class="col-md-4">
                        <label class="small fw-bold">Warna Tema</label>
                        <select name="warna_ikon" class="form-select">
                            <option value="primary">Biru (Primary)</option>
                            <option value="success">Hijau (Success)</option>
                            <option value="warning">Kuning (Warning)</option>
                            <option value="danger">Merah (Danger)</option>
                        </select>
                    </div>
                    <div class="col-md-3"><label class="small fw-bold">Urutan</label><input type="number" class="form-control" name="urutan" value="<?= $q_karir->num_rows + 1 ?>" required></div>
                </div>
            </div>
            <div class="modal-footer bg-white"><button type="submit" name="simpan_karir" class="btn btn-dark fw-bold rounded-pill px-4">Simpan Data</button></div>
        </form>
    </div>
</div>
<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); 
// C:\xampp\htdocs\FINAL\modul\perpustakaan\dashboard.php

// Ambil data pengaturan saat ini
$pengaturan = $koneksi->query("SELECT * FROM perpus_pengaturan WHERE id = 1")->fetch_assoc();

// Proses update pengaturan jika form disubmit
if (isset($_POST['simpan_pengaturan'])) {
    $nama_perpus = $koneksi->real_escape_string($_POST['nama_perpus']);
    $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
    $jam_senin_kamis = $koneksi->real_escape_string($_POST['jam_senin_kamis']);
    $jam_jumat = $koneksi->real_escape_string($_POST['jam_jumat']);
    $jam_sabtu_minggu = $koneksi->real_escape_string($_POST['jam_sabtu_minggu']);
    
    $update = $koneksi->query("UPDATE perpus_pengaturan SET 
        nama_perpus = '$nama_perpus', 
        deskripsi = '$deskripsi',
        jam_senin_kamis = '$jam_senin_kamis',
        jam_jumat = '$jam_jumat',
        jam_sabtu_minggu = '$jam_sabtu_minggu'
        WHERE id = 1");

    if ($update) {
        echo "<script>alert('Pengaturan Beranda berhasil diperbarui!'); window.location='index.php?module=perpustakaan&act=dashboard';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui pengaturan.');</script>";
    }
}
?>

<div class="container-fluid px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><i data-feather="monitor" class="me-2"></i>Dasbor Perpustakaan</h1>
        <a href="../index.php?module=perpus" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill shadow-sm">
            <i class="fas fa-external-link-alt me-1"></i> Lihat Frontend
        </a>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 border-start border-4 border-primary shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Buku Fisik</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $buku = $koneksi->query("SELECT SUM(stok_fisik) as tot FROM perpus_koleksi WHERE kategori_koleksi='buku'")->fetch_assoc();
                                echo $buku['tot'] ?? 0; 
                                ?> <small class="text-muted">Eksemplar</small>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-book fa-2x text-primary opacity-50"></i></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 border-start border-4 border-info shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">E-Book & Skripsi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $digital = $koneksi->query("SELECT COUNT(*) as tot FROM perpus_koleksi WHERE kategori_koleksi != 'buku'")->fetch_assoc();
                                echo $digital['tot'] ?? 0; 
                                ?> <small class="text-muted">File</small>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-laptop-code fa-2x text-info opacity-50"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 border-start border-4 border-success shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Anggota Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0 <small class="text-muted">Orang</small></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-users fa-2x text-success opacity-50"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 border-start border-4 border-warning shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sirkulasi Dipinjam</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0 <small class="text-muted">Buku</small></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-hand-holding-box fa-2x text-warning opacity-50"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-xl-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white text-primary fw-bold">
                    <i class="fas fa-edit me-2"></i> Pengaturan Konten Beranda Frontend
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama / Judul Perpustakaan</label>
                            <input type="text" class="form-control" name="nama_perpus" value="<?= $pengaturan['nama_perpus'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Sub-judul / Deskripsi Pendek</label>
                            <textarea class="form-control" name="deskripsi" rows="2" required><?= $pengaturan['deskripsi'] ?></textarea>
                        </div>
                        <hr>
                        <h6 class="fw-bold mb-3 text-secondary">Pengaturan Jam Operasional</h6>
                        <div class="row gx-3">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Senin - Kamis</label>
                                <input type="text" class="form-control" name="jam_senin_kamis" value="<?= $pengaturan['jam_senin_kamis'] ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Jumat</label>
                                <input type="text" class="form-control" name="jam_jumat" value="<?= $pengaturan['jam_jumat'] ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Sabtu & Minggu</label>
                                <input type="text" class="form-control" name="jam_sabtu_minggu" value="<?= $pengaturan['jam_sabtu_minggu'] ?>">
                            </div>
                        </div>
                        <button type="submit" name="simpan_pengaturan" class="btn btn-primary mt-2">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card shadow-sm border-0 mb-4 bg-light">
                <div class="card-header bg-white text-dark fw-bold">
                    <i class="fas fa-bolt me-2 text-warning"></i> Pintasan Menu
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="index.php?module=perpustakaan&act=koleksi&kat=opac" class="btn btn-outline-secondary text-start"><i class="fas fa-book me-2"></i> Kelola Katalog Buku</a>
                        <a href="index.php?module=perpustakaan&act=keanggotaan&kat=daftar" class="btn btn-outline-secondary text-start"><i class="fas fa-users me-2"></i> Kelola Anggota</a>
                        <a href="index.php?module=perpustakaan&act=informasi&kat=berita" class="btn btn-outline-secondary text-start"><i class="fas fa-newspaper me-2"></i> Posting Berita Perpus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
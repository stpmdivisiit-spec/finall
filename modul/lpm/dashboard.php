<?php if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!"); 
// C:\xampp\htdocs\FINAL\modul\lpm\dashboard.php

// Ambil data pengaturan saat ini
$pengaturan = $koneksi->query("SELECT * FROM lpm_pengaturan WHERE id = 1")->fetch_assoc();
if (!$pengaturan) {
    $koneksi->query("INSERT INTO lpm_pengaturan (id, nama_lembaga) VALUES (1, 'Lembaga Penjaminan Mutu')");
    $pengaturan = $koneksi->query("SELECT * FROM lpm_pengaturan WHERE id = 1")->fetch_assoc();
}

// Proses update pengaturan jika form disubmit
if (isset($_POST['simpan_pengaturan'])) {
    $nama_lembaga = $koneksi->real_escape_string($_POST['nama_lembaga']);
    $deskripsi = $koneksi->real_escape_string($_POST['deskripsi']);
    $jam_senin_kamis = $koneksi->real_escape_string($_POST['jam_senin_kamis']);
    $jam_jumat = $koneksi->real_escape_string($_POST['jam_jumat']);
    $jam_sabtu_minggu = $koneksi->real_escape_string($_POST['jam_sabtu_minggu']);
    $link_kontak = $koneksi->real_escape_string($_POST['link_kontak']);
    
    // Logika Upload Background Header
    $bg_header = $pengaturan['bg_header'];
    if (isset($_FILES['bg_header']['name']) && $_FILES['bg_header']['name'] != '') {
        $nama_file = $_FILES['bg_header']['name'];
        $tmp_file = $_FILES['bg_header']['tmp_name'];
        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        
        if (in_array($ext, ['png','jpg','jpeg','webp'])) {
            $direktori = 'assets/img/demo/'; // Sesuai dengan direktori frontend
            $bg_baru = 'bg_lpm_' . time() . '.' . $ext;
            if (move_uploaded_file($tmp_file, $direktori . $bg_baru)) {
                $bg_header = $bg_baru;
            }
        } else {
            echo "<script>alert('Gagal: Format gambar harus JPG, PNG, atau WEBP!');</script>";
        }
    }

    $update = $koneksi->query("UPDATE lpm_pengaturan SET 
        nama_lembaga = '$nama_lembaga', 
        deskripsi = '$deskripsi',
        jam_senin_kamis = '$jam_senin_kamis',
        jam_jumat = '$jam_jumat',
        jam_sabtu_minggu = '$jam_sabtu_minggu',
        link_kontak = '$link_kontak',
        bg_header = '$bg_header'
        WHERE id = 1");

    if ($update) {
        echo "<script>alert('Pengaturan Beranda LPM berhasil diperbarui!'); window.location='index.php?module=lpm&act=dashboard';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui pengaturan.');</script>";
    }
}
?>

<div class="container-fluid px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><i class="fas fa-chart-line me-2 text-success"></i>Dasbor Penjaminan Mutu (LPM)</h1>
        <a href="../index.php?module=lpm" target="_blank" class="btn btn-outline-success btn-sm rounded-pill shadow-sm">
            <i class="fas fa-external-link-alt me-1"></i> Lihat Frontend
        </a>
    </div>

    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 border-start border-4 border-primary shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dokumen SPMI</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <i class="fas fa-check text-success small"></i> Aktif
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-file-contract fa-2x text-primary opacity-50"></i></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 border-start border-4 border-success shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Audit Mutu (AMI)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <i class="fas fa-sync text-success small"></i> Terjadwal
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-tasks fa-2x text-success opacity-50"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 border-start border-4 border-warning shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Akreditasi Institusi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Baik Sekali</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-award fa-2x text-warning opacity-50"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 border-start border-4 border-danger shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Survei & Tracer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Grafik</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-chart-pie fa-2x text-danger opacity-50"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white text-success fw-bold">
                    <i class="fas fa-edit me-2"></i> Pengaturan Tampilan Beranda Frontend
                </div>
                <div class="card-body p-4">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama / Judul Lembaga</label>
                            <input type="text" class="form-control bg-light" name="nama_lembaga" value="<?= htmlspecialchars($pengaturan['nama_lembaga']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Sub-judul / Penjelasan Singkat</label>
                            <textarea class="form-control bg-light" name="deskripsi" rows="2" required><?= htmlspecialchars($pengaturan['deskripsi']) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Ganti Background Utama (Header)</label>
                            <input type="file" class="form-control bg-light" name="bg_header" accept="image/jpeg, image/png, image/webp">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        </div>
                        <hr class="my-4">
                        <h6 class="fw-bold mb-3 text-secondary"><i class="fas fa-clock me-2"></i> Pengaturan Jam Operasional</h6>
                        <div class="row gx-3">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Senin - Kamis</label>
                                <input type="text" class="form-control" name="jam_senin_kamis" value="<?= htmlspecialchars($pengaturan['jam_senin_kamis']) ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Jumat</label>
                                <input type="text" class="form-control" name="jam_jumat" value="<?= htmlspecialchars($pengaturan['jam_jumat']) ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Sabtu & Minggu</label>
                                <input type="text" class="form-control" name="jam_sabtu_minggu" value="<?= htmlspecialchars($pengaturan['jam_sabtu_minggu']) ?>">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Link Tombol "Hubungi LPM" (WhatsApp/Email)</label>
                            <input type="text" class="form-control" name="link_kontak" value="<?= htmlspecialchars($pengaturan['link_kontak']) ?>">
                        </div>
                        <div class="text-end">
                            <button type="submit" name="simpan_pengaturan" class="btn btn-success px-4 rounded-pill">
                                <i class="fas fa-save me-1"></i> Simpan Pengaturan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card shadow-sm border-0 mb-4 bg-light">
                <div class="card-header bg-white text-dark fw-bold border-bottom-0">
                    <i class="fas fa-bolt me-2 text-warning"></i> Pintasan Dokumen
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="index.php?module=lpm&act=dokumen&kat=kebijakan" class="btn btn-outline-primary text-start"><i class="fas fa-file-contract me-2"></i> Kelola Kebijakan Mutu</a>
                        <a href="index.php?module=lpm&act=dokumen&kat=standar" class="btn btn-outline-success text-start"><i class="fas fa-list-alt me-2"></i> Kelola Standar Mutu</a>
                        <a href="index.php?module=lpm&act=dokumen&kat=manual" class="btn btn-outline-warning text-dark text-start"><i class="fas fa-book me-2"></i> Kelola Manual Mutu</a>
                        <a href="index.php?module=lpm&act=dokumen&kat=formulir" class="btn btn-outline-danger text-start"><i class="fas fa-edit me-2"></i> Kelola Formulir Mutu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
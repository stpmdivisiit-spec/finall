<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$prodi = 'pemerintahan';

// Ambil data Tujuan & CPL
$query = $koneksi->query("SELECT * FROM prodi_tujuan_cpl WHERE prodi = '$prodi'");
$data = $query->fetch_assoc();

$id_tujuan = $data['id'] ?? '';
$tujuan = $data['tujuan'] ?? '';
$cpl = $data['cpl'] ?? '';
?>

<div class="container-xl px-4 mt-4">
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-bullseye me-1"></i> Kelola Tujuan & CPL
        </div>
        <div class="card-body">
            <form action="index.php?module=prodi_pemerintahan&act=proses_tujuan_cpl" method="POST">
                
                <input type="hidden" name="id" value="<?= htmlspecialchars($id_tujuan) ?>">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">

                <div class="mb-3">
                    <label class="form-label fw-bold" for="tujuan">Tujuan Program Studi</label>
                    <textarea class="form-control" id="tujuan" name="tujuan" rows="5" placeholder="Masukkan tujuan prodi..."><?= htmlspecialchars($tujuan) ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold" for="cpl">Capaian Pembelajaran Lulusan (CPL)</label>
                    <textarea class="form-control" id="cpl" name="cpl" rows="7" placeholder="Masukkan CPL..."><?= htmlspecialchars($cpl) ?></textarea>
                </div>

                <button class="btn btn-primary" type="submit"><i class="fas fa-save me-1"></i> Simpan Data</button>
            </form>
        </div>
    </div>
</div>
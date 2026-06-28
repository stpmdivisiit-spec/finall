<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// ==========================================
// PROSES PENGEMBALIAN & PELAPORAN BARANG
// ==========================================
if (isset($_POST['proses_kembali'])) {
    $id_transaksi = (int)$_POST['id_transaksi'];
    $kondisi_akhir = $koneksi->real_escape_string($_POST['kondisi_saat_kembali']);
    $tgl_kembali_aktual = date('Y-m-d');
    
    // 1. Tarik data pinjaman dan detail barang
    $q_pinjam = $koneksi->query("
        SELECT t.*, b.id_master, b.kode_barang, b.nama_barang, b.lokasi 
        FROM transaksi_peminjaman t 
        JOIN barang_detail b ON t.id_detail = b.id 
        WHERE t.id = $id_transaksi
    ")->fetch_assoc();
    
    if ($q_pinjam) {
        $id_detail = $q_pinjam['id_detail'];
        
        // 2. Tandai transaksi sebagai Selesai/Dikembalikan di riwayat
        $koneksi->query("UPDATE transaksi_peminjaman SET status_pinjam = 'Dikembalikan', tanggal_kembali_aktual = '$tgl_kembali_aktual', kondisi_saat_kembali = '$kondisi_akhir' WHERE id = $id_transaksi");
        
        // 3. Update kondisi di Master Detail Barang GitHub
        $koneksi->query("UPDATE barang_detail SET status = '$kondisi_akhir' WHERE id = $id_detail");
        
        // 4. JIKA BARANG HANCUR / HILANG -> Masukkan ke tblbarangmusnah
        if (in_array($kondisi_akhir, ['Rusak Berat', 'Musnah', 'Hilang'])) {
            $id_master = $q_pinjam['id_master'];
            $kode_b = $q_pinjam['kode_barang'];
            $nama_b = $q_pinjam['nama_barang'];
            $lokasi = $q_pinjam['lokasi'];
            $ket = "Dilaporkan rusak/hilang pasca dipinjam oleh: " . $q_pinjam['unit_peminjam'];
            
            $koneksi->query("INSERT INTO tblbarangmusnah (id_master, kode_barang, nama_barang, lokasi_terakhir, tanggal_musnah, keterangan) 
                             VALUES ('$id_master', '$kode_b', '$nama_b', '$lokasi', '$tgl_kembali_aktual', '$ket')");
        }
        
        setFlashMessage('success', "Aset berhasil dikembalikan! Kondisi di-update menjadi: $kondisi_akhir.");
    }
    header("Location: index.php?module=sekretariat&act=arsip&kat=aset_barang"); exit;
}

// ==========================================
// PENGAMBILAN DATA (Active, History, Stock)
// ==========================================
$q_aktif = $koneksi->query("
    SELECT t.id, t.unit_peminjam, t.tanggal_pinjam, t.tanggal_kembali, t.keterangan, t.group_id,
           b.nama_barang, b.kode_barang, b.lokasi 
    FROM transaksi_peminjaman t 
    JOIN barang_detail b ON t.id_detail = b.id 
    WHERE t.status_pinjam = 'Dipinjam' ORDER BY t.tanggal_pinjam DESC
");

$q_riwayat = $koneksi->query("
    SELECT t.id, t.group_id, t.unit_peminjam, t.tanggal_pinjam, t.tanggal_kembali_aktual, t.kondisi_saat_kembali,
           b.nama_barang, b.kode_barang 
    FROM transaksi_peminjaman t 
    JOIN barang_detail b ON t.id_detail = b.id 
    WHERE t.status_pinjam = 'Dikembalikan' ORDER BY t.tanggal_kembali_aktual DESC
");

$q_rekap = $koneksi->query("
    SELECT nama_barang, klasifikasi, 
           SUM(CASE WHEN status IN ('Baik', 'Baru', 'Layak Pakai') THEN 1 ELSE 0 END) as stok_siap,
           SUM(CASE WHEN status = 'Dipinjam' THEN 1 ELSE 0 END) as sdg_dipinjam,
           SUM(CASE WHEN status IN ('Rusak Ringan', 'Rusak Berat', 'Musnah', 'Hilang') THEN 1 ELSE 0 END) as rusak
    FROM barang_detail GROUP BY nama_barang, klasifikasi ORDER BY nama_barang ASC
");
?>

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content pt-3 pb-3">
            <h1 class="page-header-title fw-bold text-dark">
                <div class="page-header-icon"><i class="fas fa-boxes text-secondary"></i></div>
                Kelola Inventaris & Pelaporan Aset
            </h1>
        </div>
    </div>
</header>

<div class="container-fluid px-4">
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5 border-top border-secondary border-4">
        <div class="card-header bg-white p-0 border-bottom">
            <ul class="nav nav-tabs nav-justified" id="asetTabs">
                <li class="nav-item"><button class="nav-link active fw-bold text-dark py-3" data-bs-toggle="tab" data-bs-target="#aktif"><i class="fas fa-people-carry me-2 text-primary"></i>Peminjaman Aktif (<?= $q_aktif->num_rows ?>)</button></li>
                <li class="nav-item"><button class="nav-link fw-bold text-dark py-3" data-bs-toggle="tab" data-bs-target="#riwayat"><i class="fas fa-history me-2 text-success"></i>Riwayat Kembali</button></li>
                <li class="nav-item"><button class="nav-link fw-bold text-dark py-3" data-bs-toggle="tab" data-bs-target="#rekap"><i class="fas fa-box-open me-2 text-warning"></i>Ketersediaan Aset</button></li>
            </ul>
        </div>

        <div class="card-body p-4 bg-light">
            <div class="tab-content">
                
                <div class="tab-pane fade show active" id="aktif">
                    <div class="table-responsive bg-white border rounded-3 p-2">
                        <table class="table table-hover align-middle mb-0 datatable-standar" style="width:100%;">
                            <thead class="bg-light text-muted small text-uppercase">
                                <tr><th>Grup ID</th><th>Peminjam</th><th>Aset</th><th>Durasi</th><th class="text-center">Aksi</th></tr>
                            </thead>
                            <tbody>
                                <?php if($q_aktif->num_rows > 0): while($row = $q_aktif->fetch_assoc()): ?>
                                <tr>
                                    <td><span class="badge bg-secondary bg-opacity-10 text-secondary border"><?= $row['group_id'] ?></span></td>
                                    <td><div class="fw-bold text-dark"><?= htmlspecialchars($row['unit_peminjam']) ?></div><div class="small text-muted"><?= htmlspecialchars($row['keterangan']) ?></div></td>
                                    <td><div class="fw-bold text-primary"><?= htmlspecialchars($row['nama_barang']) ?></div><div class="small text-muted">[<?= htmlspecialchars($row['kode_barang']) ?>]</div></td>
                                    <td><div class="fw-bold text-dark"><?= date('d M Y', strtotime($row['tanggal_pinjam'])) ?></div></td>
                                    <td class="text-center px-4">
                                        <button class="btn btn-sm btn-primary rounded-pill fw-bold" data-bs-toggle="modal" data-bs-target="#modalKembali<?= $row['id'] ?>"><i class="fas fa-undo-alt me-1"></i> Terima</button>
                                    </td>
                                </tr>
                                <?php endwhile; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="riwayat">
                    <div class="table-responsive bg-white border rounded-3 p-2">
                        <table class="table table-hover align-middle mb-0 datatable-standar" style="width:100%;">
                            <thead class="bg-light text-muted small text-uppercase">
                                <tr><th>Peminjam</th><th>Aset</th><th>Tgl Kembali Aktual</th><th>Kondisi Akhir</th></tr>
                            </thead>
                            <tbody>
                                <?php if($q_riwayat->num_rows > 0): while($riw = $q_riwayat->fetch_assoc()): ?>
                                <tr>
                                    <td><span class="fw-bold text-dark"><?= htmlspecialchars($riw['unit_peminjam']) ?></span></td>
                                    <td><div class="fw-bold text-primary"><?= htmlspecialchars($riw['nama_barang']) ?></div><div class="small text-muted">[<?= htmlspecialchars($riw['kode_barang']) ?>]</div></td>
                                    <td><span class="fw-bold text-success"><?= date('d M Y', strtotime($riw['tanggal_kembali_aktual'])) ?></span></td>
                                    <td>
                                        <?php 
                                            $bg = 'success'; $kds = strtolower($riw['kondisi_saat_kembali']);
                                            if(strpos($kds, 'rusak ringan') !== false) $bg = 'warning text-dark';
                                            if(strpos($kds, 'berat') !== false || strpos($kds, 'musnah') !== false) $bg = 'danger';
                                        ?>
                                        <span class="badge bg-<?= $bg ?>"><?= htmlspecialchars($riw['kondisi_saat_kembali']) ?></span>
                                    </td>
                                </tr>
                                <?php endwhile; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="rekap">
                    <div class="table-responsive bg-white border rounded-3 p-2">
                        <table class="table table-bordered table-hover align-middle mb-0 datatable-standar" style="width:100%;">
                            <thead class="bg-light text-dark fw-bold text-center">
                                <tr><th rowspan="2" class="align-middle">Nama Barang</th><th colspan="3">Status Distribusi (Unit)</th></tr>
                                <tr><th><i class="fas fa-check text-success"></i> Siap Pakai</th><th><i class="fas fa-sync text-primary"></i> Dipinjam</th><th><i class="fas fa-times text-danger"></i> Rusak/Musnah</th></tr>
                            </thead>
                            <tbody class="text-center">
                                <?php if($q_rekap->num_rows > 0): while($rek = $q_rekap->fetch_assoc()): ?>
                                <tr>
                                    <td class="text-start fw-bold text-dark"><?= htmlspecialchars($rek['nama_barang']) ?></td>
                                    <td><span class="badge bg-success bg-opacity-10 text-success border px-3 py-2 fs-6"><?= $rek['stok_siap'] ?></span></td>
                                    <td><span class="badge bg-primary bg-opacity-10 text-primary border px-3 py-2 fs-6"><?= $rek['sdg_dipinjam'] ?></span></td>
                                    <td><span class="badge bg-danger bg-opacity-10 text-danger border px-3 py-2 fs-6"><?= $rek['rusak'] ?></span></td>
                                </tr>
                                <?php endwhile; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php 
if($q_aktif->num_rows > 0): 
    $q_aktif->data_seek(0); 
    while($row = $q_aktif->fetch_assoc()): 
?>
<div class="modal fade" id="modalKembali<?= $row['id'] ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="" method="POST" class="modal-content border-0 shadow-lg rounded-4">
            <input type="hidden" name="id_transaksi" value="<?= $row['id'] ?>">
            <div class="modal-header bg-primary text-white border-0 p-4">
                <h5 class="modal-title fw-bold"><i class="fas fa-clipboard-check me-2"></i> Form Pengembalian Aset</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4 bg-light text-start">
                <h5 class="fw-bold text-primary mb-1"><?= htmlspecialchars($row['nama_barang']) ?></h5>
                <p class="text-muted small mb-4">[<?= htmlspecialchars($row['kode_barang']) ?>] dikembalikan oleh <?= htmlspecialchars($row['unit_peminjam']) ?></p>
                
                <div class="mb-3">
                    <label class="small fw-bold text-dark mb-2">Kondisi Fisik Barang <span class="text-danger">*</span></label>
                    <select class="form-select shadow-sm fw-bold border-0 py-2" name="kondisi_saat_kembali" required style="cursor:pointer;">
                        <option value="Baik">🟢 Barang Utuh & Layak Pakai (Baik)</option>
                        <option value="Rusak Ringan">🟡 Mengalami Kerusakan Ringan / Cacat Fisik</option>
                        <option value="Rusak Berat">🔴 Hancur / Rusak Berat (Harus Digudangkan)</option>
                        <option value="Musnah">⚫ Hilang / Musnah</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer bg-white border-0 p-3 justify-content-center">
                <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="proses_kembali" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">Simpan Pengembalian</button>
            </div>
        </form>
    </div>
</div>
<?php 
    endwhile; 
endif; 
?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    $('.datatable-standar').DataTable({ "pageLength": 10 });
});
</script>
<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// ==========================================
// 1. PROSES PEMINJAMAN SPESIFIK (MULTI-SELECT)
// ==========================================
if (isset($_POST['pinjam_spesifik'])) {
    $unit_peminjam = $koneksi->real_escape_string($_POST['unit_peminjam']);
    $tanggal_pinjam = $koneksi->real_escape_string($_POST['tanggal_pinjam']);
    $tanggal_kembali = !empty($_POST['tanggal_kembali']) ? $koneksi->real_escape_string($_POST['tanggal_kembali']) : NULL;
    $keterangan = $koneksi->real_escape_string($_POST['keterangan']);
    
    $id_details = $_POST['id_detail'] ?? []; 
    
    if (!empty($id_details) && is_array($id_details)) {
        $group_id = 'PJM-S-' . time(); 
        $berhasil = 0; $gagal = 0;

        foreach ($id_details as $id) {
            $id_val = (int)$id;
            $cek = $koneksi->query("SELECT status FROM barang_detail WHERE id = $id_val")->fetch_assoc();
            if ($cek && in_array($cek['status'], ['Baru', 'Baik', 'Layak Pakai'])) {
                
                $koneksi->query("INSERT INTO transaksi_peminjaman (id_detail, unit_peminjam, tanggal_pinjam, tanggal_kembali, status_sebelumnya, keterangan, group_id, status_pinjam) 
                                 VALUES ('$id_val', '$unit_peminjam', '$tanggal_pinjam', ".($tanggal_kembali ? "'$tanggal_kembali'" : "NULL").", '{$cek['status']}', '$keterangan', '$group_id', 'Dipinjam')");
                
                $koneksi->query("UPDATE barang_detail SET status = 'Dipinjam' WHERE id = $id_val");
                $berhasil++;
            } else {
                $gagal++;
            }
        }

        if ($berhasil > 0) {
            $_SESSION['flash_type'] = 'success';
            $_SESSION['flash_message'] = "Berhasil meminjam $berhasil unit aset spesifik!";
        } else {
            $_SESSION['flash_type'] = 'danger';
            $_SESSION['flash_message'] = "Gagal! Semua aset yang dipilih sedang dipinjam atau rusak.";
        }
    } else {
        $_SESSION['flash_type'] = 'warning';
        $_SESSION['flash_message'] = "Pilih minimal 1 unit aset yang akan dipinjam.";
    }
    header("Location: index.php?module=sekre_layanan_fasilitas"); exit;
}

// ==========================================
// 2. PROSES PEMINJAMAN MASSAL
// ==========================================
if (isset($_POST['pinjam_massal'])) {
    $unit_peminjam = $koneksi->real_escape_string($_POST['unit_peminjam']);
    $id_master = (int)$_POST['id_master'];
    $jumlah = (int)$_POST['jumlah'];
    $tanggal_pinjam = $koneksi->real_escape_string($_POST['tanggal_pinjam']);
    $tanggal_kembali = !empty($_POST['tanggal_kembali']) ? $koneksi->real_escape_string($_POST['tanggal_kembali']) : NULL;
    $keterangan = $koneksi->real_escape_string($_POST['keterangan']);
    
    $q_stok = $koneksi->query("SELECT id, status, nama_barang FROM barang_detail WHERE id_master = '$id_master' AND status IN ('Baru', 'Baik', 'Layak Pakai') LIMIT $jumlah");
    
    if ($q_stok->num_rows >= $jumlah && $jumlah > 0) {
        $group_id = 'PJM-M-' . time();
        $nama_brg = '';
        while($b = $q_stok->fetch_assoc()) {
            $id_bd = $b['id']; $nama_brg = $b['nama_barang'];
            $koneksi->query("INSERT INTO transaksi_peminjaman (id_detail, unit_peminjam, tanggal_pinjam, tanggal_kembali, status_sebelumnya, keterangan, group_id, status_pinjam) 
                             VALUES ('$id_bd', '$unit_peminjam', '$tanggal_pinjam', ".($tanggal_kembali ? "'$tanggal_kembali'" : "NULL").", '{$b['status']}', '$keterangan', '$group_id', 'Dipinjam')");
            $koneksi->query("UPDATE barang_detail SET status = 'Dipinjam' WHERE id = $id_bd");
        }
        $_SESSION['flash_type'] = 'success';
        $_SESSION['flash_message'] = "Peminjaman massal $jumlah unit '$nama_brg' berhasil diajukan!";
    } else {
        $_SESSION['flash_type'] = 'danger';
        $_SESSION['flash_message'] = "Stok tidak mencukupi (Tersedia: {$q_stok->num_rows} unit siap pakai).";
    }
    header("Location: index.php?module=sekre_layanan_fasilitas"); exit;
}

// ==========================================
// PENGAMBILAN DATA MASTER UNTUK DROPDOWN
// ==========================================
$q_master = $koneksi->query("
    SELECT m.id, m.nama_barang, m.kode_induk, COUNT(d.id) as stok_tersedia 
    FROM barang_master m 
    JOIN barang_detail d ON m.id = d.id_master 
    WHERE d.status IN ('Baru', 'Baik', 'Layak Pakai') 
    GROUP BY m.id 
    ORDER BY m.nama_barang ASC
");
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

<main>
    <header class="page-header page-header-dark bg-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4" data-aos="fade-down">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white fw-bold">
                            <div class="page-header-icon text-white"><i data-feather="key"></i></div>
                            Peminjaman Fasilitas & Aset
                        </h1>
                        <div class="page-header-subtitle text-white-50">Layanan reservasi ruangan dan peminjaman inventaris kampus.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            
            <div class="col-lg-8 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm border-0 h-100 rounded-4 overflow-hidden">
                    <div class="card-header bg-white p-0 border-bottom border-2 border-secondary">
                        <ul class="nav nav-tabs nav-justified border-0" id="pinjamTabs">
                            <li class="nav-item"><button class="nav-link active fw-bold text-dark border-0 py-3" data-bs-toggle="tab" data-bs-target="#massal"><i class="fas fa-layer-group me-2 text-secondary"></i>Pinjam Massal</button></li>
                            <li class="nav-item"><button class="nav-link fw-bold text-dark border-0 py-3" data-bs-toggle="tab" data-bs-target="#spesifik"><i class="fas fa-barcode me-2 text-secondary"></i>Pinjam Spesifik</button></li>
                        </ul>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <div class="tab-content">
                            
                            <div class="tab-pane fade show active" id="massal">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label class="small fw-bold text-dark mb-1">Nama Peminjam / ORMAWA <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control bg-light" name="unit_peminjam" placeholder="Cth: BEM STPM" required>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-8">
                                            <label class="small fw-bold text-dark mb-1">Pilih Master Barang <span class="text-danger">*</span></label>
                                            <select class="selectpicker form-control border bg-white shadow-sm" name="id_master" data-live-search="true" title="-- Ketik nama aset --" required>
                                                <?php 
                                                $q_master->data_seek(0);
                                                while($m = $q_master->fetch_assoc()): 
                                                ?>
                                                    <option value="<?= $m['id'] ?>" data-subtext="Tersedia: <?= $m['stok_tersedia'] ?> unit">
                                                        [<?= $m['kode_induk'] ?>] <?= htmlspecialchars($m['nama_barang']) ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-3 mt-md-0">
                                            <label class="small fw-bold text-dark mb-1">Jumlah Pinjam <span class="text-danger">*</span></label>
                                            <input type="number" min="1" class="form-control bg-light" name="jumlah" value="1" required>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6 mb-3 mb-md-0"><label class="small fw-bold text-dark mb-1">Tgl Pinjam <span class="text-danger">*</span></label><input type="date" class="form-control bg-light" name="tanggal_pinjam" value="<?= date('Y-m-d') ?>" required></div>
                                        <div class="col-md-6"><label class="small fw-bold text-dark mb-1">Rencana Kembali <span class="text-muted">(Opsional)</span></label><input type="date" class="form-control bg-light" name="tanggal_kembali"></div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="small fw-bold text-dark mb-1">Keperluan <span class="text-danger">*</span></label>
                                        <textarea class="form-control bg-light" name="keterangan" rows="2" required></textarea>
                                    </div>
                                    <button type="submit" name="pinjam_massal" class="btn btn-secondary w-100 rounded-pill fw-bold py-2"><i class="fas fa-paper-plane me-2"></i> Ajukan Peminjaman Massal</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="spesifik">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label class="small fw-bold text-dark mb-1">Nama Peminjam / ORMAWA <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control bg-light" name="unit_peminjam" placeholder="Cth: Dosen (Pak Andrianto)" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="small fw-bold text-dark mb-1">1. Pilih Master Barang <span class="text-danger">*</span></label>
                                        <select class="selectpicker form-control border bg-white shadow-sm" id="select_master_spesifik" data-live-search="true" title="-- Pilih Induk Barang --" required>
                                            <?php 
                                            $q_master->data_seek(0);
                                            while($m = $q_master->fetch_assoc()): 
                                            ?>
                                                <option value="<?= $m['id'] ?>">
                                                    [<?= $m['kode_induk'] ?>] <?= htmlspecialchars($m['nama_barang']) ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="small fw-bold text-dark mb-1">2. Pilih Kode Unit Spesifik <span class="text-primary">(Bisa Pilih Banyak!)</span> <span class="text-danger">*</span></label>
                                        <select class="selectpicker form-control border bg-white shadow-sm" name="id_detail[]" id="select_kode_spesifik" multiple data-live-search="true" data-container="body" data-actions-box="true" title="-- Tunggu Pilihan Master Barang --" required>
                                            </select>
                                    </div>
                                    
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6 mb-3 mb-md-0"><label class="small fw-bold text-dark mb-1">Tgl Pinjam <span class="text-danger">*</span></label><input type="date" class="form-control bg-light" name="tanggal_pinjam" value="<?= date('Y-m-d') ?>" required></div>
                                        <div class="col-md-6"><label class="small fw-bold text-dark mb-1">Rencana Kembali <span class="text-muted">(Opsional)</span></label><input type="date" class="form-control bg-light" name="tanggal_kembali"></div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="small fw-bold text-dark mb-1">Keperluan <span class="text-danger">*</span></label>
                                        <textarea class="form-control bg-light" name="keterangan" rows="2" placeholder="Cth: Dipinjam untuk Ujian Skripsi / Sidang..." required></textarea>
                                    </div>
                                    <button type="submit" name="pinjam_spesifik" class="btn btn-secondary w-100 rounded-pill fw-bold py-2"><i class="fas fa-barcode me-2"></i> Ajukan Peminjaman Spesifik</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4" data-aos="fade-left" data-aos-delay="200">
                <div class="card shadow-sm border-0 h-100 bg-secondary text-white text-center p-4 p-md-5 d-flex flex-column justify-content-center rounded-4">
                    <i class="fas fa-clipboard-check fa-4x mb-4 text-white-50"></i>
                    <h5 class="fw-black mb-4 text-white">Aturan Peminjaman</h5>
                    <ul class="list-unstyled text-start small opacity-75 mb-0" style="line-height: 1.8;">
                        <li><i class="fas fa-check-circle me-2"></i><strong>Pilih Semua:</strong> Anda bisa klik "Select All" pada daftar unit jika meminjam banyak unit sekaligus.</li>
                        <li><i class="fas fa-check-circle me-2"></i>Barang yang sedang dipinjam atau rusak otomatis tersembunyi dari pencarian.</li>
                        <li><i class="fas fa-check-circle me-2"></i>Peminjam bertanggung jawab penuh atas kehilangan atau kerusakan aset.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            $('.selectpicker').selectpicker('refresh');
            $('#select_master_spesifik').on('change', function() {
                var idMasterTerpilih = $(this).val();
                var $detailSelect = $('#select_kode_spesifik');
                $detailSelect.empty();
                $detailSelect.selectpicker('refresh');
                if (idMasterTerpilih) {
                    $detailSelect.html('<option disabled>Mencari ketersediaan aset...</option>');
                    $detailSelect.selectpicker('refresh');
                    $.ajax({
                        url: 'modul/publik/ajax_get_barang_detail.php',
                        type: 'POST',
                        data: { id_master: idMasterTerpilih },
                        dataType: 'json',
                        success: function(response) {
                            $detailSelect.empty(); 
                            if (response.length > 0) {
                                $.each(response, function(index, item) {
                                    var opt = $('<option></option>')
                                        .val(item.id)
                                        .attr('data-subtext', 'Lokasi: ' + item.lokasi)
                                        .text('[' + item.kode + '] - ' + item.nama);
                                    $detailSelect.append(opt);
                                });
                            } else {
                                $detailSelect.append('<option disabled>Stok habis / sedang dipinjam</option>');
                            }
                            $detailSelect.selectpicker('refresh');
                        },
                        error: function() {
                            $detailSelect.empty();
                            $detailSelect.append('<option disabled>Terjadi kesalahan koneksi</option>');
                            $detailSelect.selectpicker('refresh');
                        }
                    });
                }
            });
            
        }, 500);
    });
</script>
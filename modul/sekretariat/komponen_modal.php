<?php
// Pastikan file ini tidak bisa diakses langsung melalui URL
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

// =========================================================================
// 1. MODAL UNTUK BACKEND (ADMIN): UPDATE STATUS SURAT
// =========================================================================
if ($jenis_modal == 'backend_status_surat'): 
?>
    <div class="modal fade" id="modalStatus<?= $row['id'] ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <form action="" method="POST" class="modal-content border-0 shadow-lg rounded-4">
                <input type="hidden" name="id_permohonan" value="<?= $row['id'] ?>">
                
                <div class="modal-header bg-primary text-white border-0">
                    <h5 class="modal-title fw-bold">Update Status Surat</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body p-4 bg-light text-start">
                    <p class="small text-muted text-center mb-3">Pilih status proses untuk permohonan surat dari <strong class="text-dark"><?= htmlspecialchars($row['nama_lengkap']) ?></strong>.</p>
                    
                    <div class="mb-3">
                        <select class="form-select form-select-lg shadow-sm" name="status_surat" required>
                            <option value="Menunggu" <?= ($row['status'] == 'Menunggu') ? 'selected' : '' ?>>🟡 Menunggu Antrean</option>
                            <option value="Diproses" <?= ($row['status'] == 'Diproses') ? 'selected' : '' ?>>🔵 Sedang Diproses</option>
                            <option value="Selesai" <?= ($row['status'] == 'Selesai') ? 'selected' : '' ?>>🟢 Selesai (Bisa Diambil)</option>
                            <option value="Ditolak" <?= ($row['status'] == 'Ditolak') ? 'selected' : '' ?>>🔴 Ditolak (Ada Tunggakan)</option>
                        </select>
                    </div>
                </div>
                
                <div class="modal-footer bg-white border-0">
                    <button type="submit" name="update_status" class="btn btn-primary w-100 fw-bold rounded-pill shadow-sm">Simpan Status</button>
                </div>
            </form>
        </div>
    </div>

<?php 
// =========================================================================
// 2. MODAL UNTUK FRONTEND (PUBLIK): CEK STATUS PENGAJUAN
// =========================================================================
elseif ($jenis_modal == 'frontend_cek_status'): 
?>
    <div class="modal fade" id="modalCekStatus" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="index.php?module=sekre_layanan_status" method="GET" class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <input type="hidden" name="module" value="sekre_layanan_status">
                
                <div class="modal-header bg-secondary text-white border-0 p-4">
                    <h5 class="modal-title fw-bold"><i class="fas fa-search me-2"></i> Lacak Status Permohonan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body p-4 p-md-5 bg-white text-center">
                    <i class="fas fa-id-card fa-3x text-secondary opacity-25 mb-4"></i>
                    <h6 class="fw-bold text-dark mb-3">Masukkan Nomor Induk Mahasiswa (NIM)</h6>
                    <p class="text-muted small mb-4">Silakan masukkan NIM Anda untuk melacak sampai sejauh mana surat permohonan Anda diproses oleh Sekretariat.</p>
                    
                    <input type="text" class="form-control form-control-lg text-center bg-light rounded-pill mb-3 fw-bold" name="nim_lacak" placeholder="Contoh: 12345678" required>
                </div>
                
                <div class="modal-footer bg-light border-0 p-3 justify-content-center">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-secondary rounded-pill px-5 fw-bold shadow-sm">Lacak Surat</button>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>
<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
$query = $koneksi->query("SELECT * FROM kema_pengaduan ORDER BY id DESC");
?>

<div class="container-xl px-4 mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white fw-bold">
            <i class="fas fa-inbox me-2"></i> Kotak Masuk Pengaduan Mahasiswa
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="bg-light">
                    <tr>
                        <th width="15%">Tanggal</th>
                        <th width="25%">Pengirim & Kategori</th>
                        <th width="35%">Isi Keluhan</th>
                        <th width="15%" class="text-center">Status</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $query->fetch_assoc()): 
                        // Warna badge status
                        $bg = ($row['status'] == 'Selesai') ? 'success' : (($row['status'] == 'Diproses') ? 'warning text-dark' : 'danger');
                    ?>
                    <tr>
                        <td><?= date('d/m/Y', strtotime($row['tanggal_masuk'])) ?></td>
                        <td>
                            <strong><?= htmlspecialchars($row['nama_mahasiswa']) ?></strong><br>
                            <span class="small text-muted">NIM: <?= htmlspecialchars($row['nim']) ?></span><br>
                            <span class="badge bg-secondary mt-1"><?= htmlspecialchars($row['kategori_layanan']) ?></span>
                        </td>
                        <td>
                            <p class="mb-1 text-dark"><?= nl2br(htmlspecialchars($row['isi_pengaduan'])) ?></p>
                            <?php if(!empty($row['tanggapan_admin'])): ?>
                                <div class="bg-light p-2 mt-2 border-start border-3 border-success small text-success">
                                    <strong>Tanggapan:</strong><br> <?= nl2br(htmlspecialchars($row['tanggapan_admin'])) ?>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="text-center align-middle">
                            <span class="badge bg-<?= $bg ?>"><?= $row['status'] ?></span>
                        </td>
                        <td class="text-center align-middle">
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalTanggapan<?= $row['id'] ?>"><i data-feather="message-square"></i></button>
                        </td>
                    </tr>

                    <div class="modal fade" id="modalTanggapan<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="index.php?module=kemahasiswaan&act=proses_pengaduan" method="POST">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">Tanggapi Keluhan</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="mb-3">
                                            <label class="fw-bold">Ubah Status Laporan</label>
                                            <select class="form-control" name="status">
                                                <option value="Menunggu" <?= $row['status'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
                                                <option value="Diproses" <?= $row['status'] == 'Diproses' ? 'selected' : '' ?>>Sedang Diproses</option>
                                                <option value="Selesai" <?= $row['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai / Ditutup</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="fw-bold">Ketik Tanggapan / Balasan</label>
                                            <textarea class="form-control" name="tanggapan_admin" rows="4"><?= htmlspecialchars($row['tanggapan_admin']) ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary w-100">Kirim Tanggapan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
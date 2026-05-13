<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");
$prodi = 'pemerintahan';
$modul = $act;
?>

<div class="container-xl px-4 mt-4">

    <?php if ($modul == 'prestasi'): 
        $query = $koneksi->query("SELECT * FROM kema_prestasi WHERE prodi = '$prodi' ORDER BY tahun DESC");
    ?>
    <!-- ================= UI PRESTASI MAHASISWA ================= -->
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top-lg border-top-warning">
                <div class="card-header fw-bold text-warning">Tambah Data Prestasi</div>
                <div class="card-body">
                    <form action="index.php?module=prodi_pemerintahan&act=proses_kema" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="aksi" value="tambah_prestasi">
                        
                        <div class="mb-3">
                            <label class="small fw-bold">Nama Mahasiswa</label>
                            <input class="form-control" name="nama_mahasiswa" type="text" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Nama Lomba / Kegiatan</label>
                            <textarea class="form-control" name="nama_kegiatan" rows="2" required></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="small fw-bold">Capaian (Juara)</label>
                                <input class="form-control" name="prestasi" type="text" placeholder="Contoh: Juara 1" required>
                            </div>
                            <div class="col-6">
                                <label class="small fw-bold">Tingkat</label>
                                <select class="form-control" name="tingkat">
                                    <option value="Lokal">Lokal/Regional</option>
                                    <option value="Nasional">Nasional</option>
                                    <option value="Internasional">Internasional</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label class="small fw-bold">Tahun</label>
                                <input class="form-control" name="tahun" type="number" value="<?= date('Y') ?>" required>
                            </div>
                            <div class="col-8">
                                <label class="small fw-bold">Sertifikat (PDF/JPG)</label>
                                <input class="form-control" name="file_upload" type="file" accept=".pdf,.jpg,.png">
                            </div>
                        </div>
                        <button class="btn btn-warning w-100 text-white" type="submit">Simpan Prestasi</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">Daftar Prestasi Mahasiswa</div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr><th>Tahun & Tingkat</th><th>Informasi Prestasi</th><th>Sertifikat</th><th>Aksi</th></tr>
                        </thead>
                        <tbody>
                            <?php while($r = $query->fetch_assoc()): ?>
                            <tr>
                                <td><span class="badge bg-primary mb-1"><?= $r['tahun'] ?></span><br><span class="badge bg-secondary"><?= $r['tingkat'] ?></span></td>
                                <td>
                                    <strong><?= $r['nama_mahasiswa'] ?></strong><br>
                                    <span class="text-danger fw-bold"><?= $r['prestasi'] ?></span> - <?= $r['nama_kegiatan'] ?>
                                </td>
                                <td><a href="uploads/kemahasiswaan/<?= $r['file_sertifikat'] ?>" target="_blank" class="badge bg-success text-decoration-none">Lihat</a></td>
                                <td><a href="index.php?module=prodi_pemerintahan&act=hapus_kema&id=<?= $r['id'] ?>&redir=prestasi&tabel=kema_prestasi&kolom_file=file_sertifikat" class="btn btn-sm btn-outline-danger"><i data-feather="trash-2"></i></a></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <?php elseif ($modul == 'tracer_study'): 
        $query = $koneksi->query("SELECT * FROM kema_tracer_loker WHERE prodi = '$prodi' ORDER BY id DESC");
    ?>
    <!-- ================= UI TRACER STUDY (INFORMASI LOKER) ================= -->
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-top-lg border-top-info">
                <div class="card-header fw-bold text-info">Sebar Informasi Lowongan</div>
                <div class="card-body">
                    <form action="index.php?module=prodi_pemerintahan&act=proses_kema" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="aksi" value="tambah_tracer">
                        
                        <div class="mb-3">
                            <label class="small fw-bold">Posisi Pekerjaan</label>
                            <input class="form-control" name="posisi" type="text" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Perusahaan / Instansi</label>
                            <input class="form-control" name="perusahaan" type="text" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">URL Sumber Resmi (API/Website)</label>
                            <input class="form-control" name="link_sumber" type="url" placeholder="https://..." required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Batas Waktu (Deadline)</label>
                            <input class="form-control" name="batas_waktu" type="date">
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Brosur Loker (Opsional - PDF/JPG)</label>
                            <input class="form-control" name="file_upload" type="file" accept=".pdf,.jpg,.png">
                        </div>
                        <button class="btn btn-info text-white w-100" type="submit">Publish Loker</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">Board Informasi Lowongan (Tracer Study)</div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr><th>Pekerjaan</th><th>Deadline</th><th>Sumber</th><th>Aksi</th></tr>
                        </thead>
                        <tbody>
                            <?php while($r = $query->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <strong><?= $r['posisi'] ?></strong><br>
                                    <span class="text-muted small"><?= $r['perusahaan'] ?></span>
                                </td>
                                <td><span class="badge bg-danger"><?= $r['batas_waktu'] ?></span></td>
                                <td><a href="<?= $r['link_sumber'] ?>" target="_blank" class="btn btn-sm btn-primary">Buka Link</a></td>
                                <td><a href="index.php?module=prodi_pemerintahan&act=hapus_kema&id=<?= $r['id'] ?>&redir=tracer_study&tabel=kema_tracer_loker&kolom_file=file_brosur" class="btn btn-sm btn-outline-danger"><i data-feather="trash-2"></i></a></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php else: ?>
        <div class="alert alert-info">Menu HMPS dan Kegiatan menggunakan pola tabel dan form yang sama.</div>
    <?php endif; ?>

</div>
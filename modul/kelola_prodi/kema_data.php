<?php
if (!defined('AKSES_DIIZINKAN')) die("Akses ditolak!");

$mod_aktif = isset($_GET['module']) ? $_GET['module'] : '';
if ($mod_aktif == 'prodi_sosiatri') {
    $prodi = 'sosiatri';
    $nama_prodi = 'Pembangunan Sosial';
    $bg_color = 'bg-success';
    $btn_color = 'btn-success';
} else {
    $prodi = 'pemerintahan';
    $nama_prodi = 'Ilmu Pemerintahan';
    $bg_color = 'bg-primary';
    $btn_color = 'btn-primary';
}

$act_aktif = isset($_GET['act']) ? $_GET['act'] : 'hmps';
?>

<div class="container-xl px-4 mt-4">

    <?php if($act_aktif == 'hmps'): 
        $query = $koneksi->query("SELECT * FROM kema_hmps WHERE prodi='$prodi' LIMIT 1");
        $data = $query->fetch_assoc();
    ?>
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header <?= $bg_color ?> text-white"><i class="fas fa-users me-2"></i> Profil HMPS - <?= $nama_prodi ?></div>
        <div class="card-body">
            <form action="index.php?module=<?= $mod_aktif ?>&act=proses_kema" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="act_redir" value="hmps">
                <input type="hidden" name="file_lama" value="<?= $data['file_struktur'] ?? '' ?>">

                <div class="mb-3">
                    <label class="fw-bold">Deskripsi Organisasi</label>
                    <textarea class="form-control bg-light" name="deskripsi" rows="3" required><?= $data['deskripsi'] ?? '' ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="fw-bold">Fokus Program Kerja</label>
                    <textarea class="form-control bg-light editor-html" name="fokus_program" rows="5" required><?= $data['fokus_program'] ?? '' ?></textarea>
                </div>
                <div class="mb-4">
                    <label class="fw-bold">Bagan Struktur Pengurus (PDF/Image)</label>
                    <input class="form-control" type="file" name="file_struktur" accept=".pdf,.png,.jpg">
                    <?php if(!empty($data['file_struktur'])): ?>
                        <small class="text-success mt-1 d-block"><i class="fas fa-check"></i> File saat ini: <?= $data['file_struktur'] ?></small>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn <?= $btn_color ?> px-4 rounded-pill"><i class="fas fa-save me-1"></i> Simpan Profil HMPS</button>
            </form>
        </div>
    </div>

    <?php elseif($act_aktif == 'prestasi'): 
        $query = $koneksi->query("SELECT * FROM kema_prestasi WHERE prodi='$prodi' ORDER BY tahun DESC, id DESC");
    ?>
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header <?= $bg_color ?> text-white"><i class="fas fa-trophy me-2"></i> Tambah Prestasi</div>
                <div class="card-body bg-light">
                    <form action="index.php?module=<?= $mod_aktif ?>&act=proses_kema" method="POST">
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="act_redir" value="prestasi">
                        
                        <div class="mb-3">
                            <label class="fw-bold small">Judul Prestasi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="prestasi" placeholder="Cth: Juara 1 Lomba Debat" required>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold small">Deskripsi Singkat</label>
                            <textarea class="form-control" name="deskripsi" rows="2" placeholder="Nama tim/Keterangan..."></textarea>
                        </div>
                        <div class="row gx-2 mb-3">
                            <div class="col-6">
                                <label class="fw-bold small">Tingkat</label>
                                <select class="form-select" name="tingkat">
                                    <option value="Institusi">Institusi</option>
                                    <option value="Regional">Regional</option>
                                    <option value="Nasional">Nasional</option>
                                    <option value="Internasional">Internasional</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="fw-bold small">Tahun</label>
                                <input type="number" class="form-control" name="tahun" value="<?= date('Y') ?>" required>
                            </div>
                        </div>
                        <button type="submit" class="btn <?= $btn_color ?> w-100 rounded-pill fw-bold">Simpan Prestasi</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white"><i class="fas fa-list me-2"></i> Data Prestasi Mahasiswa</div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light"><tr><th>Data Prestasi</th><th class="text-center">Aksi</th></tr></thead>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <div class="fw-bold text-dark"><?= htmlspecialchars($row['prestasi']) ?></div>
                                    <div class="small text-muted">Tingkat <?= $row['tingkat'] ?> (<?= $row['tahun'] ?>)</div>
                                </td>
                                <td class="text-center align-middle">
                                    <a href="index.php?module=<?= $mod_aktif ?>&act=hapus_kema&id=<?= $row['id'] ?>&redir=prestasi&tabel=kema_prestasi&kolom_file=file_sertifikat" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Hapus prestasi?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php elseif($act_aktif == 'kegiatan_mahasiswa'): 
        $query = $koneksi->query("SELECT * FROM kema_kegiatan WHERE prodi='$prodi' ORDER BY id DESC");
    ?>
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header <?= $bg_color ?> text-white"><i class="fas fa-camera me-2"></i> Tambah Kegiatan</div>
                <div class="card-body bg-light">
                    <form action="index.php?module=<?= $mod_aktif ?>&act=proses_kema" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="prodi" value="<?= $prodi ?>">
                        <input type="hidden" name="act_redir" value="kegiatan_mahasiswa">
                        
                        <div class="mb-3">
                            <label class="fw-bold small">Judul Kegiatan</label>
                            <input type="text" class="form-control" name="judul_kegiatan" required>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold small">Kategori / Label</label>
                            <select class="form-select" name="kategori_kegiatan">
                                <option value="Seminar">Seminar</option>
                                <option value="Pelatihan">Pelatihan</option>
                                <option value="Sosial">Sosial</option>
                                <option value="Olahraga">Olahraga</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold small">Deskripsi Kegiatan</label>
                            <textarea class="form-control" name="deskripsi" rows="2" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="fw-bold small">Foto Kegiatan (WebP Compress)</label>
                            <input type="file" class="form-control" name="file_gambar" accept="image/jpeg, image/png" required>
                        </div>
                        <button type="submit" class="btn <?= $btn_color ?> w-100 rounded-pill fw-bold">Upload Kegiatan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white"><i class="fas fa-images me-2"></i> Galeri Kegiatan</div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light"><tr><th>Preview</th><th>Informasi</th><th class="text-center">Aksi</th></tr></thead>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td style="width: 120px;"><img src="uploads/kemahasiswaan/<?= $row['file_gambar_webp'] ?>" class="img-fluid rounded shadow-sm"></td>
                                <td>
                                    <span class="badge bg-secondary mb-1"><?= $row['kategori_kegiatan'] ?></span>
                                    <div class="fw-bold text-dark"><?= htmlspecialchars($row['nama_kegiatan']) ?></div>
                                </td>
                                <td class="text-center align-middle">
                                    <a href="index.php?module=<?= $mod_aktif ?>&act=hapus_kema&id=<?= $row['id'] ?>&redir=kegiatan_mahasiswa&tabel=kema_kegiatan&kolom_file=file_gambar_webp" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Hapus foto ini?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php elseif($act_aktif == 'tracer_study'): 
        $query = $koneksi->query("SELECT * FROM kema_tracer WHERE prodi='$prodi' LIMIT 1");
        $data = $query->fetch_assoc();
    ?>
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header <?= $bg_color ?> text-white"><i class="fas fa-link me-2"></i> Kelola Tautan Tracer Study</div>
        <div class="card-body p-4">
            <form action="index.php?module=<?= $mod_aktif ?>&act=proses_kema" method="POST">
                <input type="hidden" name="prodi" value="<?= $prodi ?>">
                <input type="hidden" name="act_redir" value="tracer_study">

                <div class="row gx-4">
                    <div class="col-md-6 mb-4">
                        <label class="fw-bold text-dark"><i class="fas fa-edit text-primary me-1"></i> Link Form Kuesioner Alumni</label>
                        <input type="url" class="form-control bg-light mt-1" name="link_kuesioner_alumni" value="<?= $data['link_kuesioner_alumni'] ?? '#' ?>">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="fw-bold text-dark"><i class="fas fa-chart-pie text-success me-1"></i> Link Laporan / Statistik Lulusan</label>
                        <input type="url" class="form-control bg-light mt-1" name="link_laporan_statistik" value="<?= $data['link_laporan_statistik'] ?? '#' ?>">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="fw-bold text-dark"><i class="fas fa-handshake text-info me-1"></i> Link Forum Komunitas Alumni (WA/Telegram)</label>
                        <input type="url" class="form-control bg-light mt-1" name="link_forum_komunitas" value="<?= $data['link_forum_komunitas'] ?? '#' ?>">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="fw-bold text-dark"><i class="fas fa-building text-warning me-1"></i> Link Form Survei Pengguna Lulusan (User)</label>
                        <input type="url" class="form-control bg-light mt-1" name="link_kuesioner_user" value="<?= $data['link_kuesioner_user'] ?? '#' ?>">
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn <?= $btn_color ?> px-5 rounded-pill fw-bold">Simpan Tautan Eksternal</button>
            </form>
        </div>
    </div>
    <?php endif; ?>

</div>

<?php if($act_aktif == 'hmps'): ?>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>CKEDITOR.replace('fokus_program', { height: 150 });</script>
<?php endif; ?>
<?php
// PROSES SAAT FORMULIR DIKIRIM (CREATE)
if (isset($_POST['kirim_usulan_buku'])) {
    // 1. Sanitasi Ketat (Mencegah XSS dan Karakter Berbahaya)
    // strip_tags: Menghilangkan tag HTML/PHP (mencegah script injeksi)
    // htmlspecialchars: Mengubah karakter khusus (<, >, &, ", ') menjadi entitas HTML
    $judul_buku    = htmlspecialchars(strip_tags(trim($_POST['judul_buku'])));
    $pengarang     = htmlspecialchars(strip_tags(trim($_POST['pengarang'])));
    $penerbit      = htmlspecialchars(strip_tags(trim($_POST['penerbit'])));
    $tahun_terbit  = (int) $_POST['tahun_terbit']; // Pastikan hanya angka
    $isbn          = htmlspecialchars(strip_tags(trim($_POST['isbn'])));
    $alasan        = htmlspecialchars(strip_tags(trim($_POST['alasan'])));
    
    $nama_pengusul = htmlspecialchars(strip_tags(trim($_POST['nama_pengusul'])));
    $status_pengusul = htmlspecialchars(strip_tags(trim($_POST['status_pengusul'])));
    
    // Gabungkan Penerbit dan Tahun
    $penerbit_tahun = ($penerbit != '') ? $penerbit . ' - ' . $tahun_terbit : $tahun_terbit;

    // Status default
    $status_awal = 'Menunggu Review';

    // 2. Keamanan Database menggunakan Prepared Statements
    $stmt = $koneksi->prepare("INSERT INTO perpus_layanan_usulan (nama_pengusul, program_studi, judul_buku, pengarang, penerbit_tahun, isbn, alasan, status_usulan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Validasi parameter (s = string)
    $stmt->bind_param("ssssssss", $nama_pengusul, $status_pengusul, $judul_buku, $pengarang, $penerbit_tahun, $isbn, $alasan, $status_awal);
    
    if ($stmt->execute()) {
        echo "<script>alert('Terima kasih! Usulan pengadaan koleksi Anda telah berhasil dikirim dan akan segera direview.'); window.location='index.php?module=perpus_layanan_usulan';</script>";
    } else {
        echo "<script>alert('Gagal mengirim usulan. Silakan coba lagi nanti.');</script>";
    }
}
?>

<main>
    <header class="page-header page-header-dark bg-teal pb-10" style="background-color: #20c997;">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="plus-square"></i></div>
                            Usulan Pengadaan Buku
                        </h1>
                        <div class="page-header-subtitle text-white-50">Saran penambahan koleksi buku demi mendukung kelancaran studi dan riset Anda.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <i class="fas fa-book-medical fa-3x mb-3 opacity-50" style="color: #20c997;"></i>
                            <h4 class="fw-bold text-dark">Buku yang Anda cari tidak ada di OPAC?</h4>
                            <p class="text-muted small">Silakan usulkan judul buku referensi yang Anda butuhkan (khususnya terkait Ilmu Pemerintahan dan Pembangunan Sosial). UPT Perpustakaan akan mempertimbangkan usulan Anda pada periode pengadaan anggaran berikutnya.</p>
                        </div>
                        
                        <form action="" method="POST">
                            <div class="row gx-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Judul Buku <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-light" name="judul_buku" placeholder="Masukkan judul buku secara lengkap" maxlength="250" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Nama Pengarang <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control bg-light" name="pengarang" placeholder="Nama penulis utama" pattern="[a-zA-Z\s\.,']+" title="Hanya huruf dan tanda baca dasar yang diizinkan" maxlength="150" required>
                                </div>
                            </div>
                            <div class="row gx-3">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label small fw-bold text-muted">Penerbit</label>
                                    <input type="text" class="form-control bg-light" name="penerbit" placeholder="Penerbit buku" maxlength="100">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label small fw-bold text-muted">Tahun Terbit</label>
                                    <input type="number" class="form-control bg-light" name="tahun_terbit" placeholder="Misal: 2024" min="1000" max="2099">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label small fw-bold text-muted">ISBN (Jika tahu)</label>
                                    <input type="text" class="form-control bg-light" name="isbn" placeholder="978-xxx-xxxx" pattern="[0-9\-]+" title="Hanya angka dan tanda hubung (-)">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-muted">Alasan / Kepentingan Usulan <span class="text-danger">*</span></label>
                                <textarea class="form-control bg-light" name="alasan" rows="3" placeholder="Contoh: Buku ini menjadi referensi wajib untuk Mata Kuliah XYZ..." maxlength="1000" required></textarea>
                            </div>
                            
                            <hr class="my-4">
                            <h6 class="fw-bold text-dark mb-3">Data Pengusul</h6>
                            <div class="row gx-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label small fw-bold text-muted">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nama_pengusul" pattern="[a-zA-Z\s\.,']+" maxlength="150" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label small fw-bold text-muted">Status <span class="text-danger">*</span></label>
                                    <select class="form-select" name="status_pengusul" required>
                                        <option value="" disabled selected>-- Pilih --</option>
                                        <option value="Mahasiswa">Mahasiswa</option>
                                        <option value="Dosen">Dosen</option>
                                        <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="kirim_usulan_buku" class="btn text-white w-100 py-2 rounded-pill fw-bold shadow-sm" style="background-color: #20c997;">Kirim Usulan Buku</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>
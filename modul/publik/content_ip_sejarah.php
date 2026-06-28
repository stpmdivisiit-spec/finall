<?php
// 
// Ambil Naskah
$query = @mysqli_query($koneksi, "SELECT id, konten_sejarah FROM prodi_sejarah WHERE prodi = 'pemerintahan' LIMIT 1");
$data = mysqli_fetch_array($query);
$id_sejarah = $data['id'] ?? 0;
$konten = $data['konten_sejarah'] ?? '<p class="text-muted">Data sejarah belum tersedia.</p>';

// Ambil Galeri
$galeri = null;
if ($id_sejarah > 0) {
    $galeri = @mysqli_query($koneksi, "SELECT file_gambar FROM prodi_sejarah_galeri WHERE sejarah_id = '$id_sejarah'");
}
?>

<main>
    <header class="page-header page-header-dark bg-primary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="clock"></i></div>
                            Sejarah Ilmu Sosiatri
                        </h1>
                        <div class="page-header-subtitle">Perjalanan evolusi dari Ilmu Sosiatri menuju Pembangunan Sosial.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        
                        <?php if($galeri && mysqli_num_rows($galeri) > 0): ?>
                            <hr class="my-5">
                            <h4 class="fw-bold text-dark text-center mb-4"><i class="fas fa-images text-success me-2"></i> Galeri Dokumentasi Sejarah</h4>
                            <div class="row gx-3 justify-content-center">
                                <?php while($g = mysqli_fetch_array($galeri)): ?>
                                    <div class="col-md-4 col-sm-6 mb-4">
                                        <img src="uploads/profil/<?= $g['file_gambar'] ?>" class="img-fluid rounded-3 shadow-sm w-100" style="height: 200px; object-fit: cover;" alt="Galeri Sejarah">
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>


                        <div class="timeline-container-success">
                            <?= $konten; ?>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>

<style>
    /* Mengubah format <h4> yang diketik admin menjadi kotak timeline */
    .timeline-container-primary h4 {
        font-weight: bold;
        color: #212529; /* text-dark */
        margin-bottom: 0.5rem;
        margin-top: 0;
        position: relative;
    }
    
    /* Titik bulat di kiri judul */
    .timeline-container-primary h4::before {
        content: "";
        position: absolute;
        background-color: #198754; /* bg-primary */
        border-radius: 50%;
        width: 16px;
        height: 16px;
        left: -29px; /* menyesuaikan dengan padding pembungkus */
        top: 4px;
    }

    /* Mengatur jarak dan garis vertikal */
    .timeline-container-primary h4, 
    .timeline-container-primary p {
        border-left: 3px solid #198754; /* border-start border-3 border-success */
        margin-left: 1rem; /* ms-3 */
        padding-left: 1.5rem; /* ps-4 */
    }

    /* Jarak bawah antar paragraf */
    .timeline-container-primary p {
        color: #6c757d; /* text-muted */
        padding-bottom: 2rem; /* pb-4 */
        margin-bottom: 0;
    }
    
    /* Hilangkan garis pada elemen terakhir agar rapi */
    .timeline-container-primary p:last-child {
        border-left-color: transparent;
    }
</style>
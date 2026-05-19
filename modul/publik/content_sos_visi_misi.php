<?php
// Query disesuaikan dengan tabel `prodi_profil` milik Anda
$query_profil = @mysqli_query($koneksi, "SELECT konten_1 AS visi, konten_2 AS misi FROM prodi_profil WHERE prodi = 'sosiatri' AND kategori = 'visi_misi' LIMIT 1");

if ($query_profil && mysqli_num_rows($query_profil) > 0) {
    $data_profil = mysqli_fetch_array($query_profil);
    $visi = $data_profil['visi'];
    $misi = $data_profil['misi'];
} else {
    $visi = "Visi Program Studi belum diatur di database.";
    $misi = "<p class='text-muted'>Misi Program Studi belum diatur di database.</p>";
}
?>

<main>
    <header class="page-header page-header-dark bg-success pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="target"></i></div>
                            Visi & Misi Program Studi
                        </h1>
                        <div class="page-header-subtitle">Arah strategis Pembangunan Sosial (Ilmu Sosiatri) STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            <div class="col-lg-12 mb-4">
                <div class="card shadow-sm border-0 lift h-100 bg-success text-white text-center p-5">
                    <i class="fas fa-eye fa-3x mb-3 text-white-50"></i>
                    <h2 class="fw-bold text-white mb-4">VISI KEILMUAN PRODI</h2>
                    <p class="lead mb-0">"<?= $visi; ?>"</p>
                </div>
            </div>
            
            <div class="col-lg-12 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-transparent border-bottom p-4">
                        <h4 class="fw-bold text-dark mb-0"><i class="fas fa-tasks text-success me-2"></i>Misi Program Studi</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <div class="misi-content text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                            <?= $misi; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>if (typeof feather !== 'undefined') feather.replace();</script>

<style>
    .misi-content ul {
        list-style-type: none; /* Hilangkan bullet default */
        padding-left: 0;
    }
    .misi-content ul li {
        position: relative;
        padding-left: 2rem;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #f8f9fa;
    }
    /* Membuat ikon check-circle secara otomatis untuk setiap list (<li>) */
    .misi-content ul li::before {
        content: "\f058"; /* Unicode FontAwesome untuk check-circle */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        color: #198754; /* Warna bg-success bootstrap */
        position: absolute;
        left: 0;
        top: 2px;
        font-size: 1.2rem;
    }
    .misi-content ul li:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }
</style>
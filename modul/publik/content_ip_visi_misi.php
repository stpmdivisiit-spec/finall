<?php
// Query data Visi Misi untuk Ilmu Pemerintahan dari tabel prodi_profil
$query_profil = @mysqli_query($koneksi, "SELECT konten_1 AS visi, konten_2 AS misi FROM prodi_profil WHERE prodi = 'pemerintahan' AND kategori = 'visi_misi' LIMIT 1");

if ($query_profil && mysqli_num_rows($query_profil) > 0) {
    $data_profil = mysqli_fetch_array($query_profil);
    $visi = $data_profil['visi'];
    $misi = $data_profil['misi'];
} else {
    // Teks default / Fallback jika data belum ada di database
    $visi = "Menjadi Program Studi Ilmu Pemerintahan yang unggul, inovatif, dan berintegritas dalam mewujudkan tata kelola pemerintahan yang baik (Good Governance) dan pemerintahan desa yang mandiri berlandaskan nilai Serviam pada tahun 2030.";
    $misi = "<ul>
                <li>Menyelenggarakan pendidikan ilmu pemerintahan yang adaptif terhadap dinamika desentralisasi dan otonomi daerah.</li>
                <li>Menghasilkan penelitian terapan di bidang kebijakan publik, politik lokal, dan tata kelola pemerintahan desa.</li>
                <li>Melaksanakan pengabdian kepada masyarakat melalui pendampingan aparatur pemerintah desa dan pemberdayaan politik warga.</li>
                <li>Menjalin kemitraan strategis dengan birokrasi pemerintahan daerah, penyelenggara pemilu, dan masyarakat sipil.</li>
             </ul>";
}
?>

<main>
    <header class="page-header page-header-dark bg-primary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="target"></i></div>
                            Visi & Misi Program Studi
                        </h1>
                        <div class="page-header-subtitle">Arah strategis Ilmu Pemerintahan STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row gx-4">
            <div class="col-lg-12 mb-4">
                <div class="card shadow-sm border-0 lift h-100 bg-primary text-white text-center p-5">
                    <i class="fas fa-landmark fa-3x mb-3 text-white-50"></i>
                    <h2 class="fw-bold text-white mb-4">VISI KEILMUAN PRODI</h2>
                    <p class="lead mb-0">"<?= $visi; ?>"</p>
                </div>
            </div>
            
            <div class="col-lg-12 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-transparent border-bottom p-4">
                        <h4 class="fw-bold text-dark mb-0"><i class="fas fa-tasks text-primary me-2"></i>Misi Program Studi</h4>
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
        list-style-type: none; /* Menghilangkan bullet bawaan */
        padding-left: 0;
    }
    .misi-content ul li {
        position: relative;
        padding-left: 2rem;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #f8f9fa;
    }
    /* Injeksi ikon check-circle berwarna biru (Primary) secara otomatis pada setiap list */
    .misi-content ul li::before {
        content: "\f058"; /* Kode unicode FontAwesome untuk check-circle */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        color: #0061f2; /* Warna primary biru sesuai tema Ilmu Pemerintahan */
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
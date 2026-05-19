<?php
$query = @mysqli_query($koneksi, "SELECT konten_sejarah FROM prodi_sejarah WHERE prodi = 'sosiatri' LIMIT 1");
$data = mysqli_fetch_array($query);
$konten = $data['konten_sejarah'] ?? '<p class="text-muted">Data sejarah belum tersedia.</p>';
?>

<main>
    <header class="page-header page-header-dark bg-success pb-10">
        <div class="container-xl px-4 pt-5">
            <h1 class="page-header-title"><i data-feather="clock" class="me-2"></i> Sejarah Ilmu Sosiatri</h1>
            <div class="page-header-subtitle">Perjalanan evolusi dari Ilmu Sosiatri menuju Pembangunan Sosial.</div>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-5">
                <div class="sejarah-wrapper">
                    <?= $konten; ?>
                </div>
            </div>
        </div>
    </div>
</main>
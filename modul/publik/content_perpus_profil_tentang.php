<?php
$stmt = $koneksi->prepare("SELECT * FROM perpus_profil WHERE kategori = 'tentang'");
$stmt->execute();
$profil = $stmt->get_result()->fetch_assoc();

// Mencegah error jika data kosong
$judul = $profil['judul'] ?? 'Tentang Perpustakaan';
$konten = $profil['konten'] ?? 'Informasi belum tersedia.';
$gambar = $profil['gambar'] ?? '';
?>

<main>
    <header class="page-header page-header-dark bg-teal pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <i class="fas fa-info-circle me-3"></i>
                            Profil Perpustakaan
                        </h1>
                        <div class="page-header-subtitle text-white-50">Menjelajahi sejarah dan fungsi UPT Perpustakaan STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-5">
                <div class="row align-items-center mb-4">
                    <div class="col-lg-8">
                        <h2 class="fw-bold text-dark mb-3"><?= htmlspecialchars($judul) ?></h2>
                        <div class="divider border-bottom border-3 border-teal w-25 mb-4"></div>
                    </div>
                </div>

                <div class="row">
                    <?php if (!empty($gambar) && file_exists('uploads/perpustakaan/profil/' . $gambar)) : ?>
                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <img src="uploads/perpustakaan/profil/<?= $gambar ?>" class="img-fluid rounded shadow" alt="<?= htmlspecialchars($judul) ?>">
                    </div>
                    <div class="col-lg-7">
                        <div class="text-muted" style="line-height: 1.8; text-align: justify;">
                            <?= nl2br(htmlspecialchars($konten)) ?>
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="col-12">
                        <div class="text-muted" style="line-height: 1.8; text-align: justify;">
                            <?= nl2br(htmlspecialchars($konten)) ?> 
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>
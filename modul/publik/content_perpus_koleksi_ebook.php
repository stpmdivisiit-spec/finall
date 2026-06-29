<main>
    <header class="page-header page-header-dark bg-teal pb-10"><div class="container-xl px-4 pt-5"><h1 class="text-white fw-bold"><i class="fas fa-tablet-alt me-3"></i>E-Book & Jurnal Digital</h1></div></header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row">
            <?php
            $query = $koneksi->query("SELECT * FROM perpus_koleksi WHERE kategori_koleksi = 'ebook' ORDER BY id DESC");
            while ($row = $query->fetch_assoc()) :
                $cover = !empty($row['cover_gambar']) ? "uploads/perpustakaan/cover/".$row['cover_gambar'] : "assets/img/demo/demo-logo.svg";
                $link_baca = !empty($row['file_lampiran']) ? "uploads/perpustakaan/koleksi/".$row['file_lampiran'] : $row['tautan_luar'];
            ?>
            <div class="col-xl-3 col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="<?= $cover ?>" class="card-img-top p-3" style="height:250px; object-fit:contain;">
                    <div class="card-body text-center pt-0">
                        <h6 class="fw-bold mb-1"><?= htmlspecialchars($row['judul']) ?></h6>
                        <p class="small text-muted mb-3"><?= htmlspecialchars($row['penulis_pengarang']) ?></p>
                        <?php if ($link_baca) : ?>
                            <a href="<?= $link_baca ?>" target="_blank" class="btn btn-teal btn-sm rounded-pill w-100"><i class="fas fa-download me-1"></i> Baca / Unduh</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>
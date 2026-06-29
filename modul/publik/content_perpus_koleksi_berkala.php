<main>
    <header class="page-header page-header-dark bg-teal pb-10"><div class="container-xl px-4 pt-5"><h1 class="text-white fw-bold"><i class="fas fa-newspaper me-3"></i>Terbitan Berkala (Jurnal/Majalah)</h1></div></header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="row">
            <?php
            $query = $koneksi->query("SELECT * FROM perpus_koleksi WHERE kategori_koleksi = 'berkala' ORDER BY id DESC");
            while ($row = $query->fetch_assoc()) :
                $cover = !empty($row['cover_gambar']) ? "uploads/perpustakaan/cover/".$row['cover_gambar'] : "assets/img/demo/demo-logo.svg";
                $link_baca = !empty($row['file_lampiran']) ? "uploads/perpustakaan/koleksi/".$row['file_lampiran'] : $row['tautan_luar'];
            ?>
            <div class="col-xl-3 col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="<?= $cover ?>" class="card-img-top p-3" style="height:250px; object-fit:contain;">
                    <div class="card-body pt-0">
                        <span class="badge bg-primary mb-2"><?= htmlspecialchars($row['edisi_volume']) ?></span>
                        <h6 class="fw-bold mb-1 text-teal"><?= htmlspecialchars($row['judul']) ?></h6>
                        <small class="text-muted d-block mb-3">Terbitan: <?= htmlspecialchars($row['tahun_terbit']) ?></small>
                        <?php if ($link_baca) : ?>
                            <a href="<?= $link_baca ?>" target="_blank" class="btn btn-outline-teal btn-sm w-100"><i class="fas fa-book-open me-1"></i> Baca Terbitan</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>
<style>.btn-teal { background-color: #20c997; color:white; } .btn-outline-teal { border-color: #20c997; color:#20c997; } .text-teal{color:#20c997;}</style>
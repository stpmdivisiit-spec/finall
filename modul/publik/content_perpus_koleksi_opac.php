<main>
    <header class="page-header page-header-dark bg-teal pb-10">
        <div class="container-xl px-4 pt-5">
            <h1 class="page-header-title text-white fw-bold"><i class="fas fa-book-open me-3"></i>Katalog OPAC</h1>
            <p class="page-header-subtitle text-white-50">Cari ketersediaan buku fisik di rak perpustakaan.</p>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0 mb-4 p-4">
            <input type="text" class="form-control form-control-lg border-0 shadow-sm bg-light" id="searchKoleksi" placeholder="Cari judul buku, penulis, atau penerbit...">
        </div>
        <div class="row" id="koleksiContainer">
            <?php
            $query = $koneksi->query("SELECT * FROM perpus_koleksi WHERE kategori_koleksi = 'opac' ORDER BY id DESC");
            while ($row = $query->fetch_assoc()) :
                $cover = !empty($row['cover_gambar']) ? "uploads/perpustakaan/cover/".$row['cover_gambar'] : "assets/img/demo/demo-logo.svg";
                $status = ($row['stok_fisik'] > 0) ? "<span class='badge bg-success'>Tersedia: {$row['stok_fisik']}</span>" : "<span class='badge bg-danger'>Dipinjam/Kosong</span>";
            ?>
            <div class="col-xl-3 col-md-4 col-sm-6 mb-4 filter-item">
                <div class="card h-100 shadow-sm border-0 hover-lift">
                    <img src="<?= $cover ?>" class="card-img-top p-3" style="height:250px; object-fit:contain;" alt="Cover">
                    <div class="card-body pt-0">
                        <?= $status ?>
                        <h6 class="fw-bold text-dark mt-2 mb-1 item-judul"><?= htmlspecialchars($row['judul']) ?></h6>
                        <p class="small text-muted mb-0 item-penulis">Oleh: <?= htmlspecialchars($row['penulis_pengarang']) ?></p>
                        <hr class="my-2">
                        <small class="text-muted d-block">Penerbit: <?= htmlspecialchars($row['penerbit']) ?> (<?= htmlspecialchars($row['tahun_terbit']) ?>)</small>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>
<script>
// Simple Live Search
document.getElementById('searchKoleksi').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let items = document.querySelectorAll('.filter-item');
    items.forEach(function(item) {
        let text = item.innerText.toLowerCase();
        item.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>
<main>
    <header class="page-header page-header-dark bg-teal pb-10" style="background-color: #20c997;">
        <div class="container-xl px-4 pt-5">
            <h1 class="page-header-title text-white fw-bold"><i class="fas fa-images me-3"></i>Galeri Perpustakaan</h1>
            <p class="page-header-subtitle text-white-50">Kumpulan momen dan dokumentasi kegiatan UPT Perpustakaan.</p>
        </div>
    </header>
    
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card border-0 shadow-sm bg-white p-4 p-md-5">
            <div class="row g-4">
                <?php
                $query = $koneksi->query("SELECT * FROM perpus_info_galeri ORDER BY id DESC");
                if($query->num_rows > 0):
                    while ($row = $query->fetch_assoc()) :
                        $foto = "uploads/perpustakaan/informasi/" . $row['file_foto'];
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="position-relative hover-lift">
                        <a href="<?= $foto ?>" data-toggle="lightbox" data-gallery="perpus-gallery" data-caption="<?= htmlspecialchars($row['judul_foto']) ?>">
                            <img src="<?= $foto ?>" class="img-fluid w-100 rounded-4 shadow-sm" style="height: 250px; object-fit: cover;" alt="Galeri">
                        </a>
                    </div>
                </div>
                <?php 
                    endwhile;
                else:
                ?>
                    <div class="col-12 text-center text-muted py-5">
                        <i class="fas fa-camera-retro fa-4x opacity-50 mb-3"></i>
                        <h5>Galeri dokumentasi belum tersedia.</h5>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>


<script>if (typeof feather !== 'undefined') feather.replace();</script>

<style>
/* Efek Lift & Bayangan Halus pada Gambar Saat Di-hover */
.hover-lift { transition: transform 0.3s ease-in-out; }
.hover-lift:hover { transform: scale(1.03); }
/* Pastikan sudut gambar tetap membulat (rounded corners) secara sempurna */
.rounded-4 { border-radius: 1rem !important; }
</style>
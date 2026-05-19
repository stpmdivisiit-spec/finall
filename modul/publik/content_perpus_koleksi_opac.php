<main>
    <header class="page-header page-header-dark bg-teal pb-10" style="background-color: #20c997;">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="search"></i></div>
                            Katalog Online (OPAC)
                        </h1>
                        <div class="page-header-subtitle text-white-50">Online Public Access Catalog - Telusuri ketersediaan fisik buku di rak perpustakaan.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-5 text-center">
                <i class="fas fa-database fa-4x mb-4 opacity-50" style="color: #20c997;"></i>
                <h3 class="fw-bold text-dark mb-3">Pencarian Koleksi Terpadu</h3>
                <p class="text-muted mb-4 mx-auto" style="max-width: 600px;">Gunakan mesin pencari OPAC kami untuk menemukan buku teks, referensi, dan kamus berdasarkan Judul, Pengarang, Penerbit, atau Subjek sebelum Anda datang ke perpustakaan.</p>
                
                <form class="mb-5 mx-auto" style="max-width: 700px;">
                    <div class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden border">
                        <select class="form-select bg-light border-0" style="max-width: 150px;">
                            <option value="judul">Judul</option>
                            <option value="pengarang">Pengarang</option>
                            <option value="subjek">Subjek</option>
                            <option value="isbn">ISBN</option>
                        </select>
                        <input type="text" class="form-control border-0 px-4" placeholder="Masukkan kata kunci pencarian..." aria-label="Kata Kunci">
                        <button class="btn text-white px-4 fw-bold" type="button" style="background-color: #20c997;"><i class="fas fa-search me-2"></i>Cari</button>
                    </div>
                </form>

                <div class="alert alert-light border border-teal text-start d-inline-block mx-auto">
                    <i class="fas fa-info-circle me-2" style="color: #20c997;"></i> <strong>Tips:</strong> Catat <em>Nomor Panggil (Call Number)</em> buku yang Anda temukan untuk mempermudah pencarian di rak.
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>
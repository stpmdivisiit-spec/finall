<a class="nav-link collapsed <?= ($mod == 'perpustakaan') ? 'active' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePerpustakaan" aria-expanded="false" aria-controls="collapsePerpustakaan">
    <div class="nav-link-icon"><i data-feather="book"></i></div>
    Perpustakaan
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?= ($mod == 'perpustakaan') ? 'show' : '' ?>" id="collapsePerpustakaan" data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionPerpustakaan">

        <a class="nav-link" href="index.php?module=perpustakaan&act=dokumen&kat=profil">Profil Perpustakaan</a>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseKatalog" aria-expanded="false" aria-controls="collapseKatalog">
            Katalog & Koleksi
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseKatalog" data-bs-parent="#accordionPerpustakaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=perpustakaan&act=koleksi&kat=buku">Koleksi Buku Fisik</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=koleksi&kat=ebook">E-Book Digital</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=koleksi&kat=jurnal">Jurnal & Artikel</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=koleksi&kat=skripsi">Skripsi & Karya Ilmiah</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLaporanPerpus" aria-expanded="false" aria-controls="collapseLaporanPerpus">
            Laporan
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLaporanPerpus" data-bs-parent="#accordionPerpustakaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=perpustakaan&act=dokumen&kat=laporan_koleksi">Laporan Koleksi</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=dokumen&kat=laporan_sirkulasi">Laporan Sirkulasi</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=dokumen&kat=laporan_keanggotaan">Laporan Keanggotaan</a>
            </nav>
        </div>

    </nav>
</div>
<a class="nav-link collapsed <?= ($mod == 'perpustakaan') ? 'active' : '' ?>" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePerpustakaan" aria-expanded="false" aria-controls="collapsePerpustakaan">
    <div class="nav-link-icon"><i data-feather="book-open"></i></div>
    Perpustakaan
    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse <?= ($mod == 'perpustakaan') ? 'show' : '' ?>" id="collapsePerpustakaan" data-bs-parent="#accordionSidenav">
    <nav class="sidenav-menu-nested nav accordion" id="accordionPerpustakaan">

        <a class="nav-link" href="index.php?module=perpustakaan&act=dashboard">Dasbor Perpustakaan</a>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePerpusProfil" aria-expanded="false" aria-controls="collapsePerpusProfil">
            Profil
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapsePerpusProfil" data-bs-parent="#accordionPerpustakaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=perpustakaan&act=profil&kat=tentang">Tentang Perpustakaan</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=profil&kat=vmt">Visi, Misi & Tujuan</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=profil&kat=layanan">Jam Layanan & Tertib</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=profil&kat=fasilitas">Fasilitas Ruangan</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePerpusLayanan" aria-expanded="false" aria-controls="collapsePerpusLayanan">
            Layanan
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapsePerpusLayanan" data-bs-parent="#accordionPerpustakaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=perpustakaan&act=layanan&kat=sirkulasi">Sirkulasi (Pinjam/Kembali)</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=layanan&kat=bebas">Surat Bebas Pustaka</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=layanan&kat=referensi">Layanan Referensi</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=layanan&kat=usulan">Usulan Pengadaan Buku</a>
            </nav>
        </div>

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePerpusKoleksi" aria-expanded="false" aria-controls="collapsePerpusKoleksi">
            Katalog & Koleksi
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapsePerpusKoleksi" data-bs-parent="#accordionPerpustakaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=perpustakaan&act=koleksi&kat=opac">Katalog Buku (OPAC)</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=koleksi&kat=ebook">E-Book & E-Journal</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=koleksi&kat=repo">Repository Skripsi</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=koleksi&kat=berkala">Terbitan Berkala</a>
            </nav>
        </div>



        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePerpusInfo" aria-expanded="false" aria-controls="collapsePerpusInfo">
            Informasi Publik
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapsePerpusInfo" data-bs-parent="#accordionPerpustakaan">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="index.php?module=perpustakaan&act=informasi&kat=berita">Berita Perpustakaan</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=informasi&kat=acara">Acara & Literasi</a>
                <a class="nav-link" href="index.php?module=perpustakaan&act=informasi&kat=galeri">Galeri</a>
            </nav>
        </div>

    </nav>
</div>
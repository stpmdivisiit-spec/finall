<main>
    <header class="page-header page-header-dark bg-teal pb-10" style="background-color: #20c997;">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-white">
                            <div class="page-header-icon text-white"><i data-feather="archive"></i></div>
                            Repository Skripsi Institusi
                        </h1>
                        <div class="page-header-subtitle text-white-50">Arsip digital tugas akhir dan skripsi mahasiswa STPM Santa Ursula.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <style>
                    .dataTables_wrapper .dataTables_filter input:focus { border-color: #20c997; box-shadow: 0 0 0 0.25rem rgba(32, 201, 151, 0.25); }
                    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter { margin-bottom: 15px; }
                    .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate { margin-top: 15px; }
                </style>
                <div class="alert alert-warning border-0 small mb-4">
                    <i class="fas fa-info-circle me-2"></i><strong>Pemberitahuan Hak Cipta:</strong> Dokumen yang tersedia untuk diunduh publik (Open Access) umumnya hanya mencakup Halaman Judul, Abstrak, dan Bab 1. Untuk membaca naskah penuh (Full Text), silakan kunjungi Ruang Referensi Perpustakaan.
                </div>
                
                <div class="table-responsive">
                    <table id="tabelRepoSkripsi" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="40%">Judul Skripsi</th>
                                <th width="20%">Penulis (NIM)</th>
                                <th width="15%" class="text-center">Program Studi</th>
                                <th width="10%" class="text-center">Tahun</th>
                                <th width="10%" class="text-center">Abstrak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fw-bold text-dark">Efektivitas Pelayanan Publik Berbasis E-Government di Kabupaten Ende</td>
                                <td>Yohanes B. (190xxxx)</td>
                                <td class="text-center">Ilmu Pemerintahan</td>
                                <td class="text-center">2026</td>
                                <td class="text-center"><a href="#" class="btn btn-xs text-white px-3 rounded-pill small" style="background-color: #20c997;">Lihat</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="fw-bold text-dark">Dampak Dana Desa Terhadap Pemberdayaan Ekonomi Kelompok Tani</td>
                                <td>Maria Goreti (190xxxx)</td>
                                <td class="text-center">Pembangunan Sosial</td>
                                <td class="text-center">2025</td>
                                <td class="text-center"><a href="#" class="btn btn-xs text-white px-3 rounded-pill small" style="background-color: #20c997;">Lihat</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="fw-bold text-dark">Analisis Partisipasi Politik Pemilih Pemula dalam Pemilu 2024</td>
                                <td>Petrus D. (180xxxx)</td>
                                <td class="text-center">Ilmu Pemerintahan</td>
                                <td class="text-center">2025</td>
                                <td class="text-center"><a href="#" class="btn btn-xs text-white px-3 rounded-pill small" style="background-color: #20c997;">Lihat</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script>if (typeof feather !== 'undefined') feather.replace();</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    if ($.fn.DataTable.isDataTable('#tabelRepoSkripsi')) { $('#tabelRepoSkripsi').DataTable().destroy(); }
    var table = $('#tabelRepoSkripsi').DataTable({
        "paging": true, "ordering": true, "info": true, "searching": true, "responsive": true,
        "pageLength": 10, "columnDefs": [ { "orderable": false, "targets": [0, 5] } ],
        "language": { "search": "Cari Skripsi:", "lengthMenu": "Tampilkan _MENU_ data" }
    });
    table.on('order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) { cell.innerHTML = i + 1; });
    }).draw();
});
</script>
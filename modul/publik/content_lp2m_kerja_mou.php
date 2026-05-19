<main>
    <header class="page-header page-header-dark bg-dark pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-warning">
                            <div class="page-header-icon text-warning"><i data-feather="file-text"></i></div>
                            Database MoU & MoA
                        </h1>
                        <div class="page-header-subtitle">Arsip Memorandum of Understanding dan Perjanjian Kerjasama (PKS) aktif.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <style>
                    .dataTables_wrapper .dataTables_filter input:focus { border-color: #ffc107; box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25); }
                    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter { margin-bottom: 15px; }
                    .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate { margin-top: 15px; }
                </style>
                <div class="table-responsive">
                    <table id="tabelKerjaMoU" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="30%">Nama Mitra Institusi</th>
                                <th width="25%">Jenis Kerjasama</th>
                                <th width="15%" class="text-center">Nomor Dokumen</th>
                                <th width="15%" class="text-center">Masa Berlaku</th>
                                <th width="10%" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fw-bold text-dark">Pemerintah Kabupaten Ende</td>
                                <td>Pengembangan SDM & Pelaksanaan KKN Tematik</td>
                                <td class="text-center">01/MoU/STPM/2025</td>
                                <td class="text-center">2025 - 2030</td>
                                <td class="text-center"><span class="badge bg-success">Aktif</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="fw-bold text-dark">Universitas Gadjah Mada (Fisipol)</td>
                                <td>MoA: Pertukaran Reviewer Jurnal & Joint Research</td>
                                <td class="text-center">14/MoA/LP2M/2024</td>
                                <td class="text-center">2024 - 2028</td>
                                <td class="text-center"><span class="badge bg-success">Aktif</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="fw-bold text-dark">PMI Cabang Kabupaten Ende</td>
                                <td>Penyelenggaraan Donor Darah & Mitigasi Bencana</td>
                                <td class="text-center">08/MoA/STPM/2023</td>
                                <td class="text-center">2023 - 2026</td>
                                <td class="text-center"><span class="badge bg-success">Aktif</span></td>
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
    if ($.fn.DataTable.isDataTable('#tabelKerjaMoU')) { $('#tabelKerjaMoU').DataTable().destroy(); }
    var table = $('#tabelKerjaMoU').DataTable({
        "paging": true, "ordering": true, "info": true, "searching": true, "responsive": true,
        "pageLength": 10, "language": { "search": "Cari Mitra:" }
    });
});
</script>
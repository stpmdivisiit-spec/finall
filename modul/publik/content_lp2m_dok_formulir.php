<main>
    <header class="page-header page-header-dark bg-dark pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title text-warning">
                            <div class="page-header-icon text-warning"><i data-feather="download"></i></div>
                            Formulir & Template
                        </h1>
                        <div class="page-header-subtitle">Repositori borang kelengkapan administrasi riset dan abdimas.</div>
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
                </style>
                <div class="table-responsive">
                    <table id="tabelFormLP2M" class="table table-hover table-bordered mb-0 small" style="width:100%">
                        <thead class="bg-light text-muted">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th>Nama Dokumen / Formulir</th>
                                <th width="20%">Kategori Kebutuhan</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="fw-bold text-dark">Template Surat Tugas Penelitian / Pengabdian Dosen (.docx)</td>
                                <td>Administrasi Umum</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 py-1 rounded-pill small">Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="fw-bold text-dark">Borang Pengajuan Hak Cipta & Surat Pengalihan Hak Cipta</td>
                                <td>HKI / Kekayaan Intelektual</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 py-1 rounded-pill small">Unduh</a></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="fw-bold text-dark">Formulir Pendaftaran & Permohonan Cek Similarity (Turnitin)</td>
                                <td>Publikasi Jurnal</td>
                                <td class="text-center"><a href="#" class="btn btn-xs btn-dark px-3 py-1 rounded-pill small">Unduh</a></td>
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
    if ($.fn.DataTable.isDataTable('#tabelFormLP2M')) { $('#tabelFormLP2M').DataTable().destroy(); }
    $('#tabelFormLP2M').DataTable({ "pageLength": 10, "language": { "search": "Cari Formulir:" } });
});
</script>
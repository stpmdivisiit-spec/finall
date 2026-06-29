<main>
    <header class="page-header page-header-dark bg-teal pb-10"><div class="container-xl px-4 pt-5"><h1 class="text-white fw-bold"><i class="fas fa-graduation-cap me-3"></i>Repository Skripsi</h1></div></header>
    <div class="container-xl px-4 mt-n10 mb-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-hover" id="datatablesSimple">
                    <thead class="table-light"><tr><th>Judul Skripsi</th><th>Penulis</th><th>Prodi</th><th>Tahun</th><th class="text-center">Akses</th></tr></thead>
                    <tbody>
                        <?php
                        $query = $koneksi->query("SELECT * FROM perpus_koleksi WHERE kategori_koleksi = 'repo' ORDER BY tahun_terbit DESC");
                        while ($row = $query->fetch_assoc()) :
                        ?>
                        <tr>
                            <td class="fw-bold text-teal"><?= htmlspecialchars($row['judul']) ?></td>
                            <td><?= htmlspecialchars($row['penulis_pengarang']) ?></td>
                            <td><span class="badge bg-light text-dark"><?= htmlspecialchars($row['program_studi']) ?></span></td>
                            <td><?= htmlspecialchars($row['tahun_terbit']) ?></td>
                            <td class="text-center">
                                <button class="btn btn-outline-primary btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#abstrak<?= $row['id'] ?>"><i class="fas fa-eye"></i> Abstrak</button>
                                <?php if (!empty($row['file_lampiran'])) : ?>
                                <a href="uploads/perpustakaan/koleksi/<?= $row['file_lampiran'] ?>" target="_blank" class="btn btn-teal btn-sm mb-1"><i class="fas fa-download"></i> PDF</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <div class="modal fade" id="abstrak<?= $row['id'] ?>" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-light"><h5 class="modal-title fw-bold">Abstrak Skripsi</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                                    <div class="modal-body">
                                        <h5 class="fw-bold text-center mb-3"><?= htmlspecialchars($row['judul']) ?></h5>
                                        <p class="text-justify" style="line-height:1.8;"><?= nl2br(htmlspecialchars($row['abstrak_deskripsi'])) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
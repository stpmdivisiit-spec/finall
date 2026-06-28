<?php
session_start();
// Sesuaikan path koneksi di bawah ini dengan struktur folder aplikasi Anda
// Mundur 2 folder (../../) karena file ini berada di modul/publik/
require_once '../../config/koneksi.php'; 

if (isset($_POST['id_master'])) {
    $id_master = (int)$_POST['id_master'];
    $data = array();

    // Tarik spesifik detail barang berdasarkan ID Master
    $query = $koneksi->query("
        SELECT id, kode_barang, nama_barang, lokasi 
        FROM barang_detail 
        WHERE id_master = '$id_master' 
        AND status IN ('Baru', 'Baik', 'Layak Pakai') 
        ORDER BY kode_barang ASC
    ");

    if ($query && $query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $data[] = array(
                'id' => $row['id'],
                'kode' => $row['kode_barang'],
                'nama' => $row['nama_barang'],
                'lokasi' => !empty($row['lokasi']) ? $row['lokasi'] : 'Gudang'
            );
        }
    }
    
    // Cetak hasilnya murni dalam bentuk JSON
    echo json_encode($data);
}
?>
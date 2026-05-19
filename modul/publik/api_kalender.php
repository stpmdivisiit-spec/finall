<?php
error_reporting(0);
ob_start();

require_once "../../config/koneksi.php";

ob_clean();
header('Content-Type: application/json; charset=utf-8');

$sql = "SELECT * FROM events ORDER BY start_date ASC";
$result = $koneksi->query($sql);

$data = [];

// Peta Kamus Unit Kerja Baru
$unit_map = [
    'admin'         => ['css' => 'pill-akademik', 'label' => 'Akademik & Rektorat'],
    'pemerintahan'  => ['css' => 'pill-pemerintahan', 'label' => 'Prodi Ilmu Pemerintahan'],
    'sosiatri'      => ['css' => 'pill-sosiatri', 'label' => 'Prodi Pembangunan Sosial'],
    'kemahasiswaan' => ['css' => 'pill-kemahasiswaan', 'label' => 'Biro Kemahasiswaan & BEM'],
    'perpustakaan'  => ['css' => 'pill-perpustakaan', 'label' => 'UPT Perpustakaan'],
    'sekretariat'   => ['css' => 'pill-sekretariat', 'label' => 'Sekretariat Kampus']
];

// Cadangan Penentu Unit untuk 219+ data SQL bawaan Anda
$category_fallback = [
    'event-info'      => ['owner' => 'admin', 'css' => 'pill-akademik', 'label' => 'Akademik & Rektorat'],
    'event-warning'   => ['owner' => 'pemerintahan', 'css' => 'pill-pemerintahan', 'label' => 'Prodi Ilmu Pemerintahan'],
    'event-success'   => ['owner' => 'sosiatri', 'css' => 'pill-sosiatri', 'label' => 'Prodi Pembangunan Sosial'],
    'event-important' => ['owner' => 'kemahasiswaan', 'css' => 'pill-kemahasiswaan', 'label' => 'Biro Kemahasiswaan & BEM'],
    'event-inverse'   => ['owner' => 'sekretariat', 'css' => 'pill-sekretariat', 'label' => 'Sekretariat Kampus']
];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $owner = $row['unit_owner'];
        $cat   = $row['category'];

        // Jika data baru (bukan 'umum'), gunakan peta unit utama
        if ($owner !== 'umum' && isset($unit_map[$owner])) {
            $css      = $unit_map[$owner]['css'];
            $namaUnit = $unit_map[$owner]['label'];
            $codeUnit = $owner;
        } else {
            // Konversi otomatis 219+ data lama Anda berdasarkan category ke unit kerja masing-masing
            $css      = $category_fallback[$cat]['css'] ?? 'pill-akademik';
            $namaUnit = $category_fallback[$cat]['label'] ?? 'Akademik & Rektorat';
            $codeUnit = $category_fallback[$cat]['owner'] ?? 'admin';
        }

        $data[] = [
            'id'        => $row['id'],
            'title'     => $row['title'],
            'text'      => $row['description'],
            'start'     => date('Y-m-d', strtotime($row['start_date'])),
            'end'       => date('Y-m-d', strtotime($row['end_date'])),
            'classCSS'  => $css,
            'namaUnit'  => $namaUnit,
            'unitCode'  => $codeUnit
        ];
    }
}

echo json_encode($data);
exit;
?>
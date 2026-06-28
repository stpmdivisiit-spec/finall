<?php
// FILE: config/functions.php

function uploadFileAman($fileInput, $folderTujuan, $allowed_exts, $allowed_mimes, $max_size = 2097152) {
    if (!isset($fileInput) || $fileInput['error'] !== UPLOAD_ERR_OK) {
        return false;
    }
    $file_tmp  = $fileInput['tmp_name'];
    $file_size = $fileInput['size'];
    $file_name = $fileInput['name'];
    $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    if ($file_size > $max_size) return "ERROR_SIZE";
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $file_tmp);
    finfo_close($finfo);
    
    if (!in_array($file_ext, $allowed_exts) || !in_array($mime_type, $allowed_mimes)) return "ERROR_MIME";
    
    $nama_baru = time() . '_' . bin2hex(random_bytes(5)) . '.' . $file_ext;
    if (!is_dir($folderTujuan)) mkdir($folderTujuan, 0777, true);
    
    if (move_uploaded_file($file_tmp, $folderTujuan . $nama_baru)) return $nama_baru;
    return false;
}

function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// PERBAIKAN: Fungsi ini sekarang akan mereturn TRUE jika sah, dan FALSE jika gagal (Bukan DIE)
function verifyCSRFToken($post_token) {
    if (isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $post_token)) {
        return true; 
    }
    return false;
}

// Tambahkan di bagian bawah file config/functions.php

/**
 * Fungsi untuk mengatur Flash Message (Notifikasi Toast)
 * @param string $tipe  Contoh: 'success', 'danger', 'warning', 'info'
 * @param string $pesan Teks yang ingin ditampilkan
 */
function setFlashMessage($tipe, $pesan) {
    $_SESSION['flash_type'] = $tipe;
    $_SESSION['flash_message'] = $pesan;
}

?>
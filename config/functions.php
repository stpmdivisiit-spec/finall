<?php
// FILE: config/functions.php

/**
 * Fungsi Upload File Aman (Mencegah Shell Scripting & Malware)
 * * @param array $fileInput Data dari $_FILES['nama_input']
 * @param string $folderTujuan Folder penyimpanan (contoh: 'uploads/dokumen/')
 * @param array $allowed_exts Ekstensi yang diizinkan (contoh: ['pdf', 'docx'])
 * @param array $allowed_mimes MIME Type yang diizinkan (contoh: ['application/pdf'])
 * @param int $max_size Ukuran maksimal dalam Byte (Default: 2MB = 2097152)
 * @return string|false Nama file baru jika sukses, atau string error jika gagal
 */
function uploadFileAman($fileInput, $folderTujuan, $allowed_exts, $allowed_mimes, $max_size = 2097152) {
    if (!isset($fileInput) || $fileInput['error'] !== UPLOAD_ERR_OK) {
        return false;
    }
    
    $file_tmp  = $fileInput['tmp_name'];
    $file_size = $fileInput['size'];
    $file_name = $fileInput['name'];
    $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    // 1. Validasi Ukuran File
    if ($file_size > $max_size) {
        return "ERROR_SIZE";
    }
    
    // 2. Validasi MIME Type Asli (Tidak bisa ditipu dengan rename ekstensi)
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $file_tmp);
    finfo_close($finfo);
    
    // 3. Cek Kesesuaian Ekstensi dan MIME Type
    if (!in_array($file_ext, $allowed_exts) || !in_array($mime_type, $allowed_mimes)) {
        return "ERROR_MIME";
    }
    
    // 4. Generate Nama File Unik (Mencegah bentrok nama file)
    $nama_baru = time() . '_' . bin2hex(random_bytes(5)) . '.' . $file_ext;
    
    // 5. Buat folder jika belum ada
    if (!is_dir($folderTujuan)) {
        mkdir($folderTujuan, 0777, true);
    }
    
    // 6. Pindahkan File ke Server
    if (move_uploaded_file($file_tmp, $folderTujuan . $nama_baru)) {
        return $nama_baru;
    }
    
    return false;
}

/**
 * Fungsi Generate CSRF Token untuk Form
 */
function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Fungsi Validasi CSRF Token di File Proses
 */
function verifyCSRFToken($post_token) {
    if (!isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $post_token)) {
        die("<script>alert('Hacking Attempt Detected! Invalid Security Token.'); window.history.back();</script>");
    }
}
?>
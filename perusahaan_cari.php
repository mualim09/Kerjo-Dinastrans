<?php
// Set header type konten.
header("Content-Type: application/json; charset=UTF-8");
include_once "koneksi.php";

$nama = $_GET["query"];

// Query ke database.
$query  = $konek->query("SELECT * FROM tb_perusahaan WHERE perusahaan LIKE '%$nama%' ORDER BY perusahaan ASC");

// Fetch hasil query.
$result = $query->fetch_All(MYSQLI_ASSOC);

// Cek apakah ada yang cocok atau tidak.
if (count($result) > 0) {
    foreach($result as $data) {
        $output['suggestions'][] = [
            'value' => $data['perusahaan'],
            'perusahaan'  => $data['perusahaan'],
            'pic'  => $data['nama_PIC'],
            'kontak'  => $data['kontak'],
            'alm' => $data['alamat']
        ];
    }

    // Encode ke JSON.
    echo json_encode($output);

// Jika tidak ada yang cocok.
} else {
    $output['suggestions'][] = [
        'value' => '',
        'perusahaan'  => '',
        'pic'  => '',
        'kontak' => '',
        'alm'=>''
    ];

    // Encode ke JSON.
    echo json_encode($output);
}

<?php
// Mengimpor kelas NuSOAP
require_once('lib/nusoap.php');

// Membuat instance server NuSOAP
$server = new nusoap_server();

// Konfigurasi WSDL server
$server->configureWSDL('server_wsdl', 'urn:server_wsdl');

// Mendaftarkan fungsi jumlahkan ke dalam server
$server->register(
    'jumlahkan',
    array('x' => 'xsd:int', 'y' => 'xsd:int'), // Ubah tipe data menjadi xsd:int
    array('return' => 'xsd:int'), // Ubah tipe data kembalian menjadi xsd:int
);

// Mendaftarkan fungsi kurang ke dalam server
$server->register(
    'kurang',
    array('a' => 'xsd:int', 'b' => 'xsd:int'),
    array('return' => 'xsd:int'),
);

// Fungsi untuk menjumlahkan dua bilangan
function jumlahkan($x, $y) {
    $hasil = $x + $y; // Perbaiki tanda koma menjadi tambah (+)
    return $hasil;
}

// Fungsi untuk mengurangkan dua bilangan
function kurang($a, $b) {
    $hasil = $a - $b; // Perbaiki tanda koma menjadi kurang (-)
    return $hasil;
}

// Memeriksa data POST HTTP RAW dan melayani permintaan
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service(file_get_contents("php://input"));

// Mengeluarkan hasil dari fungsi yang dipanggil
echo $hasil;

// Keluar dari skrip
exit();
?>

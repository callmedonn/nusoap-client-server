<?php
require_once('lib/nusoap.php');

// Alamat URL untuk server SOAP (ganti dengan URL server SOAP Anda)
$server_url = 'http://192.168.1.15/nusoap_server.php?wsdl';

// Buat instance klien NuSOAP
$client = new nusoap_client($server_url, true);

// Panggil fungsi jumlahkan pada server
$x = 120;
$y = 5;
$params_jumlahkan = array(
    'x' => $x, // Ganti dengan nilai yang sesuai
    'y' => $y,  // Ganti dengan nilai yang sesuai
);

try {
    // Panggil operasi jumlahkan pada server
    $response_jumlahkan = $client->call('jumlahkan', $params_jumlahkan);
    
    // Periksa tipe data dari $response_jumlahkan
    if (is_numeric($response_jumlahkan)) {
        // Tampilkan hasil jumlahkan
        echo 'Hasil Jumlah dari: '. $x . ' + '. $y . ' = ' . $response_jumlahkan . '<br>';
    } else {
        echo 'Hasil jumlahkan tidak valid<br>'; // Atau tangani secara sesuai jika bukan angka
    }
} catch (SoapFault $e) {
    // Tangani kesalahan SOAP
    echo 'Error saat menjumlahkan: ' . $e->getMessage() . '<br>';
}

// Panggil fungsi kurang pada server
$a = 12;
$b = 5;
$params_kurang = array(
    'a' => $a, // Ganti dengan nilai yang sesuai
    'b' => $b,  // Ganti dengan nilai yang sesuai
);

try {
    // Panggil operasi kurang pada server
    $response_kurang = $client->call('kurang', $params_kurang);
    
    // Tampilkan hasil kurang
    echo 'Hasil Kurang dari: '. $a . ' - '. $b . ' = ' . $response_kurang . '<br>';
} catch (SoapFault $e) {
    // Tangani kesalahan SOAP
    echo 'Error saat mengurangkan: ' . $e->getMessage() . '<br>';
}
?>

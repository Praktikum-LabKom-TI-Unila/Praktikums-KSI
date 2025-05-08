<?php
$key = $_POST["key"];
$kalimat = $_POST["kata"];
$namaFile = "/var/www/data_kripto.txt";

function enkripsiCaesar($text, $shift)
{
    $result = '';
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        if (ctype_alpha($char)) {
            $ascii_offset = ctype_upper($char) ? ord('A') : ord('a');
            $shifted_char = chr((ord($char) - $ascii_offset + $shift) % 26 + $ascii_offset);
        } elseif (ctype_digit($char)) {
            $shifted_char = ($char + $shift) % 10;
        } else {
            $shifted_char = $char;
        }
        $result .= $shifted_char;
    }
    return $result;
}

$kalimatEnkripsi = enkripsiCaesar($kalimat, $key);

if (!file_exists($namaFile)) {
    $fp = fopen($namaFile, "w");
    if ($fp === false) {
        echo "Terjadi kesalahan saat membuat file. Periksa izin direktori.";
        exit;
    }
    fclose($fp);
}

$fp = fopen($namaFile, "w");
if ($fp === false) {
    echo "Terjadi kesalahan saat membuka file untuk menulis.";
    exit;
}

fwrite($fp, "Key: " . $key . "\n");
fwrite($fp, "Kalimat Terenkripsi: " . $kalimatEnkripsi . "\n");
fclose($fp);

echo "<h1>Hasil Enkripsi</h1>";
echo "<p>Kalimat Asli: " . htmlspecialchars($kalimat) . "</p>";
echo "<p>Kalimat Terenkripsi: " . htmlspecialchars($kalimatEnkripsi) . "</p>";
echo "<p>Data enkripsi telah disimpan dalam file: <a href='data_kripto.txt' target='_blank'>" . htmlspecialchars($namaFile) . "</a></p>";

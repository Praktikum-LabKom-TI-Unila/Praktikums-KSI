<?php
$namaFile = "data_kripto_rc4.txt";

function rc4_decrypt($key, $ciphertext_base64)
{
    $ciphertext = base64_decode($ciphertext_base64);
    $s = array();
    for ($i = 0; $i < 256; $i++) {
        $s[$i] = $i;
    }
    $j = 0;
    $keylength = strlen($key);
    for ($i = 0; $i < 256; $i++) {
        $j = ($j + $s[$i] + ord($key[$i % $keylength])) % 256;
        swap($s[$i], $s[$j]);
    }
    $i = 0;
    $j = 0;
    $plaintext = '';
    $cipherlength = strlen($ciphertext);
    for ($k = 0; $k < $cipherlength; $k++) {
        $i = ($i + 1) % 256;
        $j = ($j + $s[$i]) % 256;
        swap($s[$i], $s[$j]);
        $keystream_byte = $s[($s[$i] + $s[$j]) % 256];
        $plaintext .= chr(ord($ciphertext[$k]) ^ $keystream_byte);
    }
    return $plaintext;
}

function swap(&$a, &$b)
{
    $tmp = $a;
    $a = $b;
    $b = $tmp;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dekripsiKey = $_POST["dekripsiKey"];
    $ciphertext_base64 = $_POST["ciphertext"];

    if (!empty($ciphertext_base64)) {
        $plaintext = rc4_decrypt($dekripsiKey, $ciphertext_base64);

        echo "<h1>Hasil Dekripsi RC4</h1>";
        echo "<p>Key yang Anda Masukkan: " . htmlspecialchars($dekripsiKey) . "</p>";
        echo "<p>Kalimat Hasil Dekripsi (RC4): " . htmlspecialchars($plaintext) . "</p>";
    } else {
        echo "<p style='color:red;'>Error: Ciphertext tidak ditemukan.</p>";
    }
} else {
    echo "<p>Silakan masukkan key dekripsi pada halaman sebelumnya.</p>";
}

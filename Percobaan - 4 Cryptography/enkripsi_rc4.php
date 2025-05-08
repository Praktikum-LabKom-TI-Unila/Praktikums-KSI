<?php
$key = $_POST["key"];
$plaintext = $_POST["kata"];
$namaFile = "data_kripto_rc4.txt";

function rc4_encrypt($key, $plaintext)
{
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
    $ciphertext = '';
    $plainlength = strlen($plaintext);
    for ($k = 0; $k < $plainlength; $k++) {
        $i = ($i + 1) % 256;
        $j = ($j + $s[$i]) % 256;
        swap($s[$i], $s[$j]);
        $keystream_byte = $s[($s[$i] + $s[$j]) % 256];
        $ciphertext .= chr(ord($plaintext[$k]) ^ $keystream_byte);
    }

    return base64_encode($ciphertext);
}

function swap(&$a, &$b)
{
    $tmp = $a;
    $a = $b;
    $b = $tmp;
}

$ciphertext = rc4_encrypt($key, $plaintext);

$fp = fopen($namaFile, "w");
fwrite($fp, $ciphertext);
fclose($fp);

echo "<h1>Enkripsi RC4 Selesai</h1>";
echo "<p>Kalimat Asli: " . htmlspecialchars($plaintext) . "</p>";
echo "<p>Kalimat Terenkripsi (RC4): " . htmlspecialchars($ciphertext) . "</p>";
?>

<form method="post" action="akhir_rc4.php">
    <input type="hidden" name="ciphertext" value="<?php echo htmlspecialchars($ciphertext); ?>">
    <button type="submit">Lanjutkan ke Dekripsi</button>
</form>
<!DOCTYPE html>
<html>

<head>
    <title>Dekripsi Caesar</title>
</head>

<body>
    <h1>Dekripsi Caesar</h1>
    <?php
    $namaFile = "data_kripto.txt";

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

    function dekripsiCaesar($text, $shift)
    {
        return enkripsiCaesar($text, 26 - ($shift % 26));
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dekripsiKey = $_POST["dekripsiKey"];
        if (file_exists($namaFile)) {
            $lines = file($namaFile);
            preg_match('/Key:\s*(\d+)/', $lines[0], $matches);
            $keyEnkripsi = $matches[1];
            preg_match('/Kalimat Terenkripsi:\s*(.+)/', $lines[1], $matchesKalimat);
            $kalimatEnkripsi = $matchesKalimat[1];
            if ($dekripsiKey == $keyEnkripsi) {
                $kalimatDekripsi = dekripsiCaesar($kalimatEnkripsi, $dekripsiKey);
                echo "<h2>Hasil Dekripsi</h2>";
                echo "<p>File Data Kripto: " . htmlspecialchars($namaFile) . "</p>";
                echo "<p>Key Enkripsi (dari file): " . htmlspecialchars($keyEnkripsi) . "</p>";
                echo "<p>Key Dekripsi yang Anda Masukkan: " . htmlspecialchars($dekripsiKey) . "</p>";
                echo "<p>Kalimat Terenkripsi: " . htmlspecialchars($kalimatEnkripsi) . "</p>";
                echo "<p>Kalimat Hasil Dekripsi: " . htmlspecialchars($kalimatDekripsi) . "</p>";
            } else {
                echo "<p style='color:red;'>Error: Key dekripsi yang Anda masukkan tidak sesuai dengan key enkripsi yang disimpan.</p>";
            }
        } else {
            echo "<p style='color:red;'>Error: File data kripto (" . htmlspecialchars($namaFile) . ") tidak ditemukan.</p>";
        }
    } else {
    ?>
        <form method="post">
            <label for="dekripsiKey">Masukkan Key Dekripsi:</label><br>
            <input type="number" id="dekripsiKey" name="dekripsiKey" required><br><br>
            <input type="submit" value="Dekripsi">
        </form>
    <?php
    }
    ?>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Enkripsi RC4</title>
</head>

<body>
    <h1>Enkripsi RC4</h1>
    <form method="post" action="enkripsi_rc4.php">
        <label for="kata">Masukkan Kalimat:</label><br>
        <textarea id="kata" name="kata" rows="4" cols="50" required></textarea><br><br>

        <label for="key">Masukkan Key (string):</label><br>
        <input type="text" id="key" name="key" required><br><br>

        <input type="submit" value="Enkripsi RC4">
    </form>
</body>

</html>
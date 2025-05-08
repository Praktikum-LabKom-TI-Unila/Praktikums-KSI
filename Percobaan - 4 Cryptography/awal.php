<!DOCTYPE html>
<html>

<head>
    <title>Enkripsi Caesar</title>
</head>

<body>
    <h1>Enkripsi Caesar</h1>

    <form method="post" action="enkcaesar.php">
        <label for="kata">Masukkan Kalimat:</label><br>
        <textarea id="kata" name="kata" rows="4" cols="50" required></textarea><br><br>

        <label for="key">Masukkan Key (angka):</label><br>
        <input type="number" id="key" name="key" required><br><br>

        <input type="submit" value="Enkripsi">
    </form>
</body>

</html>
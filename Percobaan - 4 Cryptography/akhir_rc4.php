<!DOCTYPE html>
<html>

<head>
    <title>Masukkan Key Dekripsi</title>
</head>

<body>
    <h1>Masukkan Key Dekripsi</h1>
    <form method="post" action="dekripsi_rc4.php">
        <label for="dekripsiKey">Masukkan Key Dekripsi:</label><br>
        <input type="text" id="dekripsiKey" name="dekripsiKey" required><br><br>
        <input type="hidden" name="ciphertext" value="<?php echo htmlspecialchars($_POST['ciphertext'] ?? ''); ?>">
        <input type="submit" value="Dekripsi RC4">
    </form>
</body>

</html>
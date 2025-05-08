#!/bin/bash

# Pastikan skrip dihentikan jika ada error
set -e

# Pindah ke /var/www/ dengan sudo
cd /var/www/

echo "Membuat file data_kripto.txt untuk Caesar Cipher..."
sudo touch data_kripto.txt

echo "Membuat file data_kripto_rc4.txt untuk RC4..."
sudo touch data_kripto_rc4.txt

# -------- Kriptografi klasik -------
echo "Membuat file awal.php..."
sudo curl -LO https://raw.githubusercontent.com/Praktikum-LabKom-TI-Unila/Praktikums-KSI/master/Percobaan%20-%204%20Cryptography/awal.php
sudo chmod 755 awal.php

echo "Membuat file enkripsi Caesar (enkcaesar.php)..."
sudo curl -LO https://raw.githubusercontent.com/Praktikum-LabKom-TI-Unila/Praktikums-KSI/master/Percobaan%20-%204%20Cryptography/enkcaesar.php
sudo chmod 755 enkcaesar.php

echo "Membuat file akhir.php..."
sudo curl -LO https://raw.githubusercontent.com/Praktikum-LabKom-TI-Unila/Praktikums-KSI/master/Percobaan%20-%204%20Cryptography/akhir.php
sudo chmod 755 akhir.php

echo "Membuat file dekripsi Caesar (dekcaesar.php)..."
sudo curl -LO https://raw.githubusercontent.com/Praktikum-LabKom-TI-Unila/Praktikums-KSI/master/Percobaan%20-%204%20Cryptography/dekcaesar.php
sudo chmod 755 dekcaesar.php

# -------- Kriptografi modern simetrik RC4 -------
echo "Membuat file awalrc4.php..."
sudo curl -LO https://raw.githubusercontent.com/Praktikum-LabKom-TI-Unila/Praktikums-KSI/master/Percobaan%20-%204%20Cryptography/awalrc4.php
sudo chmod 755 awalrc4.php

echo "Membuat file enkripsi RC4 (enkripsi_rc4.php)..."
sudo curl -LO https://raw.githubusercontent.com/Praktikum-LabKom-TI-Unila/Praktikums-KSI/master/Percobaan%20-%204%20Cryptography/enkripsi_rc4.php
sudo chmod 755 enkripsi_rc4.php

echo "Membuat file akhir RC4 (akhir_rc4.php)..."
sudo curl -LO https://raw.githubusercontent.com/Praktikum-LabKom-TI-Unila/Praktikums-KSI/master/Percobaan%20-%204%20Cryptography/akhir_rc4.php
sudo chmod 755 akhir_rc4.php

echo "Membuat file dekripsi RC4 (dekripsi_rc4.php)..."
sudo curl -LO https://raw.githubusercontent.com/Praktikum-LabKom-TI-Unila/Praktikums-KSI/master/Percobaan%20-%204%20Cryptography/dekripsi_rc4.php
sudo chmod 755 dekripsi_rc4.php

echo "=== Semua file berhasil dibuat dan diatur permissions-nya! ==="

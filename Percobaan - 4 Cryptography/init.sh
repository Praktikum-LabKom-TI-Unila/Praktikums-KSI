
# mkdir Caesar-Cipher

cd /var/www/

echo "Membuat file data_kripto.txt untuk Caesar Cipher..."
touch data_kripto.txt
echo "Membuat file data_kripto_rc4.txt untuk RC4..."
touch data_kripto_rc4.txt

# -------- Kriptografi klasik -------
echo "Membuat file awal.php..."
chmod 777 awal.php

echo "Membuat file enkripsi RC4..."
chmod 777 enkcaesar.php

echo "Membuat file akhir.php..."
chmod 777 akhir.php


echo "Membuat file dekripsi RC4..."
chmod 777 dekcaesar.php

# -------- Kriptografi modern simetrik RC4 -------
echo "Membuat file awal.php..."
chmod 777 awalrc4.php


echo "Membuat file enkripsi RC4..."
chmod 777 enkripsi_rc4.php

echo "Membuat file akhir.php..."
chmod 777 akhir_rc4.php


echo "Membuat file dekripsi RC4..."
chmod 777 dekripsi_rc4.php
<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include("connect.php");

// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // (3) Buatkan fungsi "update" yang menerima data sebagai parameter
    function update($koneksi, $data) {
        // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
        $id = $data['id'];
        $nama_mobil = $data['nama_mobil'];
        $brand_mobil = $data['brand_mobil'];
        $warna_mobil = $data['warna_mobil'];
        $tipe_mobil = $data['tipe_mobil'];
        $harga_mobil = $data['harga_mobil'];

        // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
        $query = "UPDATE showroom_mobil SET
                    nama_mobil = '$nama_mobil',
                    brand_mobil = '$brand_mobil',
                    warna_mobil = '$warna_mobil',
                    tipe_mobil = '$tipe_mobil',
                    harga_mobil = '$harga_mobil'
                  WHERE id = $id
        ";

        // Eksekusi perintah SQL
        mysqli_query($koneksi, $query);

        // Buatkan kondisi jika eksekusi query berhasil
        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        if (mysqli_affected_rows($koneksi) > 0) {
            echo "
                <script>
                    alert('Data Berhasil diubah');
                    document.location.href = 'list_mobil.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal diubah');
                    document.location.href = 'list_mobil.php';
                </script>
            ";
            echo mysqli_error($koneksi);
        }
    }

    // Panggil fungsi update dengan data yang sesuai
    $data = [
      'id' => $id, 
      'nama_mobil' => $_POST['nama_mobil'],
      'brand_mobil' => $_POST['brand_mobil'],
      'warna_mobil' => $_POST['warna_mobil'],
      'tipe_mobil' => $_POST['tipe_mobil'],
      'harga_mobil' => $_POST['harga_mobil'],
  ];
  
  update($koneksi, $data);
}

// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($koneksi);
?>
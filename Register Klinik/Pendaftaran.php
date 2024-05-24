<?php

   include "service/database.php";

   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

   if (isset($_POST['Pendaftaran'])) {
       $namaLengkap = $_POST['namaLengkap'];
       $nomerNIK = $_POST['nomerNIK'];
       $alamatRumah = $_POST['alamatRumah'];
       $nomerHP = $_POST['nomerHP'];
       $menu = $_POST['menu'];

       $sql = "INSERT INTO users (Nama_Lengkap, NIK, Alamat, Nomer_HP, Pemeriksaan) VALUES (?, ?, ?, ?, ?)";
       $stmt = $db->prepare($sql);


       $stmt->bind_param('sisss', $namaLengkap, $nomerNIK, $alamatRumah, $nomerHP, $menu);

       if($stmt->execute()) {
         echo "Terima Kasih Sudah Melakukan Pendaftaran, Mohon untuk Datang Tepat Waktu^^";
       }else {
         echo "Pengisisan Gagal, Silahkan Isi Kembali";
       }

       $stmt->close();
       $db->close();
   }

?>


<!DOCTYPE html>
<html lang='en'>
<head>
   <meta charset='UTF-8'>
   <meta http-equiv='X-UA-Compatible' content='IE=edge'>
   <meta name='viewport' content='width=device-width, initial-scale=1.0'>
   <title>Document</title>
   <link rel='stylesheet' href='pendaftaran.css'/>
</head>
<body>
   <?php include 'layout/header.html'; ?>

   <h3>Silahkan Daftarkan Diri Anda</h3>
   <form action='Pendaftaran.php' method='POST'>
      <br>
         <input type='text' placeholder='Nama Lengkap' name='namaLengkap' required/>
      </br>
      <br>
         <input type='number' placeholder='Masukan NIK' name='nomerNIK' required/>
      </br>
      <br>
         <input type='text' placeholder='Masukan Alamat Lengkap' name='alamatRumah' required/>
      </br>
      <br>
         <input type='number' placeholder='No.Hp' name='nomerHP'/>
      </br>
      <br>
        <select name='menu' id='menu'>
           <option value="" selected disabled>Pilih Opsi Periksa</option>
           <option value='contraception'>Keluarga Berencana</option>
           <option value='antenatal'>Periksa Hamil</option>
           <option value='imun'>Imunisasi</option>
           <option value='medcheck'>Periksa Sakit</option>
           <option value='lactate'>Pemeriksaan Ibu Nifas</option>
           <option value='Baby'>Pemeriksaan Bayi</option>
         </select>
      </br>
      <br>
       <button type="submit" name="Pendaftaran">Submit</button>
      </br>
   </form>
</body>
</html>
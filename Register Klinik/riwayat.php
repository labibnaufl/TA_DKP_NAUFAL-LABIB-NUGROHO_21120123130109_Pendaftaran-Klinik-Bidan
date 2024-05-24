<?php
if (isset($_GET['nama_lengkap']) || isset($_GET['nik'])) {
    include 'pencarian.php';
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1.0'>
   <title>Search Patient Records</title>
</head>
<body>
   <?php include 'layout/header.html'; ?>

   <h3>Cari Riwayat Pasien</h3>
   <form action='' method='GET'>
      <input type='text' placeholder='Nama Lengkap' name='nama_lengkap' />
      <input type='number' placeholder='No.NIK' name='nik' />
      <button type='submit'>Cari</button>
   </form>

   <?php
   if (isset($_GET['nama_lengkap']) || isset($_GET['nik'])) {
       include 'pencarian.php';
   }
   ?>
</body>
</html>

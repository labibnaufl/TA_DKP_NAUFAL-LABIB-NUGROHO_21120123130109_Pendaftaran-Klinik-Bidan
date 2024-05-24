<?php
if (isset($_GET['nama_lengkap']) || isset($_GET['nik'])) {
    $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : '';
    $nik = isset($_GET['nik']) ? $_GET['nik'] : '';

    include "service/database.php"; 

    $sql = "SELECT * FROM users WHERE 1=1";
    if (!empty($nama_lengkap)) {
        $sql .= " AND Nama_Lengkap LIKE ?";
    }
    if (!empty($nik)) {
        $sql .= " AND NIK LIKE ?";
    }

    $srch= $db->prepare($sql);


    $params = [];
    $types = '';
    if (!empty($nama_lengkap)) {
        $params[] = "%" . $nama_lengkap . "%";
        $types .= 's';
    }
    if (!empty($nik)) {
        $params[] = "%" . $nik . "%";
        $types .= 's';
    }

    if ($types) {
        $srch->bind_param($types, ...$params);
    }

 
    $srch->execute();
    $result = $srch->get_result();

    if ($result->num_rows > 0) {

        echo "<h3>Hasil Pencarian:</h3>";
        echo "<table>";
        echo "<tr><th>Nama Lengkap</th><th>NIK</th><th>Alamat</th><th>Nomer HP</th><th>Pemeriksaan</th><th>Created At</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["Nama_Lengkap"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["NIK"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Alamat"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Nomer_HP"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Pemeriksaan"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Hasil Tidak Ditemukan, Pastikan Data Telah Benar</p>";
    }


    $srch->close();
    $db->close();
}
?>

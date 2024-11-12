<?php
include '../config/db.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM proker WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "Program kerja berhasil dihapus!";
    } else {
        echo "Gagal menghapus program kerja: " . mysqli_error($conn);
    }
}
?>

<h2>Daftar Program Kerja</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Program Kerja</th>
        <th>Deskripsi</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

    <?php
    $query = "SELECT * FROM proker";
    $result = mysqli_query($conn, $query);
    while ($proker = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$proker['id']}</td>";
        echo "<td>{$proker['nama_proker']}</td>";
        echo "<td>{$proker['deskripsi']}</td>";
        echo "<td>{$proker['tanggal']}</td>";
        echo "<td>
                <a href='edit_proker.php?id={$proker['id']}'>Edit</a> | 
                <a href='list_proker.php?delete={$proker['id']}' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'>Hapus</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

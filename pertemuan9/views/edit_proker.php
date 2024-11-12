<?php
include '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM proker WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $proker = mysqli_fetch_assoc($result);
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_proker = $_POST['nama_proker'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];

    $query = "UPDATE proker SET 
              nama_proker='$nama_proker', 
              deskripsi='$deskripsi', 
              tanggal='$tanggal' 
              WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        header('Location: list_proker.php');
    } else {
        echo "Gagal memperbarui program kerja: " . mysqli_error($conn);
    }
}
?>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $proker['id']; ?>">
    <label>Nama Program Kerja:</label>
    <input type="text" name="nama_proker" value="<?php echo $proker['nama_proker']; ?>" required><br>

    <label>Deskripsi:</label>
    <textarea name="deskripsi" required><?php echo $proker['deskripsi']; ?></textarea><br>

    <label>Tanggal:</label>
    <input type="date" name="tanggal" value="<?php echo $proker['tanggal']; ?>" required><br>

    <button type="submit" name="update">Perbarui</button>
</form>

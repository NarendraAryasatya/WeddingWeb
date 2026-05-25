<?php

include 'koneksi.php';

if(isset($_POST['kirim'])){

$nama = $_POST['nama'];
$nomor = $_POST['nomor_hp'];
$hadir = $_POST['kehadiran'];

$sql = "INSERT INTO rsvp 
(id, nama, nomor_hp, kehadiran)

VALUES
(NULL, '$nama', '$nomor', '$hadir')";

mysqli_query($conn, $sql);

header("Location: index.php");
exit;

}

if(isset($_POST['kirim_ucapan'])){

    $nama = $_POST['nama_ucapan'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO ucapan
    (id, nama, pesan)

    VALUES(
        NULL,
        '$nama',
        '$pesan'
    )";

    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;

}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Wedding RSVP</title>
</head>

<body>

    <h1>RSVP</h1>

    <form method="POST" autocomplete="off">

        <input type="text"
        name="nama"
        placeholder="Nama">

        <br>

        <input type="text"
        name="nomor_hp"
        placeholder="Nomor HP">

        <br>

        <select name="kehadiran">

            <option>Hadir</option>
            <option>Tidak Hadir</option>

        </select>

        <br><br>

        <button type="kirim"
        name="kirim">

            Kirim

        </button>

    </form>

<h2>Daftar RSVP</h2>
    
<?php

$data = mysqli_query($conn,
"SELECT * FROM rsvp ORDER BY id DESC");

while($d = mysqli_fetch_array($data)){

?>

<div>

    <h3>
        <?php echo $d['nama']; ?>
    </h3>

    <p>
        <?php echo $d['kehadiran']; ?>
    </p>

</div>

<?php } ?>

<hr>

<h2>Kirim Ucapan</h2>

<form method="POST" autocomplete="off">

    <input type="text"
    name="nama_ucapan"
    placeholder="Nama">

    <br>

    <textarea
    name="pesan"
    placeholder="Tulis Ucapan"></textarea>

    <br><br>

    <button type="kirim"
    name="kirim_ucapan">

        Kirim

    </button>

</form>

<h2>Ucapan Tamu</h2>

<?php

$data = mysqli_query($conn,
"SELECT * FROM ucapan ORDER BY id DESC");

while($u = mysqli_fetch_array($data)){

?>

<div>

    <h3>
        <?php echo $u['nama']; ?>
    </h3>

    <p>
        <?php echo $u['pesan']; ?>
    </p>

    <hr>

</div>

<?php } ?>

</body>
</html>
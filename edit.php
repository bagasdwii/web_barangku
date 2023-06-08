<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: sign-in.php');
  exit();
}

include 'koneksi.php';
$username = $_SESSION['username'];
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_SESSION['username'];
  $no = $_POST['id'];
  $jumlah = $_POST['jumlah'];
  $nama_barang = $_POST['nama_barang'];
  $tanggal = $_POST['tanggal'];
  $query = "SELECT id FROM user WHERE username = '$username'";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];

    $checkQuery = "SELECT * FROM barang WHERE no = '$no' AND owner = '$id'";
    $checkResult = $conn->query($checkQuery);
    if ($checkResult->num_rows > 0) {

      $sql = "UPDATE barang SET jumlah = '$jumlah', nama_barang = '$nama_barang', tanggal = '$tanggal' WHERE no = '$no' AND owner = '$id'";
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data barang berhasil diubah');</script>";
        header('Location: listbarang.php');
        exit();
      } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
        echo "<script>alert('$error_message');</script>";
      }
    } else {
      $error_message = "Anda tidak memiliki akses ke ID Barang tersebut";
      echo "<script>alert('$error_message');</script>";
    }
  } else {
    $error_message = "User tidak ditemukan";
    echo "<script>alert('$error_message');</script>";
  }
} else if (isset($_GET['id'])) {

  $no = $_GET['id'];
} else {
  header('Location: listbarang.php');
  exit();
}

$query = "SELECT * FROM barang WHERE no = '$no'";

$result = $conn->query($query);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  $jumlah = $row['jumlah'];
  $nama_barang = $row['nama_barang'];
  $tanggal = $row['tanggal'];
} else {
  header('Location: listbarang.php');
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="BAGAS DWI IANTORO">
  <meta name="nim" content="223307066">
  <title>Edit Barang</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <style>
    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>

  <link href="tambahbarang.css" rel="stylesheet">
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="dashboard.php">
        <?php echo $username; ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav ml-auto mb-2">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Barang
              Masuk</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="tambahbarang.php">Tambah Barang</a></li>
              <li><a class="dropdown-item" href="listbarang.php">List Barang</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <h2>Edit Barang</h2>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Form Pengisian Barang</h4>
          <form class="needs-validation" method="POST" action="edit.php" novalidate>
            <input type="hidden" value="<?php echo $no ?>" name="id">
            <div class="row g-3">


              <div class="col-12">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder=""
                  value="<?php echo $nama_barang; ?>" required>
                <div class="invalid-feedback">
                  Isi Nama Barang
                </div>
              </div>

              <div class="col-12">
                <label for="jumlah" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder=""
                  value="<?php echo $jumlah; ?>" required>
                <div class="invalid-feedback">
                  Isi dengan jumlah barang
                </div>
              </div>

              <div class="col-12">
                <label for="tanggal" class="form-label">Tanggal <span class="text-muted">(Optional)</span></label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder=""
                  value="<?php echo $tanggal; ?>">
              </div>
            </div>
            <br>
            <button class="w-100 btn btn-secondary btn-lg" type="submit">Simpan</button>
          </form>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; Barangku</p>
    </footer>
  </div>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
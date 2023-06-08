<?php
session_start();


if (!isset($_SESSION['username'])) {

  header('Location: sign-in.php');
  exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html class="h-100">

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" media="screen,projection" />
  <meta name="author" content="BAGAS DWI IANTORO">
  <meta name="nim" content="223307066">
  <title>Dashboard</title>
</head>
<style>
  .footer {
    background-color: #212529;
    padding: 20px 0;
    text-align: center;
  }

  .footer p {
    margin: 0;
    color: #ffffff;
  }
</style>

<body class="h-100">
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
            <a class="nav-link active" aria-current="pageA" href="dashboard.php">Home</a>
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
  <div class="h-100 d-flex text-black" style="background-color: rgba(0, 0, 0, 0);">
    <div class="container m-auto text-center ">
      <h1> Selamat Datang</h1>
      <p>
        Saya sangat senang dapat membuat website ini dan berbagi konten yang mungkin dapat
        memberikan manfaat. Website ini masih dalam tahap awal dan terus berkembang, jadi saya sangat terbuka untuk
        saran dan
        masukan. Terima kasih atas kunjungannya, dan saya berharap website ini dapat memberikan inspirasi dan informasi
        yang
        bermanfaat bagi semuanya
      </p>
    </div>
  </div>
  <footer class="footer">
    <div class="container">
      <p class="mb-0">&copy; Barangku</p>
    </div>
  </footer>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: sign-in.php');
  exit();
}

include 'koneksi.php';
$username = $_SESSION['username'];


$page = isset($_GET['page']) ? $_GET['page'] : 1;


$rows_per_page = 10;


$offset = ($page - 1) * $rows_per_page;

$query_count = "SELECT COUNT(*) as total_rows FROM barang";
$result_count = $conn->query($query_count);
$total_rows = $result_count->fetch_assoc()['total_rows'];

$total_pages = ceil($total_rows / $rows_per_page);

$query = "SELECT barang.*, user.username FROM barang INNER JOIN user ON barang.owner = user.id WHERE user.username = '$username' LIMIT $offset, $rows_per_page";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="BAGAS DWI IANTORO">
  <meta name="nim" content="223307066">
  <title>Data Barang</title>

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
        <h2>Data Barang</h2>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-8">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Owner</th>
                <th scope="col">Jumlah Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($result->num_rows > 0) {
                $nom = $offset + 1;
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<th scope='row'>" . $nom . "</th>";
                  echo "<td>" . $row['username'] . "</td>";

                  echo "<td>" . $row['jumlah'] . "</td>";
                  echo "<td>" . $row['nama_barang'] . "</td>";
                  echo "<td>" . $row['tanggal'] . "</td>";
                  echo "<td>";
                  echo "<a href='edit.php?id=" . $row['no'] . "' class='btn btn-primary btn-sm'>Edit</a>";
                  echo "<a href='hapus.php?id=" . $row['no'] . "' class='btn btn-danger btn-sm ml-2'>Hapus</a>";
                  echo "</td>";
                  echo "</tr>";
                  $nom++;
                }
              } else {
                echo "<tr><td colspan='7'>Tidak ada data barang</td></tr>";
              }
              ?>
            </tbody>
          </table>
          <?php
          if ($total_pages > 1) {
            echo '<nav aria-label="Page navigation">';
            echo '<ul class="pagination justify-content-center">';

            if ($page > 1) {
              echo '<li class="page-item"><a class="page-link" href="listbarang.php?page=' . ($page - 1) . '">Previous</a></li>';
            }

            for ($i = 1; $i <= $total_pages; $i++) {
              if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="listbarang.php?page=' . $i . '">' . $i . '</a></li>';
              }
            }

            if ($page < $total_pages) {
              echo '<li class="page-item"><a class="page-link" href="listbarang.php?page=' . ($page + 1) . '">Next</a></li>';
            }

            echo '</ul>';
            echo '</nav>';
          }
          ?>
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
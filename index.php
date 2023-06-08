<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="BAGAS DWI IANTORO">
  <meta name="nim" content="223307066">
  <title>Index</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

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

    .bg-darken {
      background-color: rgba(0, 0, 0, 0.5);
    }

    .image-container {
      position: relative;
    }

    .image-container img {
      width: 100%;
      height: auto;
    }

    .image-container .text-overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 2rem;
      font-weight: bold;
      text-align: center;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
  </style>

  <link href="index.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-bg-light">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <div class="image-container">
      <img src="gambar/kardus.jpg" alt="Background Image">
      <div class="text-overlay">
        <h1>Selamat Datang</h1>
        <p class="lead">Untuk melanjutkan, silahkan login</p>
        <p class="lead">
          <a href="sign-in.php" class="btn btn-lg btn-light fw-bold border-white bg-white">Login</a>
        </p>
      </div>
    </div>
    <footer class="mt-auto text-black-50">
      <p>@Barangku</p>
    </footer>
  </div>
</body>

</html>
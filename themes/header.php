<!doctype html>
<head>
    <title>Iklan Harian Radar Banjarmasin</title>
    <link rel='stylesheet' id='bootstrap-css'  href='<?php site('url');?>assets/css/bootstrap.min.css' type='text/css'/>
    <link rel='stylesheet' id='bootstrap-css'  href='<?php site('url');?>assets/css/docs.min.css' type='text/css'/>
    <script src="<?php site('url');?>assets/js/jquery.js"></script>
    <script src="<?php site('url');?>assets/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Docs master nav -->
    <header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.html" class="navbar-brand">Radar Banjarmasin</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li>
          <a href="<?php site('url');?>">Home</a>
        </li>
        <li>
          <a href="<?php site('url');?>iklan/order.php">Order Iklan</a>
        </li>
        <li>
          <a href="components/index.html">Cara Pemesanan</a>
        </li>
        <li>
          <a href="javascript/index.html">Kontak</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php session_start(); if (!ISSET($_SESSION['email'])) : ?>
        <li><a href="<?php site('url');?>user/masuk.php">Login</a></li>
        <li><a href="<?php site('url');?>user/daftar.php">Register</a></li>
        <?php else:?>
        <li><a href="<?php site('url');?>user"><?=getPelangganItems('nama', $_SESSION['user_id']);?></a></li>
        <li><a href="<?php site('url');?>user/logout.php">Logout</a></li>
        <?php endif;?>
      </ul>
    </nav>
  </div>
</header>
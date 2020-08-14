<?php
ob_start();
session_start();
include "includes/config.php";
include "function/function.php";
date_default_timezone_set("Asia/Jakarta");
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/custom.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/custom-gallery.css"> -->
    <link rel="stylesheet" type="text/css" href="css/custom-blog.css">
    <title>Dumet School</title>
  </head>
  <body>
      
  <!-- HEADER -->
  <div class="container-fluid bg-dark p-2 header">
    <div class="container">
      <div class="row">
        <?php include "includes/header.php"; ?>
      </div>
    </div>
  </div>

  <!-- NAVIGATION -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <?php include "includes/menu.php"; ?>
    </div>
  </nav>

<?php
/**HOME */
if(isset($_GET["about"])){include "pages/about.php";}
elseif(isset($_GET["service"])){include "pages/service.php";}
elseif(isset($_GET["gallery"])){include "pages/gallery.php";}
elseif(isset($_GET["blog"]) || isset($_GET["page"])) {include "pages/blog.php";}
elseif(isset($_GET["detail"])) {include "pages/detail.php";}
elseif(isset($_GET["search"])|| isset($_GET["page-search"])) {include "pages/search.php";}
elseif(isset($_GET["category"]) || isset($_GET["page-category"])) {include "pages/category.php";}
elseif(isset($_GET["contact"])){include "pages/contact.php";}
else {include "pages/home.php";}
?>

<!-- FOOTER -->
<div class="container-fluid bg-dark py-5 footer">
  <div class="container">
    <div class="row">
      <?php include "includes/footer.php"; ?>
    </div>         
  </div>
</div>

<!-- COPYRIGHT -->
  <div class="container-fluid bg-dark copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12 d-flex bd-highlight">
          <?php include "includes/copyright.php"; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.2.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php

mysqli_close($conn);
ob_end_flush();
?>
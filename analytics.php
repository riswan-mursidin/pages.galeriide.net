<?php 
include "config/aksi.php"; 
if($_SESSION['login'] != TRUE){
    echo "<script type='text/javascript'>document.location.href = 'index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" href="img/logo-icon-dark.svg" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <title>APP LANDING PAGE | GALERIIDE</title>
  </head>
  <body>
    <section id="customer">
      <div class="container">
        <div class="row">
          <div class="col mb-3">
            <nav
              style="
                --bs-breadcrumb-divider: url(
                  &#34;data:image/svg + xml,
                  %3Csvgxmlns='http://www.w3.org/2000/svg'width='8'height='8'%3E%3Cpathd='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'fill='currentColor'/%3E%3C/svg%3E&#34;
                );
              "
              aria-label="breadcrumb"
            >
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Analytcs
                </li>
              </ol>
            </nav>
          </div>
          <form action="" method="post" class="col-12">
          <?php  
                $querygoogle = mysqli_query($conn, "SELECT * FROM google_analysis");
                $rowgoogle = mysqli_fetch_assoc($querygoogle);
                $valuegoogle = mysqli_num_rows($querygoogle) > 0 ? $rowgoogle['script_analysis'] : "";
          ?>
            <h1>GOOGLE ANALYTICS</h1>
            <p>Masukkan script Google Analytics</p>
            <div class="form-floating shadow-sm">
              <textarea
                class="form-control"
                placeholder="Leave a comment here"
                id="floatingTextarea2"
                style="height: 100px"
                name="google"
              ><?= $valuegoogle ?></textarea>
              <label for="floatingTextarea2">Script </label>
            </div>
            <div class="col mt-3">
              <button type="submit" name="googleaksi" class="btn btn-success">SIMPAN</button>
            </div>
          </form>
          <form action="" method="post" class="col-12 mt-5">
          <?php  
                $queryfb = mysqli_query($conn, "SELECT * FROM fb_pixel");
                $rowfb = mysqli_fetch_assoc($queryfb);
                $valuefb = mysqli_num_rows($queryfb) > 0 ? $rowfb['script_pixel'] : "";
            ?>
            <h1>FACEBOOK PIXEL</h1>
            <p>Masukkan script Facebokk Pixel</p>
            <div class="form-floating shadow-sm">
              <textarea
                class="form-control"
                placeholder="Leave a comment here"
                id="floatingTextarea2"
                style="height: 100px"
                name="fb"
              ><?= $valuefb ?></textarea>
              <label for="floatingTextarea2">Script </label>
            </div>
            <div class="col mt-3">
              <button type="submit" name="fbaksi" class="btn btn-success">SIMPAN</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <section id="footer ">
      <div class="container mt-5">
        <div class="row text-center">
          <div class="col-12">
            <p class="text-ket">
              support by <a href="https://galeriide.com"> galeriide.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

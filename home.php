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

    <title>APP LANDING PAGE | GALERIIDE</title>
  </head>
  <body>
    <section id="home">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1>HAI KAK GALERIIDE</h1>
            <p>Selamat datang di aplikasi Landing Page Galeriide</p>
          </div>
          <div class="col-4 col-sm-3">
            <a href="customer.php"
              ><div class="box-menu">
                <img
                  class="img-fluid mx-auto d-block"
                  src="img/kontak.png"
                  alt=""
                /></div
            ></a>
            <p class="mt-3 text-menu">CUSTOMER</p>
          </div>
          <div class="col-4 col-sm-3">
            <a href="analytics.php"
              ><div class="box-menu">
                <img
                  class="img-fluid mx-auto d-block"
                  src="img/promo.png"
                  alt=""
                /></div
            ></a>
            <p class="mt-3 text-menu">Analytcs</p>
          </div>
          <div class="col-4 col-sm-3">
            <a href="logout.php">
              <div class="box-menu">
                <img
                  class="img-fluid mx-auto d-block"
                  src="img/akun.png"
                  alt=""
                />
              </div>
            </a>
            <p class="mt-3 text-menu">log out</p>
          </div>
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
<?php mysqli_close($conn) ?>
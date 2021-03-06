<?php  
include "config/aksi.php";
if($_SESSION['login'] == TRUE){
  echo "<script type='text/javascript'>document.location.href = 'home.php';</script>";
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
    <section id="index">
      <form action="" method="post" class="container">
        <div class="row justify-content-center">
          <img
            class="img-fluid mb-3 mt-5"
            src="img/logo-icon-dark.svg"
            alt=""
          />
          <h1 class="mt-5">LOGIN</h1>
          <p>Selamat datang di aplikasi Landing Page Galeriide</p>
          <p>Masukkan username dan password anda</p>
          <div class="form-floating mt-3 mb-3">
            <input
              type="email"
              name="email"
              class="form-control"
              id="floatingInput"
              placeholder="name@example.com"
            />
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input
              type="password"
              name="pass"
              class="form-control"
              id="floatingPassword"
              placeholder="Password"
            />
            <label for="floatingPassword">Password</label>
          </div>
          <?php if($notif_error != ""){ ?>
            <p class="notif-eror" style="font-size: 10px; color:red;">
              *<?php echo $notif_error; ?>
            </p>
            <?php } ?>
          <div class="col">
            <button type="submit" name="login" class="btn btn-success">MASUK AKUN</button>
          </div>
        </div>
      </form>
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
<?php include "config/aksi.php" ?>
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
                ); "aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="customer.php">Customer</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Client Website
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <h1>TEXT WHATSAPP</h1>
        </div>
        <div class="col-12 mb-3">
            <select  name="text" id="text" class="form-select" onchange="mySelect()">
                <option disabled selected>Pilih Teks</option>
                <?php  
                $querytext = mysqli_query($conn, "SELECT * FROM pesan ");
                while($rowteks = mysqli_fetch_assoc($querytext)){
                ?>
                <option value="<?= $rowteks['id_pesan'] ?>"><?= $rowteks['judul_pesan'] ?></option>
                <?php } ?>
            </select>
            <p style="font-size:smaller">Pilih konsep pesan whatsapp.</p>
        </div>
        <div class="col-12">
            <h1>DATA CLIENT</h1>
        </div>
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">WHATSAPP</th>
                        <th scope="col">KOTA ASAL</th>
                        <th scope="col">FOLLOW UP</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    $no = 1;
                    $querycustomer = mysqli_query($conn, "SELECT * FROM customer");
                    while($rowcustomer = mysqli_fetch_assoc($querycustomer)){ 
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $rowcustomer['nama_customer'] ?></td>
                        <td><?= $rowcustomer['wa_customer'] ?></td>
                        <td><?= $rowcustomer['kota_asal_customer'] ?></td>
                        <td>
                            <a href="#sendcustomer<?= $rowcustomer['id_customer'] ?>" data-bs-toggle="modal"><span class="material-icons"> send </span></a>
                        </td>
                        <td>
                            <a href="#deletecustomer<?= $rowcustomer['id_customer'] ?>" data-bs-toggle="modal"><span class="material-icons"> delete </span></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                <input type="hidden" id="angka" value="<?= $no ?>">
            </table>
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
                <?php  
                $querycustomer = mysqli_query($conn, "SELECT * FROM customer");
                while($rowcustomer = mysqli_fetch_assoc($querycustomer)){
                ?>
                <!-- Modal delete Teks -->
                <div class="modal fade" data-bs-backdrop="static" id="deletecustomer<?= $rowcustomer['id_customer'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <form action="" method="post" class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Menghapus Customer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apa Anda yakin ingin menghapus Customer?
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" value="<?= $rowcustomer['id_customer'] ?>">
                                <button type="submit" name="deletecustomer" class="btn btn-primary">Ya</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end Modal Edit Teks -->
                <!-- Modal delete Teks -->
                <div class="modal fade" data-bs-backdrop="static" id="sendcustomer<?= $rowcustomer['id_customer'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <form action="" method="post" class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mengirim Pesan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Ingin mengirim pesan ke <?= $rowcustomer['nama_customer'] ?>?
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="no" value="<?= $row['wa_customer'] ?>">
                                <input type="hidden" id="teksinput<?= $i ?>" name="teksinput" >
                                <input type="hidden" name="namakontak" value="<?= $row['nama_costumer'] ?>">
                                <input type="hidden" name="id" value="<?= $rowcustomer['id_customer'] ?>">
                                <button type="submit" name="send" class="btn btn-primary">Ya</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end Modal Edit Teks -->
                <?php } ?>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"
        ></script>
    </body>
</html>

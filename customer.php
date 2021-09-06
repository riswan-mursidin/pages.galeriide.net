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
                  Customer
                </li>
              </ol>
            </nav>
          </div>
          <div class="col-12">
            <h1>DATA CUSTOMER</h1>
            <p>
              Menu ini adalah menu untuk mengirim pesan whatsapp ke client anda
              masing masing.
            </p>
          </div>
          <div class="col-12">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">PILIH DATA KATEGORI</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td><a href="client_website.php">DATA CLIENT WEBSITE</a></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>DATA CLIENT MANUAL</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-12 text-ket">
            <p>
              * Data client web adalah data yang terisi otomatis dari form
              "Konsultasi" dihalaman web anda
            </p>
            <p>
              * Data client manual adalah data yang diupload secara manual atau
              mengupload data melalui excel, format excel telah kami siapkan.
            </p>
            <h1>DAFTAR TEXT PESAN WHATSAPP</h1>
            <button type="buuton" class="btn btn-warning mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#tambahpesan">+ PESAN PROMO</button>
            <!-- Modal -->
            <div class="modal fade" data-bs-backdrop="static" id="tambahpesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <form action="" method="post" class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Text</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="title" class="form-label">Text Title</label>
                      <input type="text" name="judul" class="form-control" id="title" placeholder="Contoh : text title">
                    </div>
                    <div class="mb-3">
                      <label for="text" class="form-label">Content Text</label>
                      <textarea class="form-control" name="isi" id="text" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="simpanteks" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- end Modal -->
          </div>
          <div class="col-12">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">JUDUL</th>
                  <th scope="col">ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;  
                $querypesan = mysqli_query($conn, "SELECT * FROM pesan");
                while($rowpesan = mysqli_fetch_assoc($querypesan)){
                ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><a href="#detailpesan<?= $rowpesan['id_pesan'] ?>" data-bs-toggle="modal"><?= $rowpesan['judul_pesan'] ?></a></td>
                  <td>
                    <a href="#editpesan<?= $rowpesan['id_pesan'] ?>" data-bs-toggle="modal"><span class="material-icons me-3"> edit </span></a>
                    <a href="#deletepesan<?= $rowpesan['id_pesan'] ?>" data-bs-toggle="modal"><span class="material-icons"> delete </span></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
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
              <?php  
              $querypesan = mysqli_query($conn, "SELECT * FROM pesan");
              while($rowpesan = mysqli_fetch_assoc($querypesan)){
              ?>
              <!-- Modal Edit Teks -->
            <div class="modal fade" data-bs-backdrop="static" id="editpesan<?= $rowpesan['id_pesan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <form action="" method="post" class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Text</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="title" class="form-label">Text Title</label>
                      <input type="text" name="judul" value="<?= $rowpesan['judul_pesan'] ?>" class="form-control" id="title" placeholder="Contoh : text title">
                    </div>
                    <div class="mb-3">
                      <label for="text" class="form-label">Content Text</label>
                      <textarea class="form-control" name="isi" id="text" rows="3"><?= $rowpesan['isi_pesan'] ?></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $rowpesan['id_pesan'] ?>">
                    <button type="submit" name="editteks" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- end Modal Edit Teks -->
            <!-- Modal views Teks -->
            <div class="modal fade" data-bs-backdrop="static" id="detailpesan<?= $rowpesan['id_pesan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <form action="" method="post" class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Text</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="title" class="form-label">Text Title</label>
                      <input type="text" style="cursor: not-allowed;" name="judul" value="<?= $rowpesan['judul_pesan'] ?>" class="form-control" id="title" placeholder="Contoh : text title" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="text" class="form-label">Content Text</label>
                      <textarea class="form-control" style="cursor: not-allowed;" name="isi" id="text" rows="3" readonly><?= $rowpesan['isi_pesan'] ?></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="simpanteks" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- end Modal Edit Teks -->
            <!-- Modal delete Teks -->
            <div class="modal fade" data-bs-backdrop="static" id="deletepesan<?= $rowpesan['id_pesan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <form action="" method="post" class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menghapus Text</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Apa Anda yakin ingin menghapus Pesan?
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $rowpesan['id_pesan'] ?>">
                    <button type="submit" name="deleteteks" class="btn btn-primary">Ya</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- end Modal delete Teks -->
            <?php } ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<?php mysqli_close($conn) ?>
<?php  
    include "config/koneksi.php";
    $i = 1;
    $get = $_GET['q'];
    $sql = mysqli_query($conn, "SELECT * FROM customer WHERE nama_customer REGEXP '^$get' OR kota_asal_customer REGEXP '^$get' OR wa_customer REGEXP '^$get' ORDER BY kota_asal_customer DESC");
    while($row = mysqli_fetch_assoc($sql)){
?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $row['nama_customer'] ?></td>
        <td><?= $row['wa_customer'] ?></td>
        <td><?= $row['kota_asal_customer'] ?></td>
        <td> 
            <a href="#sendcustomer<?= $row['id_customer'] ?>" data-bs-toggle="modal"><span class="material-icons">send</span></a>
        </td>
        <td>
            <a href="#deletecustomer<?= $row['id_customer'] ?>" data-bs-toggle="modal"><span class="material-icons">delete</span></a>
        </td>
    </tr>
<?php } ?>
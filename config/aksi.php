<?php  
include "koneksi.php";
session_start();
error_reporting(0);

// LOGIN ADMIN
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $queryemail = mysqli_query($conn, "SELECT * FROM admin WHERE email_admin='$email'");
    if(mysqli_num_rows($queryemail) > 0){
        $rowemail = mysqli_fetch_assoc($queryemail);
        if(password_verify($pass, $rowemail['pass'])){
            $_SESSION['login'] = TRUE;
            $_SESSION['user'] = $rowemail['id_admin'];
            echo "<script type='text/javascript'>document.location.href = 'home.php';</script>";
            exit();
        }else{
            $notif_error = "Password tidak terdaftar";
        }
    }else{
        $notif_error = "Email tidak terdaftar bossku!";
    }
}

// SIMPAN TEKS WA
if(isset($_POST['simpanteks'])){
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    mysqli_query($conn, "INSERT INTO pesan (judul_pesan,isi_pesan) VALUES('$judul','$isi')");
}

if(isset($_POST['editteks'])){
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    mysqli_query($conn, "UPDATE pesan SET judul_pesan='$judul',isi_pesan='$isi' WHERE id_pesan='$id'");
}

if(isset($_POST['deleteteks'])){
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM pesan WHERE id_pesan='$id'");
}

if(isset($_POST['deletecustomer'])){
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM customer WHERE id_customer='$id'");
}

?>
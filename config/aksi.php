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

if(isset($_POST['kirimwa'])){
    $idcos = $_POST['id'];
    $hariini = date("Y-m-d");
    $querycoss = mysqli_query($conn, "UPDATE customer SET waktu_send='$hariini' WHERE id_customer='$idcos'");
    $kontak = $_POST['namakontak'];
    $id = $_POST['teksinput'];
    $queryteks = mysqli_query($conn, "SELECT isi_pesan FROM pesan WHERE id_pesan='$id'");
    $rowteks = mysqli_fetch_assoc($queryteks);
    $teks = $rowteks['isi_pesan'];
    $no = $_POST['no'];
    $arrayteks = preg_split('/\r\n|\r|\n/', $teks);
    $tekswa = '';
    for ($i=0;$i<count($arrayteks);$i++){
        $tekswa .=$arrayteks[$i].'%0A';
    } 
    $dengannama = explode("#nama",$tekswa);
    $mystring = $tekswa;
    $findme   = '#nama';
    if(strpos($mystring, $findme)){
        $tekswa = $dengannama[0].$kontak.$dengannama[1];
    }
    echo "<script type='text/javascript'>document.location.href = 'https://api.whatsapp.com/send?phone=62".$no."&text=".$tekswa."';</script>";
    die();
}

if(isset($_POST['googleaksi'])){
    $script = $_POST['google'];
    $array = explode("'",$script);
    for($i=0;$i<count($array);$i++){
        if($i==count($array)-1){
            $scriptdb .= $array[$i];
        }else{
            $scriptdb .= $array[$i].'"';
        }
    }

    $mystring = $script;
    $findme   = "'";
    if(!strpos($mystring, $findme)){
        $scriptdb = $script;
    }
    $querygoogle = mysqli_query($conn, "SELECT id_analysis FROM google_analysis ");
    if(mysqli_num_rows($querygoogle) > 0){
        $query = mysqli_query($conn, "UPDATE google_analysis SET script_analysis='$scriptdb' ");
        if(!$query){
            echo '<script> alert("gagal"); </script>';
        }
    }else{
        mysqli_query($conn, "INSERT INTO google_analysis (script_analysis) VALUES('$script')");
    }
}

if(isset($_POST['fbaksi'])){
    $script = $_POST['fb'];
    $array = explode("'",$script);
    for($i=0;$i<count($array);$i++){
        if($i==count($array)-1){
            $scriptdb .= $array[$i];
        }else{
            $scriptdb .= $array[$i].'"';
        }
    }

    $mystring = $script;
    $findme   = "'";
    if(!strpos($mystring, $findme)){
        $scriptdb = $script;
    }
    $queryfb = mysqli_query($conn, "SELECT id_pixel FROM fb_pixel ");
    if(mysqli_num_rows($queryfb) > 0){
        $query = mysqli_query($conn, "UPDATE fb_pixel SET script_pixel='$scriptdb'");
        if(!$query){
            echo '<script> alert("gagal"); </script>';
        }
    }else{
        mysqli_query($conn, "INSERT INTO fb_pixel (script_pixel) VALUES('$script')");
    }
}

?>

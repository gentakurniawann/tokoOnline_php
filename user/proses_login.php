<?php
    $username = $_POST["username"];
    $password = $_POST["password"];

    include "koneksi.php";
    $qry_login=mysqli_query($koneksi, "select * from pelanggan where username = '".$username."' and password ='".md5($password)."' ");
    if(mysqli_num_rows($qry_login)>0){
        echo "<script>alert('login berhasil'); location.href='index.php';</script>";
        $dt_login=mysqli_fetch_array($qry_login);
        session_start();
        $_SESSION["id_pelanggan"]=$dt_login["id_pelanggan"];
        $_SESSION["nama"]=$dt_login["nama"];
        $_SESSION["status_login"]=true;
        header("location: index.php");
    }else{
        echo "<script>alert('username dan password tidak benar'); location.href='login.php';</script>";
    }
    
?>
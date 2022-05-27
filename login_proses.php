<?php
   session_start();
   require_once("koneksi.php");
   $username = $_POST['username'];
   $pass = $_POST['password'];   
   
   $sql = mysqli_query($konek,"SELECT * FROM tb_admin WHERE username = '$username' AND password='$pass'");
   $hasil = mysqli_fetch_assoc($sql);
   $x = mysqli_num_rows($sql);

   if($x == 0) {
      header('location:login');
      $_SESSION['pesan']='Username atau Password Tidak Tepat';
   }else {
       $_SESSION['username'] = $hasil['username'];
       header('location:index');
  }
   
?>
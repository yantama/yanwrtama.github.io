<?php
  @session_start();
  include 'koneksi.php';

  $username = $_POST['username'];
  $pass = ($_POST['pass']);

  $query = mysqli_query($con, "select * from user where username='$username' and pass='$pass'");
  $data = mysqli_fetch_array($query);
  $cek = mysqli_num_rows($query);

  if($cek >= 1 ){
      if($data['level'] == "admin"){
        $_SESSION['admin'] = $username;
        header("location:../admin/index.php");

      }else if($data['level'] == "executor"){
        $_SESSION['executor'] = $username;
        header("location:../user/Executor/index.php");

      }else if($data['level'] == "approv"){
        $_SESSION['approv'] = $username;
        header("location:../user/Approval/index.php");

      }else{
      $_SESSION['create'] = $username;
        header("location:../user/AO/index.php");
    }
  }else{
    header('location:../index.php?notif=true');

  }
?>

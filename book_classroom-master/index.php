<?php 
  require_once 'server.php';

  if( !session_id() )
{
    session_start();
}

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ./login.php');
  }

  if(strpos($_SESSION['username'], "lokaal") !== false) {
    header('location: classroom.php');
  }

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	unset($_SESSION['isAdmin']);
  	header("location: ./login.php");
  }
  $username = $_SESSION['username'];

  //isadmin check
  $sql = "SELECT * FROM account WHERE username = '$username' AND isAdmin = '1'";
  $result = mysqli_query($db, $sql);
  
  if (mysqli_num_rows($result) == 1) {
    $_SESSION['isAdmin'] = true;
    include('_dashboard/dashboard.php');
  } else {
    $_SESSION['isAdmin'] = false;
    include('_dashboard/dashboard.php');
  }
  

?>
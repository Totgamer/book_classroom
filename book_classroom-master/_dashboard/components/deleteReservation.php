<?php
    require_once '../../server.php';
    include_once '../../config.php';
    
    // Als reservatie van user is dan true
    $user_check = false;
    $id = mysqli_real_escape_string($db, $_GET['id']);

    $sql = "SELECT id, `name` FROM reservaties WHERE id='$id' AND `name`='" . $_SESSION['username'] . "'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
    $user_check = true;
    }

    if ($_SESSION['isAdmin'] || $user_check) {
        // $id = $_GET['id'];
        $sql = "DELETE FROM reservaties WHERE id = '$id'";
    
        $db->query($sql);
    
        header("location: ../../index.php?action=reserveren");
    } else {
        header("location: ../../index.php");
    }
?>
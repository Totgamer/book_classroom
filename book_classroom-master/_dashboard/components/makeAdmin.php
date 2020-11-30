<?php
    require_once '../../server.php';
    if ($_SESSION['isAdmin']) {
        $id = $_GET['id'];
        $sql = "UPDATE `account` SET `isAdmin` = '1' WHERE `id` = '$id';";
    
        $db->query($sql);
    
        header("location: ../../index.php?action=gebruikers");
    } else {
        header("location: ../../index.php");
    }
?>
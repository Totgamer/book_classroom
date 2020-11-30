<?php
    require_once '../../server.php';
    if ($_SESSION['isAdmin']) {
        $id = $_GET['id'];
        $sql = "DELETE FROM reservaties WHERE id = '$id'";
    
        $db->query($sql);
    
        header("location: ../../index.php?action=reserveren");
    } else {
        header("location: ../../index.php");
    }
?>
<?php
    require_once '../../server.php';
    if ($_SESSION['isAdmin']) {
        $id = $_GET['id'];
        $sql = "DELETE FROM lokalen WHERE id = '$id'";
    
        $db->query($sql);
    
        header("location: ../../index.php?action=lokalen");
    } else {
        header("location: ../../index.php");
    }
?>
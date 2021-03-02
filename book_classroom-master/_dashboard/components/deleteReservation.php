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

    // // delete reservation
    // if ($_SESSION['isAdmin'] || $user_check) {
        
    //     $sql = "DELETE FROM reservaties WHERE id = '$id'";
    
    //     $db->query($sql);
    
    //     header("location: ../../index.php?action=reserveren");
    // } else {
    //     header("location: ../../index.php");
    // }

    if ($_SESSION['isAdmin']) {

        $id = $_GET['id'];

        // pop up
        echo 
        "<div class='pop-up'>
            <div>Weet u zeker dat u deze reservatie wilt verwijderen?</div>
            <div>
                <a href='deleteReservation.php?id=" . $id . "&confirm=no'><button class='btn-no'>Nee</button></a>
                <a href='deleteReservation.php?id=" . $id . "&confirm=yes'><button class='btn-yes'>Ja</button></a>
            </div>
        </div>";

        if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes'){

            $id = $_GET['id'];
            $sql = "DELETE FROM reservaties WHERE id = '$id'";
        
            $db->query($sql);
        
            header("location: ../../index.php?action=reserveren");

        }

        if(isset($_GET['confirm']) && $_GET['confirm'] == 'no'){ header("location: ../../index.php?action=reserveren"); }

    } else {
        header("location: ../../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    
</body>
</html>
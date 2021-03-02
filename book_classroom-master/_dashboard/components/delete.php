<?php
    require_once '../../server.php';
    if ($_SESSION['isAdmin']) {
        $id = $_GET['id'];
        // pop up
        echo 
        "<div class='pop-up'>
            <div>Weet u zeker dat u deze gebruiker wilt verwijderen?</div>
            <div>
                <a href='delete.php?id=" . $id . "&confirm=no'><button class='btn-no'>Nee</button></a>
                <a href='delete.php?id=" . $id . "&confirm=yes'><button class='btn-yes'>Ja</button></a>
            </div>
        </div>";

        if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes'){

            $id = $_GET['id'];
            $sql = "DELETE FROM account WHERE id = '$id'";
        
            $db->query($sql);
        
            header("location: ../../index.php?action=gebruikers");

        }

        if(isset($_GET['confirm']) && $_GET['confirm'] == 'no'){ header("location: ../../index.php?action=gebruikers"); }

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
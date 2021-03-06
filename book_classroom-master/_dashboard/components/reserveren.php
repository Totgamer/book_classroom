

<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Reservatie formulier</h4>
            <p class="card-category">reserveer een ruimte voor een groepsbespreking</p>
        </div>
        <div class="card-body table-responsive">
        <?php include("errors.php") ?>
            <form action="index.php?action=reserveren" method="post"> 
                <div class="form-group">    
                    <label class="form-check-label">Ruimte</label>
                    <select class="form-control" name="room">
                        <?php
                            $sql = "SELECT * FROM lokalen"; 
                            $result = mysqli_query($db, $sql) or die(mysqli_query($db));
                            while ($row = $result->fetch_assoc()){
                                echo "<option>" . $row['name'] . "</option>";
                            }
                        ?>
                    </select>
                    <label class="form-check-label">Datum</label>
                    <input type="date" name="date" class="form-control" id="date_select">
                    <label class="form-check-label">Start tijd</label>
                    <input type="time" name="time_start" class="form-control">
                    <label class="form-check-label">Eind tijd</label>
                    <input type="time" name="time_end" class="form-control">
                    <input type="hidden" value="<?php echo $_SESSION['username']?> " name="name" class="form-control">
                    <input type="submit" name="r_time" value="reserveren" class="btn btn-primary pull-right mt-3">
                    <script>
                    var date = document.getElementById("date_select");
                    var today = new Date();

                    date.addEventListener('input', function (evt) {
                        if(new Date(date.toDateString()) < new Date(new Date().toDateString())) {
                            date.value = Date(new Date().toDateString());
                        }   
                    });

                    </script>
                </div>
            </form>
        </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title">Reservaties</h4>
            <p class="card-category">alle ingeplande reservaties</p>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <tr>
                        <th>Datum</th>
                        <th>Start</th>
                        <th>Eind</th>
                        <th>Ruimte</th>
                        <?php if($_SESSION['isAdmin']) {
                            echo "<th>" . "Gepland door" . "</th>";
                            echo "<th>" . "Actions" . "</th>";
                        }
                        ?>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                            global $current_reservation;
                            $sql = "SELECT * FROM reservaties"; 
                            $result = mysqli_query($db, $sql) or die(mysqli_query($db));
                            while ($row = $result->fetch_assoc()){
                                //check date
                                $date = $row['date'];
                                $time_end = $row['time_end'];
                                $cur_time_h = substr($time_end, 0, 2) * 3600;
                                $cur_time_m = substr($time_end, 3, 2) * 60;
                                $cur_time = $cur_time_h + $cur_time_m + strtotime($date);
                                if( $cur_time > strtotime('now') ) {
 
                                    // time and date variable
                                    $row['date'] = date("d-m-Y", strtotime($row['date']));
                                    $row['time_start'] = substr($row['time_start'], 0, -3);
                                    $row['time_end'] = substr($row['time_end'], 0, -3);

                                    echo "<tr>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['time_start'] . "</td>";
                                    echo "<td>" . $row['time_end'] . "</td>";
                                    echo "<td>" . $row['lokaal'] . "</td>";
                                    if($_SESSION['isAdmin']) {
                                        $current_reservation = true;
                                        ?>

                                        <td>
                                            <?php echo $row['name']; ?>
                                        </td>
                                        <td>
                                            <a href="_dashboard/components/deleteReservation.php?id=<?php echo $row['id'];?>"><i class="material-icons" title="Remove User">close</i></a>
                                        </td>
                                    <?php
                                    } else if($row['name'] == $_SESSION['username']) {
                                        $current_reservation = true;
                                    ?>
                                        <td>
                                            <a href="_dashboard/components/deleteReservation.php?id=<?php echo $row['id'];?>"><i class="material-icons" title="Remove User">close</i></a>
                                        </td>
                                    <?php
                                    }
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- reservatie aanpassen -->
<?php

if($current_reservation == true) {
?>
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header card-header-danger">
                <h4 class="card-title">Reservatie aanpassen</h4>
                <p class="card-category">gemaakte reservaties aanpassen</p>
            </div>
            <div class="card-body table-responsive">
            <?php include("errors.php") ?>
                <form action="index.php?action=reserveren" method="post"> 
                    <div class="form-group">    
                        <label class="form-check-label">Reservatie</label>
                        <select id="reservation" class="form-control" name="reservation">
                            <?php
                                if($_SESSION['isAdmin']){
                                    $sql = "SELECT * FROM reservaties"; 
                                } else {
                                    $sql = "SELECT * FROM reservaties WHERE `name`='" . $_SESSION['username'] . "'";
                                }
                                $result = mysqli_query($db, $sql) or die(mysqli_query($db));
                                while ($row = $result->fetch_assoc()){
                                    $date = $row['date'];
                                    $time_end = $row['time_end'];
                                    $cur_time_h = substr($time_end, 0, 2) * 3600;
                                    $cur_time_m = substr($time_end, 3, 2) * 60;
                                    $cur_time = $cur_time_h + $cur_time_m + strtotime($date);
                                    $reservations = false;
                                    if( $cur_time > strtotime('now') ) {
                                        echo "<option value='" . $row["id"] . "'>lokaal: " . $row['lokaal'] . " | " . substr($row['time_start'], 0, 5) . " - " . substr($row['time_end'], 0, 5) . " | " . date_format(date_create($row['date']), "d-m-Y") . "</option>";
                                        $reservations = true;
                                    }
                                }
                            ?>
                        </select>
                        <label class="form-check-label">Ruimte</label>
                        <select id="room_num" class="form-control" name="room">
                            <?php
                                $sql = "SELECT * FROM lokalen"; 
                                $result = mysqli_query($db, $sql) or die(mysqli_query($db));
                                while ($row = $result->fetch_assoc()){
                                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                }
                            ?>
                        </select>
                        <label class="form-check-label">Datum</label>
                        <input type="date" name="date" class="form-control" id="date_select">
                        <label class="form-check-label">Start tijd</label>
                        <input type="time" id="time_start" name="time_start" class="form-control">
                        <label class="form-check-label">Eind tijd</label>
                        <input type="time" id="time_end" name="time_end" class="form-control">
                        <input type="hidden" value="<?php echo $_SESSION['username']?> " name="name" class="form-control">
                        <input type="submit" name="r_update" value="aanpassen" class="btn btn-danger pull-right mt-3">
                        <script>

                        var date = document.getElementById("date_select");
                        var today = new Date();

                        

                        date.addEventListener('input', function (evt) {
                            if(new Date(date.toDateString()) < new Date(new Date().toDateString())) {
                                date.value = Date(new Date().toDateString());
                            }   
                        });

                        // jquery
                        //get room number from option text
                        var $data = $("#reservation option:selected").text();

                        
                        var $year = $data.slice(36, 40);
                        var $month = $data.slice(33, 35);
                        var $day = $data.slice(30, 32);
                        var $newDate = $data.slice(36, 40);
                            $newDate += '-';
                            $newDate += $month;
                            $newDate += '-';
                            $newDate += $day;

                        $('#room_num').val($data.slice(8, 11));
                        $('#time_start').val($data.slice(14, 19));
                        $('#time_end').val($data.slice(22, 27));

                        $("#reservation").bind('change', function (evt) {
                            
                            $data = $("#reservation option:selected").text();
                            $year = $data.slice(36, 40);
                            $month = $data.slice(33, 35);
                            $day = $data.slice(30, 32);
                            $newDate = $data.slice(36, 40);
                                $newDate += '-';
                                $newDate += $month;
                                $newDate += '-';
                                $newDate += $day;

                            $('#room_num').val($data.slice(8, 11));
                            $('#time_start').val($data.slice(14, 19));
                            $('#time_end').val($data.slice(22, 27));
                        });

                        
                        

                        

                        </script>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
}
?>
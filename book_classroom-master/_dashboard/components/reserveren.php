

<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Reservatie formulier</h4>
            <p class="card-category">reserveer een lokaal voor een groepsbespreking</p>
        </div>
        <div class="card-body table-responsive">
        <?php include("errors.php") ?>
            <form action="index.php?action=reserveren" method="post"> 
                <div class="form-group">    
                    <select class="form-control" name="room">
                        <?php
                            $sql = "SELECT * FROM lokalen"; 
                            $result = mysqli_query($db, $sql) or die(mysqli_query($db));
                            while ($row = $result->fetch_assoc()){
                                echo "<option>" . $row['name'] . "</option>";
                            }
                        ?>
                    </select>
                    <label class="form-check-label">Lokaal</label>
                    <input type="date" name="date" class="form-control">
                    <label class="form-check-label">Datum</label>
                    <input type="time" name="time_start" class="form-control">
                    <label class="form-check-label">Start tijd</label>
                    <input type="time" name="time_end" class="form-control">
                    <label class="form-check-label">Eind tijd</label>
                    <input type="hidden" value="<?php echo $_SESSION['username']?> " name="name" class="form-control">
                    <input type="submit" name="r_time" class="btn btn-primary pull-right mt-3">
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
                        <th>Start tijd</th>
                        <th>Eind tijd</th>
                        <th>Lokaal</th>
                        <?php if($_SESSION['isAdmin']) {
                            echo "<th>" . "Gepland door" . "</th>";
                            echo "<th>" . "Actions" . "</th>";
                        }
                        ?>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM reservaties"; 
                            $result = mysqli_query($db, $sql) or die(mysqli_query($db));
                            while ($row = $result->fetch_assoc()){
                                //check date
                                $date = $row['date'];
                                if( strtotime($date) > strtotime('now') ) {
 
                                    $row['date'] = date("d-m-Y", strtotime($row['date']));

                                    echo "<tr>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['time_start'] . "</td>";
                                    echo "<td>" . $row['time_end'] . "</td>";
                                    echo "<td>" . $row['lokaal'] . "</td>";
                                    if($_SESSION['isAdmin']) {
                                        ?>

                                        <td>
                                            <?php echo $row['name']; ?>
                                        </td>
                                        <td>
                                            <a href="_dashboard/components/deleteReservation.php?id=<?php echo $row['id'];?>"><i class="material-icons" title="Remove User">close</i></a>
                                        </td>
                                    <?php
                                    } else if($row['name'] == $_SESSION['username']) {
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
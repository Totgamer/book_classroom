<body class="bg-dark">
    <main class="container bg-dark">
        <div class="row">
            <div class="col-md-6">
                    <div class="text-center pt-5" id="clock"></div>
            </div>
            <div class="col-md-6">
                <div class="card bg-secondary text-light">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Reservaties</h4>
                        <p class="card-category">alle ingeplande reservaties</p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover-secondary">
                            <thead class="text-success">
                                <tr>
                                    <th>Datum</th>
                                    <th>Start tijd</th>
                                    <th>Eind tijd</th>
                                    <th>Lokaal</th>
                                    <th>Gepland door</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                        $lokaal = $_GET['classroom'];
                                        $sql = "SELECT * FROM reservaties WHERE lokaal = '$lokaal'"; 
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

                                                // check if is ongoing
                                                $f = DateTime::createFromFormat('H:i', $row['time_start']);
                                                $t = DateTime::createFromFormat('H:i', $row['time_end']);
                                                $i = DateTime::createFromFormat('H:i', date("H:i"));
                                                // ongoing meeting
                                                if ($i > $f && $i < $t){
                                                    echo "<tr class='card-header-success'>";
                                                    echo "<td class='text-light'>" . $row['date'] . "</td>";
                                                    echo "<td class='text-light'>" . $row['time_start'] . "</td>";
                                                    echo "<td class='text-light'>" . $row['time_end'] . "</td>";
                                                    echo "<td class='text-light'>" . $row['lokaal'] . "</td>";
                                                    echo "<td class='text-light'>" . $row['name'] . "</td>";
                                                    echo "</tr>";
                                                }else {
                                                    echo "<tr>";
                                                    echo "<td class='text-light'>" . $row['date'] . "</td>";
                                                    echo "<td class='text-light'>" . $row['time_start'] . "</td>";
                                                    echo "<td class='text-light'>" . $row['time_end'] . "</td>";
                                                    echo "<td class='text-light'>" . $row['lokaal'] . "</td>";
                                                    echo "<td class='text-light'>" . $row['name'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="./js/jQuery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#clock").load("classroom_clock.php");
            setInterval(() => {
                $("#clock").load("classroom_clock.php");
            }, 1000);
        });
    </script>
</body>
</html>
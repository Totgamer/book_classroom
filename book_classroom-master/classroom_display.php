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
                                            if( strtotime($date) > strtotime('now') ) {

                                                $row['date'] = date("d-m-Y", strtotime($row['date']));

                                                echo "<tr>";
                                                echo "<td class='text-light'>" . $row['date'] . "</td>";
                                                echo "<td class='text-light'>" . $row['time_start'] . "</td>";
                                                echo "<td class='text-light'>" . $row['time_end'] . "</td>";
                                                echo "<td class='text-light'>" . $row['lokaal'] . "</td>";
                                                echo "<td class='text-light'>" . $row['name'] . "</td>";
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
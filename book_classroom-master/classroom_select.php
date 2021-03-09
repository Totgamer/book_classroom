
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title">Selecteer Ruimte</h4>
                <p class="card-category">selecteer een ruimte om de reserveringen te zien</p>
            </div>
            <div class="card-body table-responsive">
            <?php include("errors.php") ?>
                <form action="classroom.php" method="get"> 
                    <div class="form-group">    
                        <select class="form-control" name="classroom">
                            <?php
                                $sql = "SELECT * FROM lokalen"; 
                                $result = mysqli_query($db, $sql) or die(mysqli_query($db));
                                while ($row = $result->fetch_assoc()){
                                    echo "<option>" . $row['name'] . "</option>";
                                }
                            ?>
                        </select>
                        <input type="submit" class="btn btn-block btn-success">
                              <p> Terug naar
                                <a href="login.php">Login</a>
                              </p>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php
    if (!$_SESSION['isAdmin']) {
        header("location: index.php");
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Alle Lokalen</h4>
                <p class="card-category">yoink</p>
            </div>
            <div class="card-body">

            <form action="index.php?action=lokalen" method="post"> 
                <div class="form-group pull-right">
                <div class="input-group">
                    <input type="text" name="room" class="form-control" placeholder="Voeg een lokaal toe.." autocomplete='off'>
                    <input type="submit" name="add_room" class="btn btn-white btn-round btn-just-icon pull-right" value="+">
                </div>
                </div>
            </form>

                <div class="table-responsive">

                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Lokaal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $search_query = "SELECT * FROM lokalen";
                            $search_result = $db->query($search_query);
                              
                            if($search_result ->num_rows > 0) {
                              while($row = $search_result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td> <?php echo $row['id']; ?> </td>
                                        <td> <?php echo $row['name']; ?>  </td>
                                        
                                        <td>
                                            <a href="_dashboard/components/deleteRoom.php?id=<?php echo $row['id'];?>"><i class="material-icons" title="Remove Room">close</i></a>
                                        </td>
                                    </tr>              
                                    <?php
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

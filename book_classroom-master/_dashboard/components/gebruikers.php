<?php
    if (!$_SESSION['isAdmin']) {
        header("location: index.php");
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Alle gebruikers</h4>
                <p class="card-category">zonk</p>
            </div>
            <div class="card-body">            

                <form action="index.php?action=gebruikers" method="post"> 
                    <div class="form-group pull-right">
                    <div class="input-group">
                        <input type="text" name="user_str" class="form-control" placeholder="Zoek een gebruiker.." autocomplete='off' value="<?php if(isset($_POST['user_str'])&&$_POST['user_str']!=NULL){echo $_POST['user_str'];}?>">

                        <button type="submit" class="btn btn-white btn-round btn-just-icon" name="search_user">
                            <i class="material-icons">search</i>
                        </button>
                    </div>
                    </div>
                </form>

                <div class="table-responsive">

                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                            if (isset($_POST['search_user'])) {
                                $user = $_POST['user_str'];
                                $search_query = "SELECT * FROM account WHERE username LIKE '%$user%'";
                            } else {
                                $search_query = "SELECT * FROM account";
                            }

                            $search_result = $db->query($search_query);
                              
                            if($search_result ->num_rows > 0) {
                              while($row = $search_result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td> <?php echo $row['id']; ?> </td>
                                        <td> <?php echo $row['username']; if ($row['isAdmin'] == '1') { echo " " . "<i class='material-icons small' title='Admin User'>beenhere</i>"; } ?>  </td>
                                        
                                        <td>
                                            <?php if($row['isAdmin'] != '1') {
                                                ?>
                                            <a href="_dashboard/components/makeAdmin.php?id=<?php echo $row['id'];?>"><i class="material-icons" title="Make User Admin">person_add</i></a>
                                            <a href="_dashboard/components/delete.php?id=<?php echo $row['id'];?>"><i class="material-icons" title="Remove User">close</i></a>
                                            <?php
                                            }
                                            ?>
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

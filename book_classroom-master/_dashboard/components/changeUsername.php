<div class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header card-header-success">
            <h4 class="card-title">Verander Gebruikersnaam</h4>
            <p class="card-category">Edit Profile</p>
        </div>
        <div class="card-body">
            <?php include("errors.php") ?>  
            <form action="index.php?action=changeUsername" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nieuwe gebruikersnaam.." name="new_username" autocomplete="off">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success pull-right" name="changeUsername">Update</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
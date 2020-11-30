<div class="row">
    <div class="col-md-12">
            <?php include("errors.php") ?>  
        <div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title "><i class=" material-icons small">settings</i> Account</h4>
                <p class="card-category">zonk</p>
            </div>
            
            <div class="card-body">            
                <div class="table-responsive">

                    <div class="list-group">
                        <a href="index.php?action=changeUsername" class="list-group-item list-group-item-action"><i class=" material-icons small">edit</i> Verander Gebruikersnaam</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-danger">
                <h4 class="card-title "><i class=" material-icons small">settings</i> Gevaarlijk</h4>
                <p class="card-category">zonk</p>
            </div>
            <div class="card-body">            
                <div class="table-responsive">

                    <div class="list-group">
                        <a href="index.php?action=changePassword" class="list-group-item list-group-item-action"><i class=" material-icons small">edit</i> Verander Wachtwoord</a>
                        <a href="index.php?action=confirmAccountDelete" class="list-group-item list-group-item-action"><i class=" material-icons small">close</i> Verwijder Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

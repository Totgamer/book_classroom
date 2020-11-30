<div class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header card-header-danger">
            <h4 class="card-title">Verwijder Account</h4>
            <p class="card-category">Edit Profile</p>
        </div>
        <div class="card-body">
            <?php include("errors.php") ?>      
            <form action="index.php?action=instellingen" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Typ "BEVESTIGEN" om je account te verwijderen</label>
                        <input type="text" class="form-control" name='Confirmation' autocomplete='off'>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-danger pull-left">Cancel</button>
            <button type="submit" class="btn btn-danger pull-right" name='DeleteAccountConfirm' >Delete</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
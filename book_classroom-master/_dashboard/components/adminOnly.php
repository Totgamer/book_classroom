<li class="nav-item <?php if($_GET['action'] == 'gebruikers') { echo 'active';} ?>">
    <a class="nav-link" href="index.php?action=gebruikers">
        <i class="material-icons">person</i>
        <p>Gebruikers</p>
    </a>
</li>

<li class="nav-item <?php if($_GET['action'] == 'lokalen') { echo 'active';} ?>">
    <a class="nav-link" href="index.php?action=lokalen">
        <i class="material-icons">meeting_room</i>
        <p>Lokalen</p>
    </a>
</li>
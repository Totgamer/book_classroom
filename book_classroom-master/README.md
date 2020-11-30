# Installation

Create a file named "config.php"
Paste code below into it.
Edit config.php where needed.
```
<?php

// db variables
$db_server = "";
$db_user = "";
$db_pass = "";
$db_name = "";

$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
```

Import Database.sql into PhpMyAdmin
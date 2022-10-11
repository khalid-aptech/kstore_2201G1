
<?php

include "config.php";

session_start();
session_unset();
session_destroy();

header("location:http://localhost:82/kstore_2201G1/admin/index.php");





?>
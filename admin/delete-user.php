<?php 

$userid = $_GET["id"];

include "config.php";

$query =  "DELETE FROM `user` WHERE `user_id` =  '{$userid}'";

mysqli_query($conn,$query);
header("location:http://localhost:82/kstore_2201G1/admin/users.php");


?>
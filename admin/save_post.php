<?php

if(isset($_FILES["fileToUpload"]))
{
    $error = array();
    
    $file_name = $_FILES["fileToUpload"]["name"];
    $file_size = $_FILES["fileToUpload"]["size"];
    $file_type = $_FILES["fileToUpload"]["type"];
    $file_temp = $_FILES["fileToUpload"]["tmp_name"];
    $file_ext  = explode(".",$file_name);
    $file_ext = end($file_ext);
    $file_ext = strtolower($file_ext);
    $extension = array("jpg","jpeg","png");

    if(in_array($file_ext,$extension) === false)
    {
        $error = "extension must be png , jpg , jpeg";
    }
    if($file_size > 2097152)
    {
        $error = "file size must be less than 2 mb";
    }
    if(empty($error)== true)
    {
        move_uploaded_file($file_temp,"upload/".$file_name);
    }
    else
    {
        print_r($error);
        die();

    }

}
$title = $_POST["products_title"];
$description = $_POST["productsdesc"];
$category = $_POST["category"];
$date = date("d-m-Y");
session_start();
$author = $_SESSION["user_id"];

include "config.php";

$query = "INSERT INTO `post`(`title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES ('{$title}','{$description}',{$category},'{$date}',{$author},'{$file_name}');";
$query .= "UPDATE category set post= post + 1 where category_id = '{$category}';";

mysqli_multi_query($conn, $query);

header("location:{$host}/admin/products.php");




?>
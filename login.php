<?php
session_start();
echo("<pre>");
require_once "./User.php";
require_once "./DatabaseSingleton.php";

$email = $_POST["email"];
$password = $_POST["password"];
$_SESSION["email"] = $email;


if(empty($_SESSION["user"])) 
{
    echo "Some of your login details are empty!";
    exit();
}
else
{
    header("Location: home.php");
    exit();
}


$connection = DatabaseSingleton::startConnection();
$ps = $connection -> prepare("SELECT * FROM user WHERE email = ? AND password = ?");
$ps -> bind_param("ss", $email, $password);

if (!$ps -> execute()) 
{
    die("Error - " . $connection -> error);
}

foreach ($ps -> get_result() as $index => $row) 
{
    echo $index . $row;
}

DatabaseSingleton::closeConnection();

?>
<?php
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['pass'];
$address = $_POST['address'];
$mechaddress = $_POST['mechaddress'];
$phno = $_POST['phnum'];
$age = $_POST['age'];
$pincode= $_POST['pincode'];
include 'connect.php';

$insertQuery = "INSERT INTO mechanic(name, username, email, password, age, address,phno,mechaddress,pincode) VALUES ('$name', '$username', '$email', '$password', '$age', '$address',  '$phno','$mechaddress','$pincode')"; 
$query = mysqli_query($connect, $insertQuery);

if($query)
{
    echo "<br> Successfully registered!";
    header("Location: index.html");
}
?>

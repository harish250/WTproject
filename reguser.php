<?php
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['pass'];
$address = $_POST['address'];
$phno = $_POST['phnum'];
$age = $_POST['age'];
$pincode=$_POST['pincode'];
include 'connect.php';

$insertQuery = "INSERT INTO user(name, username, email, password, age, address, phno,pincode) VALUES ('$name', '$username', '$email', '$password', '$age', '$address', '$phno','$pincode')"; 
$query = mysqli_query($connect, $insertQuery);

if($query)
{
    echo "<br> Data inserted!";
    header("Location: index.html");
}
?>

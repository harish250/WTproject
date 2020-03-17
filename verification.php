<?php
session_start();
   $username=$_POST['username'];
   $password=$_POST['password'];
   
   $conn=new mysqli("localhost","root","","test");
   if($conn->connect_error)
   {
    die("Connection failed: " . $conn->connect_error);
   }

   $type_client=$_POST['type'];
   if(strcmp("User",$type_client)==0)
   {
      $query="SELECT * from user where username='$username' and password='$password'";
      $result = $conn->query($query);
      if($result->num_rows>0)
   {
      $_SESSION["user"] = $username;   
      header("Location: map.php");
      echo "<h1>Logged in as ".$username."</h1>";
   }
   else
   {
      echo "<h1>please register if u have not yet done</h1>";
   }
   }
   else if(strcmp("Mechanic",$type_client)==0)
   {
      $query="SELECT * from mechanic where username='$username' and password='$password'";
      $result = $conn->query($query);
      if($result->num_rows>0)
   {
      $_SESSION["user"] = $username;  
      header("Location: map.php");
      echo "<h1>Logged in as ".$username."</h1>";
   
   }
   else
   {
      echo "<h1>please register if u have not yet done</h1>";
   }
   }



  
   
   
?>

<?php
session_start();

if(isset($_SESSION["user"])){
    $user=$_SESSION["user"];
    
    echo " <h1>Logged in as  $user</h1>";
}

 
  
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        height: 500px;;  
        width: 100%;  
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
   <!-- map -->
    <div id="map"></div>
    <script>
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } 
  }
  // The location of pos
  function showPosition(position) 
  {
           
     var pos = {lat: position.coords.latitude, lng: position.coords.longitude};
     // The map, centered at pos
     var map = new google.maps.Map(
           document.getElementById('map'), {
           zoom: 13,
           center: pos});
     
     var marker = new google.maps.Marker({position: pos, map: map});
  }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmkTndQbY_LQbYsiDJT5y8Vy6em5CAzys&callback=getLocation">
    </script>
  </body>
</html>


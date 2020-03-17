function checkPassword(form)
{
    var  password1=form.pass.value;
    var password2=form.repass.value;
    var username=form.username.value;
    var age=form.age.value;
    var nameRegex = /^[a-zA-Z0-9\_]+$/;
    var validfirstUsername = username.match(nameRegex);
    var email = form.email.value;
    var email_reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if(password1!=password2)
    {
        alert("Password Did not match Please re enter the password");
        return false;
    }
    else if(validfirstUsername==null)
    {
        alert("Your user name is not valid. Only characters A-Z, a-z , '_' and numbers are  acceptable.");
        return false;
    }
    else if(email.match(email_reg)==null)
    {
        alert("Please Enter the valid email ");
        return false;
    }
    else if(age>100)
    {
        alert("You cannot live more than 100");
        return false;
    }
    else
    {
        return true;
    }
}
   
function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      document.write("not able to connect");
    }
  }
  
  function showPosition(position) {

     
      
    var apikey = '3630e4f615dd4552a8371f682015f8b0';
var latitude = position.coords.latitude;

var longitude =position.coords.longitude;
var address=document.getElementById("address");
var api_url = 'https://api.opencagedata.com/geocode/v1/json'

var request_url = api_url
+ '?'
+ 'key=' + apikey
+ '&q=' + encodeURIComponent(latitude + ',' + longitude)
+ '&pretty=1'
+ '&no_annotations=1';

// see full list of required and optional parameters:
// https://opencagedata.com/api#forward

var request = new XMLHttpRequest();
request.open('GET', request_url, true);

request.onload = function() {
// see full list of possible response codes:
// https://opencagedata.com/api#codes

if (request.status == 200){ 
// Success!
var data = JSON.parse(request.responseText);

console.log(data.results[0]);
var address=document.getElementById("address");
address.value=data.results[0].formatted;
var pincode = document.getElementById("pincode");
pincode.value=address.value.match("\\d{6}");


} else if (request.status <= 500){ 
// We reached our target server, but it returned an error
                     
console.log("unable to geocode! Response code: " + request.status);
var data = JSON.parse(request.responseText);
console.log(data.status.message);
} else {
console.log("server error");
}
};

request.onerror = function() {
// There was a connection error of some sort
console.log("unable to connect to server");        
};

request.send();  // make the request
                       
      
            }
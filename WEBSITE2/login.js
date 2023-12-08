

var attempt=3;//variable to count number of attempt.
function validate(){
var username=document.getElementById("username").value;
var password=document.getElementById("password").value;
if(username == "debau" && password == "tuban"){
alert("Redirecting Securely to the Website");
window.location="website2.html";
return false;
}
else
{
attempt--;
alert("You have left "+attempt+" attempt;");
if(attempt == 0){
document.getElementById("username").disabled=true;
document.getElementById("password").disabled=true;
document.getElementById("submit").disabled=true;
return false;
}
}
}
<head>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
</head>

<body>
<div class="w3-display-container" style="margin-top:100px">
<div class="w3-display w3-small w3-container w3-padding-16 w3-black" style="text-align:center">  
 <h4 style="color:white">Welcome to NGO Official website</h4>
<a href="Requester/RequesterLogin.php" class="btn btn-danger mr-4">DONATE</a>
  </div></div>
  <div class="w3-display-container mySlides">
  <img src="images/banner.jpg" style="width:100%">
  <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-white"">
  HELPING IS WELBEING</div></div>
  <div class="w3-display-container mySlides">
  <img src="images/banner1.jpg" style="width:100%">
  <div class="w3-display-bottomright w3-large w3-container w3-padding-16 "></div></div>
  
  <div class="w3-display-container mySlides">
  <img src="images/banner2.jpg" style="width:100%">
  <div class="w3-display-bottomright w3-large w3-container w3-padding-16 "></div></div>
  
  <div class="w3-display-container mySlides">
  <img src="images/banner3.jpg" style="width:100%">
  <div class="w3-display-bottomright w3-large w3-container w3-padding-16 "></div></div>
 
 <div class="w3-display-container mySlides">
  <img src="images/banner4.jpg" style="width:100%">
  <div class="w3-display-bottomright w3-large w3-container w3-padding-16 "></div>
  </div>
  <div class="w3-display-container mySlides">
  <img src="images/banner5.jpg" style="width:100%">
  <div class="w3-display-bottomright w3-large w3-container w3-padding-16 "> </div></div>
 
 <div class="w3-display-container mySlides">
  <img src="images/banner6.jpg" style="width:100%">
  <div class="w3-display-bottomright w3-large w3-container w3-padding-16 "></div></div>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>

<!DOCTYPE html>
<html lang="nl" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swiper</title>
    <link rel="stylesheet" href="slider/css/swiper.css">
    <style type="text/css">
        .is-active .inner {
            outline: 2px solid red;
        }
    </style>
    <link rel="stylesheet" href="slider/css/demo.css">
</head>
<body>



<div class="items test2" data-swipe-natural>
    <div class="item"><div class=""><img src="images/my1.jpg" style="width:280px;height:240px"></div></div>
    <div class="item"><div class=""><img src="images/my2.jpg" style="width:280px;height:240px"></div></div>
    <div class="item"><div class=""><img src="images/my3.jpg" style="width:280px;height:240px"></div></div>
    <div class="item"><div class=""><img src="images/my4.jpg" style="width:280px;height:240px"></div></div>
	<div class="item is-active"><div class="" data-swipe-start><img src="images/my5.jpg" style="width:280px;height:240px"></div></div>
    <div class="item"><div class=""><img src="images/my6.jpg" style="width:280px;height:240px"></div></div>
    <div class="item"><div class=""><img src="images/my7.jpg" style="width:280px;height:240px"></div></div>
    <div class="item"><div class=""><img src="images/my8.jpg" style="width:280px;height:240px"></div></div>
    <div class="item"><div class=""><img src="images/my9.jpg" style="width:280px;height:240px"></div></div>
    
</div>




<script src="slider/swiper.js"></script>

<script>
    vanillaSwiper.init();
</script>

</body>
</html>
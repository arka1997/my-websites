<!DOCTYPE html>
<html lang="nl" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swiper</title>
    <link rel="stylesheet" href="css/swiper.css">
    <style type="text/css">
        .is-active .inner {
            outline: 2px solid red;
        }
    </style>
    <link rel="stylesheet" href="css/demo.css">
</head>
<body>



<div class="items test2" data-swipe-natural>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item is-active"><div class="inner" data-swipe-start></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
    <div class="item"><div class="inner"></div></div>
</div>




<script src="swiper.js"></script>

<script>
    vanillaSwiper.init();
</script>

</body>
</html>
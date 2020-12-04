<!doctype html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<title>이경량 웹 포트폴리오</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="css/responsive.css">
	<!--[if IE 9]><link rel="stylesheet" href="css/ie9.css"><![endif]-->
	<!--google Font  library-->
	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet"><!--font-family: 'Anton', sans-serif;-->
	<!--Jquery library-->
	<!--[if IE 9]> <script src="js/html5shiv.js"></script> <![endif]-->
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
</head>
<body>
	<div class="skip_nav">
		<a href="#container">Go to Contents</a>
	</div>
	<header id="header">
	<?php include "header.php" ?>
	</header>
	<div id="aside">
	<?php include "aside.php" ?>
	</div>
	<div id="floatText">
	<?php include "float.php" ?>
	</div>
	<div id="container">    
	 <?php include "content.php" ?>
	</div>
	<script>
      $(function(){
		 function slidShowBg (){
		  var Num = (Math.floor(Math.random()*6))+1; //1~6
		  var NumNum =  String(Num);
		  //console.log(Num);
		  //console.log(NumNum);
		 $('#container .home > div.bg3').delay(6000).fadeOut(500, function(){
				 $(this).css({'background':'url(img/'+NumNum+'.png)50% 0 no-repeat','background-size':'cover'})}).delay(200).fadeIn(800)};
		setInterval(slidShowBg,8000);
	  });
	</script>
	<script>
	   $(function(){
		var logo = $('#header .headerWrap .headertitle h1 a');
		var topBtn = $('#aside .gnbWrap ul.gnbList').children('li').eq(0).children('a');
		var aboutBtn = $('#aside .gnbWrap ul.gnbList').children('li').eq(1).children('a');
		var pfBtn = $('#aside .gnbWrap ul.gnbList').children('li').eq(2).children('a');
		var conBtn = $('#aside .gnbWrap ul.gnbList').children('li').eq(3).children('a');

            logo.click(function(event){
			var scrollToTop = $('body').offset().top;
			//event.preventDefault();
			$('html,body').stop().animate({scrollTop:scrollToTop},1200);
            return false;
			});

		    aboutBtn.click(function(event){
			var scrollAbout = $('#container #about').offset().top;
			//event.preventDefault();
			$('html,body').stop().animate({scrollTop:scrollAbout},1200);
            return false;
			});

			topBtn.click(function(event){
			var scrollToTop = $('body').offset().top;
			//event.preventDefault();
			$('html,body').stop().animate({scrollTop:scrollToTop},1200);
            return false;
			});

			pfBtn.click(function(event){
			var scrollPf = $('#container #portfolio').offset().top;
			//event.preventDefault();
			$('html,body').stop().animate({scrollTop:scrollPf},1200);
            return false;
			});

			conBtn.click(function(event){
			var scrollCon = $('#container #contact').offset().top;
			//event.preventDefault();
			$('html,body').stop().animate({scrollTop:scrollCon},1200);
            return false;
			});
	   });
	</script>
	<script>
	   $(function(){
	     var posT = $('body').offset().top;
		 var posA = $('#container #about').offset().top; //about
		 var posP = $('#container #portfolio').offset().top; //portfolio
		 var posF = $('#container #contact').offset().top; //contact
		 $(window).stop().scroll(function(){
		  var winOffset = $(window).scrollTop();
		  if (winOffset < posA){
			  $('#aside .gnbWrap ul.gnbList li').eq(0).children('a').addClass('on');
			  $('#aside .gnbWrap ul.gnbList li').eq(0).siblings().children('a').removeClass('on');
			  $('#floatText .floatTxtWrap .floatTxt p.rotateTxt span').text('HOME');
		  } else if (winOffset < posP){
			  $('#aside .gnbWrap ul.gnbList li').eq(1).children('a').addClass('on');
			  $('#aside .gnbWrap ul.gnbList li').eq(1).siblings().children('a').removeClass('on');
			  $('#floatText .floatTxtWrap .floatTxt p.rotateTxt span').text('ABOUT');
		  } else if (winOffset < posF){
			  $('#aside .gnbWrap ul.gnbList li').eq(2).children('a').addClass('on');
			  $('#aside .gnbWrap ul.gnbList li').eq(2).siblings().children('a').removeClass('on');
			  $('#floatText .floatTxtWrap .floatTxt p.rotateTxt span').text('PORTFOLIO');
		  } else {
			  $('#aside .gnbWrap ul.gnbList li').eq(3).children('a').addClass('on');
			  $('#aside .gnbWrap ul.gnbList li').eq(3).siblings().children('a').removeClass('on');
			  $('#floatText .floatTxtWrap .floatTxt p.rotateTxt span').text('CONTACT');
		 }
		 });
	   });
	</script>
	<script>
		drawGraph(document.getElementById("skillgraph"));
		function drawGraph(obj) {
			this.gages = obj.getElementsByTagName("span");
			this.values = obj.getElementsByTagName("em");

			for(var i = 0; i < this.gages.length; i ++) {
				(function(idx) {
					var current_value = 0;
					var gage_object = this.gages[idx];
					var gage_value = this.values[idx];
					var gage_width = parseInt(gage_object.style.width);
					var timer = null;

					timer = setInterval(function() {
						if(current_value < gage_width) {
							current_value += Math.ceil((gage_width - current_value) / 15);
							gage_object.style.width = current_value + "%";
							gage_value.innerHTML = current_value + "%";
						} else {
							clearInterval(timer);
						}
					}, 45);
				})(i);
			}
		}
	</script>
	<footer id="footer">
	 <?php include "footer.php" ?>
	</footer>
</body>
</html>
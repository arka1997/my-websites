
jQuery(function($){
		jQuery('body[data-style=fullscreen] #wrapper').touchwipe({
	    	wipeLeft: function(){ 
	        	api.nextSlide();
	      	},
	       	wipeRight: function(){ 
	           	api.prevSlide();
	       	}
	    });

    	$.supersized({
    	
    		    		//Functionality
    		slideshow               :   1,		//Slideshow on/off
    		autoplay				:	0,		//Slideshow starts playing automatically
    		start_slide             :   1,		//Start slide (0 is random)
    		random					: 	0,		//Randomize slide order (Ignores start slide)
    		slide_interval          :   5000,	//Length between transitions
    		    		transition              :   1, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
    		transition_speed		:	400,	//Speed of transition
    		new_window				:	1,		//Image links open in new window/tab
    		pause_hover             :   1,		//Pause slideshow on hover
    		keyboard_nav            :   1,		//Keyboard navigation on/off
    		performance				:	1,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
    		image_protect			:	0,		//Disables image dragging and right click with Javascript

    		//Size & Position
    		min_width		        :   0,		//Min width allowed (in pixels)
    		min_height		        :   0,		//Min height allowed (in pixels)
    		vertical_center         :   1,		//Vertically center background
    		horizontal_center       :   1,		//Horizontally center background
    		    		fit_portrait         	:   0,		//Portrait images will not exceed browser height
    		fit_landscape			:   0,		//Landscape images will not exceed browser width
    		fit_always				: 	0,
    		
    		//Components
    		navigation              :   0,		//Slideshow controls on/off
    		thumbnail_navigation    :  	0,		//Thumbnail navigation
    		slide_counter           :   0,		//Display slide numbers
    		slide_captions          :   0,		//Slide caption (Pull from "title" in slides array)
    		progress_bar			:	0,
    		slides 					:  	[		//Slideshow Images

    	{image : 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/1600x1200-4.jpg', thumb: 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/1600x1200-4-150x150.jpg', title: '<div id="gallery_caption"><h2>Eiffel Tower Paris, France</h2><div class="gallery_desc">Nulla vitae elit libero, a pharetra augue. Donec ullamcorper nulla non metus auctor fringilla. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa</div></div>'},{image : 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/1600x1200-6.jpg', thumb: 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/1600x1200-6-150x150.jpg', title: '<div id="gallery_caption"><h2>Grand Turkey, Istanbul</h2><div class="gallery_desc">Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus at leo dignissim congue. Mauris elementum accumsan leo vel tempor. Sit amet cursus nisl aliquam. Aliquam et elit eu nunc rhoncus viverra quis at felis.</div></div>'},{image : 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/s01.jpg', thumb: 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/s01-150x150.jpg', title: '<div id="gallery_caption"><h2>Pathong Phuket, Thailand</h2><div class="gallery_desc">Donec sed odio dui. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Sed posuere consectetur est at lobortis. Nulla vitae elit libero, a pharetra augue. Donec ullamcorper nulla non metus auctor fringilla.</div></div>'},{image : 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/1600x1200-1.jpg', thumb: 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/1600x1200-1-150x150.jpg', title: '<div id="gallery_caption"><h2>Venezia Italy</h2><div class="gallery_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin cursus, elit vitae fermentum hendrerit, neque erat fringilla nibh, vel sodales sem diam nec nunc. Donec mattis blandit metus ut volutpat.</div></div>'},{image : 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/1600x1200-12.jpg', thumb: 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/1600x1200-12-150x150.jpg', title: '<div id="gallery_caption"><h2>East Europe Lake</h2><div class="gallery_desc">Pellentesque ornare sem lacinia quam venenatis vestibulum. Aenean lacinia bibendum nulla sed consectetur.Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis. Nulla vitae elit libero, a pharetra augue.</div></div>'},{image : 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/Ermin-Celikovic.jpg', thumb: 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/Ermin-Celikovic-150x150.jpg', title: '<div id="gallery_caption"><h2>Amsterdam Netherlands</h2><div class="gallery_desc">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</div></div>'},{image : 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/1600x1200-9.jpg', thumb: 'https://themes.themegoods.com/altair/demo/wp-content/uploads/2014/10/1600x1200-9-150x150.jpg', title: '<div id="gallery_caption"><h2>Alph Switzerland</h2><div class="gallery_desc">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.Lorem ipsum dolor sit amet, consectetur adipiscing elit</div></div>'}						]
    									
    	}); 
    });

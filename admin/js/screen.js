jQuery.noConflict();

jQuery(document).ready(function() {		
				      
	/* Hover image opacity */
	jQuery("a[data-rel^='fadeimg'] img").hover(function() {
		jQuery(this).stop().fadeTo("fast", 0.5); 
	},function(){
		jQuery(this).stop().fadeTo("fast", 1.0); 
	});
				
	/* Pricing Table Alternate Row Color */
	jQuery('.pricingtable td:odd').css({background: '#e5e5e5'});
	
	
	/* PrettyPhoto */
	/*addPrettyPhoto();*/ 
	
	/* Portfolio Quicksand */
	addPortfolio('1');
	addPortfolio('3');
});


/* Linkify and Relative Time functions by Ralph Whitbeck http://ralphwhitbeck.com/2007/11/20/PullingTwitterUpdatesWithJSONAndJQuery.aspx */
String.prototype.linkify = function() {
        return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+/, function(m) {
                return m.link(m);
        });
};

function relative_time(time_value) {
  var values = time_value.split(" ");
  time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
  var parsed_date = Date.parse(time_value);
  var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
  var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
  delta = delta + (relative_to.getTimezoneOffset() * 60);

  var r = '';
  if (delta < 60) {
        r = 'a minute ago';
  } else if(delta < 120) {
        r = 'couple of minutes ago';
  } else if(delta < (45*60)) {
        r = (parseInt(delta / 60)).toString() + ' minutes ago';
  } else if(delta < (90*60)) {
        r = 'an hour ago';
  } else if(delta < (24*60*60)) {
        r = '' + (parseInt(delta / 3600)).toString() + ' hours ago';
  } else if(delta < (48*60*60)) {
        r = '1 day ago';
  } else {
        r = (parseInt(delta / 86400)).toString() + ' days ago';
  }
  
  return r;
}

function addPrettyPhoto() {
	/* PrettyPhoto init */
	jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
		overlay_gallery: true,
		show_title: false,
		hideflash: true
	});
	
	/* PrettyPhoto hover image opacity */
	jQuery("a[data-rel^='prettyPhoto'] img").hover(function() {
		jQuery(this).stop().fadeTo("fast", 0.5); 
	},function(){
		jQuery(this).stop().fadeTo("fast", 1.0); 
	});	
}


function addSidebarSlider(){
	/* Blog Sidebar Slider */
	if(jQuery('#sidebarslider').length != 0){
		jQuery('#sidebarslider').tinycarousel({ 
			controls: false, 
			pager: true, 
			interval: true, 
			intervaltime: 3000
		});	
	}
}


function addPortfolio(portfolioid) {
	/* Portfolio Quicksand */
	var $list = jQuery('#portfoliolist'+portfolioid+'column');
	
	if(jQuery($list).length != 0){
		
		var $data = $list.clone();
		
		if(portfolioid==1){
			
			jQuery('.portfoliofilter_sidebar li').click(function(e) {
		
				jQuery(".portfoliofilter_sidebar li a").addClass("sidebarmenuselect_noselect");
				jQuery(".portfoliofilter_sidebar li a").removeClass("sidebarmenuselect");	
				jQuery(this).children('a').removeClass("sidebarmenuselect_noselect");
				jQuery(this).children('a').addClass("sidebarmenuselect");
		
				var filterClass = jQuery(this).attr('class');
		
				if (filterClass == 'all') {
					var $filteredData = $data.find('.blogpost');
				} else {
					var $filteredData = $data.find('.blogpost[data-type=' + filterClass + ']');
				}
				
				jQuery($list).quicksand($filteredData, {
					duration: 500,
					easing: 'swing',
					adjustHeight: 'dynamic',
					enhancement: function() {
						
					}
				}, function(){
					addPrettyPhoto();
				});
				
				return false;
			});
			
		}else{
	
			jQuery('.portfoliofilter li').click(function(e) {
		
				jQuery(".portfoliofilter li a").addClass("portfoliobutton_noselect");
				jQuery(".portfoliofilter li a").removeClass("portfoliobutton");	
				jQuery(this).children('a').removeClass("portfoliobutton_noselect");
				jQuery(this).children('a').addClass("portfoliobutton");
		
				var filterClass = jQuery(this).attr('class');
		
				if (filterClass == 'all') {
					var $filteredData = $data.find('.portfolio');
				} else {
					var $filteredData = $data.find('.portfolio[data-type=' + filterClass + ']');
				}
				
				jQuery($list).quicksand($filteredData, {
					duration: 500,
					easing: 'swing',
					adjustHeight: 'dynamic',
					enhancement: function() {
						
					}
				}, function(){
					addPrettyPhoto();
				});
				
				return false;
			});
		
		}
	}
}

/* jQuery Smooth Tabs version 1.1.0 */
(function($) {  
	$.fn.smoothTabs = function(fadeSpeed) {
		// Visible index
		var currentIndex = 0;
		// Clicked tab class
		var smoothTabsLiCurrent = 'smoothTabsLiCurrent';
		// Hidden div class
		var smoothTabsDivHidden = 'smoothTabsDivHidden';
		// Visible div class
		var smoothTabsDivVisible = 'smoothTabsDivVisible';
		// Current hash if any.
		var hash = document.location.hash.substr(1, document.location.hash.length);

		if (hash && $('#'+hash, this).size()) {
			currentIndex = $('#'+hash, this).index();
		}

		// Makes first tab current, hides all divs and fades in the first one
		this.each(function() {
			$('ul li:eq('+currentIndex+')', this).addClass(smoothTabsLiCurrent);
			$(this).children("div").addClass(smoothTabsDivHidden);
			$('div:eq('+currentIndex+')', this).fadeIn(fadeSpeed)
								.addClass(smoothTabsDivVisible)
								.removeClass(smoothTabsDivHidden);
		});

		// Tab click function
		$('ul li', this).click(function(){
			var $parentUl = $(this).parent();
			var $parentDiv = $($parentUl).parent();
			$('li', $parentUl).removeClass(smoothTabsLiCurrent);
			$(this).addClass(smoothTabsLiCurrent);
			var $clickedIndex = $('li', $parentUl).index(this);
			var $currentDiv = $('div', $parentDiv).get($clickedIndex);
			
			// If current tab is clicked - we're done
			if ($($currentDiv).attr('class') == smoothTabsDivVisible) {
				return false;
			}
			
			// Current div is replaced by the selected one
			$('.'+smoothTabsDivVisible, $parentDiv).fadeOut(fadeSpeed, function(){
				$($currentDiv).fadeIn(fadeSpeed).addClass(smoothTabsDivVisible).removeClass(smoothTabsDivHidden);
			});
			$('.'+smoothTabsDivVisible, $parentDiv).removeClass(smoothTabsDivVisible).addClass(smoothTabsDivHidden);
		});
	};
})(jQuery);
  
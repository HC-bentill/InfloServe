<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bootstrap/js/jquery-slim.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="js/counter-up/jquery.counterup.js"></script>
<script src="js/counter-up/jquery.waypoints.min.js"></script>
 
    <script src="owlcarousel/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js" type="text/javascript"></script>
    <script src="owlcarousel/OwlCarousel2-2.3.4/dist/owl.carousel.js" type="text/javascript"></script>
        <script>
       var owl = $('.owl-carousel');
owl.owlCarousel({
		   responsive:({
        0:{
            items:1,
            nav:true,
			loop:true
        },
        600:{
            items:2,
            nav:true,
			loop:true
        },
        1000:{
            items:3,
            nav:true,
            loop:true
        }}),
    
    loop:true,
	animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    stagePadding:30,
    smartSpeed:450,
    margin:10,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
    </script>
    

    <!-- Java Scripts for Gallery-->
			<script type="text/javascript" src="../web_files/js/jquery.min.js"></script>    
		<script type="text/javascript">
          jQuery.noConflict();
          jQuery(document).ready(function() {		
          /* PrettyPhoto */
           addPrettyPhoto();
        });
        </script>
        <script src="../js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
            <script src="../js/jquery.quicksand.js"></script>
            <script src="../js/screen.js"></script>   
	<!-- End of Java Scripts for Gallery-->
    
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
    
    
    <script>
function get_child_options(){
	var parentID = jQuery('#parent').val();
	jQuery.ajax({
		url: '/blog/admin/parsers/child_categories.php',
		type: 'POST',
		data: {parentID : parentID},
		success: function(data){
			jQuery('#child').html(data);	
		},
		error: function(){alert("something went wrong")},
	});
}
	jQuery('select[name = "parent"]').change(get_child_options);
	</script>
    
    <!-- Java Scripts for Gallery-->
			<script type="text/javascript" src="js/jquery.min.js"></script>    
		<script type="text/javascript">
          jQuery.noConflict();
          jQuery(document).ready(function() {		
          /* PrettyPhoto */
           addPrettyPhoto();
        });
        </script>
        <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
            <script src="js/jquery.quicksand.js"></script>
            <script src="js/screen.js"></script>    
	<!-- End of Java Scripts for Gallery-->
</body>
</html>
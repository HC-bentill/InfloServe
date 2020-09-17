<!-- start of Footer -->
<footer class="footer">
  <div class="container">
    <div class="row p-3">
      <a href="https://api.whatsapp.com/send?phone=233243545644" target="_blank" title="send us a whatsapp message"><i class="fa fa-whatsapp" id="whatsapp"></i></a>
      <div class="col-md-3 col-xs-3">
        <h2>Quick Links</h2>
        <div id="footer-line"></div>
        <a href="index.php" style="color:inherit"><p >Home</p></a>
        <a href="about-us.php" style="color:inherit"><p >About us</p></a>
        <a href="gallery.php" style="color:inherit"><p >Gallery</p></a>
        <a href="contact.php" style="color:inherit"><p >Contact Us</p></a> 
    
      </div>
      <div class="col-md-3 col-xs-3">
      <h2>Contact Us</h2>
      <div id="footer-line"></div>
      <p>Papao Haatso Rd, Accra</p>
      <a href="tel:+233244179985" style="color:inherit">+233244179985</a>
      </div>
      <div class="col-md-3 col-xs-3">
      <h2>Services</h2>
      <div id="footer-line"></div>
        <p>Rentals</p>
        <p>Consultancy</p>
        <p>Event Planning</p>
        <p>Chairs</p>
      </div>
      <daiv class="col-md-3 col-xs-3">
      <h2>We are Social</h2>
      <div id="footer-line"></div>
      <div class="mt-3">
          <a href="#" class="fa fa-facebook"></a><a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-instagram"></a><a href="#" class="fa fa-whatsapp"></a>
       </div> 
      </div>
    </div>
  </div>
</footer>

<section class="social-copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-6"><p> © 2020 Copyright. All Rights Reserved.||Developed By IT Masters</p></div>
       </div>

    </div>
  </div>
</section>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bootstrap/js/jquery-slim.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="owlcarousel/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js" type="text/javascript"></script>
<!-- start of carousel -->
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
            items:4,
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
<!-- end of carousel -->

<script>
  //Get the button
  var mybutton = document.getElementById("myBtn");

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (
      document.body.scrollTop > 2000 ||
      document.documentElement.scrollTop > 2000
    ) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>

<!-- when user scrolls 200px down dislay solid navbar -->
<script>
  $(document).ready(function () {
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();
      if (scroll > 5) {
        $(".navbar").css("background", "#b5373b");
      }

      else {
        $(".navbar").css("background", "none");
      }
    })
  })
</script>




<!-- Login Modal  -->


<!-- Sign up Modal-->
</body>

</html>
<?php require('includes/page-head.php');

?>

<?php 
include('includes/nav.php');
?>

<!-- start of Hero -->
<section class=" contact-banner img-fluid">
  <div class="container">
    <div class="row contact-banner-text">
      <div class="col-md-12">
        <h1 class="w3-animate-left">Contact Us</h1>
      </div>
    </div>
  </div>
</section>
<!-- end of Hero -->

<section class="contact">
  <div class="container">
    <div class="row contact">
      <div class="col-md-6">
        <form method="post" action="mail.php" >
          <h3 class="font">Leave A Comment</h3>
          <p> We Will call back later and answer your questions.</p>
          <div class="form-group">
            <label for="exampleFormControlInput1">Your Name</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Your name">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Your Email">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Your message</label>
            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" placeholder="Your Message"
              rows="5"></textarea>
          </div>
          <button type="submit" id="comment_btn">Send Message</button>
        </form>
      </div>

      <div class="col-md-6 text-center">
        <h3 class="font">Our location</h3>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.339314703139!2d-0.20376058528608776!3d5.663974795894389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9d96ecde4029%3A0xae5e2d2c4e78fb4b!2sInfloserv%20Events!5e0!3m2!1sen!2sgh!4v1600103593582!5m2!1sen!2sgh"
          allowfullscreen></iframe>
          </div>
      </div>
    </div>
</section>  

<?php 
include('includes/footer.php');
?>
<?php require('includes/page-head.php');

?>

<?php 
include('includes/nav.php');
?>

<!-- start of Hero -->
<section class="event-planning-banner img-fluid">
  <div class="container">
    <div class="row event-planning-banner-text">
      <div class="col-md-12">
        <h1 class="w3-animate-left">Services</h1>
      </div>
    </div>
  </div>
</section>
<!-- end of Hero -->

<!-- start of e-planning -->
<section class="event-planning">
  <div class="container">
    <div class="row event-planning-content text-center">
      <div class="col-md-10 white-opacity">
        <h1>We offer Reliable Services</h1>
          <a
            class="btn accordion-btn"
            data-toggle="collapse"
            href="#multiCollapseExample1"
            role="button"
            aria-expanded="false"
            aria-controls="multiCollapseExample1"
            >Consultancy</a
          >
          <button
            class="btn accordion-btn"
            type="button"
            data-toggle="collapse"
            data-target="#multiCollapseExample2"
            aria-expanded="false"
            aria-controls="multiCollapseExample2"
          >
            Ushering
          </button>
           <button
            class="btn accordion-btn"
            type="button"
            data-toggle="collapse"
            data-target="#multiCollapseExample3"
            aria-expanded="false"
            aria-controls="multiCollapseExample3"
          >
            Event Planning
          </button>

        </p>
        <div class="row">
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
              <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life
                accusamus terry richardson ad squid. Nihil anim keffiyeh
                helvetica, craft beer labore wes anderson cred nesciunt sapiente
                ea proident.
              </div>
            </div>
          </div>
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
              <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life
                accusamus terry richardson ad squid. Nihil anim keffiyeh
                helvetica, craft beer labore wes anderson cred nesciunt sapiente
                ea proident.
              </div>
            </div>
          </div>
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample3">
              <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life
                accusamus terry richardson ad squid. Nihil anim keffiyeh
                helvetica, craft beer labore wes anderson cred nesciunt sapiente
                ea proident.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end of e-planning -->

<?php 
include('includes/footer.php');
?>

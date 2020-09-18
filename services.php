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
      <div class="col-md-12 white-opacity">
        <button
          class="btn accordion-btn"
          type="button"
          data-toggle="collapse"
          data-target="#multiCollapseExample2"
          aria-expanded="false"
          aria-controls="multiCollapseExample2"
        >
          Click to View Our Services
        </button>
        <div class="row">
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
              <div class="card card-body">
                <ul class="w3-ul w3-card-4">
                  <li class="w3-bar">
                    <div class="w3-bar-item">
                      <span class="w3-large">Party rentals</span><br />
                    </div>
                  </li>
                  <li class="w3-bar">
                    <div class="w3-bar-item">
                      <span class="w3-large">Event planning </span><br />
                    </div>
                  </li>

                  <li class="w3-bar">
                    <div class="w3-bar-item">
                      <span class="w3-large">Event setups</span><br />
                    </div>
                  </li>
                  <li class="w3-bar">
                    <div class="w3-bar-item">
                      <span class="w3-large">Garden weddings</span><br />
                    </div>
                  </li>
                  <li class="w3-bar">
                    <div class="w3-bar-item">
                      <span class="w3-large">Church weddings</span><br />
                    </div>
                  </li>
                  <li class="w3-bar">
                    <div class="w3-bar-item">
                      <span class="w3-large">Corporate events etc.</span><br />
                    </div>
                  </li>
                </ul>
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

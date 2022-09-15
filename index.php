<!-- Header Start Here -->
<?php include 'includes/header.php'; ?>
<!-- Header End Here -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container" data-aos="zoom-out" data-aos-delay="100">

    <div class="row">
      <div class="wrapper" style="z-index:-1; position:absolute; width:150%;">
        <div class="sliding-background"></div>
      </div>
      <div class="col-xl-6">
        <h1>Get a boost in your Industry</h1>
        <h2>We are team of talented Engineer, making Industrial tech better</h2>
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients">
    <div class="container" data-aos="zoom-in">

      <div class="clients-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <div class="swiper-slide"><img src="assets/img/clients/bch.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/c%26s.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/ftc.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/hitachi.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/L%26T.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/selec.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/siemens.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/slazer.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/veeco.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/img/clients/schnider.png" class="img-fluid" alt=""></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Clients Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row no-gutters">
        <div class="content col-xl-5 d-flex align-items-stretch">
          <div class="content">
            <h3>What we can offer ?</h3>
            <p>
              Have a look at this...
            </p>
            <a href="#" class="about-btn"><span>About us</span> <i class="bx bx-chevron-right"></i></a>
          </div>
        </div>
        <div class="col-xl-7 d-flex align-items-stretch">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                <span style="content: url('https://api.iconify.design/simple-icons/blueprint.svg?color=%23e03a3c&amp;width=48');"></span>
                <h4>Electric Panel Planning</h4>
                <p></p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                <span style="content: url('https://api.iconify.design/mdi/frequently-asked-questions.svg?color=%23e03a3c&amp;width=48');"></span>
                <h4>Industrial Consultancy</h4>
                <p></p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                <span style="content: url('https://api.iconify.design/ic/twotone-precision-manufacturing.svg?color=%23e03a3c&amp;width=48');"></span>
                <h4>Manufacturing & Managing</h4>
                <p></p>
              </div>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                <span style="content: url('https://api.iconify.design/ic/baseline-miscellaneous-services.svg?color=%23e03a3c&amp;width=48');"></span>
                <h4>Sales & Service</h4>
                <p></p>
              </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Happy Clients</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="bi bi-journal-richtext"></i>
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p>Projects</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-headset"></i>
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hours Of Support</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-people"></i>
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Workers</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- Page Content -->
  <div class="container">

    <div class="section-title">
      <h2>Best Seller Product</h2>
      <p>We Are Best Electrical Store in Town</p>
    </div>

    <div class="row">

      <?php $sql = "SELECT * FROM `products` WHERE `product_status`='1' ORDER BY product_id  DESC LIMIT 6;";
      if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) { ?>

            <div class="col-lg-4 col-sm-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="admin/image/<?php echo $row['product_image']; ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="product.php?id=<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></a>
                  </h4>
                  <p class="card-text"><?php echo $row['product_description']; ?></p>
                </div>
              </div>
            </div>

      <?php }
        }
      } ?>

    </div>
    <!-- /.row -->


  </div>
  <!-- /.container -->


  <!-- ======= Picture Gallery Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Picture Gallery</h2>
        <p>Just a pinch of our work</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">Service</li>
            <li data-filter=".filter-card">Manufacture</li>
            <li data-filter=".filter-web">Products</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/service3.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Panel Maintainence</h4>
              <p></p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/service3.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/relays.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Relays</h4>
              <p></p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-2.html" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/service2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Power Factor Maintainence</h4>
              <p></p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/service2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/manf1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Automation Panel</h4>
              <p></p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/manf1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/contracter.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Contacters</h4>
              <p></p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-5.html" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/service1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Panel Restoration</h4>
              <p></p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/service1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/manf3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>MCC/PCC Panel</h4>
              <p></p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/manf3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/manf4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Power Factor Panel</h4>
              <p></p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/manf4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-9.html" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>MCCB</h4>
              <p></p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/mccbs.png" data-gallery="portfolioGallery" class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Picture Gallery Section -->

  <!-- ======= About Section ======= -->
  <section id="About" class="services section-bg ">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About US</h2>
        <p></p>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <i class="bi bi-briefcase"></i>
            <h4><a href="#">30+ Years Experience in Industrial Field</a></h4>
            <p>Great Ideas take great time to implement, We are providing our services from 1990</p>
          </div>
        </div>
        <div class="col-md-6 mt-4 mt-md-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-card-checklist"></i>
            <h4><a href="#">3+ Years Experience in Automation Technologies</a></h4>
            <p>We provide installations like VFD, PLC, SCADA, HMI, etc and also management.</p>
          </div>
        </div>
        <!--<div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-bar-chart"></i>
              <h4><a href="#">Sed ut perspiciatis</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-binoculars"></i>
              <h4><a href="#">Nemo Enim</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-brightness-high"></i>
              <h4><a href="#">Magni Dolore</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="600">
              <i class="bi bi-calendar4-week"></i>
              <h4><a href="#">Eiusmod Tempor</a></h4>
              <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>-->
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Pricing Section ======= -->
  <!--<section id="pricing" class="pricing section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-up" data-aos-delay="100">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="fade-up" data-aos-delay="200">
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="300">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>-->
  </section><!-- End Pricing Section -->

  <!-- ======= Frequently Asked Questions Section ======= -->
  <section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Frequently Asked Questions</h2>
      </div>

      <ul class="faq-list accordion" data-aos="fade-up">

        <li>
          <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
          <div id="faq1" class="collapse" data-bs-parent=".faq-list">
            <p>
              Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
            </p>
          </div>
        </li>

        <li>
          <a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
          <div id="faq2" class="collapse" data-bs-parent=".faq-list">
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
            </p>
          </div>
        </li>

        <li>
          <a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
          <div id="faq3" class="collapse" data-bs-parent=".faq-list">
            <p>
              Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
            </p>
          </div>
        </li>

        <li>
          <a data-bs-toggle="collapse" data-bs-target="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
          <div id="faq4" class="collapse" data-bs-parent=".faq-list">
            <p>
              Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
            </p>
          </div>
        </li>

        <li>
          <a data-bs-toggle="collapse" data-bs-target="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
          <div id="faq5" class="collapse" data-bs-parent=".faq-list">
            <p>
              Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
            </p>
          </div>
        </li>

        <li>
          <a data-bs-toggle="collapse" data-bs-target="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
          <div id="faq6" class="collapse" data-bs-parent=".faq-list">
            <p>
              Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
            </p>
          </div>
        </li>

      </ul>

    </div>
  </section><!-- End Frequently Asked Questions Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Team</h2>
        <p></p>
      </div>

      <div class="row">

        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="assets/img/team/team-1.png" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>Om Prakash Gautam</h4>
              <span>Owner</span>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="member" data-aos="fade-up" data-aos-delay="200">
            <div class="member-img">
              <img src="assets/img/team/team-.jpg" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>Himanshu Gauatm</h4>
              <span>Electrical Engineer</span>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Team Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
        <p></p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>S3-77, IPIA, Road No.7, Kota, Rajasthan 324005
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>info@gautamelectricals.com<br>contact@gautamelectricals.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>+91 8619897216<br>+91 9829009977</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <form action="http://gautamelectricals.com/forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="tel" class="form-control" name="Phone" id="Phone" placeholder="Phone +91" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>Address<span>.</span></h3>
          <p>
            S3-77 <br>
            IPIA, Road No.7, Kota, Rajasthan<br>
            India<br><br>
            <strong>Phone:</strong> +91 8619897216<br>
            <strong>Alt Phone:</strong> +91 9829009977<br>
            <strong>Email:</strong> info@gautamelectricals.com<br>
          </p>
        </div>

        <!--<div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>-->

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Panel Maintanece</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Power Factor</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Automation</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Site Suspection</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Panel Restoration</a></li>
          </ul>
        </div>

        <!--<div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>-->

      </div>
    </div>
  </div>

  <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; Copyright <strong><span>Gautam Electricals</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/presento-bootstrap-corporate-template/ -->
      </div>
    </div>
    <div class="social-links text-center text-md-end pt-3 pt-md-0">
      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
      <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from gautamelectricals.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 May 2022 10:39:14 GMT -->

</html>
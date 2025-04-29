<section id="hero" class="hero section ">
  <div class="container">
    <!-- Carousel -->
    <div id="demo" class="carousel slide mb-2" data-bs-ride="carousel">
      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="6"></button>

      </div>
      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <a href="form.php"><img src="assets/img/slider/exhibition-banner-size.jpg" alt="impart image" class="d-block w-100"></a>
        </div>
        <div class="carousel-item">
          <img src="assets/img/slider/Slider-3.jpg" alt="Chicago" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="assets/img/slider/Slider-3.jpg" alt="Chicago" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="assets/img/slider/slider-5.jpg" alt="New York" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="assets/img/slider/slider-12.jpg" alt="New York" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="assets/img/slider/Slider-7.JPG" alt="New York" class="d-block w-100">
        </div>
      </div>
      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
    <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
      <div class="container position-relative bg-white">
        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center ">
            <div class="swiper-slide bg-white p-2"><img src="assets/img/logo/ATU.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide bg-white p-2"><img src="assets/img/logo/huawei.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide bg-white p-2"><img src="assets/img/logo/Wema-Bank.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide bg-white p-2"><img src="assets/img/logo/innov8.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide bg-white p-2"><img src="assets/img/logo/Intel_logo.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide bg-white p-2"><img src="assets/img/logo/knowtheblocks.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide bg-white p-2"><img src="assets/img/logo/veritas_alu.png" class="img-fluid" alt=""></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
session_start(); // Start session to show alert messages
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Contact Us</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <?php include_once 'includes/links.php' ?>
</head>

<body class="blog-details-page">
  <?php include_once 'includes/header.php' ?>
  <main class="main">
    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Contact Us</h1>
              <p class="mb-0">Need assistance, have questions, or want to collaborate? Contact us for inquiries, support, or partnership opportunities. We're ready to help—reach out via email, phone, or our contact form today!</p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Get in touch with us for inquiries, support, or collaborations.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gx-lg-0 gy-4">
          <div class="col-lg-4">
            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>A20 Block A Software Enginerring Lab, Veritas University, Abuja</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+234 810 961 3828</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>support@vuselab.com.ng</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h3>Open Hours:</h3>
                  <p>Mon-Fri: 9AM - 5PM</p>
                </div>
              </div><!-- End Info Item -->
            </div>
          </div>
          <div class="col-lg-8 gx-5">
            <!-- Display Alert Message -->
            <?php if (isset($_SESSION['message'])): ?>
              <div class="alert <?= $_SESSION['alert_type']; ?> text-center">
                <?= $_SESSION['message']; ?>
              </div>
              <?php unset($_SESSION['message'], $_SESSION['alert_type']); ?> <!-- Clear message after displaying -->
            <?php endif; ?>
            <form action="cms/contact_processing.php" method="post" class="" data-aos="fade" data-aos-delay="100">
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="col-md-6">
                  <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="col-md-12">
                  <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                </div>
                <div class="col-md-12">
                  <textarea name="message" class="form-control" rows="8" placeholder="Message" required></textarea>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-dark btn-lg rounded-pill">Send Message</button>
                </div>
              </div>
            </form>
          </div><!-- End Contact Form -->
        </div>
      </div>
    </section><!-- /Contact Section -->
  </main>
  <?php include_once 'includes/footer.php' ?>
</body>
</html>
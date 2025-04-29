<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Project - Dev Projects</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <?php include_once 'includes/links.php' ?>
</head>

<body class="starter-page-page">
  <?php include_once 'includes/header.php' ?>
  <main class="main">
    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="text-green">Portfolio Details</h1>
              <p class="mb-0 text-white">Explore our creative and impactful projects, blending design, technology, and strategy. Each project reflects our passion for innovation and excellence, delivering real solutions that engage, inspire, and drive results..</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Project Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Project Details Section -->
    <section id="project-details" class="project-details section">
      <?php
      include_once 'cms/admin/include/db_conn.php';

      if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $conn->prepare("SELECT title, about, created_at, image FROM project_tb WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
          $stmt->bind_result($title, $about, $created_at, $image);
          $stmt->fetch();
        } else {
          echo "<p class='text-danger'>Project post not found.</p>";
          exit;
        }

        $stmt->close();
      } else {
        echo "<p class='text-danger'>No Project ID specified.</p>";
        exit;
      }

      $conn->close();
      ?>

      <div class="container">
        <div class="row">
          <div class="col-lg-8">

            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
              <div class="container">
                <article class="article">
                  <div class="post-img">
                    <img src="cms/admin/img/uploads/<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($title) ?>" class="img-fluid">
                  </div>
                  <h2 class="title"><?= htmlspecialchars($title) ?></h2>
                  <div class="meta-top">
                    <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">Nwanagba Christian</a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="<?= $created_at ?>"><?= date("F j, Y", strtotime($created_at)) ?></time></a></li>
                    </ul>
                  </div><!-- End meta top -->

                  <div class="content">
                    <p class="text-dark"><?= nl2br(htmlspecialchars($about)) ?></p>
                  </div><!-- End post content -->

                  <div class="meta-bottom">
                    <i class="bi bi-folder"></i>
                    <ul class="cats">
                      <li><a href="#">Practicals</a></li>
                    </ul>

                    <i class="bi bi-tags"></i>
                    <ul class="tags">
                      <li><a href="#">Insight</a></li>
                      <li><a href="#">Exhibition</a></li>
                    </ul>
                  </div><!-- End meta bottom -->

                </article>
              </div>
            </section>

            <!-- Author Section (You can also pull author data dynamically) -->
            <section id="blog-author" class="blog-author section">
              <div class="container">
                <div class="author-container d-flex align-items-center">
                  <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
                  <div>
                    <h4>Editor SenLab</h4>
                    <div class="social-links">
                      <a href="#"><i class="bi bi-twitter-x"></i></a>
                      <a href="#"><i class="bi bi-facebook"></i></a>
                      <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <!-- Comments and Comment Form Sections (Optional for now or can be connected to a comments table) -->

          </div>

          <!-- Sidebar Section (optional, can add search, recent posts, etc.) -->
          <div class="col-lg-4 sidebar">
            <div class="widgets-container">
              <!-- Add your sidebar widgets here -->
              <h5>Recent Information</h5>
              <div class="card">

              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Portfolio Details Section -->
  </main>
  <!-- footer section area -->
  <?php include_once 'includes/footer.php' ?>

</body>

</html>
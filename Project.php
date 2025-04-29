<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Project - DeveOp Projects</title>
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
              <h1 class="text-green">Projects</h1>
              <p class="mb-0 text-white">Explore our creative and impactful projects, blending design, technology, and strategy. Each project reflects our passion for innovation and excellence, delivering real solutions that engage, inspire, and drive results..</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Projects</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
    <!-- projects Section -->
    <section id="portfolio" class="portfolio section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="text-green">Our Projects</h2>
      </div><!-- End Section Title -->
      <div class="container">
        <div class="row g-4">
          <?php
          include_once 'cms/admin/include/db_conn.php';

          // Set number of posts per page
          $limit = 8;

          // Get current page from URL, default is 1
          $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

          // Calculate the offset
          $offset = ($page - 1) * $limit;

          // Count total posts
          $totalResult = $conn->query("SELECT COUNT(*) AS total FROM project_tb");
          $totalRow = $totalResult->fetch_assoc();
          $totalPosts = $totalRow['total'];
          $totalPages = ceil($totalPosts / $limit);

          // Get posts for current page
          $sql = "SELECT id, title, about, created_at, image FROM project_tb ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
          $result3 = $conn->query($sql);
          ?>
          <?php if ($result3 && $result3->num_rows > 0): ?>
            <?php while ($row = $result3->fetch_assoc()): ?>
              <!-- Card 1 -->
              <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-branding">
                <div class="card h-100">
                  <a href="assets/img/portfolio/branding-3.jpg" data-gallery="portfolio-gallery-app" class="glightbox">
                    <img src="cms/admin/img/uploads/<?= !empty($row['image']) ? htmlspecialchars($row['image']) : 'default.jpg' ?>"
                      alt="<?= htmlspecialchars($row['title']) ?>"
                      class="img-fluid rounded pro-img" /> </a>
                  <div class="card-body">
                    <h5 class="card-title">
                      <a href="projects-detail.php?id=<?= $row['id'] ?>" title="More Details"><?= htmlspecialchars($row['title']) ?></a>
                    </h5>
                  </div>
                </div>
              </div><!-- End Card 1 -->
            <?php endwhile; ?>
          <?php else: ?>
            <p class="text-danger">No Project posts found.</p>
          <?php endif; ?>
        </div>
      </div>
      <!-- Blog Pagination Section -->
      <div class="d-flex justify-content-center mt-4">
        <nav>
          <ul class="pagination">
            <?php if ($page > 1): ?>
              <li class="page-item mx-1">
                <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
              </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
              <li class="page-item mx-1 <?= ($i == $page) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
              </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
              <li class="page-item mx-1">
                <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
      <!-- /Blog Pagination Section -->
    </section><!-- /Projects ends Section -->

  </main>
  <!-- footer section area -->
  <?php include_once 'includes/footer.php' ?>
</body>

</html>
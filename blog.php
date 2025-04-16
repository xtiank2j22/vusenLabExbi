<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Blog</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- the links for the css and other links -->
  <?php include_once 'includes/links.php' ?>

<body class="blog-page">
  <?php include_once 'includes/header.php' ?>
  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Blog</h1>
              <p class="mb-0">Explore our latest blog posts packed with fresh insights and inspiring stories. Stay informed and discover the topics that matter most!</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Blog</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">
      <div class="container">
        <div class="row gy-4">
          <?php
          include_once 'cms/admin/include/db_conn.php';

          // Set number of posts per page
          $limit = 6;

          // Get current page from URL, default is 1
          $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

          // Calculate the offset
          $offset = ($page - 1) * $limit;

          // Count total posts
          $totalResult = $conn->query("SELECT COUNT(*) AS total FROM blog_tb");
          $totalRow = $totalResult->fetch_assoc();
          $totalPosts = $totalRow['total'];
          $totalPages = ceil($totalPosts / $limit);

          // Get posts for current page
          $sql = "SELECT id, title, blog_message, created_at, image FROM blog_tb ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
          $result = $conn->query($sql);
          ?>


          <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <div class="col-md-4">
                <article class="card h-100 p-3 border-0 shadow-sm">
                  <div class="post-img mb-3">
                    <img src="cms/admin/img/uploads/<?= !empty($row['image']) ? htmlspecialchars($row['image']) : 'default.jpg' ?>"
                      alt="<?= htmlspecialchars($row['title']) ?>"
                      class="img-fluid rounded" />
                  </div>

                  <p class="post-category text-muted small">Politics</p>

                  <h2 class="title h5">
                    <a href="blog-details.php?id=<?= $row['id'] ?>" class="text-dark">
                      <?= htmlspecialchars($row['title']) ?>
                    </a>
                  </h2>

                  <div class="d-flex align-items-center mt-3">
                    <img src="assets/img/blog/blog-author-2.jpg" alt="" class="img-fluid post-author-img flex-shrink-0 rounded-circle me-2" style="width: 40px; height: 40px;">
                    <div class="post-meta">
                      <p class="post-author mb-0 fw-bold">Maria Doe</p>
                      <p class="post-date mb-0 text-muted small">
                        <time datetime="<?= $row['created_at'] ?>"><?= date("d/m/Y", strtotime($row['created_at'])) ?></time>
                      </p>
                    </div>
                  </div>
                </article>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <p class="text-danger">No blog posts found.</p>
          <?php endif; ?>
          <?php $conn->close(); ?>
        </div>

      </div>
      <!-- pegination -->
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
    </section><!-- /Blog Posts Section -->
  </main>
  <?php include_once 'includes/footer.php' ?>
</body>

</html>
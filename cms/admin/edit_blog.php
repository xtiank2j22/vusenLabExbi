<?php
include_once 'include/db_conn.php';

// Check if ID is passed
if (!isset($_GET['id'])) {
    $_SESSION['blog'] = 'No blog selected to edit.';
    header("Location: blog.php");
    exit;
}

$id = $_GET['id'];

// Fetch the blog post from the database
$result = mysqli_query($conn, "SELECT * FROM blog_tb WHERE id = '$id'");
$row = mysqli_fetch_assoc($result);

// If no blog found
if (!$row) {
    $_SESSION['blog'] = 'Blog not found.';
    header("Location: blog.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Edit Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE v4 | Edit Blog">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="">
    <meta name="keywords" content="bootstrap 5">
    <?php include_once 'include/links.php' ?>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <?php include_once 'include/header.php' ?>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <?php include_once 'include/left-sidebar.php' ?>
        <!--end::Sidebar-->
        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edit Blog Post</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Debugging: Check if the ID is being correctly passed -->
                                    <?php
                                    echo "Debugging - ID: " . htmlspecialchars($row['id']);
                                    ?>

                                    <form action="update_blog.php" method="POST" enctype="multipart/form-data">
                                        <div class="row py-3">
                                            <div class="col-md-6 mt-2">
                                                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id'] ?? '') ?>">
                                                <label for="title">Enter Blog Title</label>
                                                <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" class="form-control" placeholder="Title" required>
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <label for="blog_message">Enter Blog Message</label>
                                                <textarea name="blog_message" class="form-control" rows="8" placeholder="Message" required><?= htmlspecialchars($row['blog_message']) ?></textarea>
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <label for="image" class="form-label">Upload Blog Image</label>
                                                <input type="file" name="image" class="form-control">

                                                <?php if (!empty($row['image'])) { ?>
                                                    <small class="text-muted">Current Image: <?= htmlspecialchars($row['image']) ?></small><br>
                                                    <img src="img/uploads/<?= htmlspecialchars($row['image']) ?>" alt="Current Image" class="img-thumbnail mt-1" width="150">
                                                <?php } ?>
                                            </div>


                                            <div class="col-md-6 mt-4">
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <button class="btn btn-primary btn-lg me-md-2" type="submit">Update Blog</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include_once 'include/footer.php' ?>
    </div> <!-- /.app-wrapper -->
</body>

</html>
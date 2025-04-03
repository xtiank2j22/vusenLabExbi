<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE v4 | Dashboard">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="">
    <meta name="keywords" content="bootstrap 5">
    <?php include_once 'include/links.php' ?>
    <!--end::Head-->

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
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard View</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-body">
                                    <?php if (isset($_SESSION['faq_message'])): ?>
                                        <div class="alert <?= $_SESSION['alert_type']; ?> text-center">
                                            <?= $_SESSION['faq_message']; ?>
                                        </div>
                                        <?php unset($_SESSION['faq_message'], $_SESSION['alert_type']); ?> <!-- Clear message after displaying -->
                                    <?php endif; ?>

                                    <form action="faq-logic.php" method="post" data-aos="fade" data-aos-delay="100">
                                        <div class="row gy-4">
                                            <div class="col-md-6">
                                                <label for="name">enter Faq Title</label>
                                                <input type="text" name="faq_title" class="form-control" placeholder="Your Name" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="name">enter Faq Answer to Question</label>
                                                <textarea name="faq_message" class="form-control" rows="8" placeholder="Message" required></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                                    <button class="btn btn-primary btn-lg me-md-2" type="submit">Post Faq</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->
        <!--begin::Footer-->
        <?php include_once 'include/footer.php' ?>
</body>
<!--end::Body-->
<!--end::Body-->

</html>
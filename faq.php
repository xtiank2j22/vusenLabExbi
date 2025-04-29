<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Faq</title>
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
                            <h1 class="text-green">FAQ</h1>
                            <p class="mb-0">Need help? We've got answers to the most common questions below. If you still have questions, feel free to contact our support team anytime.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->
        <!-- Faq Section -->
        <section id="faq" class="faq section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="content px-xl-5">
                            <h3 class="text-green"><span>Frequently Asked </span><strong>Questions</strong></h3>
                            <p class="text-white">
                            Questions on your mind? We’ve got clear, helpful answers waiting for you.
                            And if you don’t find what you’re looking for, our friendly support team is just a message away!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-container">
                            <?php
                            include_once 'cms/admin/include/db_conn.php'; // adjust path if needed

                            $sql = "SELECT id, faq_title, faq_message FROM faq ORDER BY id ASC";
                            $result = $conn->query($sql);
                            $i = 1;

                            if ($result && $result->num_rows > 0):
                                while ($row = $result->fetch_assoc()):
                            ?>
                                    <div class="faq-item">
                                        <h3>
                                            <span class="num"><?= $i++ ?>.</span>
                                            <span><?= htmlspecialchars($row['faq_title']) ?></span>
                                        </h3>
                                        <div class="faq-content">
                                            <p><?= nl2br(htmlspecialchars($row['faq_message'])) ?></p>
                                        </div>
                                        <i class="faq-toggle bi bi-chevron-right"></i>
                                    </div>
                            <?php
                                endwhile;
                            else:
                                echo '<p class="text-danger">No FAQs found.</p>';
                            endif;

                            $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Faq Section -->
    </main>
    <?php include_once 'includes/footer.php' ?>

</body>

</html>
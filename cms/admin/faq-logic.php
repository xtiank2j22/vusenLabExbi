<!-- db connection -->
<?php include_once 'include/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $faq_title = htmlspecialchars(trim($_POST['faq_title']));
    $faq_message = htmlspecialchars(trim($_POST['faq_message']));

    // Validate form data
    if (empty( $faq_title) || empty($faq_message)) {
        $_SESSION['faq_message'] = '<div class="alert alert-danger">All fields are required.</div>';
        header("Location: faq.php");
        exit();
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO faq (faq_title, faq_message) VALUES ('$faq_title', '$faq_message')");

    if ($stmt->execute()) {
        $_SESSION['faq_message'] = '<div class="alert alert-success">Your message has been sent successfully!</div>';
    } else {
        $_SESSION['faq_message'] = '<div class="alert alert-danger">Error: ' . $stmt->error . '</div>';
    }

    // Close connection
    $stmt->close();
    $conn->close();

    // Redirect back to the form page
    header("Location: faq.php");
     exit();
}
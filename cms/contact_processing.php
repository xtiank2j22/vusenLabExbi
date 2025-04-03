<!-- db connection -->
<?php include_once 'admin/include/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate form data
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $_SESSION['message'] = '<div class="alert alert-danger">All fields are required.</div>';
        header("Location: ../contact-us.php");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = '<div class="alert alert-danger">Invalid email format.</div>';
        header("Location: ../contact-us.php");
        exit();
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        $_SESSION['message'] = '<div class="alert alert-success">Your message has been sent successfully!</div>';
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger">Error: ' . $stmt->error . '</div>';
    }

    // Close connection
    $stmt->close();
    $conn->close();

    // Redirect back to the form page
    header("Location: ../contact-us.php");
     exit();
}
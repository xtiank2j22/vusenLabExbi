<?php
// Start the session
session_start();

// Include database connection
include_once 'include/db_conn.php';

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID from the POST request
    $faq_id = intval($_POST['id']);

    // Validate the ID
    if (empty($faq_id)) {
        $_SESSION['faq_message'] = '<div class="alert alert-danger">Invalid FAQ ID.</div>';
        header("Location: faq.php");
        exit();
    }

    // Prepare the delete query
    $stmt = $conn->prepare("DELETE FROM faq WHERE id = ?");
    $stmt->bind_param("i", $faq_id);

    // Execute the query and check if successful
    if ($stmt->execute()) {
        $_SESSION['faq_message'] = '<div class="alert alert-success">FAQ deleted successfully!</div>';
    } else {
        $_SESSION['faq_message'] = '<div class="alert alert-danger">Error deleting FAQ: ' . $stmt->error . '</div>';
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to the FAQ page
    header("Location: index.php");
    exit();
} else {
    // If the form wasn't submitted correctly
    $_SESSION['faq_message'] = '<div class="alert alert-danger">Invalid request.</div>';
    header("Location: index.php");
    exit();
}
?>

<?php
// Start the session
session_start();

// Include database connection
include_once 'include/db_conn.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {

    $blog_id = intval($_POST['id']);

    // Fetch the blog to get the image name
    $select_query = "SELECT image FROM blog_tb WHERE id = $blog_id";
    $select_result = mysqli_query($conn, $select_query);

    if ($select_result && mysqli_num_rows($select_result) === 1) {
        $row = mysqli_fetch_assoc($select_result);
        $image_name = $row['image'];

        // Delete the image file if it exists
        if (!empty($image_name)) {
            $image_path = 'img/uploads/' . $image_name;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // Delete the blog from the table
        $delete_query = "DELETE FROM blog_tb WHERE id = $blog_id";
        $delete_result = mysqli_query($conn, $delete_query);

        if ($delete_result) {
            $_SESSION['blog_success'] = 'Blog deleted successfully';
        } else {
            $_SESSION['blog'] = 'Error deleting blog: ' . mysqli_error($conn);
        }
    } else {
        $_SESSION['blog'] = 'Blog not found.';
    }

    header("location:blog.php");
    exit;
} else {
    $_SESSION['blog'] = 'Invalid delete request.';
    header("location:blog.php");
    exit;
}
?>

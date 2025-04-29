<?php
session_start(); // Start the session at the top
include_once 'include/db_conn.php'; // Include the DB connection

// Debugging - print POST data
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Make sure the ID is set
    if (empty($_POST['id'])) {
        echo "No ID received. Exiting."; // Add this to check if the ID is missing
        exit;
    }
    
    $id = intval($_POST['id']); // Ensure the ID is an integer
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $blog_message = mysqli_real_escape_string($conn, $_POST['blog_message']);
    $image = $_FILES['image'];

    // Get old image
    $get_old = mysqli_query($conn, "SELECT image FROM blog_tb WHERE id = '$id'");
    $old_data = mysqli_fetch_assoc($get_old);
    $old_image = $old_data['image'] ?? '';
    $image_name = $old_image;

    if (!empty($image['name'])) {
        $time = time();
        $new_image_name = $time . basename($image['name']);
        $image_tmp_name = $image['tmp_name'];
        $image_destination_path = 'img/uploads/' . $new_image_name;

        $allowed_files = ['png', 'jpg', 'jpeg', 'JPG'];
        $extension = strtolower(pathinfo($new_image_name, PATHINFO_EXTENSION));

        if (in_array($extension, $allowed_files)) {
            if ($image['size'] < 1500000) { // 1.5 MB
                move_uploaded_file($image_tmp_name, $image_destination_path);
                if ($old_image && file_exists("img/uploads/" . $old_image)) {
                    unlink("img/uploads/" . $old_image);
                }
                $image_name = $new_image_name;
            } else {
                $_SESSION['blog'] = 'Image is too large. Max: 1.5 MB';
                header("Location: blog.php");
                exit;
            }
        } else {
            $_SESSION['blog'] = 'Invalid image type. Only png, jpg, jpeg allowed.';
            header("Location: blog.php");
            exit;
        }
    }

    // Final query to update the blog
    $update_blog = "UPDATE blog_tb 
                    SET title = '$title', blog_message = '$blog_message', image = '$image_name' 
                    WHERE id = '$id'";

    $result = mysqli_query($conn, $update_blog);

    if ($result) {
        $_SESSION['blog_success'] = 'Blog updated successfully';
        header("location: blog.php");
        exit;
    } else {
        $_SESSION['blog'] = 'Failed to update blog. Error: ' . mysqli_error($conn);
        header("location: blog.php");
        exit;
    }
} else {
    // If the form wasn't submitted properly
    echo "No ID received. Exiting.";
}

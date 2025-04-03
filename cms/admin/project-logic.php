<!-- db connection -->
<?php include_once 'include/db_conn.php';
///check if submit button was clicked
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

    $title = $_POST['title'];
    $about = $_POST['about'];
    $image = $_FILES['image'];
    //validate input values
    $time = time();
    $image_name = $time . $image['name'];
    $image_tmp_name = $image['tmp_name']; // Fix variable name from $image1 to $image
    $image_destination_path = 'img/uploads/' . $image_name;
    // check if file is an image
    $allowed_files = ['png', 'jpg', 'jpeg', 'JPG'];
    $extension = explode('.', $image_name);
    $extension = end($extension);
    if (in_array($extension, $allowed_files)) {
        //check image size
        if ($image['size'] < 150000) {
            //upload image
            move_uploaded_file($image_tmp_name, $image_destination_path);
        } else {
            $_SESSION['project'] = 'Image is too large, must be less than 150 KB';
        }
    } else {
        $_SESSION['project'] = 'Please upload an image file i.e png, jpg, or jpeg';
    }

    if (isset($_SESSION['project'])) {
        //pass form data back to create_faculty page
        $_SESSION['data'] = $_POST; // Uncomment this line if you want to pass the form data back
        header("location:project.php");
        die();
    } else {
        //insert new faculty into table
        $insert_project = "INSERT INTO `project_tb` (`id`, `title`, `about`, `image`) 
              VALUES (NULL, '$title','$about', '$image_name')"; // Use NULL for auto-increment ID column, use $image_name instead of $image
        $insert_project_result = mysqli_query($conn, $insert_project);
        if (!mysqli_errno($conn)) {
            //redirect to create faculty page with success message
            $_SESSION['project_success'] = 'project created successfully';
            header("location: project.php");
            die();
        }
    }
} else {
    $_SESSION['project'] = 'project info not created successfully';
    header("location: project.php");
    die();
}

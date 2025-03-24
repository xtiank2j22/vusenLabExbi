<?php
// Database connection
$servername = "127.0.0.1";
$username = "root";
$password = '';
$database = "software_exhibition";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Allowed MIME types for file validation
$allowed_image_types = ['image/jpeg', 'image/png'];
$allowed_ppt_types = ['application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'];

// Start transaction
$conn->begin_transaction();

try {
    // Capture Team Information
    $team_name = htmlspecialchars($conn->real_escape_string($_POST['team_name']), ENT_QUOTES, 'UTF-8');
    $sql_team = "INSERT INTO teams (team_name) VALUES ('$team_name')";
    if (!$conn->query($sql_team)) {
        throw new Exception("Error inserting team: " . $conn->error);
    }
    $team_id = $conn->insert_id;

    // Capture Leader Information
    $leader_name = htmlspecialchars($conn->real_escape_string($_POST['leader_name']), ENT_QUOTES, 'UTF-8');
    $leader_number = $conn->real_escape_string($_POST['leader_number']);
    $leader_email = $conn->real_escape_string($_POST['leader_email']);
    $dept_leader = $conn->real_escape_string($_POST['dept_leader']);
    $sql_leader = "INSERT INTO team_leaders (team_id, leader_name, leader_number, leader_email, dept_leader) 
                   VALUES ('$team_id', '$leader_name', '$leader_number', '$leader_email', '$dept_leader')";
    if (!$conn->query($sql_leader)) {
        throw new Exception("Error inserting leader: " . $conn->error);
    }

    // Capture Project Details
    $thematic_area = $conn->real_escape_string($_POST['expertise']);
    $project_title = $conn->real_escape_string($_POST['project_title']);
    $project_summary = $conn->real_escape_string($_POST['project_summary']);
    $problem_addressed = $conn->real_escape_string($_POST['problem_addressed']);
    $significance = $conn->real_escape_string($_POST['significance']);
    $swot_analysis = $conn->real_escape_string($_POST['swot_analysis']);
    $sql_project = "INSERT INTO projects (team_id, thematic_area, project_title, project_summary, problem_addressed, significance, swot_analysis) 
                    VALUES ('$team_id', '$thematic_area', '$project_title', '$project_summary', '$problem_addressed', '$significance', '$swot_analysis')";
    if (!$conn->query($sql_project)) {
        throw new Exception("Error inserting project: " . $conn->error);
    }

    // Handle Team Members
    if (!empty($_POST['name'])) {
        foreach ($_POST['name'] as $index => $member_name) {
            $department = $conn->real_escape_string($_POST['department'][$index]);
            $email = $conn->real_escape_string($_POST['email'][$index]);
            $expertise = $conn->real_escape_string($_POST['expertise'][$index]);
            $sql_member = "INSERT INTO team_members (team_id, `name`, department, email, expertise) 
                           VALUES ('$team_id', '$member_name', '$department', '$email', '$expertise')";
            if (!$conn->query($sql_member)) {
                throw new Exception("Error inserting team member: " . $conn->error);
            }
        }
    }

    // Handle Technology Stack
    $tech_stack = [];
    if (isset($_POST['iot_embeded_system'])) $tech_stack[] = "IoT/Embedded System";
    if (isset($_POST['robotics'])) $tech_stack[] = "Robotics";
    if (isset($_POST['web_app'])) $tech_stack[] = "Web Application";
    if (isset($_POST['mobile_app'])) $tech_stack[] = "Mobile Application";
    if (isset($_POST['ai'])) $tech_stack[] = "Artificial Intelligence";
    if (isset($_POST['blockchain'])) $tech_stack[] = "Blockchain";
    foreach ($tech_stack as $tech) {
        $sql_tech = "INSERT INTO project_technology (team_id, technology) VALUES ('$team_id', '$tech')";
        if (!$conn->query($sql_tech)) {
            throw new Exception("Error inserting technology stack: " . $conn->error);
        }
    }

    // Capture Product Development Details
    $product_features = $conn->real_escape_string($_POST['product_features']);
    $product_solution = $conn->real_escape_string($_POST['product_solution']);
    $development_stage = isset($_POST['development_stage']) ? $conn->real_escape_string($_POST['development_stage']) : 'No input for this';
    $final_statement = $conn->real_escape_string($_POST['final_statement']);
    $sql_product = "INSERT INTO product_development (team_id, product_features, product_solution, development_stage, final_statement) 
                    VALUES ('$team_id', '$product_features', '$product_solution', '$development_stage', '$final_statement')";
    if (!$conn->query($sql_product)) {
        throw new Exception("Error inserting product development: " . $conn->error);
    }

    // File Upload (Images)
    $upload_dir = "assets/uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    if (!empty($_FILES['team_images']['name'][0])) {
        foreach ($_FILES['team_images']['name'] as $key => $image_name) {
            $image_type = $_FILES['team_images']['type'][$key];
            $image_size = $_FILES['team_images']['size'][$key];

            // Check image type and size
            if (in_array($image_type, $allowed_image_types) && $image_size <= 5 * 1024 * 1024) {
                $image_path = $upload_dir . basename($image_name);
                move_uploaded_file($_FILES['team_images']['tmp_name'][$key], $image_path);
                $sql_image = "INSERT INTO project_files (team_id, file_type, file_path) VALUES ('$team_id', 'image', '$image_path')";
                if (!$conn->query($sql_image)) {
                    throw new Exception("Error uploading image: " . $conn->error);
                }
            } else {
                throw new Exception("Invalid image file type or file too large.");
            }
        }
    }

    // File Upload (PPT)
    if (!empty($_FILES['team_ppt']['name'])) {
        $ppt_type = $_FILES['team_ppt']['type'];
        $ppt_size = $_FILES['team_ppt']['size'];

        // Check PPT type and size
        if (in_array($ppt_type, $allowed_ppt_types) && $ppt_size <= 10 * 1024 * 1024) {
            $ppt_filename = $upload_dir . basename($_FILES['team_ppt']['name']);
            move_uploaded_file($_FILES['team_ppt']['tmp_name'], $ppt_filename);
            $sql_ppt = "INSERT INTO project_files (team_id, file_type, file_path) VALUES ('$team_id', 'ppt', '$ppt_filename')";
            if (!$conn->query($sql_ppt)) {
                throw new Exception("Error uploading PPT file: " . $conn->error);
            }
        } else {
            throw new Exception("Invalid PPT file type or file too large.");
        }
    }

    // Commit transaction
    $conn->commit();
    echo "<script>alert('Registration Successful!'); window.location.href='../index.html';</script>";
} catch (Exception $e) {
    // Rollback on error
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

// Close Connection
$conn->close();

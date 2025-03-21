

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "software_exhibition";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    // Capture Team Information
    $team_name = $conn->real_escape_string($_POST['team_name']);

    // Capture Leader Information
    $leader_name = $conn->real_escape_string($_POST['leader_name']);
    $leader_number = $conn->real_escape_string($_POST['leader_number']);
    $leader_email = $conn->real_escape_string($_POST['leader_email']);
    $dept_leader = $conn->real_escape_string($_POST['dept_leader']);

    // Insert Team Information
    $sql_team = "INSERT INTO teams (team_name) VALUES ('$team_name')";

    if ($conn->query($sql_team) === TRUE) {
        $team_id = $conn->insert_id; // Get the inserted team ID

        // Insert Leader Information
        $sql_leader = "INSERT INTO team_leader (team_id, leader_name, leader_number, leader_email, dept_leader) 
                       VALUES ('$team_id', '$leader_name', '$leader_number', '$leader_email', '$dept_leader')";
        $conn->query($sql_leader);

        // Insert Team Members
        if (!empty($_POST['name'])) {
            foreach ($_POST['name'] as $index => $member_name) {
                $department = $conn->real_escape_string($_POST['department'][$index]);
                $email = $conn->real_escape_string($_POST['email'][$index]);
                $expertise = $conn->real_escape_string($_POST['expertise'][$index]);
                $sql_member = "INSERT INTO team_members (team_id, member_name, department, email, expertise) 
                               VALUES ('$team_id', '$member_name', '$department', '$email', '$expertise')";
                $conn->query($sql_member);
            }
        }

        // Capture Project Details
        $thematic_area = $conn->real_escape_string($_POST['expertise']);
        $project_title = $conn->real_escape_string($_POST['project_title']);
        $project_summary = $conn->real_escape_string($_POST['project_summary']);
        $problem_addressed = $conn->real_escape_string($_POST['problem_addressed']);
        $significance = $conn->real_escape_string($_POST['significance']);
        $swot_analysis = $conn->real_escape_string($_POST['swot_analysis']);

        // Insert Project Information
        $sql_project = "INSERT INTO project (team_id, thematic_area, project_title, project_summary, problem_addressed, significance, swot_analysis) 
                        VALUES ('$team_id', '$thematic_area', '$project_title', '$project_summary', '$problem_addressed', '$significance', '$swot_analysis')";
        $conn->query($sql_project);

        // Capture Technology Stack (Checkboxes)
        $tech_stack = [];
        if (isset($_POST['iot_embeded_system'])) $tech_stack[] = "IoT/Embedded System";
        if (isset($_POST['robotics'])) $tech_stack[] = "Robotics";
        if (isset($_POST['web_app'])) $tech_stack[] = "Web Application";
        if (isset($_POST['mobile_app'])) $tech_stack[] = "Mobile Application";
        if (isset($_POST['ai'])) $tech_stack[] = "Artificial Intelligence";
        if (isset($_POST['blockchain'])) $tech_stack[] = "Blockchain";

        // Insert into Technology Stack Table
        foreach ($tech_stack as $tech) {
            $sql_tech = "INSERT INTO project_technology (team_id, technology) VALUES ('$team_id', '$tech')";
            $conn->query($sql_tech);
        }
        // Capture Product Development
        $product_features = $conn->real_escape_string($_POST['product_features']);
        $product_solution = $conn->real_escape_string($_POST['product_solution']);
        $development_stage = $conn->real_escape_string($_POST['development_stage']);

        $sql_product = "INSERT INTO product_development (team_id, product_features, product_solution, development_stage) 
                        VALUES ('$team_id', '$product_features', '$product_solution', '$development_stage')";
        $conn->query($sql_product);

        // Handle File Uploads - Save to assets/uploads/
        $upload_dir = "assets/uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Upload PPT File
        if (!empty($_FILES['team_ppt']['name'])) {
            $ppt_filename = $upload_dir . basename($_FILES['team_ppt']['name']);
            move_uploaded_file($_FILES['team_ppt']['tmp_name'], $ppt_filename);
            $sql_ppt = "INSERT INTO project_files (team_id, file_type, file_path) VALUES ('$team_id', 'ppt', '$ppt_filename')";
            $conn->query($sql_ppt);
        }

        // Upload Project Images
        if (!empty($_FILES['team_images']['name'][0])) {
            foreach ($_FILES['team_images']['name'] as $key => $image_name) {
                $image_path = $upload_dir . basename($image_name);
                move_uploaded_file($_FILES['team_images']['tmp_name'][$key], $image_path);

                $sql_image = "INSERT INTO project_files (team_id, file_type, file_path) VALUES ('$team_id', 'image', '$image_path')";
                $conn->query($sql_image);
            }
        }

        // Capture Final Statement
        $final_statement = $conn->real_escape_string($_POST['final_statement']);
        $sql_final_statement = "INSERT INTO product_development (team_id, final_statement) VALUES ('$team_id', '$final_statement')";
        $conn->query($sql_final_statement);

        // Success Message
        echo "<script>alert('Registration Successful!'); window.location.href='../index.html';</script>";
    } else {
        echo "Error: " . $sql_team . "<br>" . $conn->error;
    }
}

// Close Connection
$conn->close();

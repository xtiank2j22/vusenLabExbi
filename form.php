<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Proposal Form</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <?php include_once 'includes/links.php' ?>
</head>

<body class="blog-details-page">
    <?php include_once 'includes/header.php' ?>
    <main class="main">
        <!-- Page Title -->
        <div class="page-title section-hero">
            <div class="heading">
                <div class="container-fluid ">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Your Project Proposal Form</h1>
                            <p class="mb-0">Veritas University Software Enginerring Exhibition & Competition Questionaire</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->
        <!-- Contact Section -->
        <section id="contact" class="contact section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Form</h2>
                <p>Each Team are to provide the  information need in in this form</p>
            </div><!-- End Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gx-lg-0 gy-2">
                    <div class="col-lg-12">
                        <div class="container mt-2">
                            <h2 class="text-logo-green">Exhibition Form</h2>
                            <!-- Progress Bar -->
                            <div class="progress">
                                <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <form action="cms/form_processing.php" method="POST" class="php-email-form" data-aos="fade" data-aos-delay="100" enctype="multipart/form-data">
                                <!-- Step 1 -->
                                <div class="step" id="step1">
                                    <div class="row">
                                        <div class="mb-3 col-12">
                                            <label for="exampleFormControlInput1" class="form-label">Team / Group Name:</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="team_name" placeholder="Enter Team Name...">
                                        </div>
                                        <!-- for team Leader -->
                                        <h4 class="text-logo-green">(Team Leader Information)</h4>
                                        <div class="mb-3 col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name-leader" name="leader_name" placeholder="Name..">
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" id="leader-number" name="leader_number" placeholder="0806******0.">
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="leader-email" name="leader_email" placeholder="name@example.com">
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Department</label>
                                            <input type="text" class="form-control" id="dept-leader" name="dept_leader" placeholder="Software Engr">
                                        </div>
                                        <div id="team-members">
                                            <!-- Default first team member -->
                                            <div class="team-member mb-4">
                                                <h3 class="text-logo-green">Team Members</h3>
                                                <div class="row">
                                                    <div class="mb-3 col-6">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="name[]" placeholder="Full Name..">
                                                    </div>
                                                    <div class="mb-3 col-6">
                                                        <label class="form-label">Department</label>
                                                        <input type="text" class="form-control" name="department[]" placeholder="Software Engr">
                                                    </div>
                                                    <div class="mb-3 col-6">
                                                        <label class="form-label">Email address</label>
                                                        <input type="email" class="form-control" name="email[]" placeholder="name@example.com">
                                                    </div>
                                                    <div class="mb-3 col-6">
                                                        <label class="form-label">Expertise</label>
                                                        <input type="text" class="form-control" name="expertise[]" placeholder="Presentation">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Add Member Button -->
                                        <div class="d-flex justify-content-end">
                                            <button id="add-member-btn" class="col-2 btn text-white ">
                                                <i class="bi bi-plus text-white fw-bolder"></i> Add Member
                                            </button>
                                        </div>
                                        <!-- Hidden template -->
                                        <div id="team-member-template" class="team-member mb-4 hidden">
                                            <h4>Team Member <span class="member-number"></span></h4>
                                            <div class="row">
                                                <div class="mb-3 col-6">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name[]" placeholder="Full Name..">
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label class="form-label">Department</label>
                                                    <input type="text" class="form-control" name="department[]" placeholder="Software Engr">
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label class="form-label">Email address</label>
                                                    <input type="email" class="form-control" name="email[]" placeholder="name@example.com">
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label class="form-label">Expertise</label>
                                                    <input type="text" class="form-control" name="expertise[]" placeholder="Presentation">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- thematics Area -->
                                        <h4 class="text-logo-green">(Thematics Area Selection) / Project Overview</h4>
                                        <div class="mb-3 col-6">
                                            <label for="expertise" class="form-label">Which thematics area dose your project fall under?</label>
                                            <select class="form-select" id="expertise" name="expertise">
                                                <option selected disabled>Select thematics</option>
                                                <option value="education">Education</option>
                                                <option value="agriculture">Agriculture</option>
                                                <option value="health">Health</option>
                                                <option value="energy">Energy</option>
                                                <option value="security">Security</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="exampleFormControlInput1" class="form-label">Whats your Project Title?</label>
                                            <input type="text" class="form-control" id="project-title" name="project_title" placeholder="Wireless car">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="button" onclick="nextStep()">Next</button>
                                </div>
                                <!-- Step 2 -->
                                <div class="step" id="step2" style="display: none;">
                                    <div class="row">
                                        <h2 class="text-logo-green">Continue....</h2>
                                        <div class="mb-3 col-6">
                                            <label for="exampleFormControlTextarea1" class="form-label">Provide a brief summary of your Project (max 150 words)</label>
                                            <textarea class="form-control" id="project-sum" name="project_summary" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="exampleFormControlTextarea1" class="form-label">What specific problem dose your project aim to address within the choosen theme (max 100 words)</label>
                                            <textarea class="form-control" id="project-aim" name="problem_addressed" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="exampleFormControlTextarea1" class="form-label">Why is this problem significant in Nigeria ? (max 150 words)</label>
                                            <textarea class="form-control" id="project-significant" name="significance" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="exampleFormControlTextarea1" class="form-label"><span class="text-logo-green fs-3">SWOT Analysis</span><br> Identify your projects strenght, weakness, opportunities and threats</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="swot_analysis" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h2 class="text-logo-green">Technology Stack</h2>
                                        <div class="mb-3 col-6">
                                            <label class="form-label">What Technology will you use to solve the problem? (select all that apply)</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="iot_embeded_system" value="iot-embeded-system" id="iot-embeded-system">
                                                <label class="form-check-label" for="iot-embeded-system">Iot/Embeded Sytem</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="robotics" value="robotics" id="robotics">
                                                <label class="form-check-label" for="robotics">Robotics</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="web_app" value="web-app" id="web-app">
                                                <label class="form-check-label" for="web-app">Web Application</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="mobile_app" value="mobile-app" id="mobile-app">
                                                <label class="form-check-label" for="mobile-app">Mobile Application</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="ai" value="ai" id="ai">
                                                <label class="form-check-label" for="ai">Artificial Intellignce</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="blockchain" value="blockchain" id="blockchain">
                                                <label class="form-check-label" for="blockchain">Block Chain</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-secondary mt-2" type="button" onclick="prevStep()">Back</button>
                                    <button class="btn btn-primary mt-2" type="button" onclick="nextStep()">Next</button>
                                </div>
                                <!-- Step 3 -->
                                <div class="step" id="step3" style="display: none;">
                                    <div class="row">
                                        <h2 class="text-logo-green">Product Development</h2>
                                        <div class="mb-3 col-6">
                                            <label for="exampleFormControlTextarea1" class="form-label">Describe the product you are developing, what will be the key features and functionalities? (max 200 words)</label>
                                            <textarea class="form-control" id="product-features" name="product_features" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="exampleFormControlTextarea1" class="form-label">How dose your product provide solution to the identified problem? (max 150 words)</label>
                                            <textarea class="form-control" id="product-solution" name="product_solution" rows="3"></textarea>
                                        </div>
                                        <h2 class="text-logo-green">Implientation Plan</h2>
                                        <div class="mb-3 col-6">
                                            <label for="expertise" class="form-label">What stage of development is your solution?</label>
                                            <select class="form-select" id="expertise" name="expertise">
                                                <option selected disabled>Select here</option>
                                                <option value="ideation">Ideation</option>
                                                <option value="prototype">Prototype</option>
                                                <option value="Proof-of-concept">Proof of Concept</option>
                                                <option value="energy">Commercialisation</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="presntation" class="form-label">Upload your presentation Slide (ppt format)</label>
                                            <input type="file" name="team_ppt" accept=".ppt,.pptx" class="form-control" >
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="presntation" class="form-label">Upload your Projects images (Min: 3, Max: 5)</label>
                                            <input type="file" name="team_images[]" accept="image/*" class="form-control" multiple >
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="exampleFormControlTextarea1" class="form-label"><span class="text-logo-green fs-3">Final Statement</span><br> Explain why your project deserve reorginition in the software Enginerring Exhibition & Competition (max 150words)</label>
                                            <textarea class="form-control" id="final-statement" name="final_statement" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-secondary mt-2" type="button" onclick="prevStep()">Back</button>
                                </div>
                                <button class="btn btn-primary mt-2" type="submit" name="submit">Submit</button>
                            </form>
                        </div>
                    </div><!-- End Contact Form -->
                </div>
            </div>
        </section><!-- /Contact Section -->
    </main>
    <?php include_once 'includes/footer.php' ?>
</body>

</html>
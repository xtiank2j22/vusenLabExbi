<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Team Members</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .hidden {
            display: none;
        }

        /* Hide template */
    </style>
</head>

<body class="container mt-4">

    <h3 class="text-logo-green">Team Members</h3>

    <div id="team-members">
        <!-- Default first team member -->
        <div class="team-member mb-4">
            <h4>Team Member 1</h4>
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

    <!-- Add Member Button -->
    <button id="add-member-btn" class="btn btn-primary mt-3 p-2"><i class="bi bi-plus text-white">+</i></button>

    <script>
        let memberCount = 1; // Track the number of members

        document.getElementById("add-member-btn").addEventListener("click", function () {
            memberCount++;

            // Clone the hidden template
            let template = document.getElementById("team-member-template").cloneNode(true);
            template.classList.remove("hidden");
            template.id = ""; // Remove ID to avoid duplication
            template.querySelector(".member-number").textContent = memberCount;

            // Append to team members container
            document.getElementById("team-members").appendChild(template);
        });
    </script>

</body>

</html>
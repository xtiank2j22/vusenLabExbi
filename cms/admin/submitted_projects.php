<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE v4 | Dashboard">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="">
    <meta name="keywords" content="bootstrap 5">
    <?php include_once 'include/links.php'; ?>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <?php include_once 'include/header.php'; ?>
        <!--end::Header-->

        <!--begin::Sidebar-->
        <?php include_once 'include/left-sidebar.php'; ?>
        <!--end::Sidebar-->

        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Projects Submitted</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Projects</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::App Content Header-->
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--begin::Card-->
                            <div class="card">
                                <div class="card-title bg-dark text-white">
                                    <h4 class="px-3 py-2 fw-bolder">Project Section</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        include_once 'include/db_conn.php';

                                        // Fetch all teams
                                        $teams_sql = "SELECT * FROM teams";
                                        $teams_result = mysqli_query($conn, $teams_sql);

                                        if (mysqli_num_rows($teams_result) > 0) {
                                        ?>
                                            <table class="table table-centered table-striped text-nowrap table-borderless mb-0 table-with-checkbox">
                                                <thead>
                                                    <tr>
                                                        <th>Team Name</th>
                                                        <th>Team Projects</th>
                                                        <th>Team Leader</th>
                                                        <th>Team Members</th>
                                                        <th>Project Summary</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($team = mysqli_fetch_assoc($teams_result)) {
                                                        $team_id = $team['id'];

                                                        // Fetch team leader
                                                        $leader_sql = "SELECT leader_name FROM team_leaders WHERE team_id = $team_id";
                                                        $leader_result = mysqli_query($conn, $leader_sql);
                                                        $leader = mysqli_fetch_assoc($leader_result)['leader_name'] ?? 'N/A';

                                                        // Fetch team members
                                                        $members_sql = "SELECT name FROM team_members WHERE team_id = $team_id";
                                                        $members_result = mysqli_query($conn, $members_sql);
                                                        $members = [];
                                                        while ($member = mysqli_fetch_assoc($members_result)) {
                                                            $members[] = $member['name'];
                                                        }
                                                        $members_list = implode(", ", $members);

                                                        // Fetch projects
                                                        $projects_sql = "SELECT project_title, project_summary FROM projects WHERE team_id = $team_id";
                                                        $projects_result = mysqli_query($conn, $projects_sql);

                                                        $project_titles = [];
                                                        $project_summaries = [];

                                                        while ($project = mysqli_fetch_assoc($projects_result)) {
                                                            $project_titles[] = $project['project_title'];
                                                            $project_summaries[] = $project['project_summary'];
                                                        }

                                                        $projects_list = implode(", ", $project_titles);
                                                        $projects_sum = implode(", ", $project_summaries);
                                                    ?>
                                                        <?php
                                                        function shorten_text($text)
                                                        {
                                                            return $text;
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td class="td-text"><?= htmlspecialchars($team['team_name'] ?? 'No Team Name') ?></td>
                                                            <td class="td-text"><?= htmlspecialchars($projects_list ?? 'No Projects') ?></td>
                                                            <td class="td-text"><?= htmlspecialchars($leader ?? 'No Leader') ?></td>
                                                            <td class="td-text"><?= htmlspecialchars($members_list ?? 'No Members') ?></td>
                                                            <td class="td-text" style=""><?= htmlspecialchars($projects_sum ?? 'No Summary') ?></td>
                                                            <td>
                                                                <button type="submit" class="btn btn-success"><i class="bi bi-download"></i> Download</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>

                                            </table>
                                        <?php
                                        } else {
                                            echo "<p>No teams found.</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->

        <!--begin::Footer-->
        <?php include_once 'include/footer.php'; ?>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
</body>

</html>
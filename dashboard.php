<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

// Fetch some basic stats (you can customize these)
$studentCount = $conn->query("SELECT COUNT(*) AS total FROM students")->fetch_assoc()['total'];
$subjectCount = $conn->query("SELECT COUNT(*) AS total FROM subjects")->fetch_assoc()['total'];
$marksCount = $conn->query("SELECT COUNT(*) AS total FROM marks")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EduTrack Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            background-color: #343a40;
        }
        .sidebar a {
            color: #ffffff;
            display: block;
            padding: 10px 15px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            margin-left: 200px;
            padding: 20px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark px-3">
    <span class="navbar-brand">EduTrack Dashboard</span>
    <div>
        <span class="text-light me-3">Hello, <?= $_SESSION['user']; ?></span>
        <a href="logout.php" class="btn btn-sm btn-outline-light">Logout</a>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar p-3">
    <a href="dashboard.php">Dashboard</a>
    <a href="students/list.php">Students</a>
    <a href="subjects/list.php">Subjects</a>
    <a href="marks/enter.php">Enter Marks</a>
    <a href="marks/report_card.php">Report Cards</a>
</div>

<!-- Main Content -->
<div class="main-content">
    <h2 class="mb-4">Welcome to EduTrack</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5>Total Students</h5>
                    <h2><?= $studentCount ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5>Total Subjects</h5>
                    <h2><?= $subjectCount ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5>Total Marks Records</h5>
                    <h2><?= $marksCount ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
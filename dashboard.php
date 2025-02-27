<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(194, 196, 199);
        }
        .navbar {
            background-color: #2c6a85;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: larger;
        }
        .navbar a:hover {
            color: yellow;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            padding: 20px;
            gap: 20px;
            flex-wrap: nowrap;
            height: 80vh;
        }
        .card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 48%;
            text-align: center;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }
        .card:first-child {
            width: 25%;
            padding: 15px;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #2c6a85;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }
            .card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#">Dashboard</a>
        <div>
            <a href="#">Home</a>
            <a href="profile.php">Profile</a>
            <a href="#">Settings</a>
            <a href="logout.php" style="color: orange;">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <div class="card">
            <h3>Student Information</h3>
            <img src="images/default.jpg" alt="Profile Picture" class="profile-img">
            <table class="info-table">
                <tr><td>Name:</td><td><?php echo htmlspecialchars($_SESSION['username']); ?></td></tr>
                <tr><td>Course:</td><td>Unknown</td></tr>
                <tr><td>Year:</td><td>Unknown</td></tr>
                <tr><td>Session:</td><td>30</td></tr>
            </table>
        </div>
        <div class="card">
            <h3>Announcements</h3>
            <p><strong>CCS Admin | 2025-Feb-03</strong></p>
            <p>The College of Computer Studies will open the registration of students for the Sit-in privilege starting tomorrow.</p>
            <hr>
            <p><strong>CCS Admin | 2024-May-08</strong></p>
            <p>We are excited to announce the launch of our new website! 🎉</p>
        </div>
       
        <div class="card">
            <h3>University of Cebu
COLLEGE OF INFORMATION & COMPUTER STUDIES</h3>
            <p><strong>LABORATORY RULES AND REGULATIONS</strong></p>
            <p>The College of Computer Studies will open the registration of students for the Sit-in privilege starting tomorrow.</p>
            <hr>
            <p><strong>CCS Admin | 2024-May-08</strong></p>
            <p>We are excited to announce the launch of our new website! 🎉</p>
        </div>

    </div>
</body>
</html>

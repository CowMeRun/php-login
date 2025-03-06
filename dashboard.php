<?php
session_start();

// Include database connection
include("connect.php");

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Get the logged-in user's username
$username = $_SESSION['username'];

// Fetch user information from the database
$query = "SELECT course, year_level FROM users WHERE username = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $course = $row['course'];
    $year = $row['year_level'];
} else {
    // Handle error if the user is not found
    echo "User not found!";
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
            overflow: auto;
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
            <img src="profile.jpg" alt="Profile Picture" class="profile-img">
            <table class="info-table">
                <tr><td>Name:</td><td><?php echo htmlspecialchars($_SESSION['username']); ?></td></tr>
                <tr><td>Course:</td><td><?php echo htmlspecialchars($course); ?></td></tr>
                <tr><td>Year:</td><td><?php echo htmlspecialchars($year); ?></td></tr>
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
            <h3>University of Cebu</h3>
            <h3>COLLEGE OF INFORMATION & COMPUTER STUDIES</h3>
            <p><strong>LABORATORY RULES AND REGULATIONS</strong></p>
            <p>To avoid embarrassment and maintain camaraderie with your friends and superiors at our laboratories, please observe the following:</p>
                <p>1. Maintain silence, proper decorum, and discipline inside the laboratory. Mobile phones, walkmans and other personal pieces of equipment must be switched off.</p>
                <p>2. Games are not allowed inside the lab. This includes computer-related games, card games and other games that may disturb the operation of the lab.</p>
                <p>3. Surfing the Internet is allowed only with the permission of the instructor. Downloading and installing of software are strictly prohibited.</p>
                <p>4. Getting access to other websites not related to thecourse (especially pornographic and illicit sites) is strictly prohibited.</p>
                <p>5. Deleting computer files and changing the set-up of the computer is a major offense.</p>
                <p>6. Observe computer time usage carefully. A fifteen-minute allowance is given for each use. Otherwise, the unit will be given to those who wish to "sit-in".</p>
                <p>7. Observe proper decorum while inside the laboratory.</p>
                <ul>
                    <li>Do not get inside the lab unless the instructor is present.</li>
                    <li>All bags, knapsacks, and the likes must be deposited at the counter.</li>
                    <li>Follow the seating arrangement of your instructor.</li>
                    <li>At the end of class, all software programs must be closed.</li>
                    <li>Return all chairs to their proper places after using.</li>
                </ul>
                <p>8. Chewing gum, eating, drinking, smoking, and other forms of vandalism are prohibited inside the lab.</p>
                <p>9. Anyone causing a continual disturbance will be asked to leave the lab. Acts or gestures offensive to the members of the community, including public display of physical intimacy, are not tolerated.</p>
                <p>10. Persons exhibiting hostile or threatening behavior such as yelling, swearing, or disregarding requests made by lab personnel will be asked to leave the lab.</p>
                <p>11. For serious offense, the lab personnel may call the Civil Security Office (CSU) for assistance.</p>
                <p>12. Any technical problem or difficulty must be addressed to the laboratory supervisor, student assistant or instructor immediately.</p>
            <hr>
            <p><strong>Disciplinary Action</strong></p>
            <li>First Offense - The Head or the Dean or OIC recommends to the Guidance Center for a suspension from classes for each offender.</li>
            <li>Second and Subsequent Offenses - A recommendation for a heavier sanction will be endorsed to the Guidance Center.</li>
        </div>

    </div>
</body>
</html>

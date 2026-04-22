<?php
// -----------------------------
// DATABASE CONFIGURATION
// -----------------------------

// These variables store our database connection info
$host     = "localhost";          // Server name (usually localhost)
$dbname   = "your_database_name"; // Name of database
$username = "your_db_username";   // MySQL username
$password = "your_db_password";   // MySQL password


// -----------------------------
// CREATE DATABASE CONNECTION
// -----------------------------

// Create a new MySQL connection using the credentials above
$conn = new mysqli($host, $username, $password, $dbname);


// -----------------------------
// CHECK CONNECTION
// -----------------------------

// If connection fails, store the error message
if ($conn->connect_error) {
    $db_error = "Could not connect to database: " . $conn->connect_error;

} else {

    // -----------------------------
    // SQL QUERY TO GET ANNOUNCEMENTS
    // -----------------------------

    // Select title, body, and date from announcements table
    // Order by newest announcements first
    $sql = "SELECT title, body, date_posted FROM announcements ORDER BY date_posted DESC";

    // Execute the query
    $result = $conn->query($sql);

    // Create an empty array to store announcements
    $announcements = [];

    // If query was successful, fetch results
    if ($result) {

        // Loop through each row and store it in the array
        while ($row = $result->fetch_assoc()) {
            $announcements[] = $row;
        }
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Announcements</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
/* -----------------------------
   GENERAL PAGE STYLING
----------------------------- */

body{
    font-family: Arial, sans-serif;
    margin:0;
    background-color:#f4f4f4;
}

/* Navigation bar */
.nav{
    background-color:#333333;
    padding:15px;
    text-align:center;
}

.nav a{
    color:#FFFFFF;
    text-decoration:none;
    margin:0 12px;
    font-weight:bold;
}

.nav a:hover{
    color:#FFCCCC;
}

/* Header section */
.hero{
    background-color:#CC0033;
    color:#FFFFFF;
    padding:40px;
    text-align:center;
}

/* Main container */
.container{
    width:90%;
    max-width:1100px;
    margin:25px auto;
}

/* Announcement box styling */
.announcement{
    background-color:#FFFFFF;
    border-left:6px solid #CC0033;
    padding:15px;
    margin-bottom:15px;
}

/* Error message styling */
.error-box{
    background-color:#fff3f3;
    border-left:6px solid #CC0033;
    padding:15px;
    margin-bottom:15px;
    color:#CC0033;
}

/* Button styling */
.btn{
    background-color:#0E5061;
    color:#FFFFFF;
    padding:10px 14px;
    border:none;
    border-radius:6px;
    cursor:pointer;
}

.btn:hover{
    background-color:#2F6678;
}

/* Footer styling */
.footer{
    background-color:#333333;
    color:#FFFFFF;
    text-align:center;
    padding:20px;
    margin-top:30px;
}
</style>

<script>
// -----------------------------
// JAVASCRIPT FUNCTION
// -----------------------------

// This function runs when button is clicked
function oldAnnouncements() {
    alert("Older announcements would open here.");
}
</script>

</head>
<body>

<!-- -----------------------------
     NAVIGATION BAR
------------------------------ -->
<div class="nav">
    <a href="index.html">Home</a>
    <a href="about.html">About</a>
    <a href="events.html">Events</a>
    <a href="members.html">Members</a>
    <a href="announcements.php">Announcements</a>
    <a href="contact.html">Contact</a>
</div>

<!-- -----------------------------
     PAGE HEADER
------------------------------ -->
<div class="hero">
    <h1>Announcements</h1>
    <p>Latest club updates and notices</p>
</div>

<div class="container">

    <?php
    // -----------------------------
    // DISPLAY LOGIC
    // -----------------------------

    // If database connection failed → show error
    if (isset($db_error)): ?>

        <div class="error-box">
            <strong>Error:</strong> <?php echo htmlspecialchars($db_error); ?>
        </div>

    <?php
    // If no announcements exist → show message
    elseif (empty($announcements)): ?>

        <div class="announcement">
            <p>No announcements at this time. Check back soon!</p>
        </div>

    <?php
    // Otherwise → display announcements
    else: ?>

        <?php foreach ($announcements as $a): ?>
            <div class="announcement">
                <h2>
                    <?php
                    // htmlspecialchars prevents security issues (XSS attacks)
                    echo htmlspecialchars($a['title']);
                    ?>
                    &mdash;
                    <?php echo htmlspecialchars($a['date_posted']); ?>
                </h2>

                <p><?php echo htmlspecialchars($a['body']); ?></p>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>

    <!-- Button for older announcements -->
    <div class="card">
        <input class="btn" type="button"
               value="Click to view older announcements"
               onclick="oldAnnouncements()">
    </div>

</div>

<!-- -----------------------------
     FOOTER
------------------------------ -->
<div class="footer">
    <p>Club Resources</p>
    <a href="index.html">Home</a> |
    <a href="events.html">Events</a> |
    <a href="members.html">Members</a> |
    <a href="contact.html">Contact</a>
</div>

</body>
</html>

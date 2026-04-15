<?php
// --- Database config ---
$host     = "localhost";
$dbname   = "your_database_name";
$username = "your_db_username";
$password = "your_db_password";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    $db_error = "Could not connect to database: " . $conn->connect_error;
} else {
    $sql    = "SELECT title, body, date_posted FROM announcements ORDER BY date_posted DESC";
    $result = $conn->query($sql);
    $announcements = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $announcements[] = $row;
        }
    }
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

body{
    font-family: Arial, sans-serif;
    margin:0;
    background-color:#f4f4f4;
}
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
.hero{
    background-color:#CC0033;
    color:#FFFFFF;
    padding:40px;
    text-align:center;
}
.container{
    width:90%;
    max-width:1100px;
    margin:25px auto;
}
.card{
    background-color:#FFFFFF;
    border-radius:20px;
    padding:20px;
    box-shadow:0 4px 8px rgba(0,0,0,0.2);
    margin-bottom:20px;
}
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
table{
    width:100%;
    border-collapse:collapse;
    background-color:#FFFFFF;
}
th, td{
    padding:12px;
    text-align:left;
    border:1px solid #cccccc;
}
th{
    background:#333333;
    color:white;
}
tr:nth-child(even){
    background:#f2f2fe;
}
tr:nth-child(odd){
    background:#FFFFFF;
}
tr:hover{
    background:#d1ecf1;
}
input[type="text"], input[type="password"], input[type="email"], textarea{
    width:100%;
    border:1px solid #333;
    box-sizing:border-box;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
}
textarea{
    height:150px;
}
p > label{
    display:block;
}
.footer{
    background-color:#333333;
    color:#FFFFFF;
    text-align:center;
    padding:20px;
    margin-top:30px;
}
.footer a{
    color:#FFFFFF;
    text-decoration:none;
}
.announcement{
    background-color:#FFFFFF;
    border-left:6px solid #CC0033;
    padding:15px;
    margin-bottom:15px;
}
.event-box{
    background-color:#FFFFFF;
    border-radius:20px;
    padding:20px;
    box-shadow:0 4px 8px rgba(0,0,0,0.2);
    margin-bottom:20px;
}
.info-box{
    background-color:#FFFFFF;
    border-radius:20px;
    padding:20px;
    box-shadow:0 4px 8px rgba(0,0,0,0.2);
    margin-bottom:15px;
}
.error-box{
    background-color:#fff3f3;
    border-left:6px solid #CC0033;
    padding:15px;
    margin-bottom:15px;
    color:#CC0033;
}
#loginBox{
    display:none;
}

</style>
<script>
function oldAnnouncements() {
    alert("Older announcements would open here.");
}
</script>
</head>
<body>

<div class="nav">
    <a href="index.html">Home</a>
    <a href="about.html">About</a>
    <a href="events.html">Events</a>
    <a href="members.html">Members</a>
    <a href="announcements.php">Announcements</a>
    <a href="contact.html">Contact</a>
</div>

<div class="hero">
    <h1>Announcements</h1>
    <p>Latest club updates and notices</p>
</div>

<div class="container">

    <?php if (isset($db_error)): ?>
        <div class="error-box">
            <strong>Error:</strong> <?php echo htmlspecialchars($db_error); ?>
        </div>

    <?php elseif (empty($announcements)): ?>
        <div class="announcement">
            <p>No announcements at this time. Check back soon!</p>
        </div>

    <?php else: ?>
        <?php foreach ($announcements as $a): ?>
            <div class="announcement">
                <h2>
                    <?php echo htmlspecialchars($a['title']); ?>
                    &mdash;
                    <?php echo htmlspecialchars($a['date_posted']); ?>
                </h2>
                <p><?php echo htmlspecialchars($a['body']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="card">
        <input class="btn" type="button" value="Click to view older announcements" onclick="oldAnnouncements()">
    </div>

</div>

<div class="footer">
    <p>Club Resources</p>
    <a href="index.html">Home</a> |
    <a href="events.html">Events</a> |
    <a href="members.html">Members</a> |
    <a href="contact.html">Contact</a>
</div>

</body>
</html>

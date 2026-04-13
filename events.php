<?php
// events.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Events</title>
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
.event-box{
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
    font-weight:bold;
}
.btn:hover{
    background-color:#2F6678;
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
label{
    display:block;
    font-weight:bold;
    margin-top:12px;
}
input[type="text"],
input[type="email"],
input[type="number"]{
    width:100%;
    border:1px solid #333;
    box-sizing:border-box;
    padding:10px;
    margin-top:5px;
    margin-bottom:10px;
    border-radius:6px;
}
details{
    margin-top:15px;
}
summary{
    list-style:none;
}
summary::-webkit-details-marker{
    display:none;
}
.form-card{
    border:1px solid #dddddd;
    border-radius:14px;
    padding:18px;
    margin-top:15px;
    background-color:#fafafa;
}
.note{
    font-size:14px;
    color:#444444;
    margin-top:8px;
}
</style>
</head>
<body>

<div class="nav">
    <a href="index.html">Home</a>
    <a href="about.html">About</a>
    <a href="events.php">Events</a>
    <a href="members.html">Members</a>
    <a href="announcements.html">Announcements</a>
    <a href="contact.html">Contact</a>
</div>

<div class="hero">
    <h1>This Semester's Events</h1>
    <p>View upcoming club activities and register.</p>
</div>

<div class="container">

    <div class="event-box">
        <h2>Event 1</h2>
        <p><strong>Career Panel Night</strong></p>
        <p>September 18, 2026 at 6:00 PM</p>
        <p>Rutgers Business School</p>

        <details>
            <summary><button class="btn" type="button">Open Registration</button></summary>
            <div class="form-card">
                <form action="submitevent.php" method="POST">
                    <input type="hidden" name="eventName" value="Career Panel Night">

                    <label for="netid1">NetID</label>
                    <input type="text" id="netid1" name="netid" placeholder="Enter your NetID" required>

                    <label for="email1">Email</label>
                    <input type="email" id="email1" name="email" placeholder="Enter your email" required>

                    <label for="gradYear1">Year of Graduation</label>
                    <input type="number" id="gradYear1" name="gradYear" placeholder="Enter graduation year" min="2026" max="2100" required>

                    <label for="major1">Major</label>
                    <input type="text" id="major1" name="major" placeholder="Enter your major" required>

                    <input class="btn" type="submit" value="Register for Career Panel Night">
                </form>
                <p class="note">This form sends netid, email, event name, year of graduation, and major to submit.php.</p>
            </div>
        </details>
    </div>

    <div class="event-box">
        <h2>Event 2</h2>
        <p><strong>Resume and LinkedIn Workshop</strong></p>
        <p>October 2, 2026 at 5:30 PM</p>
        <p>Room 220</p>

        <details>
            <summary><button class="btn" type="button">Open Registration</button></summary>
            <div class="form-card">
                <form action="submitevent.php" method="POST">
                    <input type="hidden" name="eventName" value="Resume and LinkedIn Workshop">

                    <label for="netid2">NetID</label>
                    <input type="text" id="netid2" name="netid" placeholder="Enter your NetID" required>

                    <label for="email2">Email</label>
                    <input type="email" id="email2" name="email" placeholder="Enter your email" required>

                    <label for="gradYear2">Year of Graduation</label>
                    <input type="number" id="gradYear2" name="gradYear" placeholder="Enter graduation year" min="2026" max="2100" required>

                    <label for="major2">Major</label>
                    <input type="text" id="major2" name="major" placeholder="Enter your major" required>

                    <input class="btn" type="submit" value="Register for Resume and LinkedIn Workshop">
                </form>
                <p class="note">Each event passes its own event name as a variable to the backend.</p>
            </div>
        </details>
    </div>

    <div class="event-box">
        <h2>Event 3</h2>
        <p><strong>Member Social Mixer</strong></p>
        <p>October 16, 2026 at 7:00 PM</p>
        <p>Student Center</p>

        <details>
            <summary><button class="btn" type="button">Open Registration</button></summary>
            <div class="form-card">
                <form action="submitevent.php" method="POST">
                    <input type="hidden" name="eventName" value="Member Social Mixer">

                    <label for="netid3">NetID</label>
                    <input type="text" id="netid3" name="netid" placeholder="Enter your NetID" required>

                    <label for="email3">Email</label>
                    <input type="email" id="email3" name="email" placeholder="Enter your email" required>

                    <label for="gradYear3">Year of Graduation</label>
                    <input type="number" id="gradYear3" name="gradYear" placeholder="Enter graduation year" min="2026" max="2100" required>

                    <label for="major3">Major</label>
                    <input type="text" id="major3" name="major" placeholder="Enter your major" required>

                    <input class="btn" type="submit" value="Register for Member Social Mixer">
                </form>
                <p class="note">Ready to connect to a MySQL table on your server.</p>
            </div>
        </details>
    </div>

</div>

<div class="footer">
    <p>Club Resources</p>
    <a href="index.html">Home</a> |
    <a href="events.php">Events</a> |
    <a href="members.html">Members</a> |
    <a href="contact.html">Contact</a>
</div>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EduHub | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

     <link rel="stylesheet" href="./asset/css/styles.css">
</head>
<body>

<body>
                 
    <header class="header">
    <a href="#" class="logo">EduHub.com</a>
    <nav class="nav-items">
      <a href="UHome">Home</a>
       <a href="browsecourse">Browse Courses</a>
       <a href="EnrolledCourses">Your Courses</a>
       <a href="usersettings">Settings</a>

    </nav>
  </header>
 
  <?php
session_start();  
if (!isset($_SESSION['user'])) {
    echo 'not logged in ';
    exit();
}?>
  <div class="logout" style="text-align: right;">
        <span>Logged in as <?=$user['username'] ?>! <a href="Logout">Logout</a></span>
        </div> </div>
      <center>  <h2 style="color: #333;">Welcome, <?= $user['username'] ?>!</h2>
</center> 
        <div class="main-content" style="padding: 20px; text-align: center; display:block ">
    <div class="profile-section" style="background: #f5f5f5; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: left; margin: 20px auto; max-width: 400px;">
        <h3 style="color: #444; margin-bottom: 20px;">Your Profile</h3>
        <p>Name: <?= $user['username'] ?></p>
        <p>Email: <?= $user['email'] ?></p>
        <p>Phone: <?= $user['phone'] ?></p>
        <p>Age: <?= $user['age'] ?></p>
        <p>City: <?= $user['city'] ?></p>
    
        <div class="settings" style="text-align: center;">
         <button onclick="location.href='iupdate'" class="submit-button" style="margin: 10px; padding: 10px 20px; font-size: 16px; border-radius: 15px; background-color: #000; color: #fff; border: 2px solid goldenrod; cursor: pointer;">Update</button>
    </div>
    </div>
    </div>
  
</div>
    <footer class="footer">
        <div class="copy">&copy; EduHub@asif-sayyed</div>
        <div class="bottom-links">
            <div class="links">
                <span>More </span> <a href="UHome">Home</a> <a href="usersettings">Settings</a> <a href="Logout">Logout</a>
            </div>
            <div class="links">
                <span>Social Links</span>

                <a href="https://github.com/as-if-codes"><i class="fab fa-github"></i></a>
                <a href="https://www.linkedin.com/in/asif-sayyedsd"><i class="fab fa-linkedin"></i></a>
                <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>

            </div>
        </div>
    </footer>        
</body>
</html>

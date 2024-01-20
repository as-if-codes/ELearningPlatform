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
<div class="main-content" style="padding: 20px 50px 20px 40px; text-align: center; display:block ">
    <div class="profile-section" style="background: #f5f5f5; padding: 20px 50px 20px 40px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: left; margin: 20px auto; max-width: 400px;">
        <h3 style="color: #444; margin-bottom: 20px;">Your Profile</h3>
        
        <form action="update" method="post" style="display: grid; gap: 10px; max-width: 400px; margin: 0 auto;">
    <label for="username" style="font-weight: bold;">Name:</label>
    <input type="text" id="username" name="username" value="<?= $user['username'] ?>" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; width: 100%;">

    <label for="email" style="font-weight: bold;">Email:</label>
    <input type="email" id="email" name="email" value="<?= $user['email'] ?>" required style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; width: 100%;">

    <label for="phone" style="font-weight: bold;">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?= $user['phone'] ?>" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; width: 100%;">

    <label for="age" style="font-weight: bold;">Age:</label>
    <input type="text" id="age" name="age" value="<?= $user['age'] ?>" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; width: 100%;">

    <label for="city" style="font-weight: bold;">City:</label>
    <input type="text" id="city" name="city" value="<?= $user['city'] ?>" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; width: 100%;">

    <button type="submit" class="submit-button" style="margin: 10px; padding: 10px 20px; font-size: 16px; border-radius: 15px; background-color: #000; color: #fff; border: 2px solid goldenrod; cursor: pointer;">Update</button>
</form>

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

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
        $data['user'] = session()->get('user');

        if (!isset($_SESSION['user'])) {
            echo 'not logged in ';
            exit();
        }
    ?>
    <div class="logout" style="text-align: right;">
        <span>Logged in as <?=$data['user']['username'] ?>! <a href="Logout">Logout</a></span>
    </div>
    <div class="main-content" style="flex: 2; display: flex; flex-direction: row; align-items: flex-start;">
    <div style="width: 30%; text-align:center; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f5f5f5; margin: 20px;">
    <h3 style="color: goldenrod;">All Modules:</h3>
    <p>Select the module you have finished</p>

    <?php foreach ($modules as $module) : ?>
        <form action="updateModuleStatus" method="post" style=" overflow-wrap: anywhere; margin-top: 10px; display: inline-block;">
            <button type="submit" name="selected_module" value="<?= $module['module_id'] ?>" style="    width: 150px;margin-right: 5px; padding: 10px; border-radius: 5px; background-color: #000; color: #fff; border: 2px solid goldenrod; cursor: pointer;">
                <?= $module['title'] ?>
            </button>
            <input type="hidden" name="course_id" value="<?= $courseId ?>">
        </form><br>
    <?php endforeach; ?>
</div>


<!-- Module Display Section -->
<div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
    <?php $x = 1; ?>
    <?php foreach ($modules as $module) : ?>
        <div class="module-card" id="module<?= $x ?>" style="width: 60%; margin: 10px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <h2><?= $x . ". " . $module['title'] ?></h2>
            <video id="video<?= $x ?>" width="100%" height="auto" controls onended="playNextVideo(<?= $x ?>)">
                <source src="moduleContent/<?= $courseId ?>/<?= $module['content'] ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <?php $x = $x + 1; ?>
    <?php endforeach; ?>
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
        <style>
       
        

        .main-content {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            margin: 20px;
        }
 
        .module-section {
            width: 45%;

            display: flex;
            flex-direction: column;
        }

        .module-card {
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .module-card h2 {
            margin-top: 0;
        }

        .module-card p {
            margin: 10px 0;
        }

        .file-input {
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 15px;
            background-color: #000;
            color: #fff;
            border: 2px solid goldenrod;
            cursor: pointer;
        }

      
    </style>
    </footer>  
</body>
</html>

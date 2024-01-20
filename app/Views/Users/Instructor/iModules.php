<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EduHub  </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

     <link rel="stylesheet" href="./asset/css/styles.css">
</head>
<body>
<header class="header">
    <a href="#" class="logo">EduHub.com</a>
    <nav class="nav-items">
      <a href="UHome">Home</a>
        <a href="Courses">My Course</a>
       <a href="UHome#create-course">Add Course</a>
       <a href="usersettings">Settings</a>
       <a href="Insights">Insights</a>
       
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

    <div class="main-content">
        <!-- Form Section -->
        <div class="form-section" id="moduleModal">
            <h2>Add Module</h2>
            <form action="addModules" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $courseId ?>" id="courseId" name="course_id">
                <label for="module_order">Module Order:</label><br>
                <input type="number" id="module_order" name="module_order" required><br><br>

                <label for="title">Module Title:</label><br>
                <input type="text" id="title" name="title" required><br><br>
              
                    <label for="video_file">Select Video File:</label>  <div class="file-input">
                    <input type="file" id="video_file" name="video_file" accept="video/*" required>
                </div>
                <br><br>

                <button type="submit">Add Module</button>
            </form>
        </div>

        <div class="module-section">
         <?php $x = 1; ?>
         <?php foreach ($modules as $module) : ?>
    <div class="module-card">
        <h2><?= $x . ". " . $module['title'] ?></h2>
        <video width="320" height="240" controls>
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

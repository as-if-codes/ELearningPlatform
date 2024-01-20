<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EduHub | Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

     <link rel="stylesheet" href="./asset/css/styles.css">
</head>
<body>

<body>
                 
    <header class="header">
    <a href="#" class="logo">EduHub.com</a>
    <nav class="nav-items">
      <a href="/">Home</a>
       <a href="/">Courses</a>
       <a href="./Login">Login</a>
       <a href="./Register">Register</a>
     </nav>
  </header>
   
    

    <div class="main-content">
        
    <div class="form-section" id="moduleModal">
        <div class="module-card">
        <h2 style="color:gold;">Course Details</h2>
        <div class="course-grid">
            <div class="course-card">
                <h2>  <?= $course['course_title']; ?></h2>
                <h3>  <?= $course['description']; ?></h3>
                <h3>Instructor : <?= $course['instructor_name']; ?></h3>
                
                <form action="loginplz" method="post">
                    <input type="hidden" name="course_id" value="<?= $course['course_id']; ?>">
                    <button type="submit" class="add-module-button">Enroll</button>
                </form>
             </div>
     </div></div>
        </div>

        <div class="module-section">
    <?php $x = 1; ?>
    <?php foreach ($modules as $module) : ?>
        <?php if ($x <= 2): ?>   
            <div class="module-card">
                <h2><?= $x . ". " . $module['title'] ?></h2>
                <video width="320" height="240" controls>
                    <source src="moduleContent/<?= $courseId ?>/<?= $module['content'] ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        <?php endif; ?>  
        <?php $x = $x + 1; ?>
    <?php endforeach; ?>
    <h2>Enroll to course to view all  <?=$x-1 ?> course modules</h2>
</div>



    </div>
    <footer class="footer">
        <div class="copy">&copy; EduHub@asif-sayyed</div>
        <div class="bottom-links">
            <div class="links">
            <span>More </span> <a href="home">Home</a> <a href="">About</a> <a href="">Contact</a>
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

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
        <h1>Welcome to our E-Learning Platform</h1>
        <h3>Discover and enroll in courses that interest you.</h3>
 
        <div class="featured-courses">
            <h2>Featured Courses</h2>
            <div class="course-grid" >
        <?php foreach ($courses as $course): ?>
            <div class="course-card" style="background-color: #bdadcb;">
                <h2><?= $course['course_title']; ?></h2>
                <p><?= $course['description']; ?></p>
                 <form action="courseViewLogout" method="post" >

                     <input type="hidden" name="course_id" value="<?= $course['course_id']; ?>">
                    
                    <button type="submit" class="add-module-button">View course</button>
                </form>
             </div>
        <?php endforeach; ?>
    </div>        </div>
    </div>
    <style>
    .course-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.course-card {
    display: inline-grid;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
}

.course-card h2 {
    margin-top: 0;
}

button {
    padding: 10px 20px; 
                    font-size:16px; border-radius: 15px; background-color: #000; color: #fff; 
                    border: 2px solid goldenrod; cursor: pointer;
}

</style>
  
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
    </footer>    
    
</body>
</html>

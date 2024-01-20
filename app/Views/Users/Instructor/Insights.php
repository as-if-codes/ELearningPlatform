<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EduHub </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

     <link rel="stylesheet" href="./asset/css/styles.css">
</head>
<body>

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
  
<h1 style="text-align: center; color: #333;">Course Insights</h1>

<?php if (!empty($courseInsights['insights'])): ?>
    <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">Course Title</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">Description</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">Enrollment Date</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">Progress</th>
            <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">User Details</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($courseInsights['insights'] as $insight): ?>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?= $insight['course_title'] ?></td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?= $insight['description'] ?></td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?= $insight['enrollment_date'] ?></td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><?= $insight['progress'] ?>%</td>
                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                    <strong>User ID:</strong> <?= $insight['user_id'] ?><br>
                    <strong>Username:</strong> <?= $insight['username'] ?><br>
                    <strong>Email:</strong> <?= $insight['email'] ?><br>
                    <strong>Age:</strong> <?= $insight['age'] ?><br>
                    <strong>Phone:</strong> <?= $insight['phone'] ?><br>
                    <strong>City:</strong> <?= $insight['city'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p style="text-align: center; color: #555;">No course insights available.</p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php endif; ?>

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

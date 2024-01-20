<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EduHub | Register </title>
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

            <div class="featured-courses">
            <form action="uRegistration" method="post">
    <label for="username">Name:</label>
    <input type="text" id="username" name="username" required pattern="[A-Za-z\s]+" title="Only alphabets and spaces are allowed" class="input-field"><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required class="input-field">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required class="input-field">
    <br>
    <label for="user_role">User Role:</label>
    <select id="user_role" name="user_role" required class="input-field">
        <option value="student">Student</option>
        <option value="instructor">Instructor</option>
    </select><br>

    <label for="age">Age:</label>
    <input type="number" id="age" name="age" class="input-field" required>
    <br>
    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" pattern="\d{10}" title="Please enter a valid 10-digit phone number" class="input-field" required>
    <br>
    <label for="city">City:</label>
    <input type="text" id="city" name="city" pattern="[A-Za-z\s]+" title="Only alphabets and spaces are allowed" class="input-field" required>
    <br>
    <input type="submit" value="Submit" class="submit-button" style="padding: 10px 20px; 
    font-size:16px; border-radius: 15px; background-color: #000; color: #fff; 
    border: 2px solid goldenrod; cursor: pointer;">
</form>
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
        </footer>

    </body>

</html>
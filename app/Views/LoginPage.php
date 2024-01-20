<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EduHub | Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="./asset/css/styles.css">
</head>

 

        <header class="header">
            <a href="#" class="logo">EduHub.com</a>
            <nav class="nav-items">
                <a href="/">Home</a>
                <a href="/">Courses</a>
                <a href="./Login">Login</a>
                <a href="./Register">Register</a>
             </nav>
        </header>

        <body>
        <div class="main-content">
            <h2>Login</h2>
            <div class="featured-courses">
                <form action="uLogin" method="post">

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required class="input-field">
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required class="input-field">
                    <br>

                    <input type="submit" value="Submit" class="submit-button"
                        style="padding: 10px 20px; font-size: 16px; border-radius: 15px; background-color: #000; color: #fff; border: 2px solid goldenrod; cursor: pointer;">
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
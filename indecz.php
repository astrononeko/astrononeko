<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tedt - Main page</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Newsreader&family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="rezet.css">
    <link rel="stylesheet" type="text/css" href="ztyle.css">
    <link rel="shortcut icon" href="favicon.png">
    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Main</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section>
            <?php 
                $name = getenv("username");
                echo "<center><h1>Hello $name!</h1></center>";
                echo "<div class='auth_form'>";
                    require_once "auth_form.php";
                echo "</div>";
            ?>
            
        </section>
        <aside>
            <form class="log-in" action="post">
                <h2>Sign in</h2>
                <input type="text" id="login" placeholder="Login">
                <input type="password" id="password" placeholder="Password">
                <span><input type="checkbox" id="remember"><label for="remember"> Remember</label><span><a href="#">Forgot something?</a></span></span>
                <input type="submit" value="Login">
                <input type="button" value="Sign up">
            </form>
            <div class="manage">
                <div class="profile">
                    <div class="back"></div>
                    <img src="img/profile-image.png" alt="profile image">
                </div>
                <p>Scarlett Shooter</p>
                <ul>
                    <li><a href="#">Messenger</a></li>
                    <li><a href="#">Homework repository</a></li>
                    <li><a href="#">Friends</a></li>
                    <li><a href="#">Bookmarks</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Log out</a></li>
                </ul>
            </div>
            <div class="links">
                <h2>Useful links</h2>
                <ul>
                    <li><a href="#">IT</a></li>
                    <li><a href="#">Math</a></li>
                    <li><a href="#">Physics</a></li>
                    <li><a href="#">Chemistry</a></li>
                    <li><a href="#">Biology</a></li>
                    <li><a href="#">Geography</a></li>
                    <li><a href="#">Astronomy</a></li>
                    <li><a href="#">Other</a></li>
                </ul>
            </div>
            <div class="vk" id="vk_groups">
            </div>
        </aside>
    </main>

    <footer>
        <p>Copyright &copy 2021 by <a href="mailto:kosmelf98@gmail.com">scrl0</a></p>
    </footer>

    <script type="text/javascript">
        VK.Widgets.Group("vk_groups", {mode: 3, width: "auto"}, 20003922);
    </script>
</body>
</html>
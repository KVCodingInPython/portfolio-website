<?php

session_start();

$logged_in = isset($_SESSION['email']);
?>

<html lang="en">
<head>
     <!-- Roboto, Montserrat fonts 5 - 7 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "../css/reset.css"/>
    <link rel = "stylesheet" href = "../css/login.css"/>

    <!-- Media queries/ responsive scaling for mobile, tablet and desktop/laptop devices-->
    <link rel = "stylesheet" href = "../css/login-mobile.css" media = "screen and (min-width:320px) and (max-width: 768px)" />
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <article>
        <div class = "grid-container">
            <section id = "navbar">
                <div class = "nav-container">
                    <div> <h1> Login </h1> </div>
                    <nav>
                        <ul>
                            <?php if ($logged_in): ?>
                                    <div> <li> <a href = "../php/logout.php"> Logout </a> </li> </div>
                                <?php endif; ?>
                            <div> <li> <a href = "../php/index.php"> Homepage </a> </li> </div>
                            <div> <li> <a href = "../php/education.php"> Education </a> </li> </div>
                            <div> <li> <a href = "../php/skills.php"> Skills </a> </li> </div>
                            <div> <li> <a href = "../php/portfolio.php"> Portfolio </a> </li> </div>
                            <div> <li> <a href = "../php/viewBlog.php"> Blog </a> </li> </div>
                            <div> <li> <a href = "../php/contact.php"> Contact </a> </li> </div>
                        </ul>
        
                    </nav>
                </div>
            </section>

            <div class = "welcome">
                <?php if ($logged_in): ?>
                    <aside> <h2> Welcome User </h2> </aside>
                <?php endif; ?>
            </div>

            <section id = "loginform">
                <form action = "../php/loginProcess.php" method = "post">
                    <fieldset>
                        <legend> Login </legend>
                        <p>
                        
                            <input type = "email" placeholder = "Email" name = "email" required/>
                            <br>

                            
                            <input type = "password" placeholder = "Password" name = "password" required/>
                            <br>

                        
                            <input type = "password" placeholder = "Confirm Password" name = "confirm_password" required/>
                            <br>
                            <button name = "submit" type = "submit" value = "Submit"> Login </button>
                        </p>
                    </fieldset>
                </form>
            </section>
            <section id = "footer">
                <footer>
                    <em> Kaloyan Velikov Copyright @2026</em>
                </footer>
            </section>
        </div>
    </article>
    
</body>
</html>
<?php

session_start();

$logged_in = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Importing icons (email + Linkedin) from font awesome: https://fontawesome.com/icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Inter font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Roboto, Montserrat font, 10-12 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "../css/reset.css"/>
    <link rel = "stylesheet" href = "../css/index.css"/>

     <!-- Media queries/ responsive scaling for mobile, tablet and desktop/laptop devices-->
     <link rel = "stylesheet" href = "../css/index-mobile.css" media = "screen and (min-width:320px) and (max-width: 768px)" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <article>
        <section id = "navbar">
                <div class = "nav-container">
                    <div> <h1> Kaloyan Velikov </h1> </div>
                    <nav>
                            <ul>
                                <?php if ($logged_in): ?>
                                    <div> <li> <a href = "../php/logout.php"> Logout </a> </li> </div>
                                <?php else: ?>
                                    <div> <li> <a href = "../php/login.php"> Login </a> </li> </div>
                                <?php endif; ?>
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

        <section id = "aboutMe">
            <h2> About Me </h2>
            <div class = "about_me">
                <aside>
                    <div>
                        <p>
                            My name is Kaloyan Velikov, I am currently a 1st year student reading Computer Science at Queen Mary University of London.
                        </p>
                        <p>
                            I am currently interested in software engineering, machine learning, and theory of computation.
                        </p>
                        <p>
                            I enjoy building projects related to my current studies such as websites and software to improve my technical skills.
                        </p>
                        <p>
                            In the future, I hope to pursue a career in software engineering.
                        </p>
                        <p>
                            Outside of my studies, I enjoy running, calisthenics, Mathematics, and gaming.
                        </p>
                    </div>
                </aside>
            </div>
        </section>

        <section id = "footer">
            <div class = "footer">
                <footer>
                    <div>   
                        <p>
                            <em> Kaloyan Velikov Copyright @ 2026 </em> 
                        </p>
                    </div>
                    <div> <a href = "../php/contact.php">Contact Me </a> </div>
                    <div> <a href="mailto:kaloyanvelikov8@gmail.com" class="icon email">
                            <i class="fa-solid fa-envelope">
                            </i>
                          </a>
                    </div>
                </footer>
            </div>
        </section>

    </article>
    
</body>
</html>
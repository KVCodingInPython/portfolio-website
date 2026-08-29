<?php

session_start();

$logged_in = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Importing icons (email + Linkedin) from font awesome: https://fontawesome.com/icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
     <!-- Roboto, Montserrat fonts 7 - 9 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Reset stylesheet and stylesheet for contact.html-->
    <link rel = "stylesheet" href = "../css/reset.css"/>
    <link rel = "stylesheet" href = "../css/contact.css"/>

    <!-- Media queries/ responsive scaling for mobile, tablet and desktop/laptop devices-->
    <link rel = "stylesheet" href = "../css/contact-mobile.css" media = "screen and (min-width:320px) and (max-width: 768px)" />
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <article>
        <div class = "grid-container">
            <section id = "navbar">
                <div class = "nav-container">
                    <div> <h1> Contact Me </h1> </div>
                    <nav>
                        <ul>
                            <?php if ($logged_in): ?>
                                    <div> <li> <a href = "../php/logout.php"> Logout </a> </li> </div>
                                <?php else: ?>
                                    <div> <li> <a href = "../php/login.php"> Login </a> </li> </div>
                                <?php endif; ?>
                            <div> <li> <a href = "../php/index.php"> Homepage </a> </li> </div>
                            <div> <li> <a href = "../php/education.php"> Education </a> </li> </div>
                            <div> <li> <a href = "../php/skills.php"> Skills </a> </li> </div>
                            <div> <li> <a href = "../php/portfolio.php"> Portfolio </a> </li> </div>
                            <div> <li> <a href = "../php/viewBlog.php"> Blog </a> </li> </div>
                        </ul>
                    </nav>
                </div>
            </section>

            <div class = "welcome">
                <?php if ($logged_in): ?>
                    <aside> <h2> Welcome User </h2> </aside>
                <?php endif; ?>
            </div>

            <section id = "contact">
                <div class = "email">
                    <h3> Email </h3>
                    <p>
                        <div class = "email_content">
                            <div> <a href="mailto:kaloyanvelikov8@gmail.com" class="icon email">
                                <i class="fa-solid fa-envelope">
                                </i>
                                </a>
                            </div>
                            <div> <a href = "mailto:kaloyanvelikov8@gmail.com" attr = ""> kaloyanvelikov8@gmail.com </a> 
                            </div>
                        </div>
                    </p>
                </div>
                <br>
                <div class = "Linkedin">
                    <h3> LinkedIn </h3>
                    <p>
                        <div class = "linkedin_content">
                            <div> 
                                <i class="fa-brands fa-linkedin">
                                </i>
                            </div>

                            <div> <a href = "https://www.linkedin.com/in/kaloyan-velikov-652860284/" attr = "" > LinkedIn</a> </div>
                        </div>
                    </p>
                </div>

                <div class = "Github">
                    <h3> Github </h3>
                    <p>
                        <div class = "github_content">

                            <div> <a href = "https://github.com/KVCodingInPython" class = "icon github">
                                <i class = "fa-brands fa-github">
                                </i>
                                </a>
                            </div>
                            <div> <a href = "https://github.com/KVCodingInPython" attr = "" > GitHub </a> </div>
                        </div>
                            
                    </p>
                </div>

            </section>
            <section id = "footer">
                <footer>
                    <em> Kaloyan Velikov Copyright @2026 </em>
                </footer>
            </section>
        </div>
    </article>
    
</body>
</html>
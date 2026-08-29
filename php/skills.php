<?php 

session_start();
$logged_in = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Open Sans Google Font 5-7 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Roboto, Montserrat Google fonts 5-7 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <link rel = "stylesheet" href = "../css/reset.css"/>
    <link rel = "stylesheet" href = "../css/skills.css"/>

    <!-- Media queries/ responsive scaling for mobile, tablet and desktop/laptop devices-->
    <link rel = "stylesheet" href = "../css/skills-mobile.css" media = "screen and (min-width:320px) and (max-width: 768px)" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <article>
        <div class = "grid-container">
            <section id = "navbar">
                <div class = "nav-container">
                    <div> <h1> Skills </h1> </div>
                        <nav>
                            <ul>
                                <?php if ($logged_in): ?>
                                    <div> <li> <a href = "../php/logout.php"> Logout </a> </li> </div>
                                <?php else: ?>
                                    <div> <li> <a href = "../php/login.php"> Login </a> </li> </div>
                                <?php endif; ?>
                                <div> <li> <a href = "../php/index.php"> Homepage </a> </li> </div>
                                <div> <li> <a href = "../php/education.php"> Education </a> </li> </div>
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

            <section id = "skills_header">
                <div> <h2> Skills </h2> </div>
            </section>
            
            <p>
            <div class = "skills">
                
                <ul>

                     <li> Java 
                     <div class = "bar">
                        <div class = "fill java"> </div>
                     </div>
                     </li>
                     <li> Python 
                     <div class = "bar">
                        <div class = "fill python"> </div>
                     </div>
                     </li>
                     <li> HTML 
                     <div class = "bar">
                        <div class = "fill html"> </div>
                     </div>
                     </li>
                     <li> CSS  
                     <div class = "bar">
                        <div class = "fill css"> </div>
                     </div>
                     </li>
                     <li> SQL 
                     <div class = "bar">
                        <div class = "fill sql"> </div>
                     </div>
                     </li>
                     <li> Logical thinking 
                     <div class = "bar">
                        <div class = "fill logic"> </div>
                     </div>
                     </li>
                     <li> Critical thinking 
                     <div class = "bar">
                        <div class = "fill critical"> </div>
                     </div>
                     </li>
                 </ul>
            </div>

            </p>
            <section id = "footer">
                <footer>
                    <p>
                        <em> Kaloyan Velikov Copyright @ 2026 </em>
                    </p>
                </footer>
            </section>
        </div>
    </article>
    
</body>
</html>
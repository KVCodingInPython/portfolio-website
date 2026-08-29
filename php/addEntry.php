<?php

session_start();

$logged_in = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Roboto, Montserrat fonts 5 - 7 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel = "stylesheet" href = "../css/reset.css"/>
    <link rel = "stylesheet" href = "../css/addEntry.css"/>

    <!-- Media queries/ responsive scaling for mobile, tablet and desktop/laptop devices-->
    <link rel = "stylesheet" href = "../css/addEntry-mobile.css" media = "screen and (min-width:320px) and (max-width: 768px)" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <article>
        <div class = "grid-container">
            <section id = "navbar">
                <div class = "nav-container">
                    <div> <h1> Blog </h1></div>
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

            <section id = "blog_form">
                <form id = "blogForm" action = "../php/addPost.php" method = "post">
                    <fieldset>
                        <legend> Add Blog </legend>
                        <p>
                        
                            <br>
                            <input type = "text" placeholder = "Title" id = "title" name = "title"/>
                            <br>
                        
                            <br>
                            <textarea name = "content" placeholder = "Enter your text here" id = "text"></textarea>
                            <br>
                            <button name = "Submit" type = "submit" value = "Submit" id = "submit">Post</button>
                            <button name = "Clear" type = "reset" id = "clear"> Clear </button>
                        </p>
                    </fieldset>
                </form>
                <script src = "../js/addEntry.js"> </script>
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
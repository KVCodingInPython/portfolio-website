<?php 
session_start();
$logged_in = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Roboto and Montserrat Google fonts 5-7 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel = "stylesheet" href = "../css/reset.css"/>
    <link rel = "stylesheet" href = "../css/portfolio.css"/>

    <!-- Media queries/ responsive scaling for mobile, tablet and desktop/laptop devices-->
    <link rel = "stylesheet" href = "../css/portfolio-mobile.css" media = "screen and (min-width:320px) and (max-width: 768px)" />
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <article>
        <div class = "grid-container">
            <section id = "navbar">
                <div class = "nav-container">
                    <div> <h1> Portfolio </h1> </div>
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

            <section id = "portfolio">
                    <h2> My Portfolio </h2>
                    <div class = "Portfolio">
                        <p>
                            <article class = "project">
                                <figure>
                                    <img src = "../images/Java.jpg" alt = "Java"> 
                                    <figcaption> <em> Image by medium.com: <a href = "https://medium.com/code-dementia/java-the-most-preferable-language-over-other-languages-43990c8dcdd1"> Media.com </em> </a> </figcaption>
                                </figure>

                                <div class = "project-info">
                                    <h2> Chocolate Chili Game - Machine Learning  (Java) </h2>
                                    <p>
                                        The Chocolate Chili Game is a 'Nim' style game where the player and computer
                                        take it in turns to eat either 1, 2, or 3 chocolates. The player decides using
                                        a die roll, whereas the computer decides based on its own supervised learning.
                                        The loser, the player who has 0 chocolates on the table, eats the chili.
                                        <br>
                                        This game is inspired by the 'Sweet Learning Computer', more can be read here:
                                        <a href = "https://teachinglondoncomputing.org/the-sweet-learning-computer/"> The Sweet Learning Computer </a>
                                        <br>
                                        The link to the following project is here: 
                                        
                                        <a href = "https://github.com/KVCodingInPython/Chocolate-Chili-Machine-Learning---Java">Chocolate Chili Machine Learning Game</a>
                                    </p>
                                </div>
                            </article>
                        </p>
                    </div>

                    <p>
                        <article class = "project">

                            <figure>
                                <img src = "../images/assembly.jpg" alt = "Assembly"/> 
                                <figcaption> <em> Image by icons8.com: <a href = "https://icons8.com/icon/gVK745a4Vaur/assembly"> icons8.com </em></a></figcaption>
                            </figure>
                        

                            <div class = "project-info">
                                <h2> DNS Decoder Algorithm - Computer Systems and Networks (Assembly) </h2>
                                <p>
                                    I have programmed an algorithm using MIPS 32 bit assembly language, which
                                    takes as an input, a DNS packet, it is checked if it is a valid packet,
                                    then, the packet is split, characters are copied to a new memory address,
                                    using a pointer, which moves through the string of characters. The output,
                                    is the URL equivalent to the DNS packet.
                                    Read more about DNS decoding here:
                                    <a href = "https://medium.com/@samarth_04/decoding-dns-bit-by-bit-7e68aa620e2f"> DNS Decoding Guide </a>
                                    <br>
                                    The link to the following project is here: 
                                    <a href = "https://github.com/KVCodingInPython/DNS-decoder-Assembly">DNS Decoding Algorithm</a>
                                </p>
                            </div>
                        </article>
                    </p>
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
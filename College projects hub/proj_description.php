<!DOCTYPE html>
<html>
    <head>
        <title>Project Description</title>
        <meta charset="utf-8">
        <meta name="author" content="Sudarshan Bhat">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="proj_description.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
    <?php  
        session_start();  
        include_once('class.operations.php');
        $obj7 = new operations();
    ?>
    <div id="particles-js">
        <div class="highlight">
        <div id="login">
        <header >
        <div>
            <div>
                <nav id="header">
                <ul>
                <li> 
                <a id="home" href="Main_page.php">MAIN PAGE</a>
                </li>
                <li>
                <a id="home" href="Dashboard.php">DASHBOARD</a>
                </li>
                <li>
                <a id="home" href="proj_description.php">DESCRIPTION</a>
                </li>
                <li>
                <a id="home" href="About.php">ABOUT</a>
                </li>
                <li>
                <a id="home" href="logout_page.php">LOGOUT</a>
                </li>
                </ul> 
                </nav></div>
                <div id="header1">COLL-<span class="highlight">PRO-HUB</span></div>
        </div>
        </header>
            <section id="sec1">
                <div class="container1">
                    <div><p>Group Members :</p></div>
                        <div>
                        <?php
                            $members = $obj7->groupMembers($_SESSION['title']);
                            

                        ?>
                        </div>
                    <div><button class="gMembers">add members</button></div>
                </div>
                <!-- here is where the div2 starts -->
                <div class="container2">
                <div>
                    <h3>Description : </h3>
                    <p>The description goes here...</p>
                </div>
                </div>

                <div class="container3">
                <div id="chat-window">
                    <h3>chat-window : </h3>
                    <textarea name="chat-window" id="chat-window">group chat</textarea>
                </div>
                <div>
                    <input type="button" value="post">
                </div>
                </div>
            </section>

            <section id="sec2">
                <div id="progress">
                    <div id="progress-bar"><p>here we add our progress bar or completion percentage.</p></div>
                </div>
            </section>
        </div>
        
    </div>
        </div> 
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js">
    </script>
    <script>particlesJS.load('particles-js', 'particles.json',function(){console.log('applied');});</script>
    <footer id="footer"><div style="padding-left: 25px;">Coll-Pros-hub.org &copy;2019</div></footer>  
    </body>
</html>
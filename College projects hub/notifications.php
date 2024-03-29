<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="author" content="Sudarshan Bhat">
        <meta name="viewport" content="width=device-width">
        <?php session_start(); ?>
        <link rel="stylesheet" href="notifications.css">
        <link rel="JavaScript" href="Dashboard.js">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <!-- the below div is to load particle effect. -->
    <div id="particles-js">
        <div id="login">
            <header>
                <?php 
                    include_once('class.operations.php');
                    $notification = new operations();
                    
                ?>
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
                        <a id="home" href="notifications.php">NOTIFICATIONS</a>
                        </li>
                        <a id="home" href="About.php">ABOUT</a>
                        </li>
                        <li>
                        <a id="home" href="logout_page.php">LOGOUT</a>
                        </li>
                        
                        </ul> 
                        </nav>
                    </div>
                        <div id="header1">COLL-<span class="highlight">PRO-HUB</span></div>
                </div>
            </header> 
            <br>
            <br>
            <br>
            <div id="notificationArea">
                $notification->notifications($_SESSION['username']);
            </div>
            <footer id="footer"><div><p>Coll-Pros-hub.org &copy;2019</p></div></footer>
        </div> <!-- end of id="login"-->
    </div>     <!--end of id="particles-js" -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js">
    </script>
    <script>particlesJS.load('particles-js', 'particles.json',function(){console.log('applied');});</script>
    </body>
</html>

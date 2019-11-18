<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="author" content="Sudarshan Bhat">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="Dashboard.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <?php
            session_start();
            include_once('class.operations.php');
            $obj1 = new operations();
        ?>
    <script>
        function view()
        {
            document.getElementById("add_skill").style.display='block';
        }
        function view2()
        {
            document.getElementById("newProject").style.display="block";
        }
    </script>
    <div id="particles-js">
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
                <a id="home" href="notifications.php">NOTIFICATIONS</a>
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

            <section >
                <div class="container1">
                    <div class="container12">
<!-- this is where we can add all the contents so that the elements are put in the center. -->
                    </div>
                <div><p>Skill Sets</p></div>
                <div>
                    <?php 
                        $iter = $obj1->listSkills($_SESSION['username']);
                        foreach($iter as $res)
                            echo $res.'<br>';
                    ?>
                </div>
                <div class="btn0">
                <button onclick="view()">ADD SKILL</button><br><br><br>
                </div>


                <!-- overlay part starts here. -->

                <div id="add_skill">
                    <div class="add_skill2">

                    <form action="skill_driver.php" method="post">
                        <p>you can add as many skill as you posses!</p>
                        Add skill : <input type="text" name="skill" placeholder="skill">
                        <input type="submit" name="newSkill" class="add" value="add">
                    </form>
                    </div>
                    
                </div>

<!-- this is where i add new project. -->
                <div>
                <button 
                style=" cursor: pointer;background: transparent; 
                color:#fff; border:2px solid green; border-radius:5px;" 
                onclick="view2()">Start new project</button>
                </div>

                <div id="newProject">
                    <div class="newProject2">
                        <h3>project Details</h3><br>
                        <form name="" action="newProject_driver.php" method="post">
                            Title:<input type="text" name="title"><br>
                            Description:(don't press enter)<input type="textarea" name="description">
                            <input name="newProj" type="submit" value="submit"><br>
                            note: later on you will need to upload your project and
                             a unique link for the same will be made available.
                        </form>
                    </div>
                </div>
        </div>  <!-- end of container1-->

                <!-- here is where the div2 starts -->
                <!-- links should be made for every projects undertaken, this part is pending... 
                the idea is to get both project title and link to the project. instead of the description 
                    page-->
                <div class="container2">
                <div>
                    <h3>Projects undertaken:</h3>
                    <div class="projectUndertaken">
                        <?php
                        $projs = $obj1->projectsUndertaken($_SESSION['username']);
                        foreach($projs as $p)
                        {
                            echo '<br>'.$p.'<br>';
                            $html0 = '<form method="post" action="proj_description_driver.php">'.
                            '<input type="hidden" name="title" value="'.$p.'"><input style=" cursor: pointer;background: transparent; color:#fff;" type="submit" value="Resume project work"></form>';
                            echo($html0.'<br>');
                        }
                        ?>
                    </div>
                    
                </div>
            </div>

                <!-- Start of container3 [personal details part] -->
                <div class="container3">
                    <div>
                        <h3>Personal Details</h3>
                        <!-- all personal details are retreived here below. -->
                        <div class="allDetails">

                            <?php $details = $obj1->allDetails($_SESSION['username']); ?>

                            <h4 class="contact">contact:<?php echo '   '.$details[0].'<br>';?></h4>
                            <h4 class="email">email:<?php echo '   '.$details[1].'<br>';?></h4>
                            <h4 class="address">address: <?php echo '   '.$details[2].'<br>';?></h4>
                            <h4 class="college">college: <?php echo '   '.$details[3].'<br>';?></h4>

                        </div>
                    </div>
                </div>
            </section>
            <footer id="footer">
                <div>
                    <h3>Coll-Pros-hub.org &copy;2019</h3>
                    <p style="font-size:18px; font-weight:bold;">For any suggestions and support feel free to mail us at : 
                    <i class="fa fa-envelope">
                    <a href="mailto:sudarshanrbhat.srb2@gmail.com">collegeprojectshub.com</a></i>
                    </p>
                </div>
            </footer>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js">
    </script>
    <script>particlesJS.load('particles-js', 'particles.json',function(){console.log('applied');});</script>
    </div>       
    </body>
</html>

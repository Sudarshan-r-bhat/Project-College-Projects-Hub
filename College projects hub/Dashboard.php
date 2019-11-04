<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="author" content="Sudarshan Bhat">
        <meta name="viewport" content="width=device-width">
        <?php session_start(); ?>
        <link rel="stylesheet" href="Dashboard.css">
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
                    $sc = new operations();
                    $res = $sc->topScorers();
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
                        <a id="home" href="notifications.php">NOTIFICATONS</a>
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

            <div class="sf">
                    <form action="search_driver.php" method = "post">
                        <div id="search">
                            <!-- this part will have the search bar and the filters -->
                            <div id="formSearch">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?> method="post"">
                                <input class = "searchPane" type="search" name="title" placeholder="serach projects here">
                                <input class = "searchButton" type="submit"  value="search here">
                            </div>
                        </div><!--end of id="search" -->

                        <div id = "filter">
                            Java<input type = "checkbox" name = "java">
                            C<input type = "checkbox"name = "c">
                            Python<input type = "checkbox" name = "python">
                            ML<input type = "checkbox" name = "ml">
                            PHP<input type = "checkbox" name = "php">
                            Regex<input type = "checkbox" name = "regex">
                            SQl<input type = "checkbox" name = "sql">
                            Node-js<input type = "checkbox" name = "nodejs">
                            React-js<input type = "checkbox" name = "reactjs">
                            JS<input type = "checkbox" name = "js">
                            Swift<input type = "checkbox" name = "swift">
                            Go<input type = "checkbox" name = "go">
                            Android<input type = "checkbox" name = "android">
                            Ios<input type = "checkbox" name = "ios">
                            <input name="college" type="text" id="collegeFilter" placeholder="Enter the College name">
                        </div><!--end of id="filter" -->
                    </form><!--end of form -->

                        <div id="containers">
                            <section class="container1">
                                <div><p>Top Scorers</p></div>
                                <div id="topScorers">
                                    <?php
                                        $i = 0;
                                        foreach($res as $r)
                                        {
                                            echo '<br>'.++$i.' '.$r.'<br>';   //here we are displaying the index and the username.
                                        }
                                    ?>
                                </div>   <!--end of id="topScorers" -->
                            </section>   <!--end of class="container1" -->
                            <!-- here is where the div2 starts -->
                            <section class="container2">
                                <h3>Search results:</h3>
                                <div>
                                    <?php
                                        $searchResults = $_SESSION['searchResults'];
                                        foreach($searchResults as $sr)
                                        { 
                                            echo $sr.'<br>';
                                            if(strcmp($sr, 'go ahead and search!') != 0)
                                            {
                                                $html0 = '<form method="post" action="proj_description_driver.php">'.
                                                '<input type="hidden" name="title" value="'.$sr.'"><input style="background: transparent; color:#fff;" type="submit" value="click to visit"></form>';
                                                echo($html0.'<br>');
                                            }    
                                        }
                                        $_SESSION['searchResults'] = array('go ahead and search!');
                                    ?>
                                    
                                </div>
                                <div>

                                </div>
                            </section>   <!--end of class="container2" -->
                            <!-- below gives the list of registered colleges -->
                            <section class="container3">
                                <div><h3>Registerd Colleges:</h3></div>
                                <div id="registeredColleges">
                                    <marquee behavior="alternate" direction="up" scrolldelay="500" loop="5">
                                        <?php
                                            $colleges = $sc->regCollg();
                                            $i = 0;
                                            foreach($colleges as $c)
                                            {
                                                echo '<br>'.++$i.' '.$c.'<br>';
                                            }
                                        ?>
                                    </marquee>
                                </div>                
                            </section>
<!--end of form was here-->
            </div> <!--end of class="sf" -->
            <div>
                <footer id="footer"><div><p>Coll-Pros-hub.org &copy;2019</p></div></footer>
            </div>

        </div> <!-- end of id="login"-->
    </div>     <!--end of id="particles-js" -->

    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js">
    </script>
    <script>particlesJS.load('particles-js', 'particles.json',function(){console.log('applied');});</script>

    </body>
</html>


<!-- 



        
        

       
        
            

             
            
                
                


                
            
                            
    


 -->
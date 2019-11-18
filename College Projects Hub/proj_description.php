<!DOCTYPE html>
<html>
    <head>
        <title>Project Description</title>
        <meta charset="utf-8">
        <meta name="author" content="Sudarshan Bhat">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="proj_description.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
    <?php  
        session_start();  
        include_once('class.operations.php');
        $obj7 = new operations();
    ?>
    <script>
        function postChat()
        {
            $(document).ready(function()
            {
                post();
                function post()
                {
                    var user = $('#hiddenSession').val();
                    var message = $('#typingArea').val();
                    var dataString = {'username':user, 'message':message};
                    $.ajax({
                        url:"chat_driver0.php",
                        method:"POST",
                        data:dataString,
                        success:function(data)
                        {
                            $('#chat-window').html(data);
                            
                        }
                    })
                }
            });
        }

    </script>
    

    <div id="particles-js">
    <div id="login">
        <div>
        <header>
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
                <a id="home" href="Notifications.php">NOTIFICATOINS</a>
                </li>
                <li>
                <a id="home" href="About.php">ABOUT</a>
                </li>
                <li>
                <a id="home" href="logout_page.php">LOGOUT</a>
                </li>
                </ul> 
                </nav>
            </div>
            <div id="header1">COLL-<span class="highlight">PRO-HUB</span></div>
        </header>
        </div>

    <div id="containers">
    <section class="container1">
        <div>
            <div><p>Group Members :</p></div>
            <div>
                <?php
                    $members = $obj7->groupMembers($_SESSION['title']);
                    foreach($members as $m)
                        echo $m.'<br>';
                ?>
            </div>
    </section>
            <!-- here is where the sec2 starts -->
    <section class="container2">
        <div>
            <h3>Description : </h3>
            <div>
                <?php
                    $description = $obj7->projDescription($_SESSION['title']);
                     echo '<br>'.$description.'<br>';
                ?>
            </div>
        </div>
    </section>

    <section class="container3">
        <div id="chat-window0">
            <h3>chat-window : </h3>
            <div name="chat-window" id="chat-window" placeholder="group chat">
            </div>
        </div>
        <div>
            <!-- use the hidden value technique to store the session value and pass using jquery. -->
             <?php echo '<input type="hidden" id="hiddenSession" value="'.$_SESSION['username'].'">'?>
            <input type="text" id="typingArea" class="typingArea" placeholder="type">
            <button value="post" onclick="postChat()">POST/REFRESH</button>
        </div>
    </section>
    
    </div>
    <div id="footerPos">
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
    </div>   <!--end of id=login -->  
    </div>      <!--end of id=particlesJs -->
    
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js">
    </script>
    <script>particlesJS.load('particles-js', 'particles.json',function(){console.log('applied');});</script>

    </body>
</html>
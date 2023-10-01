<!DOCTYPE html>
<html>
<head>
    <link href="pairs_stylesheet.css" rel="stylesheet">
    <script src="jsFunctions.js"></script>
    <title>Landing page</title>
</head>
<body>
    <?php 
    $page = "index";

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        setcookie('pairs_username', $username, time()+60*60*24, "/");
        $_COOKIE['pairs_username'] = $username;
    }

    include 'navbar.php'; 
    ?>
    <div id=main>
        <?php 
        // check for cookies or sessions
        if (isset($_COOKIE['pairs_username'])) {
                echo "<h1>Welcome to pairs</h1>";
                echo "<a id='page_link' href='pairs.php'><h1>Click here to play</h1></a>";
        }
        else{
            echo "<h1>You’re not using a registered session?</h1>";
            echo "<a id='page_link' href='registration.php'><h1>Register now</h1></a>";
        }
        ?>
    </div>
</body>
</html>
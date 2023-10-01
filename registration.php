<!DOCTYPE html>
<html>
<head>
    <link href="pairs_stylesheet.css" rel="stylesheet">
    <script src="jsFunctions.js"></script>
    <title>Registration page</title>
</head>
<body>
    <?php 
    $page = "registration";
    include 'navbar.php'; 
    ?>
    <div id=main>
        <h1>Registration</h1>
        <br><br>
        <form class="backgroundBox" id ="loginForm" name="loginForm" action="index.php" method='post' onsubmit="return validateInput()">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <h5 id="error">Invalid characters: ” ! @ # % & * ( ) + = ˆ { } [ ] — ; : “ ’ < > ? /</h5>
            <h6 id="error-message"></h6>
            <h2>Create your avatar</h2>

            <label>
                <input type="radio" name="face" value="emoji assets/skin/red.png" required>
                <img class="radioImg" src="emoji assets/skin/red.png" alt="red face">
            </label>
            <label>
                <input type="radio" name="face" value="emoji assets/skin/yellow.png" >
                <img class="radioImg" src="emoji assets/skin/yellow.png" alt="yellow face">
            </label>
            <label>
                <input type="radio" name="face" value="emoji assets/skin/green.png" >
                <img class="radioImg" src="emoji assets/skin/green.png" alt="green face">
            </label>

            <br><br>

            <label>
                <input type="radio" name="eyes" value="emoji assets/eyes/closed.png" required>
                <img class="radioImg" src="emoji assets/eyes/closed.png" alt="closed eyes">
            </label>
            <label>
                <input type="radio" name="eyes" value="emoji assets/eyes/laughing.png">
                <img class="radioImg" src="emoji assets/eyes/laughing.png" alt="laughing eyes">
            </label>
            <label>
                <input type="radio" name="eyes" value="emoji assets/eyes/long.png">
                <img class="radioImg" src="emoji assets/eyes/long.png" alt="long eyes">
            </label>
            <label>
                <input type="radio" name="eyes" value="emoji assets/eyes/normal.png">
                <img class="radioImg" src="emoji assets/eyes/normal.png" alt="normal eyes">
            </label>
            <label>
                <input type="radio" name="eyes" value="emoji assets/eyes/rolling.png">
                <img class="radioImg" src="emoji assets/eyes/rolling.png" alt="rolling eyes">
            </label>
            <label>
                <input type="radio" name="eyes" value="emoji assets/eyes/winking.png">
                <img class="radioImg" src="emoji assets/eyes/winking.png" alt="winking eyes">
            </label>

            <br><br>

            <label>
                <input type="radio" name="mouth" value="emoji assets/mouth/open.png" required>
                <img class="radioImg" src="emoji assets/mouth/open.png" alt="open mouth">
            </label>
            <label>
                <input type="radio" name="mouth" value="emoji assets/mouth/sad.png">
                <img class="radioImg" src="emoji assets/mouth/sad.png" alt="sad mouth">
            </label>
            <label>
                <input type="radio" name="mouth" value="emoji assets/mouth/smiling.png">
                <img class="radioImg" src="emoji assets/mouth/smiling.png" alt="smiling mouth">
            </label>
            <label>
                <input type="radio" name="mouth" value="emoji assets/mouth/straight.png">
                <img class="radioImg" src="emoji assets/mouth/straight.png" alt="straight mouth">
            </label>
            <label>
                <input type="radio" name="mouth" value="emoji assets/mouth/surprise.png">
                <img class="radioImg" src="emoji assets/mouth/surprise.png" alt="surprise mouth">
            </label>
            <label>
                <input type="radio" name="mouth" value="emoji assets/mouth/teeth.png">
                <img class="radioImg" src="emoji assets/mouth/teeth.png" alt="teeth mouth">
            </label>

            <br><br><br>

            <input class="option" type="submit" value="Submit">
        </form>
    </div>  
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <link href="/pairs_stylesheet.css" rel="stylesheet" type="text/css">
    <script src="jsFunctions.js"></script>
    <title>Pairs page</title>
</head>
<body>
    <?php 
    $page = "pairs";
    include 'navbar.php'; 
    ?>
    <div id=main>
        <h1>Welcome to pairs the game</h1>
        <audio id="flipSound">
            <source src="quickFlip.mp4" type="audio/mpeg">
        </audio>
        <audio id="pairMatched">
            <source src="success.mp3" type="audio/mpeg">
        </audio>
        <audio id="incorrect">
            <source src="wronganswer.mp3" type="audio/mpeg">
        </audio>

        <div class='backgroundBox'>
            <button onclick="showGame()" id='show'>Start Game</button>
            <div id='card_game' style = 'display: none;'>
                <h2>Click on a card to start</h2>
                <div id="stopwatch">00:00</div>
                <br><br>
                <table id="card_table">
                    <tbody>
                        <tr>
                            <td id="1" class="image-cell" onclick="flipCardUp(1)"><img src="card_back.jpg" alt="Card"></td>
                            <td id="2" class="image-cell" onclick="flipCardUp(2)"><img src="card_back.jpg" alt="Card"></td>
                            <td id="3" class="image-cell" onclick="flipCardUp(3)"><img src="card_back.jpg" alt="Card"></td>
                            <td id="4" class="image-cell" onclick="flipCardUp(4)"><img src="card_back.jpg" alt="Card"></td>
                            <td id="5" class="image-cell" onclick="flipCardUp(5)"><img src="card_back.jpg" alt="Card"></td>
                        </tr>
                        <tr>
                            <td id="6" class="image-cell" onclick="flipCardUp(6)"><img src="card_back.jpg" alt="Card"></td>
                            <td id="7" class="image-cell" onclick="flipCardUp(7)"><img src="card_back.jpg" alt="Card"></td>
                            <td id="8" class="image-cell" onclick="flipCardUp(8)"><img src="card_back.jpg" alt="Card"></td>
                            <td id="9" class="image-cell" onclick="flipCardUp(9)"><img src="card_back.jpg" alt="Card"></td>
                            <td id="10" class="image-cell" onclick="flipCardUp(10)"><img src="card_back.jpg" alt="Card"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        
        <h3 id = "showScore"></h3>
        <div id="gameEndOptions" style = 'display: none;'>
            <form id="submitScoreForm" action="leaderboard.php" method="POST">
                <button class="option" onclick="submitResult()">submit</button>
            </form>

            <button class="option" onclick="restartGame()">reset</button>    
        </div>
        </div>
    </div>
</body>
</html>
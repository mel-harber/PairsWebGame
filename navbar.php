<?php
session_start();

if(isset($_POST['face'])) {
  $_SESSION['face'] = $_POST['face'];
}
if(isset($_POST['eyes'])) {
  $_SESSION['eyes'] = $_POST['eyes']; 
}
if(isset($_POST['mouth'])) {
  $_SESSION['mouth'] = $_POST['mouth'];     
}
?>
<nav>
  <ul>
    <?php 
        // check for cookies or sessions
        if (isset($_COOKIE['pairs_username'])) {
            echo "<li id=left><div class='parent'>
            <img class='image1' id='navAvatar' src='$_SESSION[face]' alt='face'>
            <img class='image2' id='navAvatar' src='$_SESSION[eyes]' alt='eyes'>
            <img class='image2' id='navAvatar' src='$_SESSION[mouth]' alt='mouth'>
            </div></li>";
        }
    ?>
    <li name='home' id=left><a href="index.php" <?php if ($page == 'index') echo 'class="active"'; ?>>Home</a></li>
    <li name='memory' id=right><a href="pairs.php" <?php if ($page == 'pairs') echo 'class="active"'; ?>>Play Pairs</a></li>  
      <?php 
        // check for cookies or sessions
        if (isset($_COOKIE['pairs_username'])) {
          echo "<li name='leaderboard'><a href='leaderboard.php' " . ($page == 'leaderboard' ? 'class="active"' : '') . ">Leaderboard</a></li>";
        } else {
          echo "<li name='register'><a href='registration.php' " . ($page == 'registration' ? 'class="active"' : '') . ">Register</a></li>";
        }
      ?>
  </ul>
</nav>


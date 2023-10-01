<!DOCTYPE html>
<html>
<head>
    <link href="pairs_stylesheet.css" rel="stylesheet">
    <script src="jsFunctions.js"></script>
    <title>Leaderboard page</title>
</head>
<body>
    <?php 
    $page = "leaderboard";
    include 'navbar.php';

    // Either read from file or make file
    $file = "leaderboardfile.txt";
    if (file_exists($file)){
        $scoreFile = fopen('leaderboardfile.txt', 'r');
        $dataArray = array();
        while (($row = fgetcsv($scoreFile)) !== false) {
            $dataArray[] = $row;
        }
        fclose($scoreFile);
    }else{
        $myfile = fopen("leaderboardfile.txt", "w");
        fclose($scoreFile);
        $dataArray = array();
    }
    
    // Store score
    if(isset($_POST['totalScore'])) {
        $totalScore = $_POST['totalScore'];
    }
    
    if (isset($_COOKIE['totalScore'])){
        if ($totalScore < $_COOKIE['totalScore']){
            $_COOKIE['totalScore'] = $totalScore;
        }      
    }
    else{
        setcookie('totalScore', $totalScore, time()+60*60*24, "/");
        $_COOKIE['totalScore'] = $totalScore; 
    }

    if ($_COOKIE['totalScore'] >0){
        $mydata = array( $_COOKIE['pairs_username'], $_COOKIE['totalScore']);
    }
    if ($totalScore <= $_COOKIE['totalScore']){
        $_COOKIE['totalScore'] = $totalScore;
        $mydata = array( $_COOKIE['pairs_username'], $_COOKIE['totalScore']);
    } 

    $addto=true;
    if(sizeof($dataArray) > 0){
        $mykey = 0;
        foreach($dataArray as $subArray){
            if($mydata[0]==$subArray[0]){
                if($mydata[1]<$subArray[1]){
                  
                    unset($dataArray[$mykey]);
                    break;
                }else{
                    $addto=false;
                    break;

                }

            }
            $mykey++;
        }}

    if ($addto){
    $dataArray[] = $mydata;
    }
   
    // write the new array to the file
    $scoreFile = fopen("leaderboardfile.txt", "w");
    foreach ($dataArray as $row) {
        fputcsv($scoreFile, $row);
    }
    fclose($scoreFile); 
    ?>
    <div id=main>
	<h1>Leaderboard</h1>
    <h3>The lower the score the better the player!</h3>
        <div class='backgroundBox'>
        <table id="table_style">
            <thead id="table_header">
                <tr>
                <th>Name</th>
                <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataArray as $subArray): ?>
                <tr>
                    <?php foreach ($subArray as $value): ?>
                    <td><?php echo $value; ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

        </div>
    </div>

</body>
</html>


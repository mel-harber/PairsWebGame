// Set variables
// do i initiate them all up here
var flipCount = 0                                          
var totalScore;
var nScore=0;
var seconds = 0, minutes = 0;
var interval;
var stopwatch;


// List of emoji components
const allFaces = ["emoji assets/skin/red.png","emoji assets/skin/yellow.png","emoji assets/skin/green.png"]
const allEyes = ["emoji assets/eyes/closed.png","emoji assets/eyes/laughing.png","emoji assets/eyes/long.png","emoji assets/eyes/normal.png","emoji assets/eyes/rolling.png","emoji assets/eyes/winking.png"]
const allMouths = ["emoji assets/mouth/open.png","emoji assets/mouth/sad.png","emoji assets/mouth/smiling.png","emoji assets/mouth/straight.png","emoji assets/mouth/surprise.png","emoji assets/mouth/teeth.png"]
var emojiList;

// Dictionary to store if the cards are face up
var isFlipped = {
  1: false,
  2: false,
  3: false,
  4: false,
  5: false,
  6: false,
  7: false,
  8: false,
  9: false,
  10: false
};

//Dictionary to store the value of each card
var cardImg = {
  1: null,
  2: null,
  3: null,
  4: null,
  5: null,
  6: null,
  7: null,
  8: null,
  9: null,
  10: null
};



// Function to see if the input conains an invalid character
function containsInvalidChars(input) {
  let pattern = /[!"@#%&*()+=^{}[\]—;:“’<>?/]/g; 
  return pattern.test(input);
}

// Function to check if form can be submitted
function validateInput() {
  let inputValue = document.forms["loginForm"]["username"].value;
  if (containsInvalidChars(inputValue)) {
    // Display error message if invalid characters are found
    document.getElementById("error-message").textContent = "Input contains invalid characters";
    return false;
  }
}

// Function to start the stopwatch
function startStopwatch() {
  interval = setInterval(function() {
      seconds++;
      stopwatch = document.getElementById("stopwatch");
      if (seconds == 60) {
          seconds = 0;
          minutes++;
      }
      stopwatch.textContent = (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);
  }, 1000);
}

// Function to stop the stopwatch
function stopStopwatch() {
    clearInterval(interval);
}

// Function to reset the stopwatch to zero
function resetStopwatch() {
    clearInterval(interval);
    seconds = 0;
    minutes = 0;
    stopwatch.textContent = "00:00";
}

// Function to select three random face components to generate a random emoji
function createRandomEmoji() {
  let emoji = []
  let face = Math.floor(Math.random() * allFaces.length);
  emoji.push(allFaces[face])
  let eyes = Math.floor(Math.random() * allEyes.length);
  emoji.push(allEyes[eyes])
  let mouth = Math.floor(Math.random() * allMouths.length);
  emoji.push(allMouths[mouth])
  return emoji;
}

// Funtion to generate a set of unique random emojis
function setEmojiList(){
  let emojis=[];
  while (emojis.length<5){
    let newEmoji = createRandomEmoji()
    if (!emojis.includes(newEmoji)) {
      emojis.push(newEmoji);
    }    
  }
  return emojis
}

// Function to flip a card back upside down
function flipCardDown(tableCell_id) {
  let td = document.getElementById(tableCell_id);
  td.innerHTML = '';
  let img = document.createElement("img");
  img.src = 'card_back.jpg';
  td.appendChild(img);
  isFlipped[tableCell_id] = false;
  flipCount--;
  console.log(Object.keys(isFlipped).length);
}

// Funtion that runs on the click of a card
function flipCardUp(tableCell_id){
  if (flipCount<2){
    // is card already flipped up?
    if (isFlipped[tableCell_id] == false){
      if (nScore==0){
        startStopwatch()
      } 
      let audioFlip = document.getElementById("flipSound");
      audioFlip.play();
      nScore += 10;
      var images = emojiList[cardImg[tableCell_id]];
      var td = document.getElementById(tableCell_id);
      td.innerHTML = ''; // clear existing content
      for (var i = 0; i < images.length; i++) {
        var img = document.createElement("img");
        img.src = images[i];
        img.classList.add("image-layer");
        td.appendChild(img);
      }
      // Sets the clicked card as flipped
      for(var key in isFlipped) {
        if(key == tableCell_id){
          isFlipped[tableCell_id] = true;
          flipCount++;
        }
      }  
    }
  }
}

// Function to start the pairs game
function showGame() {
  let element = document.getElementById("card_game");
  let button = document.getElementById("show");
  if (element.style.display === "none") {
    element.style.display = "block";
    button.style.display = "none";
  }
  // Create a global list of emojis to be used in the game
  window.emojiList = setEmojiList()
  // Allocates indexes of emojis to cards in the game
  const keys = Object.keys(cardImg);
  // Loop 5 times to assign each number twice
  for (let i = 1; i <= 5; i++) {
    const value = i;
    // Assign the value to two random keys in the object
    let key1, key2;
    do {
      key1 = keys[Math.floor(Math.random() * keys.length)];
    } while (cardImg[key1] !== null);
    do {
      key2 = keys[Math.floor(Math.random() * keys.length)];
    } while (key2 === key1 || cardImg[key2] !== null);
    cardImg[key1] = value-1;
    cardImg[key2] = value-1;
  }
}

// Show the option buttons for the end of the game 
function showGameEndButtons() {  
  let element = document.getElementById("gameEndOptions");
  if (element.style.display === "none") {
    element.style.display = "block";
  }
}

// Funtion to display the users score at the end of the game
function displayScore(score){ 
  console.log(score);
  let showScore = document.getElementById("showScore");
  showScore.textContent = "Well played, you've completed the game! You scored " + score;
}

// Funtion to restart the pairs game
function restartGame() {
  location.reload();
}

// Function to submit the users score to the leaderboard page 
function submitResult() {  
  let form = document.getElementById("submitScoreForm");
  let input = document.createElement("input");
  input.setAttribute("type", "hidden");
  input.setAttribute("name", "totalScore");
  input.setAttribute("value", totalScore);
  input.style.display = "none"; // add this line
  form.appendChild(input);
  form.submit();
}


// Check if two cards are flipped
window.setInterval(function(){
if (flipCount >1){
  let flippedKeys = []; 
  for(var key in isFlipped) {
    if(isFlipped[key] == true){
      flippedKeys.push(key)
    }
  }
  if (cardImg[flippedKeys[0]]==cardImg[flippedKeys[1]]){
    var matchaudio = document.getElementById("pairMatched");
    matchaudio.play();
    delete isFlipped[flippedKeys[0]];
    flipCount--
    delete isFlipped[flippedKeys[1]];
    flipCount--
  }
  // If cards don't match flip then back
  else{
    setTimeout(function(){
      for(var key in isFlipped) {
        if(isFlipped[key] == true){
          flipCardDown(key)
        }
      }
    },500)} 
  }
} ,1000) 

// Game complete
gameComlete = window.setInterval(function(){
  if (Object.keys(isFlipped).length == 0){
    
    clearInterval(gameComlete)
    
    setTimeout(function(){
      var matchaudio = document.getElementById("pairMatched");
      matchaudio.play();
      stopStopwatch();
      totalSeconds = seconds + 60*minutes
      var timePenalty = (Math.floor(totalSeconds / 5))*10;
      totalScore = nScore+timePenalty;
      displayScore(totalScore)
      showGameEndButtons()
    },500);
  }} ,1000)
  
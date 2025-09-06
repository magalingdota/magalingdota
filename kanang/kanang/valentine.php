<?php
if (isset($_POST['choice'])) {
    if ($_POST['choice'] === 'yes') {
        header('Location: login.php?surprise=1');  // Add query param surprise=1
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Valentine's Question</title>
<style>
    body {
        background: #ffdee9;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        text-align: center;
        padding-top: 100px;
        overflow: hidden;
        height: 100vh;
        position: relative;
        margin: 0;
        user-select: none;

        display: flex;
        flex-direction: column;
        justify-content: flex-start; /* align items at the top */
        padding-top: 80px; /* adjust the value to move it down */
        align-items: center; /* horizontal center */
    }

    form#valentineForm {
        display: flex;
        justify-content: center;
        gap: 20px; /* space between buttons */
        height: auto;
        margin-top: 40px;
    }

    #yesBtn, #noBtn {
        font-size: 18px;
        padding: 12px 28px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        font-weight: 600;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease, font-size 0.3s ease;
        position: static;
        user-select: none;
        transform: none;
        top: auto;
        left: auto;
    }

    #mainContainer {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
    }

    #yesBtn {
        background-color: #e91e63;
        color: white;
    }
    #yesBtn:hover {
        background-color: #c2185b;
        box-shadow: 0 8px 25px rgba(229, 30, 99, 0.7);
        transform: scale(1.05);
    }

    #noBtn {
        background-color: #9e9e9e;
        color: white;
        position: static; /* will be changed dynamically */
        transform: none;
    }
    #noBtn:hover {
        background-color: #757575;
        box-shadow: 0 8px 25px rgba(117, 117, 117, 0.7);
        transform: scale(1.05);
    }

    #message {
        margin-top: 60px;
        color: #d6336c;
        font-weight: bold;
        font-size: 1.3em;
        height: 2em;
        min-height: 2em;
        user-select: none;
        position: relative;
        top: 20px;

        display: none;          /* hidden initially */
        opacity: 0;             /* transparent initially */
        transition: opacity 0.4s ease-in;
    }
</style>
</head>
<body>

<div id="mainContainer">
  <div id="gifContainer">
      <img id="currentGif" src="images/wew.jpg" alt="Cute cat" width="150" />
  </div>

  <div id="textContainer">
    <h2>Hi lovelove, kita nata na please?</h2>
    <p>gimingaw nakos imoha prms</p>
  </div>
</div>

<form method="POST" id="valentineForm">
    <button type="submit" name="choice" value="yes" id="yesBtn">Yes</button>
    <button type="button" id="noBtn">No</button>
</form>

<div id="message"></div>

<script>
    const noBtn = document.getElementById('noBtn');
    const message = document.getElementById('message');
    const textContainer = document.getElementById('textContainer');
    const currentGif = document.getElementById('currentGif');
    let noClicks = 0;

    const gifList = [
        'images/3.jpg',
        'images/4.jpg',
        'images/5.png',
        'images/6.jpg',
        'images/8.jpg',
        'images/9.jpg'
    ];

    function positionNoButtonOnEdge() {
        const padding = 40;
        const windowWidth = window.innerWidth;
        const windowHeight = window.innerHeight;

        const edges = ['top', 'left', 'right'];
        const edge = edges[Math.floor(Math.random() * edges.length)];

        let left, top;

        if (edge === 'top') {
            left = Math.random() * (windowWidth - 2 * padding) + padding;
            top = padding;
        } else if (edge === 'left') {
            left = padding;
            top = Math.random() * (windowHeight - 2 * padding) + padding;
        } else { // right
            left = windowWidth - padding;
            top = Math.random() * (windowHeight - 2 * padding) + padding;
        }

        noBtn.style.position = 'absolute';
        noBtn.style.left = left + 'px';
        noBtn.style.top = top + 'px';
        noBtn.style.transform = 'translate(-50%, -50%)';
    }

    noBtn.addEventListener('click', (e) => {
    e.preventDefault();

    noClicks++;

    // Hide the text container only once
    if (noClicks === 1) {
        textContainer.style.display = 'none';
    }

    // Increase font size but max 40px
    const newFontSize = Math.min(18 + noClicks * 3, 40);
    noBtn.style.fontSize = newFontSize + 'px';

    // Move No button randomly on edges after the first click
    positionNoButtonOnEdge();

    // Messages array
    const messages = [
        "sige na bah, e hug lage teka HAHAHAHAH",
        "yes na bah, ready nakos imong mga sogo puhon opo",
        "miss IT uy yes na bah sige na",
        "og kong ako nalang diay?",
        "magbinoutan nako dinako mag igat ayjokeHAHAHAA",   
        "lalove yes bah kissan ka ron awHAHAHAHA",
        "yessss nagud love, gwapa manka tas youre eurs enough na po!"
    ];

    const randomIndex = Math.floor(Math.random() * messages.length);

    // Update the message text and make sure it's visible
    message.textContent = messages[randomIndex];
    message.style.display = 'block';
    message.style.opacity = 1;

    // Change GIF randomly
    const randomGifIndex = Math.floor(Math.random() * gifList.length);
    currentGif.src = gifList[randomGifIndex];

    // Bounce effect animation
    noBtn.style.transform += ' scale(1.2)';
    setTimeout(() => {
        noBtn.style.transform = 'translate(-50%, -50%) scale(1)';
    }, 300);
});


    window.addEventListener('resize', () => {
        if (noClicks > 0) {
            positionNoButtonOnEdge();
        } else {
            noBtn.style.position = 'static';
            noBtn.style.fontSize = '18px';
            noBtn.style.transform = 'none';
        }
    });
</script>

</body>
</html>

<?php
if (isset($_POST['choice'])) {
    if ($_POST['choice'] === 'yes') {
        // Redirect to your welcome page
        header('Location: welcome.php');
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
        background: #ffdee9;  /* soft pink */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        text-align: center;
        padding-top: 100px;
        overflow: hidden;
        height: 100vh;
        position: relative;
        margin: 0;
    }
    #yesBtn, #noBtn {
        font-size: 18px;
        padding: 12px 28px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        font-weight: 600;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
        user-select: none;
        position: relative;
    }
    #yesBtn {
        background-color: #e91e63;
        color: white;
        margin-right: 15px;
    }
    #yesBtn:hover {
        background-color: #c2185b;
        box-shadow: 0 8px 25px rgba(229, 30, 99, 0.7);
        transform: scale(1.05);
    }
    #noBtn {
        background-color: #9e9e9e;
        color: white;
        position: absolute;
        top: 50%;
        left: 55%;
        transform: translate(-50%, -50%);
        transition: background-color 0.3s ease, box-shadow 0.3s ease, font-size 0.3s ease, top 0.5s ease, left 0.5s ease;
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
    }
</style>
</head>
<body>

<img src="3b5abadd-07e2-4dc7-b18d-363e79689e42.png" alt="Cute cat" width="150" />
<h2>Will You be my Valentine? 😊</h2>
<p>Lorem ipsum dolor sit amet.</p>

<form method="POST" id="valentineForm" style="position: relative; height: 120px;">
    <button type="submit" name="choice" value="yes" id="yesBtn">Yes</button>
    <button type="button" id="noBtn">No</button>
</form>

<div id="message"></div>

<script>
    const noBtn = document.getElementById('noBtn');
    const message = document.getElementById('message');
    let noClicks = 0;

    noBtn.addEventListener('click', () => {
        noClicks++;

        // Grow the button font size (max 40px)
        const newFontSize = Math.min(18 + noClicks * 3, 40);
        noBtn.style.fontSize = newFontSize + 'px';

        // Move the "No" button to a random position within viewport, keeping it visible
        const padding = 50; // prevent going too close to edges
        const maxX = window.innerWidth - noBtn.offsetWidth - padding;
        const maxY = window.innerHeight - noBtn.offsetHeight - padding;

        const randomX = Math.floor(Math.random() * maxX) + padding;
        const randomY = Math.floor(Math.random() * maxY) + padding;

        noBtn.style.left = randomX + 'px';
        noBtn.style.top = randomY + 'px';

        // Change the message
        const messages = [
            "please yes, come on yes please",
            "really, yes please!",
            "don't be shy, yes!",
            "yes is the answer!",
            "just say yes!",
            "give me a yes!",
            "say yes, pretty please!"
        ];
        message.textContent = messages[Math.min(noClicks - 1, messages.length - 1)];

        // Animate button bounce (scale briefly)
        noBtn.style.transform = 'translate(-50%, -50%) scale(1.2)';
        setTimeout(() => {
            noBtn.style.transform = 'translate(-50%, -50%) scale(1)';
        }, 300);
    });
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome Mommy</title>

  <style>
    body {
      background-image: url('images/sd.png');
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
      background-size: cover;
      font-family: Arial, sans-serif;
      color: white;
      margin: 0;
      height: 100vh;
      user-select: none;
      display: flex;
      flex-direction: column;
      overflow-x: hidden;
      position: relative;
    }

    nav {
      width: 100%;
      background-color: #1f4a7b;
      padding: 15px 40px;
      box-sizing: border-box;
      display: flex;
      justify-content: flex-end;
      gap: 40px;
      font-weight: bold;
      font-size: 20px;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      user-select: none;
      z-index: 10;
    }

    nav a {
      color: white;
      text-decoration: none;
      transition: color 0.3s ease, border-bottom 0.3s ease;
      border-bottom: 2px solid transparent;
      cursor: pointer;
    }

    nav a:hover, nav a.active {
      color: #ffeb3b;
      border-bottom: 2px solid #ffeb3b;
    }

    main {
      flex: 1;
      display: flex;
      padding: 30px 60px;
      box-sizing: border-box;
      gap: 40px;
      position: relative;
      overflow: hidden;
      z-index: 5;
    }

    .content-left {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      gap: 12px;
      max-width: 400px;
      margin-top: 20px;
      z-index: 6;
    }

    .message-bubble {
      padding: 12px 20px;
      border-radius: 20px;
      font-size: 20px;
      font-weight: 500;
      color: #003049;
      background-color: #56c0f3;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      max-width: 100%;
      animation: fadeIn 0.6s ease;
      text-align: left;
    }

    .message-bubble:nth-child(2) {
      background-color: #38b6ff;
    }

    .message-bubble:nth-child(3) {
      background-color: #1ea7ff;
      color: #fff;
      font-style: italic;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .image-center {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-width: 350px;
      width: 90%;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      z-index: 6;
      transition: opacity 0.4s ease;
    }

    .image-center img {
      width: 100%;
      display: block;
      border-radius: 15px;
    }

    @media (max-width: 850px) {
      main {
        flex-direction: column;
        padding: 30px 20px;
        align-items: flex-start;
        position: static;
        overflow: visible;
      }

      .content-left {
        max-width: 100%;
        margin-bottom: 30px;
      }

      .image-center {
        position: static;
        max-width: 90%;
        margin: 0 auto;
        transform: none;
      }
    }
  </style>
</head>
<body>

  <!-- NAVIGATION -->
  <nav>
    <a id="nav-home" class="active">Home</a>
    <a id="nav-memories">Memories</a>
    <a id="nav-letters">More memories</a>
  </nav>

  <!-- MAIN SECTION -->
  <main>
    <div class="content-left" id="content-left">
      <!-- Initial content loaded via JS -->
    </div>

    <div class="image-center" id="image-center">
      <img src="images/asd.jpg" alt="Centered Image" />
    </div>
  </main>

  <script>
    const navHome = document.getElementById('nav-home');
    const navMemories = document.getElementById('nav-memories');
    const navLetters = document.getElementById('nav-letters');
    const contentLeft = document.getElementById('content-left');
    const imageCenter = document.getElementById('image-center');

    const homeContent = `
      <div class="message-bubble">Hello! Darlyn Tejada Villaver</div>
      <div class="message-bubble">dinakonemolab?HAHAHAHAH</div>
      <div class="message-bubble">asa naman akong physical attack, ali na ba asa naka</div>
    `;
    const homeImage = 'images/asd.jpg';

    const memoriesContent = `
      <div class="message-bubble">Barilin monga ko ng pagmamahal lods<3 HAHAHAHAH!</div>
      <div class="message-bubble">imissyou miss IT asa naka, kita nata na please im sad na here.</div>
    `;
    const memoriesImage = 'images/haha.jpg';

    const lettersContent = `
      <div class="message-bubble">Kung ang coconut kay lubi kisskobiHAAHAAHAHA</div>
      <div class="message-bubble">ayaw nako kusia love ha hangyo bah please </div>
      <div class="message-bubble">ready nani akong cooking skills ari miss IT ang mosogo nalang kolang HAHAHAHA</div>
    `;
    const lettersImage = 'images/ganda.jpg';

    function setActiveNav(activeNav) {
      [navHome, navMemories, navLetters].forEach(nav => nav.classList.remove('active'));
      activeNav.classList.add('active');
    }

    function showHome() {
      setActiveNav(navHome);
      contentLeft.innerHTML = homeContent;
      imageCenter.querySelector('img').src = homeImage;
      imageCenter.querySelector('img').alt = 'Home Image';
    }

    function showMemories() {
      setActiveNav(navMemories);
      contentLeft.innerHTML = memoriesContent;
      imageCenter.querySelector('img').src = memoriesImage;
      imageCenter.querySelector('img').alt = 'Memories Image';
    }

    function showLetters() {
      setActiveNav(navLetters);
      contentLeft.innerHTML = lettersContent;
      imageCenter.querySelector('img').src = lettersImage;
      imageCenter.querySelector('img').alt = 'More Memories Image';
    }

    navHome.addEventListener('click', (e) => {
      e.preventDefault();
      showHome();
    });

    navMemories.addEventListener('click', (e) => {
      e.preventDefault();
      showMemories();
    });

    navLetters.addEventListener('click', (e) => {
      e.preventDefault();
      showLetters();
    });

    // Initial page load
    showHome();
  </script>

</body>
</html>

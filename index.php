<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Fatim ❤️</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&family=Great+Vibes&family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            -webkit-tap-highlight-color: transparent;
        }

        /* STRICT SCROLL LOCK BEFORE START */
        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden; /* Locked initially */
            background: #030008;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            user-select: none;
        }

        /* Cursor trail canvas */
        #trailCanvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: 99998;
        }

        /* --- START SCREEN --- */
        #startScreen {
            position: fixed;
            inset: 0;
            width: 100vw;
            height: 100vh;
            background: radial-gradient(circle at center, #1b0028 0%, #080010 60%, #000000 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 99999;
            touch-action: none; /* Prevents touch dragging */
            transition: opacity 1.2s cubic-bezier(0.4, 0, 0.2, 1), visibility 1.2s ease;
        }

        .pulse-orb {
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 79, 163, 0.4) 0%, rgba(138, 43, 226, 0.18) 50%, transparent 70%);
            filter: blur(28px);
            animation: pulseOrb 4s infinite ease-in-out;
            pointer-events: none;
        }

        @keyframes pulseOrb {
            0%, 100% { transform: scale(0.9); opacity: 0.6; }
            50% { transform: scale(1.25); opacity: 0.95; }
        }

        #startBtn {
            position: relative;
            z-index: 10;
            padding: 22px 65px;
            font-size: 23px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 50px;
            cursor: pointer;
            color: #ffffff;
            background: linear-gradient(135deg, #ff3d96 0%, #a832d4 50%, #ff6ab5 100%);
            background-size: 200% 200%;
            box-shadow: 0 0 35px rgba(255, 61, 150, 0.6), 0 0 70px rgba(168, 50, 212, 0.4);
            animation: gradientShift 4s ease infinite;
            transition: all 0.35s ease;
        }

        #startBtn:hover {
            transform: scale(1.06) translateY(-3px);
            box-shadow: 0 0 55px rgba(255, 61, 150, 0.85), 0 0 100px rgba(168, 50, 212, 0.6);
        }

        #startBtn:active {
            transform: scale(0.96);
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* --- INTRO SECTION --- */
        #intro {
            position: relative;
            min-height: 100vh;
            width: 100%;
            background: radial-gradient(circle at 50% 30%, #1e002a 0%, #0a0014 55%, #040108 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            overflow: hidden;
            padding: 40px 20px;
        }

        #fireworks {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 2;
        }

        .hearts {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 3;
        }

        .heart {
            position: absolute;
            bottom: -80px;
            color: #ff529f;
            animation: floatHeart linear infinite;
            opacity: 0.85;
            filter: drop-shadow(0 0 12px rgba(255, 79, 163, 0.7));
            will-change: transform, opacity;
        }

        @keyframes floatHeart {
            0% {
                transform: translateY(0) scale(0.8) rotate(0deg);
                opacity: 0;
            }
            15% { opacity: 0.9; }
            85% { opacity: 0.8; }
            100% {
                transform: translateY(-115vh) scale(1.7) rotate(360deg);
                opacity: 0;
            }
        }

        .center-box {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 950px;
            width: 100%;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .main-name {
            font-family: 'Great Vibes', cursive;
            font-size: 95px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #ffffff;
            text-shadow: 0 0 25px rgba(255, 105, 180, 0.8), 0 0 50px rgba(255, 61, 150, 0.5);
            opacity: 0;
            transform: translateY(30px);
            animation: showName 1.4s forwards;
            animation-delay: 0.2s;
        }

        .main-name span {
            font-family: 'Poppins', sans-serif;
            font-size: 65px;
            vertical-align: middle;
            margin-left: 10px;
            display: inline-block;
            animation: planetSpin 14s linear infinite;
        }

        @keyframes showName {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes planetSpin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* COUNTER */
        .counter-badge {
            margin-top: 15px;
            display: inline-block;
            padding: 8px 24px;
            border-radius: 30px;
            background: rgba(255, 61, 150, 0.12);
            border: 1px solid rgba(255, 105, 180, 0.3);
            font-size: 15px;
            letter-spacing: 2px;
            color: #ffb8df;
            text-transform: uppercase;
            box-shadow: 0 0 20px rgba(255, 61, 150, 0.25);
        }

        .counter {
            margin-top: 10px;
            font-size: 68px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #ff91c9;
            text-shadow: 0 0 25px #ff4fa3, 0 0 55px rgba(255, 61, 150, 0.6);
            line-height: 1.1;
        }

        .counter-sub {
            font-size: 18px;
            color: #ffcce8;
            margin-top: 5px;
            letter-spacing: 1px;
            opacity: 0.9;
        }

        /* LIVE DETAILED CLOCK */
        .live-timer-container {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
            opacity: 0;
            transform: translateY(20px);
            transition: all 1.2s ease;
        }

        .live-timer-container.show {
            opacity: 1;
            transform: translateY(0);
        }

        .timer-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 126, 199, 0.25);
            border-radius: 18px;
            padding: 12px 18px;
            min-width: 85px;
            box-shadow: 0 8px 24px rgba(255, 0, 140, 0.18);
            transition: transform 0.3s ease;
        }

        .timer-card:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 126, 199, 0.5);
        }

        .timer-num {
            font-size: 28px;
            font-weight: 700;
            color: #ffffff;
            text-shadow: 0 0 15px rgba(255, 126, 199, 0.8);
            line-height: 1.1;
        }

        .timer-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #ffa3d4;
            margin-top: 4px;
        }

        /* USER ROMANTIC MESSAGE */
        .text {
            margin-top: 30px;
            font-size: 22px;
            max-width: 850px;
            line-height: 1.8;
            color: #ffe6f3;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 126, 199, 0.2);
            padding: 25px 35px;
            border-radius: 25px;
            backdrop-filter: blur(14px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            opacity: 0;
            transform: translateY(20px);
            transition: all 1.2s ease;
        }

        .text.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* SCROLL DOWN INDICATOR (PULSES ONLY AFTER INTRO FINISHES) */
        .scroll-indicator {
            margin-top: 40px;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: #ff91c9;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 2px;
            cursor: pointer;
            text-decoration: none;
            opacity: 0;
            visibility: hidden;
            transition: opacity 1s ease, transform 0.3s ease;
            z-index: 10;
        }

        .scroll-indicator.visible {
            opacity: 0.95;
            visibility: visible;
            animation: floatScroll 2s infinite ease-in-out;
        }

        .scroll-indicator:hover {
            opacity: 1;
            color: #ffffff;
        }

        .scroll-indicator .arrow {
            font-size: 26px;
            text-shadow: 0 0 15px #ff3d96;
        }

        @keyframes floatScroll {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(10px); }
        }

        /* --- GALAXY SECTION (LOCKED INITIALLY) --- */
        #galaxy {
            min-height: 100vh;
            position: relative;
            background: radial-gradient(ellipse at 50% 0%, #250938 0%, #0c0216 45%, #030008 100%);
            overflow: hidden;
            padding: 100px 20px 140px;
            opacity: 0;
            transition: opacity 1.2s ease;
        }

        #galaxy.unlocked {
            opacity: 1;
        }

        #stars {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #ffffff;
            border-radius: 50%;
            animation: twinkle 3s infinite alternate ease-in-out;
        }

        @keyframes twinkle {
            from {
                opacity: 0.2;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(2);
                box-shadow: 0 0 8px rgba(255, 255, 255, 0.9);
            }
        }

        .shooting-star {
            position: absolute;
            width: 120px;
            height: 2px;
            background: linear-gradient(90deg, #ffffff, rgba(255, 126, 199, 0.8), transparent);
            transform: rotate(-35deg);
            filter: drop-shadow(0 0 6px #ff7ec7);
            opacity: 0;
            pointer-events: none;
        }

        .planet {
            position: absolute;
            border-radius: 50%;
            animation: planetFloat 12s ease-in-out infinite alternate;
            pointer-events: none;
        }

        @keyframes planetFloat {
            from { transform: translateY(0px) rotate(0deg); }
            to { transform: translateY(-35px) rotate(8deg); }
        }

        .content {
            position: relative;
            z-index: 5;
            width: 100%;
            max-width: 950px;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 80px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .section-header h3 {
            font-size: 20px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #ff80c0;
            opacity: 0.85;
        }

        .section {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            opacity: 0;
            transform: translateY(60px);
            transition: all 1s cubic-bezier(0.2, 0.8, 0.2, 1);
        }

        .section.active {
            opacity: 1;
            transform: translateY(0);
        }

        .section h2 {
            font-size: 52px;
            font-weight: 700;
            color: #ff8ec4;
            margin-bottom: 24px;
            text-shadow: 0 0 30px rgba(255, 80, 180, 0.6);
            font-family: 'Poppins', sans-serif;
        }

        .section.emoji-title h2 {
            font-size: 40px;
            letter-spacing: 6px;
        }

        .glass {
            width: 100%;
            padding: 40px 35px;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 126, 199, 0.2);
            box-shadow: 0 15px 45px rgba(255, 0, 140, 0.15), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }

        .glass::before {
            content: '';
            position: absolute;
            top: 0;
            left: -50%;
            width: 200%;
            height: 100%;
            background: linear-gradient(115deg, transparent 40%, rgba(255, 255, 255, 0.04) 50%, transparent 60%);
            pointer-events: none;
        }

        .section p {
            max-width: 820px;
            margin: auto;
            font-size: 21px;
            line-height: 1.9;
            color: #ffe6f5;
            font-weight: 300;
        }

        /* MAGIC BUTTON */
        .magic-btn-link {
            text-decoration: none;
            display: inline-block;
            margin-top: 40px;
        }

        .magic-btn {
            position: relative;
            overflow: hidden;
            padding: 22px 60px;
            border: none;
            border-radius: 60px;
            font-size: 23px;
            cursor: pointer;
            background: linear-gradient(45deg, #ff3088, #ff7bc1, #b52eff);
            background-size: 200% 200%;
            color: #ffffff;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            transition: all 0.4s ease;
            box-shadow: 0 0 35px rgba(255, 48, 136, 0.6), 0 0 80px rgba(181, 46, 255, 0.35);
            animation: gradientShift 5s ease infinite;
        }

        .magic-btn:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 0 50px rgba(255, 48, 136, 0.85), 0 0 110px rgba(181, 46, 255, 0.5);
        }

        .magic-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -120%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.3);
            transform: skewX(-25deg);
        }

        .magic-btn:hover::before {
            animation: shine 1s;
        }

        @keyframes shine {
            100% { left: 130%; }
        }

        .info {
            margin-top: 18px;
            font-size: 16px;
            color: #ffb8df;
            opacity: 0.9;
            letter-spacing: 0.5px;
        }

        /* --- HYPER-DRIVE CINEMATIC TRANSITION OVERLAY --- */
        #hyperTransition {
            position: fixed;
            inset: 0;
            background: #000000;
            z-index: 100000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.8s ease;
        }

        #hyperTransition.active {
            opacity: 1;
            pointer-events: all;
        }

        .hyper-text {
            font-size: 24px;
            letter-spacing: 3px;
            color: #ff91c9;
            text-shadow: 0 0 25px rgba(255, 61, 150, 0.8);
            margin-top: 25px;
            font-family: 'Poppins', sans-serif;
            animation: pulseOrb 2s infinite alternate;
        }

        .hyper-canvas {
            position: absolute;
            inset: 0;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .main-name { font-size: 60px; }
            .main-name span { font-size: 40px; }
            .counter { font-size: 44px; }
            .timer-card { min-width: 68px; padding: 10px 12px; }
            .timer-num { font-size: 22px; }
            .timer-label { font-size: 10px; }
            .text { font-size: 17px; padding: 20px 20px; }
            .section h2 { font-size: 34px; }
            .section.emoji-title h2 { font-size: 26px; letter-spacing: 3px; }
            .section p { font-size: 17px; line-height: 1.75; }
            .glass { padding: 28px 20px; }
            #startBtn, .magic-btn { padding: 18px 45px; font-size: 19px; }
        }
    </style>
</head>

<body>

    <!-- MAGIC STARDUST CURSOR TRAIL -->
    <canvas id="trailCanvas"></canvas>

    <!-- START SCREEN (STRICT TOUCH & SCROLL LOCK) -->
    <div id="startScreen">
        <div class="pulse-orb"></div>
        <button id="startBtn">Ulduzları kəşf et ✨</button>
    </div>

    <!-- AUDIO (NO VISIBLE CONTROLS - AUTO-STARTS ON BUTTON CLICK) -->
    <audio id="bgmusic" loop preload="auto">
        <source src="intro.mp3" type="audio/mpeg">
    </audio>

    <!-- PRELOAD SECOND AUDIO FOR SEAMLESS 100% AUTOPLAY GUARANTEE -->
    <audio id="starMusic" loop preload="auto">
        <source src="music.mp3" type="audio/mpeg">
    </audio>

    <!-- HYPER TRANSITION SCREEN -->
    <div id="hyperTransition">
        <canvas id="hyperCanvas" class="hyper-canvas"></canvas>
        <div class="pulse-orb"></div>
        <div class="hyper-text">Kainatın ən parlaq ulduzuna səyahət... 🪐✨</div>
    </div>

    <!-- INTRO SECTION -->
    <section id="intro">

        <div class="hearts" id="hearts"></div>
        <canvas id="fireworks"></canvas>

        <div class="center-box">

            <h1 class="main-name">
                Fatim <span>🪐</span>
            </h1>

            <div class="counter-badge">
                Birlikdə Keçən Zaman
            </div>

            <!-- TOTAL MINUTES COUNTER -->
            <div class="counter" id="counter">0</div>
            <div class="counter-sub">dəqiqə</div>

            <!-- LIVE DETAILED BREAKDOWN (İl, Ay, Gün, Saat, Dəq, San) -->
            <div class="live-timer-container" id="liveTimerContainer">
                <div class="timer-card">
                    <div class="timer-num" id="liveYears">0</div>
                    <div class="timer-label">İl</div>
                </div>
                <div class="timer-card">
                    <div class="timer-num" id="liveMonths">0</div>
                    <div class="timer-label">Ay</div>
                </div>
                <div class="timer-card">
                    <div class="timer-num" id="liveDays">0</div>
                    <div class="timer-label">Gün</div>
                </div>
                <div class="timer-card">
                    <div class="timer-num" id="liveHours">0</div>
                    <div class="timer-label">Saat</div>
                </div>
                <div class="timer-card">
                    <div class="timer-num" id="liveMinutes">0</div>
                    <div class="timer-label">Dəq</div>
                </div>
                <div class="timer-card">
                    <div class="timer-num" id="liveSeconds">0</div>
                    <div class="timer-label">San</div>
                </div>
            </div>

            <!-- EXACT USER MESSAGE -->
            <div class="text" id="message">
                ...
            </div>

            <!-- SMOOTH SCROLL PROMPT (Appears only after intro reveals!) -->
            <a href="#galaxy" class="scroll-indicator" id="scrollIndicator">
                <span>Aşağı sürüşdür</span>
                <span class="arrow">↓</span>
            </a>

        </div>

    </section>

    <!-- GALAXY SECTION -->
    <section id="galaxy">

        <div id="stars"></div>

        <div class="planet"
             style="
             width: 260px;
             height: 260px;
             background: radial-gradient(circle at 30% 30%, #ff85cb, #8f0053 60%, #3a0021 100%);
             box-shadow: 0 0 60px rgba(255, 61, 150, 0.4);
             top: 6%;
             right: -70px;">
        </div>

        <div class="planet"
             style="
             width: 140px;
             height: 140px;
             background: radial-gradient(circle at 35% 35%, #a98bff, #3c1985 65%, #18053a 100%);
             box-shadow: 0 0 50px rgba(138, 43, 226, 0.4);
             bottom: 12%;
             left: -40px;
             animation-duration: 9s;">
        </div>

        <div class="content">

            <div class="section-header">
                <h3>Sənə Özəl ✨</h3>
            </div>

            <div class="section">
                <h2>One and Only ✨</h2>
                <div class="glass">
                    <p>
                        Ulduzları, günəşi səmada axtarardım. Sən ulduzlara ən parlaq nümunəsən. İşığın sadəcə aydınlıq yox, bir insan olaraq həyatımda olmasının ən parlaq həqiqətisən.
                    </p>
                </div>
            </div>

            <div class="section">
                <h2>Sunshine 🌟</h2>
                <div class="glass">
                    <p>
                        Günəşimsən,
                        Həyatdaki bütün gözəllikləri görməyim üçün gözlərinə baxmağım bəs edir. Birdəfə baxdım və o gündən bu yana içindən çıxa bilmədiyim mənzərəm oldu.
                    </p>
                </div>
            </div>

            <div class="section emoji-title">
                <h2>☀️🪐⭐🌟💘💖✨🧿</h2>
                <div class="glass">
                    <p>
                        Parıltın daima yanacaq, işığın daima görüləcək,Mən də hər zaman yerin bəllidir. Sən mənə kəs olmadın, daima ən parlaq ulduzum olacaqsan, səni kəslərdən ayırıb qoyduğum yerdə çox gözəlsən 💖, ümid edirəm işığın üstümdən heçvaxt əskik olmaz.💘 
                    </p>

                    <!-- SEAMLESS TRANSITION TO STAR.PHP WITH INSTANT AUDIO UNLOCK -->
                    <a href="star.php" class="magic-btn-link" id="starTransitionBtn">
                        <button class="magic-btn" type="button">
                            Ulduzları seyr et ✨
                        </button>
                    </a>

                    <div class="info">
                        Düyməyə bas, canlı ulduzları seyr et
                    </div>
                </div>
            </div>

        </div>

    </section>

    <script>
    // STRICT SCROLL LOCK ON PAGE LOAD
    window.scrollTo(0, 0);

    const startScreen = document.getElementById("startScreen");
    // Prevent any scrolling/dragging behind the start screen
    function preventTouch(e) {
        if (startScreen && startScreen.style.display !== "none") {
            e.preventDefault();
        }
    }
    window.addEventListener("touchmove", preventTouch, { passive: false });
    window.addEventListener("wheel", preventTouch, { passive: false });

    document.addEventListener("DOMContentLoaded", () => {
        window.scrollTo(0, 0);
        const startBtn = document.getElementById("startBtn");
        const audio = document.getElementById("bgmusic");
        const starMusic = document.getElementById("starMusic");

        startBtn.addEventListener("click", () => {
            // Remove touch blocker listeners
            window.removeEventListener("touchmove", preventTouch);
            window.removeEventListener("wheel", preventTouch);

            // Fade out start screen
            startScreen.style.opacity = "0";
            setTimeout(() => {
                startScreen.style.display = "none";
            }, 1200);

            // Play background music safely
            audio.play().catch(() => {});

            // Also silently pre-prime the second audio element on this exact user click
            // so browsers permanently permit music.mp3 autoplay!
            starMusic.volume = 0;
            starMusic.play().then(() => {
                starMusic.pause();
                starMusic.currentTime = 0;
                starMusic.volume = 0.7;
            }).catch(() => {});

            // Start progressive reveal
            startProgressiveExperience();
        });
    });

    function startProgressiveExperience() {
        initHearts();
        initFireworks();
        initStars();
        initShootingStars();
        initProgressiveCounters();
    }

    /* --- STEP-BY-STEP PROGRESSIVE REVEAL --- */
    function initProgressiveCounters() {
        const startDate = new Date("2021-03-15T00:00:00");
        const counterEl = document.getElementById("counter");
        const messageEl = document.getElementById("message");
        const liveContainer = document.getElementById("liveTimerContainer");
        const scrollIndicator = document.getElementById("scrollIndicator");
        const galaxySec = document.getElementById("galaxy");

        // Live breakdown elements
        const elYears = document.getElementById("liveYears");
        const elMonths = document.getElementById("liveMonths");
        const elDays = document.getElementById("liveDays");
        const elHours = document.getElementById("liveHours");
        const elMinutes = document.getElementById("liveMinutes");
        const elSeconds = document.getElementById("liveSeconds");

        function updateLiveBreakdown() {
            const now = new Date();
            let yDiff = now.getFullYear() - startDate.getFullYear();
            let mDiff = now.getMonth() - startDate.getMonth();
            let dDiff = now.getDate() - startDate.getDate();
            let hDiff = now.getHours() - startDate.getHours();
            let minDiff = now.getMinutes() - startDate.getMinutes();
            let sDiff = now.getSeconds() - startDate.getSeconds();

            if (sDiff < 0) { sDiff += 60; minDiff--; }
            if (minDiff < 0) { minDiff += 60; hDiff--; }
            if (hDiff < 0) { hDiff += 24; dDiff--; }
            if (dDiff < 0) {
                const prevMonthDays = new Date(now.getFullYear(), now.getMonth(), 0).getDate();
                dDiff += prevMonthDays;
                mDiff--;
            }
            if (mDiff < 0) { mDiff += 12; yDiff--; }

            elYears.innerText = yDiff;
            elMonths.innerText = mDiff;
            elDays.innerText = dDiff;
            elHours.innerText = hDiff;
            elMinutes.innerText = minDiff;
            elSeconds.innerText = sDiff;
        }

        updateLiveBreakdown();
        setInterval(updateLiveBreakdown, 1000);

        // Fast count-up for total minutes
        const now = new Date();
        const totalMinutes = Math.floor((now - startDate) / (1000 * 60));
        let current = 0;
        const step = Math.max(1, Math.floor(totalMinutes / 80));

        const interval = setInterval(() => {
            current += step + Math.floor(Math.random() * 2000);

            if (current >= totalMinutes) {
                current = totalMinutes;
                counterEl.innerText = totalMinutes.toLocaleString();
                clearInterval(interval);

                // 1. Reveal the live timer breakdown smoothly
                setTimeout(() => {
                    liveContainer.classList.add("show");
                }, 300);

                // 2. Reveal the exact user message
                setTimeout(() => {
                    messageEl.innerHTML =
                        `${totalMinutes.toLocaleString()} dəqiqədir səni tanıdığım üçün çox şanslıyam 💘<br><br>
                        Bunun hər saniyəsində yaxşıkim olduğun üçün Çoxsağol 💝<br>
                        şansımsan &lt;3<br>
                        <small style="opacity:0.8; font-size:15px; display:inline-block; margin-top:8px;">və ..</small>`;
                    messageEl.classList.add("show");
                }, 900);

                // 3. Unlock scrolling and show "Aşağı sürüşdür ↓" prompt
                setTimeout(() => {
                    // Unlock body scrolling smoothly
                    document.documentElement.style.overflow = "auto";
                    document.body.style.overflow = "auto";
                    galaxySec.classList.add("unlocked");
                    scrollIndicator.classList.add("visible");
                    initScrollAnimations();
                }, 1600);

            } else {
                counterEl.innerText = current.toLocaleString();
            }
        }, 16);
    }

    /* --- SCROLL TRIGGER FOR GALAXY SECTIONS --- */
    function initScrollAnimations() {
        const sections = document.querySelectorAll(".section");
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("active");
                }
            });
        }, { threshold: 0.18 });

        sections.forEach(sec => observer.observe(sec));
    }

    /* --- CINEMATIC TRANSITION TO STAR.PHP (100% RELIABLE AUTOPLAY) --- */
    const starBtn = document.getElementById("starTransitionBtn");
    starBtn.addEventListener("click", (e) => {
        e.preventDefault();

        // 1. Immediately store audio play token in sessionStorage so star.php knows to play without fail
        sessionStorage.setItem("playMusicAuto", "true");

        // 2. Play hyper-drive warp sound/animation
        const hyperScreen = document.getElementById("hyperTransition");
        hyperScreen.classList.add("active");

        // Smoothly fade out intro audio
        const audio = document.getElementById("bgmusic");
        let fadeOut = setInterval(() => {
            if (audio.volume > 0.1) {
                audio.volume -= 0.15;
            } else {
                clearInterval(fadeOut);
                audio.pause();
            }
        }, 80);

        // Run star warp on hyper canvas
        runHyperWarp();

        // Navigate to star.php after cinematic 1.2s warp
        setTimeout(() => {
            window.location.href = "star.php";
        }, 1200);
    });

    function runHyperWarp() {
        const canvas = document.getElementById("hyperCanvas");
        const ctx = canvas.getContext("2d");
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const stars = [];
        for (let i = 0; i < 300; i++) {
            stars.push({
                x: (Math.random() - 0.5) * canvas.width * 2,
                y: (Math.random() - 0.5) * canvas.height * 2,
                z: Math.random() * canvas.width
            });
        }

        function warp() {
            ctx.fillStyle = "rgba(0, 0, 0, 0.25)";
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            const cx = canvas.width / 2;
            const cy = canvas.height / 2;

            for (let i = 0; i < stars.length; i++) {
                const s = stars[i];
                s.z -= 18;
                if (s.z <= 0) s.z = canvas.width;

                const k = 140 / s.z;
                const px = s.x * k + cx;
                const py = s.y * k + cy;

                if (px >= 0 && px <= canvas.width && py >= 0 && py <= canvas.height) {
                    const size = (1 - s.z / canvas.width) * 4;
                    ctx.beginPath();
                    ctx.arc(px, py, size, 0, Math.PI * 2);
                    ctx.fillStyle = "#ff80c0";
                    ctx.fill();
                }
            }
            requestAnimationFrame(warp);
        }
        warp();
    }

    /* --- FLOATING HEARTS --- */
    function initHearts() {
        const heartsContainer = document.getElementById("hearts");
        const heartSymbols = ["❤", "💖", "💕", "✨", "🌸"];

        for (let i = 0; i < 40; i++) {
            const heart = document.createElement("div");
            heart.classList.add("heart");
            heart.innerHTML = heartSymbols[Math.floor(Math.random() * heartSymbols.length)];
            heart.style.left = (Math.random() * 96) + "vw";
            heart.style.fontSize = (16 + Math.random() * 32) + "px";
            heart.style.animationDuration = (6 + Math.random() * 8) + "s";
            heart.style.animationDelay = (Math.random() * 6) + "s";
            heartsContainer.appendChild(heart);
        }
    }

    /* --- GALAXY STARS --- */
    function initStars() {
        const starsContainer = document.getElementById("stars");
        for (let i = 0; i < 280; i++) {
            const star = document.createElement("div");
            star.classList.add("star");
            star.style.left = (Math.random() * 100) + "%";
            star.style.top = (Math.random() * 100) + "%";
            star.style.animationDuration = (1.5 + Math.random() * 3.5) + "s";
            star.style.opacity = (0.2 + Math.random() * 0.8).toString();
            starsContainer.appendChild(star);
        }
    }

    /* --- SHOOTING STARS --- */
    function initShootingStars() {
        const galaxy = document.getElementById("galaxy");

        function createShootingStar() {
            const star = document.createElement("div");
            star.classList.add("shooting-star");
            star.style.top = (Math.random() * 40) + "%";
            star.style.left = (Math.random() * 80 + 10) + "%";
            galaxy.appendChild(star);

            star.animate([
                { transform: 'translate(0, 0) rotate(-35deg)', opacity: 1 },
                { transform: 'translate(-350px, 350px) rotate(-35deg)', opacity: 0 }
            ], {
                duration: 1200 + Math.random() * 800,
                easing: 'ease-out'
            }).onfinish = () => star.remove();
        }

        setInterval(createShootingStar, 3500);
    }

    /* --- FIREWORKS ANIMATION --- */
    function initFireworks() {
        const canvas = document.getElementById('fireworks');
        const ctx = canvas.getContext('2d');

        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        resize();
        window.addEventListener('resize', resize);

        let particles = [];

        function createFirework() {
            const x = Math.random() * canvas.width;
            const y = (Math.random() * 0.45 + 0.1) * canvas.height;
            const count = 70;
            const hue = Math.floor(Math.random() * 60) + 310;

            for (let i = 0; i < count; i++) {
                const angle = Math.random() * Math.PI * 2;
                const speed = Math.random() * 5 + 1.5;
                particles.push({
                    x,
                    y,
                    vx: Math.cos(angle) * speed,
                    vy: Math.sin(angle) * speed,
                    radius: Math.random() * 2.5 + 1,
                    alpha: 1,
                    decay: Math.random() * 0.015 + 0.01,
                    color: `hsla(${hue}, 100%, 75%, `
                });
            }
        }

        function animateFireworks() {
            requestAnimationFrame(animateFireworks);
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            for (let i = particles.length - 1; i >= 0; i--) {
                const p = particles[i];
                p.x += p.vx;
                p.y += p.vy;
                p.vy += 0.04;
                p.alpha -= p.decay;

                if (p.alpha <= 0) {
                    particles.splice(i, 1);
                    continue;
                }

                ctx.beginPath();
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fillStyle = p.color + p.alpha + ')';
                ctx.shadowBlur = 8;
                ctx.shadowColor = '#ff4fa3';
                ctx.fill();
            }
        }

        animateFireworks();
        setInterval(createFirework, 1600);
    }

    /* --- MAGIC STARDUST CURSOR TRAIL --- */
    (function initMagicCursorTrail() {
        const canvas = document.getElementById('trailCanvas');
        const ctx = canvas.getContext('2d');

        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        resize();
        window.addEventListener('resize', resize);

        const sparkles = [];
        const colors = ['#ff85c8', '#ff3d96', '#ffd275', '#ffffff', '#c57dff'];

        function addSparkle(x, y) {
            for (let i = 0; i < 2; i++) {
                sparkles.push({
                    x: x + (Math.random() - 0.5) * 10,
                    y: y + (Math.random() - 0.5) * 10,
                    size: Math.random() * 4 + 1.5,
                    color: colors[Math.floor(Math.random() * colors.length)],
                    alpha: 1,
                    decay: Math.random() * 0.03 + 0.02,
                    vx: (Math.random() - 0.5) * 1.5,
                    vy: (Math.random() - 0.5) * 1.5 - 0.6
                });
            }
        }

        window.addEventListener('mousemove', (e) => {
            addSparkle(e.clientX, e.clientY);
        });

        window.addEventListener('touchmove', (e) => {
            if (e.touches.length > 0) {
                addSparkle(e.touches[0].clientX, e.touches[0].clientY);
            }
        }, { passive: true });

        function animateTrail() {
            requestAnimationFrame(animateTrail);
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            for (let i = sparkles.length - 1; i >= 0; i--) {
                const s = sparkles[i];
                s.x += s.vx;
                s.y += s.vy;
                s.alpha -= s.decay;

                if (s.alpha <= 0) {
                    sparkles.splice(i, 1);
                    continue;
                }

                ctx.save();
                ctx.globalAlpha = s.alpha;
                ctx.fillStyle = s.color;
                ctx.shadowBlur = 6;
                ctx.shadowColor = s.color;

                ctx.beginPath();
                ctx.moveTo(s.x, s.y - s.size);
                ctx.lineTo(s.x + s.size * 0.4, s.y);
                ctx.lineTo(s.x, s.y + s.size);
                ctx.lineTo(s.x - s.size * 0.4, s.y);
                ctx.closePath();
                ctx.fill();
                ctx.restore();
            }
        }

        animateTrail();
    })();
    </script>

</body>
</html>

<?php ?>
<!DOCTYPE html>
<html lang="az">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Galaxy Travel ✨</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&family=Great+Vibes&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    -webkit-tap-highlight-color: transparent;
}

body {
    overflow: hidden;
    background: #020006;
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
    user-select: none;
    min-height: 100vh;
}

/* MAGIC CURSOR CANVAS */
#trailCanvas {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    pointer-events: none;
    z-index: 99998;
}

/* DEEP SPACE */
#space {
    position: fixed;
    inset: 0;
    background: radial-gradient(ellipse at center, #170033 0%, #080015 50%, #000000 100%);
    transition: transform 0.1s ease-out;
}

/* WARP SPEED EFFECT */
#warp {
    position: fixed;
    inset: 0;
    background: linear-gradient(125deg, transparent 0%, rgba(255, 126, 199, 0.04) 45%, transparent 60%);
    animation: warpSpeed 4s infinite linear;
    pointer-events: none;
}

@keyframes warpSpeed {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

/* STARS */
.star {
    position: absolute;
    width: 2px;
    height: 2px;
    background: #ffffff;
    border-radius: 50%;
    animation: twinkle 2.5s infinite alternate ease-in-out;
}

@keyframes twinkle {
    from {
        opacity: 0.15;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1.8);
        box-shadow: 0 0 8px rgba(255, 255, 255, 0.9);
    }
}

/* SHOOTING STAR */
.shooting-star {
    position: absolute;
    width: 140px;
    height: 2px;
    background: linear-gradient(90deg, #ffffff, rgba(255, 126, 199, 0.8), transparent);
    transform: rotate(-35deg);
    filter: drop-shadow(0 0 6px #ff7ec7);
    pointer-events: none;
}

/* PLANETS */
.planet {
    position: absolute;
    border-radius: 50%;
    animation: float 9s infinite alternate ease-in-out;
    pointer-events: none;
}

@keyframes float {
    from { transform: translateY(0px) rotate(0deg); }
    to { transform: translateY(-35px) rotate(6deg); }
}

.sun {
    width: 170px;
    height: 170px;
    background: radial-gradient(circle at 35% 35%, #fff3a1 0%, #ffaa00 45%, #ff4400 80%, #7a1500 100%);
    box-shadow: 0 0 90px rgba(255, 140, 0, 0.75), 0 0 160px rgba(255, 70, 0, 0.4);
}

.saturn {
    width: 110px;
    height: 110px;
    background: radial-gradient(circle at 35% 35%, #ecd2aa 0%, #a67c48 55%, #422910 100%);
    box-shadow: 0 0 40px rgba(210, 180, 140, 0.3);
}

.saturn::after {
    content: '';
    position: absolute;
    width: 180px;
    height: 22px;
    border: 3px solid rgba(255, 230, 190, 0.55);
    border-radius: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(25deg);
    box-shadow: 0 0 15px rgba(255, 220, 180, 0.35);
}

/* CENTER DISPLAY */
.center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #ffffff;
    z-index: 10;
    width: 90%;
    max-width: 520px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* AMBIENT GLOW & VIDEO WRAPPER */
.video-wrapper {
    position: relative;
    display: inline-block;
    border-radius: 28px;
    opacity: 0;
    transform: scale(0.75);
    animation: showVideo 1.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
    animation-delay: 0.5s;
}

@keyframes showVideo {
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.ambient-glow {
    position: absolute;
    inset: -15px;
    border-radius: 35px;
    background: radial-gradient(circle, rgba(255, 61, 150, 0.6) 0%, rgba(138, 43, 226, 0.45) 50%, transparent 75%);
    filter: blur(28px);
    z-index: -1;
    animation: ambientPulse 5s ease-in-out infinite alternate;
}

@keyframes ambientPulse {
    0% {
        transform: scale(0.95);
        opacity: 0.7;
        filter: blur(22px);
    }
    100% {
        transform: scale(1.1);
        opacity: 1;
        filter: blur(35px);
    }
}

.video {
    width: 100%;
    max-width: 320px;
    max-height: 56vh;
    border-radius: 26px;
    object-fit: cover;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.8), 0 0 35px rgba(255, 79, 163, 0.3);
    border: 1px solid rgba(255, 126, 199, 0.35);
    display: block;
}

/* TEXT SECTION */
.text-box {
    margin-top: 22px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}

.text {
    font-size: 23px;
    font-weight: 600;
    color: #ffbfe7;
    text-shadow: 0 0 20px rgba(255, 79, 163, 0.75);
    opacity: 0;
    animation: fadeText 1.6s forwards;
    animation-delay: 1.5s;
}

.sub-message {
    font-size: 17px;
    color: #ffd8ef;
    max-width: 440px;
    line-height: 1.6;
    opacity: 0;
    animation: fadeText 2s forwards;
    animation-delay: 2.5s;
    font-weight: 300;
}

@keyframes fadeText {
    to {
        opacity: 1;
    }
}

/* FLOATING BACK BUTTON */
.back-btn {
    margin-top: 18px;
    padding: 10px 24px;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(255, 126, 199, 0.25);
    color: #ffb8df;
    text-decoration: none;
    font-size: 14px;
    letter-spacing: 1px;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    opacity: 0;
    animation: fadeText 1.5s forwards;
    animation-delay: 3.2s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.back-btn:hover {
    background: rgba(255, 61, 150, 0.2);
    border-color: rgba(255, 126, 199, 0.6);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 0 20px rgba(255, 61, 150, 0.35);
}

@media (max-width: 600px) {
    .video {
        max-width: 270px;
        max-height: 50vh;
    }
    .text { font-size: 19px; }
    .sub-message { font-size: 15px; }
    .sun { width: 120px; height: 120px; }
    .saturn { width: 80px; height: 80px; }
    .saturn::after { width: 130px; height: 16px; }
}
</style>
</head>

<body>

<!-- MAGIC STARDUST TRAIL -->
<canvas id="trailCanvas"></canvas>

<!-- AUDIO (NO VISIBLE CONTROLS - AUTO-STARTS IMMEDIATELY) -->
<audio id="bgmusic" loop preload="auto" autoplay playsinline>
    <source src="music.mp3" type="audio/mpeg">
</audio>

<div id="space"></div>
<div id="warp"></div>

<!-- PLANETS -->
<div class="planet sun" style="top: 8%; left: 8%;"></div>
<div class="planet saturn" style="bottom: 12%; right: 10%;"></div>

<!-- CENTER STAGE -->
<div class="center">

    <!-- VIDEO WITH AMBIENT LIGHT -->
    <div class="video-wrapper">
        <div class="ambient-glow"></div>
        <video id="video" class="video" autoplay muted loop playsinline>
            <source src="video.mp4" type="video/mp4">
        </video>
    </div>

    <!-- TEXT MESSAGES -->
    <div class="text-box">
        <div class="text">
            kainatın ən parlaq ulduzu tapıldı! ✨
        </div>

        <div class="sub-message">
            Bu kainatda milyonlarla ulduz var, amma mənim tək dünyam sənsən 💖
        </div>

        <a href="index.php" class="back-btn">
            ← Əvvələ qayıt
        </a>
    </div>

</div>

<script>
/* --- STARS GENERATION --- */
const space = document.getElementById("space");
for (let i = 0; i < 280; i++) {
    const star = document.createElement("div");
    star.className = "star";
    star.style.left = (Math.random() * 100) + "vw";
    star.style.top = (Math.random() * 100) + "vh";
    star.style.animationDuration = (1.2 + Math.random() * 3) + "s";
    star.style.opacity = (0.2 + Math.random() * 0.8).toString();
    space.appendChild(star);
}

/* --- SHOOTING STARS --- */
function createShootingStar() {
    const star = document.createElement("div");
    star.className = "shooting-star";
    star.style.top = (Math.random() * 45) + "%";
    star.style.left = (Math.random() * 80 + 10) + "%";
    document.body.appendChild(star);

    star.animate([
        { transform: 'translate(0, 0) rotate(-35deg)', opacity: 1 },
        { transform: 'translate(-320px, 320px) rotate(-35deg)', opacity: 0 }
    ], {
        duration: 1200 + Math.random() * 600,
        easing: 'ease-out'
    }).onfinish = () => star.remove();
}
setInterval(createShootingStar, 4000);

/* --- PARALLAX EFFECT --- */
document.addEventListener("mousemove", (e) => {
    const x = (e.clientX - window.innerWidth / 2) * 0.015;
    const y = (e.clientY - window.innerHeight / 2) * 0.015;
    space.style.transform = `translate(${x}px, ${y}px)`;
});

/* --- ULTIMATE 100% RELIABLE AUTOPLAY ENGINE --- */
(function setupAutoplay() {
    const audio = document.getElementById("bgmusic");
    const video = document.getElementById("video");

    video.play().catch(() => {});

    function tryPlay() {
        if (!audio.paused) return;
        audio.volume = 0.7;
        const playPromise = audio.play();
        if (playPromise !== undefined) {
            playPromise.then(() => {
                // Audio started successfully
                removeUnlockListeners();
            }).catch(() => {
                // Browser locked until first user gesture
            });
        }
    }

    // Attempt 1: Immediate execution on script run
    tryPlay();

    // Attempt 2: DOMContentLoaded & Load
    document.addEventListener("DOMContentLoaded", tryPlay);
    window.addEventListener("load", tryPlay);

    // Attempt 3: Any gesture (touchstart, pointerdown, click, scroll, mousemove)
    const unlockEvents = ["touchstart", "touchend", "pointerdown", "click", "keydown", "scroll"];
    function onFirstGesture() {
        tryPlay();
    }
    unlockEvents.forEach(evt => {
        window.addEventListener(evt, onFirstGesture, { passive: true });
    });

    function removeUnlockListeners() {
        unlockEvents.forEach(evt => {
            window.removeEventListener(evt, onFirstGesture);
        });
    }
})();

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
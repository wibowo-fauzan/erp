<svg class="auth-decor" viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" aria-hidden="true" focusable="false">
    <defs>
        <radialGradient id="authBlobA" cx="50%" cy="50%" r="50%">
            <stop offset="0%" stop-color="#fbcfe0" stop-opacity=".55"/>
            <stop offset="100%" stop-color="#fbcfe0" stop-opacity="0"/>
        </radialGradient>
        <radialGradient id="authBlobB" cx="50%" cy="50%" r="50%">
            <stop offset="0%" stop-color="#f9c6db" stop-opacity=".45"/>
            <stop offset="100%" stop-color="#f9c6db" stop-opacity="0"/>
        </radialGradient>
        <radialGradient id="authPearl" cx="35%" cy="30%" r="75%">
            <stop offset="0%" stop-color="#ffffff"/>
            <stop offset="45%" stop-color="#fdeef4"/>
            <stop offset="100%" stop-color="#f3c3d6"/>
        </radialGradient>
        <linearGradient id="authRibbon" x1="0" y1="0" x2="1" y2="0">
            <stop offset="0%" stop-color="#f6c9da" stop-opacity="0"/>
            <stop offset="18%" stop-color="#efa9c4"/>
            <stop offset="82%" stop-color="#efa9c4"/>
            <stop offset="100%" stop-color="#f6c9da" stop-opacity="0"/>
        </linearGradient>
        <linearGradient id="authRibbonGold" x1="0" y1="0" x2="1" y2="0">
            <stop offset="0%" stop-color="#e8cfa8" stop-opacity="0"/>
            <stop offset="30%" stop-color="#e0bd8d"/>
            <stop offset="70%" stop-color="#e8cfa8"/>
            <stop offset="100%" stop-color="#e8cfa8" stop-opacity="0"/>
        </linearGradient>

        <path id="authPetal" d="M0 -2 C -10 -8 -15 -20 -11 -30 C -8 -37 -3 -35 0 -30 C 3 -35 8 -37 11 -30 C 15 -20 10 -8 0 -2 Z"/>

        <g id="authFlower">
            <use href="#authPetal"/>
            <use href="#authPetal" transform="rotate(72)"/>
            <use href="#authPetal" transform="rotate(144)"/>
            <use href="#authPetal" transform="rotate(216)"/>
            <use href="#authPetal" transform="rotate(288)"/>
            <circle r="7" fill="#f8a9c6"/>
            <circle r="3.4" fill="#fde8f0"/>
            <circle r="1.7" cx="0" cy="-10" fill="#e0578a"/>
            <circle r="1.7" cx="0" cy="-10" fill="#e0578a" transform="rotate(72)"/>
            <circle r="1.7" cx="0" cy="-10" fill="#e0578a" transform="rotate(144)"/>
            <circle r="1.7" cx="0" cy="-10" fill="#e0578a" transform="rotate(216)"/>
            <circle r="1.7" cx="0" cy="-10" fill="#e0578a" transform="rotate(288)"/>
        </g>

        <path id="authSparkle" d="M0 -16 C2 -5 5 -2 16 0 C5 2 2 5 0 16 C-2 5 -5 2 -16 0 C-5 -2 -2 -5 0 -16 Z"/>
        <path id="authSparkleSmall" d="M0 -9 C1.4 -2.8 2.8 -1.4 9 0 C2.8 1.4 1.4 2.8 0 9 C-1.4 2.8 -2.8 1.4 -9 0 C-2.8 -1.4 -1.4 -2.8 0 -9 Z"/>

        <path id="authProfile" d="M 100 8 C 128 10 150 30 156 58 C 160 76 152 92 142 104 C 136 110 132 112 132 118 C 150 132 172 138 174 146 C 176 154 158 154 144 156 C 150 162 150 164 146 166 C 142 170 134 172 134 176 C 134 180 142 180 146 182 C 150 190 154 196 154 202 C 154 210 142 214 130 218 C 128 246 128 272 126 300 L 28 300 C 22 240 18 188 16 140 C 14 100 22 58 44 34 C 60 16 80 6 100 8 Z"/>
    </defs>

    {{-- watercolor wash --}}
    <ellipse cx="250" cy="80" rx="430" ry="270" fill="url(#authBlobA)"/>
    <ellipse cx="210" cy="780" rx="470" ry="300" fill="url(#authBlobB)"/>
    <ellipse cx="1190" cy="540" rx="380" ry="420" fill="url(#authBlobA)"/>
    <ellipse cx="880" cy="30" rx="320" ry="180" fill="url(#authBlobB)"/>

    {{-- flowing ribbons --}}
    <path d="M-40 690 C 300 610 520 750 900 650 S 1250 550 1480 630" fill="none" stroke="url(#authRibbon)" stroke-width="2.4"/>
    <path d="M-40 660 C 320 580 540 700 920 620 S 1260 530 1480 600" fill="none" stroke="url(#authRibbonGold)" stroke-width="1.2"/>
    <path d="M-40 800 C 280 730 560 850 940 750 S 1280 660 1480 730" fill="none" stroke="url(#authRibbon)" stroke-width="1.8"/>
    <path d="M-40 840 C 300 790 600 880 960 800 S 1300 730 1480 790" fill="none" stroke="url(#authRibbonGold)" stroke-width="1"/>

    {{-- top-left blossom branch --}}
    <path d="M-60 4 C 120 34 220 84 330 150" fill="none" stroke="#e0a2bd" stroke-width="2.6" stroke-linecap="round"/>
    <path d="M150 74 C 210 52 262 56 300 82" fill="none" stroke="#e0a2bd" stroke-width="1.8" stroke-linecap="round"/>
    <path d="M96 48 C 130 26 168 22 204 30" fill="none" stroke="#e0a2bd" stroke-width="1.4" stroke-linecap="round"/>
    <use href="#authFlower" fill="#f9a8c4" transform="translate(-16,26) rotate(-18) scale(1.15)"/>
    <use href="#authFlower" fill="#fbc7d8" transform="translate(88,52) rotate(12) scale(.82)"/>
    <use href="#authFlower" fill="#f8a3c0" transform="translate(178,92) rotate(-8) scale(1.28)"/>
    <use href="#authFlower" fill="#fbc7d8" transform="translate(300,82) rotate(20) scale(.62)"/>
    <use href="#authFlower" fill="#f9a8c4" transform="translate(252,124) rotate(-26) scale(.95)"/>
    <use href="#authFlower" fill="#fbc7d8" transform="translate(322,152) rotate(10) scale(.68)"/>
    <use href="#authPetal" fill="#fbc7d8" transform="translate(372,236) rotate(58) scale(.85)"/>
    <use href="#authPetal" fill="#f9a8c4" transform="translate(442,318) rotate(-42) scale(.7)"/>
    <use href="#authPetal" fill="#fbc7d8" transform="translate(498,408) rotate(24) scale(.55)"/>
    <use href="#authPetal" fill="#f9a8c4" transform="translate(556,486) rotate(-64) scale(.42)"/>

    {{-- sparkles top area --}}
    <use href="#authSparkle" fill="#e9c496" transform="translate(64,214) scale(1)"/>
    <use href="#authSparkleSmall" fill="#e9c496" transform="translate(158,302) scale(1.1)"/>
    <use href="#authSparkleSmall" fill="#e5b98f" transform="translate(296,252) scale(.8)"/>
    <use href="#authSparkle" fill="#fff" transform="translate(520,120) scale(.7)"/>
    <use href="#authSparkleSmall" fill="#e9c496" transform="translate(620,210) scale(.9)"/>

    {{-- near brand (top-right) --}}
    <use href="#authSparkle" fill="#e9c496" transform="translate(1052,128) scale(.8)"/>
    <use href="#authSparkleSmall" fill="#e5b98f" transform="translate(1160,64) scale(1)"/>
    <use href="#authSparkleSmall" fill="#e9c496" transform="translate(1128,262) scale(.75)"/>
    <use href="#authFlower" fill="#fbc7d8" transform="translate(1252,196) rotate(16) scale(.5)"/>
    <use href="#authFlower" fill="#f9a8c4" transform="translate(1386,74) rotate(-12) scale(.42)"/>
    <use href="#authPetal" fill="#fbc7d8" transform="translate(1216,318) rotate(48) scale(.5)"/>
    <use href="#authPetal" fill="#f9a8c4" transform="translate(1330,392) rotate(-36) scale(.42)"/>
    <use href="#authSparkleSmall" fill="#fff" transform="translate(1392,350) scale(.7)"/>

    {{-- bottom-left profile & blossoms --}}
    <use href="#authProfile" transform="translate(28,452) scale(1.18)" fill="#f6b8cf" opacity=".6"/>
    <use href="#authProfile" transform="translate(34,458) scale(1.18)" fill="none" stroke="#e79ab8" stroke-width="1.6" opacity=".5"/>
    <use href="#authFlower" fill="#f9a8c4" transform="translate(172,556) rotate(14) scale(1.5)"/>
    <use href="#authFlower" fill="#fbc7d8" transform="translate(88,648) rotate(-20) scale(1.15)"/>
    <use href="#authFlower" fill="#f8a3c0" transform="translate(218,704) rotate(28) scale(.9)"/>
    <use href="#authFlower" fill="#fbc7d8" transform="translate(148,790) rotate(-8) scale(.85)"/>
    <use href="#authFlower" fill="#f9a8c4" transform="translate(64,438) rotate(36) scale(.62)"/>
    <use href="#authPetal" fill="#fbc7d8" transform="translate(252,470) rotate(52) scale(.6)"/>
    <use href="#authPetal" fill="#f9a8c4" transform="translate(210,848) rotate(-50) scale(.7)"/>
    <use href="#authPetal" fill="#fbc7d8" transform="translate(96,872) rotate(30) scale(.5)"/>
    <use href="#authPetal" fill="#f9a8c4" transform="translate(306,610) rotate(-70) scale(.5)"/>
    <use href="#authSparkleSmall" fill="#e9c496" transform="translate(86,500) scale(1)"/>
    <use href="#authSparkle" fill="#fff" transform="translate(258,558) scale(.55)"/>
    <use href="#authSparkleSmall" fill="#e9c496" transform="translate(178,872) scale(.8)"/>

    {{-- right side flourish --}}
    <use href="#authFlower" fill="#fbc7d8" transform="translate(1348,560) rotate(-16) scale(.68)"/>
    <use href="#authFlower" fill="#f9a8c4" transform="translate(1306,742) rotate(22) scale(.5)"/>
    <use href="#authPetal" fill="#fbc7d8" transform="translate(1382,664) rotate(60) scale(.5)"/>
    <use href="#authPetal" fill="#f9a8c4" transform="translate(1268,838) rotate(-28) scale(.6)"/>

    {{-- pearls --}}
    <circle cx="742" cy="648" r="13" fill="url(#authPearl)"/>
    <circle cx="1042" cy="686" r="9" fill="url(#authPearl)"/>
    <circle cx="1236" cy="742" r="14" fill="url(#authPearl)"/>
    <circle cx="898" cy="806" r="8" fill="url(#authPearl)"/>
    <circle cx="1288" cy="842" r="10" fill="url(#authPearl)"/>
    <circle cx="606" cy="596" r="7" fill="url(#authPearl)"/>
</svg>

<a class="auth-brand" href="{{ route('home') }}" aria-label="Octa Beauty Care - Beranda">
    <span class="auth-brand-copy">
        <span class="auth-brand-name">Octa</span>
        <span class="auth-brand-tagline">face &amp; Beauty Care</span>
    </span>
    <span class="auth-brand-mark" aria-hidden="true">
        <svg viewBox="0 0 64 64" fill="none">
            <path d="M41 5 A31 31 0 1 0 41 59 A26 25 0 1 1 41 5 Z" fill="#f491b4"/>
            <path transform="translate(52,13) scale(-0.165,0.165)" d="M 100 8 C 128 10 150 30 156 58 C 160 76 152 92 142 104 C 136 110 132 112 132 118 C 150 132 172 138 174 146 C 176 154 158 154 144 156 C 150 162 150 164 146 166 C 142 170 134 172 134 176 C 134 180 142 180 146 182 C 150 190 154 196 154 202 C 154 210 142 214 130 218 C 128 246 128 272 126 300 L 28 300 C 22 240 18 188 16 140 C 14 100 22 58 44 34 C 60 16 80 6 100 8 Z" fill="#e0578a"/>
        </svg>
    </span>
</a>

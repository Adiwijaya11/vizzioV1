<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'VizzioCraft')</title>
    <meta name="description" content="@yield('meta_description', 'VizzioCraft — modern digital solutions for growing businesses.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-bg font-sans text-ink antialiased">
    {{-- Preloader --}}
    <div id="preloader" aria-hidden="true">
        <div class="preloader__inner">
            <div class="preloader__logo">Vizzio<span>Craft</span></div>
            <div class="preloader__dots">
                <div class="preloader__dot"></div>
                <div class="preloader__dot"></div>
                <div class="preloader__dot"></div>
            </div>
        </div>
    </div>
    <style>
        #preloader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1E3A8A 0%, #2563EB 50%, #1D4ED8 100%);
            transition: opacity .6s cubic-bezier(.4,0,.2,1), visibility .6s;
        }
        #preloader.preloader--done {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
        .preloader__inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
        }
        .preloader__logo {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: clamp(1.75rem, 5vw, 2.5rem);
            color: #fff;
            letter-spacing: -.02em;
            opacity: 0;
            transform: translateY(12px) scale(.96);
            animation: preloaderLogoIn .7s cubic-bezier(.22,1,.36,1) .15s forwards;
        }
        .preloader__logo span {
            color: rgba(255,255,255,.55);
        }
        .preloader__dots {
            display: flex;
            gap: .5rem;
        }
        .preloader__dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255,255,255,.85);
            animation: preloaderBounce 1.4s cubic-bezier(.33,1,.68,1) infinite;
        }
        .preloader__dot:nth-child(2) { animation-delay: .15s; }
        .preloader__dot:nth-child(3) { animation-delay: .3s; }

        @keyframes preloaderLogoIn {
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes preloaderBounce {
            0%, 80%, 100% { transform: scale(1); opacity: .4; }
            40% { transform: scale(1.6); opacity: 1; }
        }
    </style>
    <script>
        (function(){
            var p = document.getElementById('preloader');
            function hide() {
                if (!p) return;
                p.classList.add('preloader--done');
                p.addEventListener('transitionend', function() { p.remove(); }, { once: true });
            }
            window.addEventListener('load', function() {
                setTimeout(hide, 300);
            });
            setTimeout(hide, 5000);
        })();
    </script>

    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />
    <x-whatsapp-chat />
    @stack('scripts')
</body>
</html>

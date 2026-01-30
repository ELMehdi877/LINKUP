<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LINKUP | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-main: #F4F7FE;
            --accent-pink: #FF6B81;
            --deep-black: #0C0C0C;
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: var(--bg-main);
            color: #1A1A1A;
            letter-spacing: -0.02em;
        }

        .squircle-lg { border-radius: 40px; }
        @media (min-width: 1024px) { .squircle-lg { border-radius: 48px; } }
        .squircle-md { border-radius: 24px; }
        .squircle-sm { border-radius: 16px; }

        .shadow-premium {
            box-shadow: 0 20px 50px -12px rgba(0, 0, 0, 0.04);
        }

        .input-field {
            background-color: #FFFFFF;
            border: 1px solid rgba(0,0,0,0.03);
            border-radius: 20px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .input-field:focus {
            border-color: var(--deep-black);
            box-shadow: 0 15px 30px -10px rgba(0,0,0,0.05);
            outline: none;
        }

        /* Masquer la scrollbar */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        @keyframes reveal {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-reveal { animation: reveal 0.6s ease-out forwards; }
    </style>
</head>
<body class="h-screen overflow-hidden flex flex-col lg:flex-row p-3 md:p-6 gap-4 lg:gap-6">

    <!-- SIDEBAR (FIXE sur Desktop) -->
    <aside class="fixed bottom-4 left-4 right-4 lg:relative lg:bottom-0 lg:left-0 lg:right-0 z-50 lg:w-72 lg:h-full bg-white/80 lg:bg-white backdrop-blur-lg lg:backdrop-blur-none squircle-md lg:squircle-lg shadow-2xl lg:shadow-premium p-4 lg:p-8 flex flex-row lg:flex-col items-center justify-around lg:justify-start transition-all duration-500 border border-white/50">
        
        <div class="hidden lg:flex items-center gap-4 mb-16">
            <div class="w-12 h-12 bg-black rounded-2xl flex items-center justify-center rotate-3 shadow-xl">
                <span class="text-white font-extrabold text-xl italic">L</span>
            </div>
            <span class="text-2xl font-black tracking-tighter">LINKUP</span>
        </div>

        <div class="flex flex-row lg:flex-col w-full gap-2 lg:space-y-3">
            <a href="{{url('/Feeds')}}" class="flex-1 lg:flex items-center justify-center lg:justify-start gap-4 px-3 py-3 lg:px-5 lg:py-4 font-bold @yield('nav-home', 'text-gray-400') hover:text-black transition-all group">
                <div class="text-xl lg:w-10 lg:h-10 flex items-center justify-center rounded-xl group-hover:bg-gray-100">🏠</div>
                <span class="hidden lg:block text-sm">Feeds</span>
            </a>
            <a href="{{url('/search')}}" class="flex-1 lg:flex items-center justify-center lg:justify-start gap-4 px-3 py-3 lg:px-5 lg:py-4 font-bold @yield('nav-search', 'text-gray-400') transition-all">
                <div class="text-xl lg:w-10 lg:h-10 flex items-center justify-center rounded-xl">👥</div>
                <span class="hidden lg:block text-sm">Explorer</span>
            </a>
            <a href="{{url('/Messages')}}" class="flex-1 lg:flex items-center justify-center lg:justify-start gap-4 px-3 py-3 lg:px-5 lg:py-4 font-bold @yield('nav-messages', 'text-gray-400') hover:text-black transition-all group">
                <div class="text-xl lg:w-10 lg:h-10 flex items-center justify-center rounded-xl group-hover:bg-gray-100">💬</div>
                <span class="hidden lg:block text-sm">Messages</span>
            </a>
            <a href="{{url('/profile')}}" class="flex-1 lg:flex items-center justify-center lg:justify-start gap-4 px-3 py-3 lg:px-5 lg:py-4 font-bold @yield('nav-profile', 'text-gray-400') transition-all">
                <div class="text-xl lg:w-10 lg:h-10 flex items-center justify-center rounded-xl">👤</div>
                <span class="hidden lg:block text-sm">Profile</span>
            </a>
        </div>

        <div class="hidden lg:block mt-auto w-full pt-10 border-t border-gray-50 text-center">
            <button class="text-[10px] font-black uppercase tracking-[0.2em] text-red-400 hover:text-red-500 transition">Logout</button>
        </div>
    </aside>

    <!-- MAIN CONTENT (SCROLLABLE) -->
    <main class="flex-1 overflow-y-auto no-scrollbar pb-24 lg:pb-0 space-y-6 lg:space-y-8 animate-reveal">
        @yield('content')
    </main>

</body>
</html>
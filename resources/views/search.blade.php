@extends('layouts.app')

@section('title', 'Explorer')
@section('nav-search', 'text-white bg-black squircle-sm lg:squircle-sm shadow-xl lg:shadow-black/10')

@section('content')
    <!-- Header & Recherche -->
    <section class="bg-white squircle-md lg:squircle-lg p-3 lg:p-6 flex flex-col gap-6 border border-white shadow-premium">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h1 class="text-3xl lg:text-3xl font-extrabold tracking-tight">Explorer</h1>
            <div class="flex -space-x-2">
                <img src="https://i.pravatar.cc/100?u=1" class="w-6 h-6 rounded-full border-2 border-white">
                <img src="https://i.pravatar.cc/100?u=2" class="w-6 h-6 rounded-full border-2 border-white">
                <div class="w-6 h-6 rounded-full bg-gray-100 border-2 border-white flex items-center justify-center text-[8px] font-bold">+2k</div>
            </div>  
        </div>

        <form action="/showUsers" method="GET" class="flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1 group">
                <span class="absolute left-5 top-1/2 -translate-y-1/2 text-lg opacity-30">🔍</span>
                <input type="text" name="inputSearch" placeholder="Pseudo ou email..." class="input-field w-full py-4 lg:py-5 pl-14 pr-6 font-bold text-gray-700">
            </div>
            <button class="bg-black text-white px-4 py-2 lg:py-2 rounded-2xl lg:squircle-sm font-bold text-m shadow-xl shadow-black/10 active:scale-95 transition-all">
                Rechercher
            </button>
        </form>
    </section>

    <!-- Résultats -->
    <div class="flex flex-col xl:flex-row gap-6 lg:gap-8">
        <div class="flex-1 space-y-6">
            <h2 class="text-lg font-800 ml-2 flex items-center gap-2">
                <span class="w-1 h-5 bg-black rounded-full"></span>
                Suggérés pour vous
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6">
                @if(Session('error'))
                    <p style="color : black">{{Session('error')}}</p>
                @endif
                
                @forelse($users as $user)
                    <div class="bg-white squircle-md lg:squircle-lg p-6 lg:p-8 border border-white shadow-premium hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center gap-4 mb-5">
                            <img src="{{ $user->photo }}" class="w-14 h-14 rounded-2xl object-cover">
                            <div>
                                <h4 class="font-black text-base lg:text-lg">{{ $user->name }}</h4>
                                <p class="text-[10px] font-black text-indigo-500 uppercase tracking-widest">{{ '@'.$user->pseudo }}</p>
                            </div>
                        </div>
                        <p class="text-gray-400 text-xs font-medium mb-6">{{ $user->email }}</p>
                        <button class="w-full bg-black text-white py-3.5 rounded-xl lg:squircle-sm font-bold text-[10px] uppercase tracking-widest">Ajouter</button>
                    </div>
                @empty
                    <p class="text-gray-400 text-sm">Aucun utilisateur trouvé.</p>
                @endforelse
                <!-- Carte 2 -->
                <!-- <div class="bg-white squircle-md lg:squircle-lg p-6 lg:p-8 border border-white shadow-premium">
                    <div class="flex items-center gap-4 mb-5">
                        <img src="https://i.pravatar.cc/150?u=anatoly" class="w-14 h-14 rounded-2xl object-cover">
                        <div>
                            <h4 class="font-black text-base lg:text-lg">Anatoly Pr.</h4>
                            <p class="text-[10px] font-black text-indigo-500 uppercase tracking-widest">@anatoly_team</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-xs font-medium mb-6">Product Manager @LINKUP. Let's build together.</p>
                    <button class="w-full bg-[#FF6B81] text-white py-3.5 rounded-xl lg:squircle-sm font-bold text-[10px] uppercase tracking-widest shadow-lg shadow-red-100">En attente</button>
                </div> -->
            </div>
        </div>

        <!-- Sidebar droite (Trends) -->
        <div class="w-full xl:w-80 space-y-6">
            <div class="bg-white squircle-md lg:squircle-lg p-6 lg:p-8 border border-white shadow-premium">
                <h3 class="font-black text-sm uppercase tracking-widest mb-6 flex items-center gap-2">🌟 Tendances</h3>
                <div class="space-y-5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gray-100 rounded-full overflow-hidden"><img src="https://i.pravatar.cc/100?u=ivan"></div>
                            <span class="text-xs font-bold">Ivan Shev.</span>
                        </div>
                        <button class="text-[10px] font-black text-indigo-500">VOIR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
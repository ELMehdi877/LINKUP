@extends('layouts.app')

@section('title', 'Explorer')

@section('content')
<section class="bg-white squircle-md lg:squircle-lg p-6 lg:p-10 flex flex-col gap-6 border border-white shadow-premium">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h1 class="text-3xl font-extrabold tracking-tight">Explorer la communauté</h1>
        <div class="flex -space-x-2">
            @foreach($recentUsers ?? [] as $recent)
                <img src="https://i.pravatar.cc/100?u={{ $recent->id }}" class="w-8 h-8 rounded-full border-2 border-white">
            @endforeach
            <div class="w-8 h-8 rounded-full bg-gray-100 border-2 border-white flex items-center justify-center text-[8px] font-bold">+2k</div>
        </div>
    </div>

    <form action="{{ route('users.search') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1 group">
            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-lg opacity-30">🔍</span>
            <input type="text" name="query" value="{{ request('query') }}" placeholder="Pseudo ou email..." class="input-field w-full py-4 lg:py-5 pl-14 pr-6 font-bold text-gray-700">
        </div>
        <button type="submit" class="bg-black text-white px-10 py-4 lg:py-5 rounded-2xl lg:squircle-sm font-bold text-sm shadow-xl active:scale-95 transition-all">
            Rechercher
        </button>
    </form>
</section>

<div class="flex flex-col xl:flex-row gap-8">
    <div class="flex-1 space-y-6">
        <h2 class="text-lg font-800 ml-2 flex items-center gap-2">
            <span class="w-1 h-5 bg-black rounded-full"></span> Résultats
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($users as $user)
            <div class="bg-white squircle-md lg:squircle-lg p-6 lg:p-8 border border-white shadow-premium hover:shadow-xl transition-all">
                <div class="flex items-center gap-4 mb-5">
                    <img src="{{ $user->avatar ?? 'https://i.pravatar.cc/150?u='.$user->id }}" class="w-14 h-14 rounded-2xl object-cover">
                    <div class="overflow-hidden">
                        <h4 class="font-black text-base lg:text-lg truncate">{{ $user->prenom }} {{ $user->nom }}</h4>
                        <p class="text-[10px] font-black text-indigo-500 uppercase tracking-widest">{{ '@'.$user->pseudo }}</p>
                    </div>
                </div>
                <p class="text-gray-400 text-xs font-medium mb-6 line-clamp-2">{{ $user->bio ?? 'Aucune biographie.' }}</p>
                <button class="w-full bg-black text-white py-3.5 rounded-xl lg:squircle-sm font-bold text-[10px] uppercase tracking-widest">
                    Ajouter Ami
                </button>
            </div>
            @empty
            <div class="col-span-2 py-20 text-center opacity-30">
                <p class="text-xl font-bold italic tracking-tighter">Aucun membre trouvé...</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Sidebar Droite -->
    <div class="w-full xl:w-80 space-y-6">
        <div class="bg-white squircle-md lg:squircle-lg p-8 border border-white shadow-premium">
            <h3 class="font-black text-sm uppercase tracking-widest mb-6">🌟 Tendances</h3>
            <div class="space-y-5">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://i.pravatar.cc/100?u=12" class="w-8 h-8 rounded-full">
                        <span class="text-xs font-bold">Ivan Shev.</span>
                    </div>
                    <button class="text-[10px] font-black text-indigo-500">VOIR</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
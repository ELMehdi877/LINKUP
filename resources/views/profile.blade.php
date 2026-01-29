@extends('layouts.app')

@section('title', 'Studio Profil')

@section('content')
<!-- Header Profil Dynamique -->
<div class="bg-white squircle-lg p-6 lg:p-10 flex flex-col md:flex-row items-center justify-between gap-8 border border-white shadow-premium">
    <div class="flex items-center gap-8">
        <div class="relative">
            <div class="w-32 h-32 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-[40px] p-1.5 shadow-2xl">
                <img src="{{ auth()->user()->avatar ?? 'https://i.pravatar.cc/150?u=' . auth()->id() }}" class="w-full h-full rounded-[36px] object-cover bg-white">
            </div>
            <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-green-500 border-[6px] border-white rounded-full"></div>
            <!-- Bouton séparé pour la photo -->
            <form action="" method="POST" enctype="multipart/form-data" id="avatarForm">
                @csrf
                <label class="absolute -bottom-4 -right-4 w-14 h-14 bg-black text-white rounded-2xl flex items-center justify-center shadow-xl hover:scale-110 cursor-pointer transition border-4 border-[#F4F7FE]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <input type="file" name="avatar" class="hidden" onchange="document.getElementById('avatarForm').submit()">
                </label>
            </form>
        </div>
        <div>
            <h1 class="text-3xl lg:text-4xl font-extrabold tracking-tight">Mehdi laharch</h1>
            <p class="text-gray-400 font-bold tracking-widest uppercase text-[10px] mt-1">@mehdi</p>
            <div class="flex gap-2 mt-4">
                <span class="px-4 py-1.5 bg-gray-100 rounded-full text-[10px] font-black uppercase">🔥 1.2k Woow!!</span>
            </div>
        </div>
    </div>
    <button onclick="document.getElementById('profileUpdateForm').submit()" class="bg-black text-white px-8 py-4 squircle-sm font-bold text-sm hover:scale-105 transition-all shadow-xl shadow-black/10">
        Enregistrer les modifications
    </button>
</div>

<div class="grid lg:grid-cols-12 gap-8 pb-10">
    <div class="lg:col-span-8 bg-white squircle-lg p-8 lg:p-12 shadow-premium border border-white">
        <h2 class="text-2xl font-800 mb-10 flex items-center gap-4">
            <span class="w-1.5 h-6 bg-black rounded-full"></span> Identité
        </h2>

        <form id="profileUpdateForm" action="" method="POST" class="space-y-8">
            @csrf @method('PATCH')
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-3">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Pseudo Unique</label>
                    <input type="text" name="pseudo" value="@mehdi" class="w-full px-7 py-5 input-field font-bold text-gray-800">
                </div>
                <div class="space-y-3">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Email</label>
                    <input type="email" name="email" value="Mehdi@gmail.com" class="w-full px-7 py-5 input-field font-bold text-gray-800">
                </div>
                <div class="space-y-3">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Prénom</label>
                    <input type="text" name="prenom" value="mehdi" class="w-full px-7 py-5 input-field font-bold text-gray-800">
                </div>
                <div class="space-y-3">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Nom</label>
                    <input type="text" name="nom" value="lahrach" class="w-full px-7 py-5 input-field font-bold text-gray-800">
                </div>
                <div class="md:col-span-2 space-y-3">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Bio & Présentation</label>
                    <textarea name="bio" rows="3" class="w-full px-7 py-5 input-field font-bold text-gray-800 leading-relaxed">mehdi mehdi mehdi kbick ilkbfikb ikb"fuj 




                    
                    </textarea>
                </div>
            </div>
        </form>
    </div>

    <!-- Sécurité -->
    <div class="lg:col-span-4 space-y-8">
        <div class="bg-white squircle-lg p-10 shadow-premium border border-white">
            <h3 class="text-xl font-bold mb-8">🔐 Sécurité</h3>
            <form action="" method="POST" class="space-y-6">
                @csrf @method('PUT')
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Ancien mot de passe</label>
                    <input type="password" name="current_password" class="w-full px-6 py-4 input-field text-sm">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Nouveau</label>
                    <input type="password" name="password" class="w-full px-6 py-4 input-field text-sm">
                </div>
                <button class="w-full bg-[#FF6B81] text-white py-5 squircle-md font-black text-xs uppercase tracking-widest shadow-xl shadow-red-200 hover:scale-[1.02] transition-all">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
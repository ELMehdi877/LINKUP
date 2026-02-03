@extends('layouts.app')

@section('title', 'Mon Profil')
@section('nav-profile', 'text-white bg-black squircle-sm lg:squircle-sm shadow-xl lg:shadow-black/10')

@section('content')
    <!-- Header Profil (Avatar & Nom) -->
    <form action="/profileUpdatePhoto" method="POST" enctype="multipart/form-data" class="bg-white squircle-md lg:squircle-lg p-6 lg:p-10 flex flex-col md:flex-row items-center justify-between gap-8 border border-white shadow-premium">
        @csrf
        <div class="flex flex-col md:flex-row items-center gap-8 text-center md:text-left">
            <div class="relative">
                <!-- Avatar -->
                <div class="w-32 h-32 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-[40px] p-1.5 shadow-2xl">
                    <img id="profileImagePreview" src="{{ asset($user->photo) }}" class="w-full h-full rounded-[36px] object-cover bg-white">
                </div>
                
                <!-- Status Online -->
                <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-green-500 border-[6px] border-white rounded-full"></div>
                
                <!-- Bouton Photo avec Input intégré -->
                <label class="absolute -bottom-4 -right-4 w-14 h-14 bg-black text-white rounded-2xl flex items-center justify-center shadow-xl hover:scale-110 active:scale-95 transition border-4 border-[#F4F7FE] cursor-pointer">
                    <!-- Input file caché mais fonctionnel -->
                    <input id="photoInput" name="photoProfile" type="file" class="hidden" accept="image/*">
                    
                    <!-- L'icône SVG reste identique -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </label>
            </div>
            <div>
                <h1 class="text-3xl lg:text-4xl font-extrabold tracking-tight">{{$user->name}}</h1>
                <p class="text-gray-400 font-bold tracking-widest text-[10px] mt-1">{{'@'.$user->pseudo}}</p>
                <div class="flex justify-center md:justify-start gap-2 mt-4">
                    <span class="px-4 py-1.5 bg-gray-100 rounded-full text-[10px] font-black uppercase">🔥 1.2k Woow!!</span>
                    <span class="px-4 py-1.5 bg-blue-50 text-blue-500 rounded-full text-[10px] font-black uppercase tracking-widest">Membre Pro</span>
                </div>
            </div>
        </div>
        <button class="bg-black text-white px-8 py-4 squircle-sm font-bold text-sm hover:scale-105 transition-all shadow-xl shadow-black/10">
            Modifie la photo 
        </button>
    </form>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <!-- Section Formulaire -->
    <div class="grid lg:grid-cols-12 gap-8">
        
        <!-- Identité -->
        <div class="lg:col-span-8 bg-white squircle-md lg:squircle-lg p-8 lg:p-12 shadow-premium border border-white">
            <h2 class="text-2xl font-800 mb-10 flex items-center gap-4">
                <span class="w-1.5 h-6 bg-black rounded-full"></span>
                Gestion de l'identité
            </h2>

            <form action="/profileUpdateInfo" method="POST" class="space-y-8">
                @csrf
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Pseudo Unique</label>
                        <input type="text" value="{{$user->pseudo}}" name="pseudo" class="w-full px-7 py-5 input-field font-bold text-gray-800">
                    </div>
                    <!-- <div class="space-y-3">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Prénom</label>
                        <input type="text" value="Bogdan" class="w-full px-7 py-5 input-field font-bold text-gray-800">
                    </div> -->
                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Nom</label>
                        <input type="text" value="{{$user->name}}" name="name" class="w-full px-7 py-5 input-field font-bold text-gray-800">
                    </div>
                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Email</label>
                        <input type="email" value="{{$user->email}}" name="email" class="w-full px-7 py-5 input-field font-bold text-gray-800">
                    </div>
                    <div class="md:col-span-2 space-y-3">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-4">Bio & Présentation</label>
                        <textarea rows="3" name="bio" class="w-full px-7 py-5 input-field font-bold text-gray-800 leading-relaxed">{{$user->bio}}</textarea>
                    </div>
                </div>
                <div class="pt-6 border-t border-gray-50">
                    <button type="submit" class="bg-black text-white px-12 py-5 squircle-md font-bold text-sm shadow-2xl shadow-black/10">Enregistrer les modifications</button>
                </div>
            </form>
        </div>

        <!-- Colonne Droite (Sécurité & Woow) -->
        <div class="lg:col-span-4 space-y-8">
            <div class="bg-white squircle-md lg:squircle-lg p-8 shadow-premium border border-white">
                <h3 class="text-xl font-bold mb-8">🔐 Sécurité</h3>
                <form action="/profileUpdatePassword" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2">Mot de passe actuel</label>
                        <input type="password" name="new_password" placeholder="••••••••" class="w-full px-6 py-4 input-field text-sm font-bold">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-2">Mot de passe actuel</label>
                        <input type="password" name="new_password_confirmation" placeholder="••••••••" class="w-full px-6 py-4 input-field text-sm font-bold">
                    </div>
                    <button class="w-full bg-[#FF6B81] text-white py-5 squircle-md font-black text-xs uppercase tracking-widest shadow-xl shadow-red-200">Mettre à jour</button>
                </form>
            </div>

            <!-- Card Woow!! -->
            <div class="bg-black squircle-md lg:squircle-lg p-8 text-white text-center relative overflow-hidden group">
                <div class="w-16 h-16 bg-[#FF6B81] rounded-3xl flex items-center justify-center text-2xl shadow-lg mx-auto mb-4 animate-bounce">🔥</div>
                <h4 class="text-2xl font-black italic tracking-tighter">WOOW!!</h4>
                <p class="text-gray-400 text-[10px] font-bold uppercase mt-2">Boostez votre visibilité</p>
            </div>
        </div>
    </div>
    <!-- SCRIPT POUR LE LIVE PREVIEW -->
    <script>
        const photoInput = document.getElementById('photoInput');
        const profileImagePreview = document.getElementById('profileImagePreview');

        photoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profileImagePreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
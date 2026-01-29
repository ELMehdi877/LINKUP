<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LINKUP | Récupération</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* --- ANIMATION D'ENTRÉE --- */
        @keyframes revealUp {
            0% { opacity: 0; transform: translateY(40px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        .premium-card {
            animation: revealUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            border-radius: 60px; /* Style ultra-arrondi comme ton dashboard */
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 1);
        }

        .input-soft {
            background: #F4F6F9;
            border-radius: 24px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .input-soft:focus {
            background: #ffffff;
            border-color: #111;
            outline: none;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
        }

        .btn-black {
            background: #111111;
            border-radius: 24px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-black:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.2);
        }

        .icon-pulse {
            animation: pulse-ring 2s infinite;
        }

        @keyframes pulse-ring {
            0% { transform: scale(0.95); opacity: 0.5; }
            50% { transform: scale(1.05); opacity: 1; }
            100% { transform: scale(0.95); opacity: 0.5; }
        }
    </style>
</head>
<body class="p-6">

    <div class="w-full max-w-[500px]">
        <div class="premium-card p-12 relative overflow-hidden text-center">
            
            <!-- Accents Visuels -->
            <div class="absolute top-0 left-0 w-32 h-32 bg-blue-50 rounded-full blur-3xl -ml-16 -mt-16 opacity-60"></div>

            <header class="relative z-10">
                <!-- Icône Lock Illustrative -->
                <div class="w-20 h-20 bg-gray-50 rounded-[30px] flex items-center justify-center mx-auto mb-8 shadow-inner border border-white">
                    <span class="text-3xl icon-pulse">🔑</span>
                </div>

                <h1 class="text-3xl font-[800] text-gray-900 tracking-tighter mb-3">Mot de passe oublié ?</h1>
                <p class="text-gray-400 font-medium px-4 leading-relaxed">
                    Pas d'inquiétude. Entrez votre email pour recevoir un lien de réinitialisation sécurisé.
                </p>
            </header>

            <form action="/forgot_password" method="POST" class="mt-10 space-y-6 text-left relative z-10">
                @csrf
                
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-5 mb-2">Votre adresse email</label>
                    <input type="email" name="email" class="w-full px-7 py-5 input-soft text-gray-700 font-semibold" placeholder="exemple@linkup.com" required>
                </div>

                <button type="submit" class="btn-black w-full py-5 text-white font-bold text-lg shadow-2xl shadow-gray-200">
                    Envoyer le lien
                </button>
            </form>

            <div class="mt-10 pt-8 border-t border-gray-50 relative z-10">
                <a href="{{ url('/login') }}" class="group flex items-center justify-center gap-2 text-sm font-bold text-gray-400 hover:text-black transition">
                    <span class="group-hover:-translate-x-1 transition-transform">←</span>
                    Retour à la connexion
                </a>
            </div>
        </div>

        <!-- Footer Logo Teaser -->
        <div class="mt-10 flex flex-col items-center gap-4 opacity-30">
            <div class="w-10 h-10 bg-black rounded-xl flex items-center justify-center">
                <span class="text-white font-black text-sm">L</span>
            </div>
            <p class="text-[10px] font-bold tracking-[0.4em] uppercase">Linkup Security System</p>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LINKUP | Connexion</title>
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

        /* --- KEYFRAMES PREMIUM --- */
        @keyframes floatIn {
            0% { opacity: 0; transform: translateY(30px) scale(0.98); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        .premium-card {
            animation: floatIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            border-radius: 50px; /* Coins ultra-arrondis comme l'image */
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 1);
        }

        .input-group input {
            background: #F4F6F9;
            border-radius: 24px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
        }

        .input-group input:focus {
            background: #ffffff;
            border-color: #18181b;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            outline: none;
        }

        .btn-premium {
            background: #18181b; /* Le noir profond du dashboard */
            border-radius: 24px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-premium:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <div class="w-full max-w-[480px] px-6">
        <div class="premium-card p-12 relative overflow-hidden">
            <!-- Déco subtile -->
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50/50 rounded-full blur-3xl -mr-16 -mt-16"></div>

            <div class="relative z-10 text-center">
                <a href="{{url('/')}}" class="w-16 h-16 bg-black rounded-[22px] flex items-center justify-center mx-auto mb-8 shadow-2xl rotate-3">
                    <spam class="text-white font-extrabold text-2xl tracking-tighter">L</spam>
                </a>
                
                <h1 class="text-4xl font-800 text-gray-900 tracking-tighter mb-2">Bon retour.</h1>
                <p class="text-gray-400 font-medium mb-10">Entrez vos accès pour rejoindre LINKUP.</p>
                @if(Session('error'))
                    <p style="color : red">{{Session('error')}}</p>
                @endif

                <form action="/login" method="POST" class="space-y-6 text-left">
                    @csrf
                    <div class="input-group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-5 mb-2">Pseudo ou Email</label>
                        <input type="text" name="email" class="w-full px-7 py-5 text-gray-700 font-semibold" placeholder="votre_pseudo" required>
                    </div>

                    <div class="input-group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-5 mb-2">Mot de passe</label>
                        <input type="password" name="password" class="w-full px-7 py-5 text-gray-700 font-semibold" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn-premium w-full py-5 text-white font-bold text-lg mt-4">
                        Se connecter
                    </button>
                </form>

                <div class="mt-10 pt-8 border-t border-gray-100">
                    <p class="text-gray-400 text-sm font-medium">
                        Nouveau ici ? 
                        <a href="{{ url('/register') }}" class="text-black font-extrabold hover:underline ml-1">Rejoindre la communauté</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LINKUP | Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes cardSlideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .premium-card {
            animation: cardSlideUp 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            border-radius: 60px; /* Encore plus arrondi pour l'aspect premium */
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 50px 100px -20px rgba(0, 0, 0, 0.12);
        }

        .input-soft {
            background: #F4F7FA;
            border-radius: 22px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .input-soft:focus {
            border-color: #FF6B81; /* Rose accentué du bouton "Woow" de ton image */
            background: #fff;
            outline: none;
            box-shadow: 0 15px 30px -10px rgba(255, 107, 129, 0.15);
        }

        .btn-dark {
            background: #111111;
            border-radius: 22px;
            transition: all 0.4s ease;
        }

        .btn-dark:hover {
            background: #FF6B81; /* Devient rose au hover pour le rappel visuel */
            transform: scale(1.03);
        }
    </style>
</head>
<body class="p-6">

    <div class="w-full max-w-[650px]">
        <div class="premium-card p-10 md:p-16 relative overflow-hidden">
            
            <!-- Accents de couleur comme sur ton dashboard -->
            <div class="absolute top-0 right-0 w-40 h-40 bg-[#FF6B81]/10 rounded-full blur-3xl -mr-20 -mt-20"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-blue-400/10 rounded-full blur-3xl -ml-20 -mb-20"></div>

            <header class="text-center">
                <div class="w-16 h-16 bg-black rounded-[22px] flex items-center justify-center mx-auto mb-8 shadow-2xl rotate-3">
                    <span class="text-white font-extrabold text-2xl tracking-tighter">L</span>
                </div>
                <h1 class="text-4xl font-800 text-gray-900 tracking-tighter mb-2">Créez votre identité.</h1>

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color:red">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </header>


            <form action="/register" method="POST" class="space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Champ 1 : Nom Complet -->
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-5 mb-2">Nom Complet</label>
                        <input type="text" name="name" class="w-full px-7 py-5 input-soft text-gray-700 font-semibold" placeholder="Bogdan Nikitin" required>
                    </div>

                    <!-- Champ 2 : Pseudo -->
                    <!-- <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-5 mb-2">Pseudo Unique</label>
                        <input type="text" name="pseudo" class="w-full px-7 py-5 input-soft text-gray-700 font-semibold" placeholder="@nikitinteam" required>
                    </div> -->

                    <!-- Champ 3 : Email -->
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-5 mb-2">Email</label>
                        <input type="email" name="email" class="w-full px-7 py-5 input-soft text-gray-700 font-semibold" placeholder="hello@linkup.com" required>
                    </div>

                    <!-- Champ 4 : Password -->
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-5 mb-2">Mot de passe</label>
                        <input type="password" name="password" class="w-full px-7 py-5 input-soft text-gray-700 font-semibold" placeholder="••••••••" required>
                    </div>

                    <!-- Champ 5 : Confirm Password -->
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] ml-5 mb-2">Confirmation</label>
                        <input type="password" name="password_confirmation" class="w-full px-7 py-5 input-soft text-gray-700 font-semibold" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="pt-6 flex flex-col md:flex-row items-center justify-between gap-6">
                    <button type="submit" class="btn-dark w-full md:w-auto px-12 py-5 text-white font-bold text-lg shadow-2xl shadow-gray-200">
                        S'inscrire maintenant
                    </button>
                    <a href="{{ url('/login') }}" class="text-sm font-bold text-gray-400 hover:text-black transition">J'ai déjà un compte</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
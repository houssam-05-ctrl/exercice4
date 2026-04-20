<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-gradient: linear-gradient(135deg, #ecececff 0%, #ddf1f6ff 100%);
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --text-main: #f8fafc;
            --text-muted: #edededff;
            --primary: #34c6cbff;
            --primary-hover: #27a2a6ff;
            --error: #f87171;
            --success: #34d399;
            --input-bg: rgba(247, 251, 255, 0.82);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg-gradient);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .container {
            width: 100%;
            max-width: 650px;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(to right, #aedcd9ff, #7abecfff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            letter-spacing: -0.02em;
        }

        p.subtitle {
            text-align: center;
            color: var(--text-muted);
            margin-bottom: 2.5rem;
            font-weight: 300;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #5a5858ff;
            transition: color 0.3s;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            background: var(--input-bg);
            border: 1px solid var(--glass-border);
            color: var(--text-main);
            border-radius: 12px;
            padding: 1rem;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s ease;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 140px;
            line-height: 1.6;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(129, 140, 248, 0.15);
            background: rgba(15, 23, 42, 0.8);
        }

        select option {
            background-color: #1e293b;
            color: white;
            padding: 12px;
        }

        select[multiple] {
            min-height: 120px;
            padding: 0.5rem;
        }

        select[multiple] option {
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 2px;
        }

        select[multiple] option:checked {
            background: linear-gradient(135deg, var(--primary) 0%, #a855f7 100%);
            color: white;
        }

        .error-text {
            color: var(--error);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: block;
            animation: shake 0.4s ease-in-out;
            font-weight: 500;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-4px);
            }

            75% {
                transform: translateX(4px);
            }
        }

        .success-msg {
            background: rgba(52, 211, 153, 0.1);
            border: 1px solid rgba(52, 211, 153, 0.2);
            color: var(--success);
            padding: 1rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 500;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, #f5f5f5ff 100%);
            color: white;
            border: none;
            padding: 1.1rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
            box-shadow: 0 10px 15px -3px rgba(129, 140, 248, 0.3);
            letter-spacing: 0.02em;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 25px -3px rgba(129, 140, 248, 0.4);
            background: linear-gradient(135deg, var(--primary-hover) 0%, #afa3bbff 100%);
        }

        .submit-btn:active {
            transform: translateY(1px);
            box-shadow: 0 5px 10px -3px rgba(129, 140, 248, 0.3);
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Créer un Article</h1>
        <p class="subtitle">Publiez vos idées pour le monde entier</p>

        @if(session('success'))
            <div class="success-msg">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="titre">Titre de l'article</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre') }}"
                    placeholder="Entrez un titre attrayant...">
                @error('titre') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="contenu">Contenu</label>
                <textarea id="contenu" name="contenu"
                    placeholder="Rédigez le contenu de votre article ici...">{{ old('contenu') }}</textarea>
                @error('contenu') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="user_id">Auteur</label>
                <select id="user_id" name="user_id">
                    <option value="" disabled {{ old('user_id') ? '' : 'selected' }} hidden>Sélectionnez un utilisateur
                    </option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="tags">Tags (Sélection multiple)</label>
                <select id="tags" name="tags[]" multiple>
                    <option value="" disabled {{ !old('tags') ? 'selected' : '' }} hidden>Sélectionnez un ou plusieurs
                        tags</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'selected' : '' }}>{{ $tag->nom }}</option>
                    @endforeach
                </select>
                @error('tags') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="submit-btn">Publier l'article</button>
        </form>
    </div>

</body>

</html>
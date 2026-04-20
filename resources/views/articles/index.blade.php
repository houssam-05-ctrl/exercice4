<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Articles</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-gradient: linear-gradient(135deg, #ecececff 0%, #ddf1f6ff 100%);
            --glass-bg: rgba(45, 92, 131, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --text-main: #f8fafc;
            --text-muted: #5c87c4ff;
            --primary: #34c6cbff;
            --primary-hover: #27a2a6ff;
            --error: #f87171;
            --success: #34d399;
            --input-bg: rgba(34, 138, 230, 0.6);
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
            padding: 3rem 1.5rem;
        }

        .header-container {
            max-width: 900px;
            margin: 0 auto 3rem auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(to right, #aedcd9ff, #7abecfff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.02em;
        }

        .create-btn {
            background: linear-gradient(135deg, var(--primary) 0%, #55a6f7ff 100%);
            color: white;
            text-decoration: none;
            padding: 0.875rem 1.75rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(129, 140, 248, 0.3);
        }

        .create-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 25px -3px rgba(129, 140, 248, 0.4);
            background: linear-gradient(135deg, var(--primary-hover) 0%, #55a6f7ff 100%);
        }

        .articles-grid {
            max-width: 900px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 2rem;
        }

        .article-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s ease;
            animation: fadeIn 0.6s ease-out both;
        }

        .article-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.4);
        }

        .article-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .article-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .article-card:nth-child(4) {
            animation-delay: 0.3s;
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

        .article-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #282828ff;
            line-height: 1.3;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 1.5rem;
        }

        .author-name {
            color: #4583cfff;
            font-weight: 500;
        }

        .article-content {
            color: #94a3b8;
            line-height: 1.6;
            margin-bottom: 2rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: auto;
        }

        .tag {
            background: var(--tag-bg);
            color: #34d399;
            padding: 0.35rem 0.75rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 500;
            border: 1px solid rgba(129, 140, 248, 0.3);
        }

        .empty-state {
            text-align: center;
            grid-column: 1 / -1;
            padding: 5rem 2rem;
            background: var(--glass-bg);
            border-radius: 20px;
            border: 1px dashed rgba(255, 255, 255, 0.2);
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="header-container">
        <h1>Mes Articles</h1>
        <a href="{{ route('articles.create') }}" class="create-btn">+ Nouvel Article</a>
    </div>

    @if(session('success'))
        <div class="success-msg"
            style="max-width: 900px; margin: 0 auto 2rem auto; background: rgba(52, 211, 153, 0.1); border: 1px solid rgba(52, 211, 153, 0.2); color: #34d399; padding: 1rem 1.25rem; border-radius: 12px; display: flex; align-items: center; gap: 1rem; font-weight: 500;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="articles-grid">
        @forelse($articles as $article)
            <div class="article-card">
                <h2 class="article-title">{{ $article->titre }}</h2>
                <div class="article-meta">
                    Par <span class="author-name">{{ optional($article->user)->name ?? 'Utilisateur Inconnu' }}</span>
                    <span>•</span>
                    <span>{{ $article->created_at->format('d M Y') }}</span>
                </div>
                <p class="article-content">
                    {{ Str::limit($article->contenu, 150) }}
                </p>
                <div class="tags-container">
                    @foreach($article->tags as $tag)
                        <span class="tag">#{{ $tag->nom }}</span>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="empty-state">
                <h3>Aucun article trouvé !</h3>
                <p style="color: var(--text-muted); margin-bottom: 1.5rem;">Commencez par créer votre premier article.</p>
                <a href="{{ route('articles.create') }}" class="create-btn">Créer un article maintenant</a>
            </div>
        @endforelse
    </div>

</body>

</html>
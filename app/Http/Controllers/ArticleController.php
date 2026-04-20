<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Affiche la liste des articles
    public function index()
    {
        $articles = Article::with(['user', 'tags'])->latest()->get();
        return view('articles.index', compact('articles'));
    }

    // Affiche le formulaire
    public function create()
    {
        $users = User::all();
        $tags = Tag::all();
        return view('articles.create', compact('users', 'tags'));
    }

    // Valide et sauvegarde l'article
    public function store(Request $request)
    {
        // 1. Validation des données
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'user_id' => 'required|exists:users,id', // S'assure que l'utilisateur existe
            'tags' => 'required|array', // S'assure qu'on reçoit un tableau de tags
            'tags.*' => 'exists:tags,id' // S'assure que chaque tag existe
        ]);

        // 2. Création de l'article
        $article = Article::create([
            'titre' => $validated['titre'],
            'contenu' => $validated['contenu'],
            'user_id' => $validated['user_id'],
        ]);

        // 3. Lier les tags sélectionnés à cet article (Insertion dans article_tag)
        $article->tags()->attach($request->tags);
        $article->save();
        return redirect()->route('articles.index')->with('success', 'Article créé avec succès !');
    }
}
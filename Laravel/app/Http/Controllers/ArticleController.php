<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    // Show al Articles
    public function index() {
        return view('articles.index', [
            'articles' => Article::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    // Show single Article
    public function show(Article $article) {
        return view('articles.show', [
            'article' => $article
        ]);
    }

    // Show Create Form
    public function create() {
        return view('articles.create');
    }

    // Store Acticle data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('articles',
            'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        Article::create($formFields);

        return redirect('/')->with('message', 'Article created successfully');
    }
}

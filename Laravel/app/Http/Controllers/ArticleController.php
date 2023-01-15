<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    // Show al Articles
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // Show single Article
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article
        ]);
    }

    // Show Create Form
    public function create()
    {
        return view('articles.create');
    }

    // Store Acticle data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique(
                'articles',
                'company'
            )],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Article::create($formFields);

        return redirect('/')->with('message', 'Article created successfully');
    }

    // Show edit form
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    // Update Acticle data
    public function update(Request $request, Article $article)
    {

        // Logged in user is owner
        if($article->user_id != auth()->id()) {
            abort(403, 'Unautherized');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $article->update($formFields);

        return back()->with('message', 'Article updated successfully');
    }

    // Delete Article
    public function destroy(Article $article) {

        // Logged in user is owner
        if($article->user_id != auth()->id()) {
            abort(403, 'Unautherized');
        }

        $article->delete();
        return redirect('/')-> with('message', 'Article deletes succesfully');
    }
    
    public function manage()
    {
        return view('articles.manage', ['articles' => auth()->user()->articles()->get()]);
    }
}

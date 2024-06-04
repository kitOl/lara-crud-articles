<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-article');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $article = Article::create($request->all());

        if (!is_null($article)) {
            return back()->with('success', "Success! Article created");
        } else {
            return back()->with('failed', "Alert! Article not created");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('show-article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('edit-article', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $article = $article->update($request->all());
        if (!is_null($article)) {
            return back()->with('success', "Success! Article updated");
        } else {
            return back()->with('failed', "Alert! Article not updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article = $article->delete();

        if (!is_null($article)) {
            return back()->with('success', "Success! Article deleted");
        } else {
            return back()->with('failed', "Alert! Article not deleted");
        }
    }
}

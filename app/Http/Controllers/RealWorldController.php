<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RealWorldController extends Controller
{
    public function articles(Request $request)
    {
        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'body' => $request->body,
            'tagList' => $request->tagList,
        ]);
        return response()->json(Article::all());
    }

    public function getArticles($id)
    {
        $article = Article::find($id);
        return response()->json($article);
    }

    public function editArticles(Request $request, $id)
    {
        $article = Article::select('title', 'description', 'body')
        ->find($id);
        if ($request->title) {
            $article->title = $request->title;
            $article->save();
        }
        if ($request->description) {
            $article->description = $request ->description;
            $article->save();
        }
        if ($request->body) {
            $article->body = $request->body;
            $article->save();
        }
        return response()->json($article);
    }

    public function deleteArticles($id)
    {
        $article = Article::find($id);
        $article -> delete();
    }

    public function addUsers(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }
}

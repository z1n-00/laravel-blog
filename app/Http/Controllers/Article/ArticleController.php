<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Gate;


class ArticleController extends Controller
{
    public function index()
    {
        $data = Article::latest()->paginate(5);
        
        return view('articles.index', [
            'articles' => $data
        ]);
    }

   public function detail($id)
   {
        $data = Article::find($id);

        return view('articles.detail', [
            'article' => $data
        ]);
   }

   public function add()
   {
    $data = [
        ["id" => 1, "name" => "News"],
        ["id" => 2, "name" => "Tech"],
        ["id" => 3, "name" => "Movie"],
    ];

    return view('articles.add', [
        'categories' => $data
    ]);
   }

   public function create()
   {
        $validator = validator(request()->all(), [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->user_id = auth()->user()->id;
        $article->save();
        return redirect("/articles")->with('success', "Add new article successfully!");
   }

   public function edit($id) 
   {
        $data = Article::find($id);
        if(Gate::allows('article-edit', $data)) {
        $cat = [
            ["id" => 1, "name" => "News"],
            ["id" => 2, "name" => "Tech"],
            ["id" => 3, "name" => "Movie"],
        ];

        return view('articles.edit', [
            'article' => $data,
            'categories' => $cat
        ]);
        } else {
            return back()->with('info', "Wrong credentials. Please check again sir!");
        }

    }

   public function update(Request $request, $id)
   {   
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);
        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->category_id = $request->get('category_id');
        $article->save();

        return redirect('/articles')->with('info', "Article updated successfully.");
   }

   public function delete($id)
   {
       $article = Article::find($id);

       if(Gate::allows('article-delete', $article)) {
           $article->delete();
           return redirect('/articles')->with('info', 'Article deleted!');
       } else {
           return back()->with('info', 'You can\'t access this permission. Please check again sir!');
       }
   }

   public function __construct()
   {   
       $this->middleware('auth')->except('index', 'detail');
   }
}

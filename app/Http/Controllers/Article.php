<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\ArticleModel;

class Article extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = ArticleModel::all();
        // ::all methode de classe qui retourne l'ensemble (array) des objets appartenant au modele articleModel
        $articles->fresh();
        // Rafraichit les données --> question à poser au formateur / Actualisation
        return view('monCatalog', [ 'catalog' => $articles ]);
        //Retourne la vue 'catalog" avec comme arguments l'ensemble des articles.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
        //Retourne la vue du formulaire creation d'article
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('titre') == "") {abort(500);}
        if($request->input('prix') < 0) {abort(500);}
        $article = new ArticleModel;
        $article->titre = $request->input('titre');
        $article->prix = $request->input('prix');
        $article->description = $request->input('description');
        $article->save();
        // return view('catalog', [ 'catalog' => $articles ]);
        return redirect()->route('article.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toto='coucou';
    $article =  ArticleModel::where('id', $id)->firstOrFail();
    /*findOrFail($id)prend un identifiant et renvoie un seul modèle. Si aucun modèle correspondant n'existe, il renvoie une erreur */

        return view('article', [
            'titre' => $article->titre,
            'prix' => $article->prix,
            'description' => $article->description,
            'id' => $article->id
        ])->with('toto',$toto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article =  ArticleModel::where('id', $id)->firstOrFail();
        /*findOrFail($id)prend un identifiant et renvoie un seul modèle. Si aucun modèle correspondant n'existe, il renvoie une erreur */
        return view('articleedit', [
            'titre' => $article->titre,
            'prix' => $article->prix,
            'description' => $article->description,
            'id' => $article->id
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articles = ArticleModel::all();
        $article =  ArticleModel::where('id', $id)->firstOrFail();
        $article->titre = $request->input('titre');
        $article->prix = $request->input('prix');
        $article->description = $request->input('description');
        $article->id = $id;
        $article->save();
        return view('article', [
            'titre' => $article->titre,
            'prix' => $article->prix,
            'description' => $article->description,
            'id' => $article->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article =  \App\ArticleModel::where('id', $id)->firstOrFail();
        $article->destroy($id);
		return back();
    }

}

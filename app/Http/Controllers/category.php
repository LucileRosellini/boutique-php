<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\categoryModel;

class category extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categoryModel::all();
        return view('mescategory', [ 'categories' => $categories ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formbis');
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
        $cat = new categoryModel;
        $cat->titre = $request->input('titre');
        $cat->description = $request->input('description');
        $cat->save();
        return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $category=  categoryModel::where('id', $id)->firstOrFail();
    /*findOrFail($id)prend un identifiant et renvoie un seul modèle. Si aucun modèle correspondant n'existe, il renvoie une erreur */

        return view('category', [
            'titre' => $category->titre,
            'description' => $category->description,
            'id' => $category->id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =  categoryModel::where('id', $id)->firstOrFail();
        /*findOrFail($id)prend un identifiant et renvoie un seul modèle. Si aucun modèle correspondant n'existe, il renvoie une erreur */
        return view('categoryedit', [
            'titre' => $category->titre,
            'description' => $category->description,
            'id' => $category->id
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
        $category = categoryModel::all();
        /* preferer redirection*/
        $category =  categoryModel::where('id', $id)->firstOrFail();
        $category->titre = $request->input('titre');
        $category->description = $request->input('description');
        $category->id = $id;
        $category->save();
        return view('category', [
            'titre' => $category->titre,
            'description' => $category->description,
            'id' => $category->id
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
        $category =  \App\categoryModel::where('id', $id)->firstOrFail();
        $category->destroy($id);
		return back();
    }
}
